<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ProductImage;
use App\Http\Requests\ProductFormRequest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index() {
        return view("admin.product.index");
    }

    public function create() {
        $categories = Category::all();
        $brands = Brand::all();
        return view("admin.product.create", compact("categories", "brands"));
    }

    public function store(ProductFormRequest $request) {
        $validatedData = $request->validated();
        // dd(isset($validatedData["isNew"]) ? 1 : 0);
        $category = Category::findOrFail($validatedData["category_id"]);
        $product = $category->products()->create([
            "category_id" => $validatedData["category_id"],
            "name" => $validatedData["name"],
            "slug" => Str::slug($validatedData["slug"]),
            "small_description" => $validatedData["small_description"],
            "description" => $validatedData["description"],
            "brand_id" => $validatedData["brand_id"],
            "isNew" => isset($validatedData["isNew"]) ? 1 : 0,
            "status" => isset($validatedData["status"]) ? 1 : 0 ,
            "meta_title" => $validatedData["meta_title"],
            "meta_keyword" => $validatedData["meta_keyword"],
            "meta_description" => $validatedData["meta_description"],
        ]);
        if($request->hasFile("images")) {
            $uploadPath = "uploads/product/";

            $i = 1;
            foreach($request->file("images") as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.".".$extension;
                $imageFile->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath.$filename;

                $product->productImages()->create([
                    "product_id" => $product->id,
                    "image" =>$finalImagePathName,
                ]);
            }
        }
        return to_route("product.index")->with("message", "Produk baru telah ditambahkan");
    }

    public function edit(int $product_id) {
        $product = Product::with(["productImages"])->findOrFail($product_id);
        $categories = Category::all();
        $brands = Brand::all();
        $productVariants = $product->productVariants;
        return view("admin.product.edit", compact("product", "categories", "brands", "productVariants"));
    }

    public function update(ProductFormRequest $request, int $product_id) {
        $validatedData = $request->validated();
        // dd($validatedData);
        $product = Category::findOrFail($validatedData["category_id"])
                            ->products()->where("id", $product_id)->first();

        if($product) {
            $product->update([
                "category_id" => $validatedData["category_id"],
                "name" => $validatedData["name"],
                "slug" => Str::slug($validatedData["slug"]),
                "small_description" => $validatedData["small_description"],
                "description" => $validatedData["description"],
                "brand_id" => $validatedData["brand_id"],
                "isNew" => isset($validatedData["isNew"]) ? 1 : 0,
                "status" => isset($validatedData["status"]) ? 1 : 0 ,
                "meta_title" => $validatedData["meta_title"],
                "meta_keyword" => $validatedData["meta_keyword"],
                "meta_description" => $validatedData["meta_description"],
            ]);
    
            // Hapus gambar
            $validatedData["previous_image"] = $validatedData["previous_image"] ?? null;
            // dd(isset($validatedData["previous_image"]));
            if(isset($validatedData["previous_image"])) {
                $deleteImages = ProductImage::whereNotIn("id", $validatedData["previous_image"])->get();
                if(count($deleteImages) > 0) {//jika ada hasilnya
                    foreach($deleteImages as $deleteImage) {
                        if(File::exists($deleteImage->image)) {
                            File::delete($deleteImage->image);
                        }
                        ProductImage::destroy($deleteImage->id);
                    }   
                } 
            } else {
                //ambil semua gambar dari database berdasarkan id,
                $fetchImages = ProductImage::where("product_id", $product_id)->get();
                //cek gambar apakah ada
                foreach($fetchImages as $fetchImage) {
                    if(File::exists($fetchImage->image)) {
                        File::delete($fetchImage->image);
                    }
                }
                //setelah proses penghapusan file, hapus pada database
                ProductImage::where("product_id", $product_id)->delete();
            }

            // Tambahkan gambar
            if($request->hasFile("images")) {
                $uploadPath = "uploads/product/";
    
                $i = 1;
                foreach($request->file("images") as $imageFile) {
                    $extension = $imageFile->getClientOriginalExtension();
                    $filename = time().$i++.".".$extension;
                    $imageFile->move($uploadPath, $filename);
                    $finalImagePathName = $uploadPath.$filename;
    
                    $product->productImages()->create([
                        "product_id" => $product->id,
                        "image" =>$finalImagePathName,
                    ]);
                }
            }
        }
       
        return to_route("product.index")->with("message", "Produk $product->name berhasil diedit");
    }
  
}

<ul>
                                            
    <li><a href="{{url("/produk")}}">Product</a></li>
    @foreach($categories as $category)
        <li><a href="{{"kategori/$category->slug"}}">{{$category->name}}</a></li>
    @endforeach

</ul>
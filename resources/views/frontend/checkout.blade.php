@extends('layouts.app')
@section("styles")

@endsection
@section('main')
    {{ Breadcrumbs::render('checkout') }}
    <!-- WISHLIST AREA START -->
    <div class="ltn__checkout-area mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__checkout-inner">
                        <div class="ltn__checkout-single-content ltn__coupon-code-wrap">
                            <h5>Have a coupon? <a class="ltn__secondary-color" href="#ltn__coupon-code"
                                    data-toggle="collapse">Click here to enter your code</a></h5>
                            <div id="ltn__coupon-code" class="collapse ltn__checkout-single-content-info">
                                <div class="ltn__coupon-code-form">
                                    <p>If you have a coupon code, please apply it below.</p>
                                    <form action="#">
                                        <input type="text" name="coupon-code" placeholder="Coupon code">
                                        <button class="btn theme-btn-2 btn-effect-2 text-uppercase">Apply
                                            Coupon</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="ltn__checkout-single-content mt-50">
                            <h4 class="title-2">Detail Pemesanan</h4>
                            <div class="ltn__checkout-single-content-info">
                                <form action="#">
                                    <h6>Informasi Pemesan</h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-item input-item-name ltn__custom-icon">
                                                <input type="text" name="firstname" placeholder="Nama Depan">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-name ltn__custom-icon">
                                                <input type="text" name="lastname" placeholder="Nama Belakang">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-email ltn__custom-icon">
                                                <input type="email" name="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-phone ltn__custom-icon">
                                                <input type="text" name="phone" placeholder="Nomor Telepon">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <h6>Provinsi</h6>
                                            <div class="input-item">
                                                <select class="nice-select province">
                                                    <option value="">Pilih Provinsi</option>
                                                    @foreach ($provinces as $province)
                                                        <option value="{{ $province->id }}">{{ $province->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <h6>Kota/Kabupaten</h6>
                                            <div class="input-item">
                                                <select class="nice-select city">
                                                    <option value="0">Pilih Kota/Kabupaten</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <h6>Kecamatan</h6>
                                            <div class="input-item">
                                                <select class="nice-select subdistrict">
                                                    <option value="0">Pilih Kecamatan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <h6>Alamat</h6>
                                            <div class="input-item input-item-textarea">
                                                <textarea name="address" placeholder="Tuliskan Alamat anda selengkap mungkin" rows="4"></textarea>
                                            </div>

                                        </div>
                                        <div class="col-12">
                                            <h6>Catatan Penjual (optional)</h6>
                                            <div class="input-item input-item-textarea ltn__custom-icon">
                                                <textarea name="note" placeholder="Berikan catatan" rows="4"></textarea>
                                            </div>

                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <h6>Kode Pos</h6>
                                            <div class="input-item">
                                                <input type="text" placeholder="Kode Pos">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ltn__checkout-payment-method mt-50">
                        <h4 class="title-2">Payment Method</h4>
                        <div id="checkout_accordion_1">
                            <!-- card -->
                            <div class="card">
                                <h5 class="collapsed ltn__card-title" data-toggle="collapse" data-target="#faq-item-2-1"
                                    aria-expanded="false">
                                    Pembayaran Virtual
                                </h5>
                                <div id="faq-item-2-1" class="collapse" data-parent="#checkout_accordion_1">
                                    <div class="card-body">
                                        <p>Bayar melalui virtual favorit anda.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- card -->
                            <div class="card">
                                <h5 class="ltn__card-title" data-toggle="collapse" data-target="#faq-item-2-2"
                                    aria-expanded="true">
                                    Cash on delivery
                                </h5>
                                <div id="faq-item-2-2" class="collapse show" data-parent="#checkout_accordion_1">
                                    <div class="card-body">
                                        <p>Bayar saat barang sudah sampai.</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="ltn__payment-note mt-30 mb-30">
                            <p>Data anda diperlukan untuk pembelian, dan data anda akan aman ditangan kami.</p>
                        </div>
                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Place
                            order</button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping-cart-total mt-50">
                        <h4 class="title-2">Total Belanja</h4>
                        <table class="table">
                            <tbody>
                                @php $totalOrder = 0; @endphp
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td>{{ $cart->name }} {{ $cart->size ? '/' . $cart->size : null }}
                                            <strong>{{ $cart->quantity }}</strong>
                                        </td>
                                        <td>{{ rupiah($cart->selling_price) }}</td>
                                    </tr>
                                    @php $totalOrder += $cart->selling_price @endphp
                                @endforeach

                                <tr>
                                    <td><strong>Total Belanja</strong></td>
                                    <td><strong>{{ rupiah($totalOrder) }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- WISHLIST AREA START -->
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $(".input-item .province").change(function() {
                $(".input-item div.city .current").text('Pilih Kota/Kabupaten')
                $(".input-item div.subdistrict .current").text('Pilih Kecamatan')
                $.ajax({
                    url: "{{ route('getCities') }}",
                    data: {
                        province_id: $(this).val()
                    },
                    success: function(response) {

                        const listCities = $(".input-item .city .list")
                        listCities.empty()
                        $(".input-item .subdistrict .list").empty()
                        let stackCities =
                            `<li data-value class='option'>Pilih Kota/Kabupaten</li>`
                        let stackOptionCities = `<option value=''>Pilih Kota/Kabupaten</option>`
                        response.forEach((item, _index) => {
                            stackCities +=
                                `<li data-value='${item.id}' class='option'>${item.name}</li>`
                            stackOptionCities +=
                                `<option value='${item.id}'>${item.name}</option>`
                        })
                        listCities.append(stackCities)
                        $(".input-item select.city").append(stackOptionCities)
                        // console.log(stackCities)
                    }
                })
            })

            $(".input-item .city").change(function() {
                $(".input-item div.subdistrict .current").text('Pilih Kecamatan')
                $.ajax({
                    url: "{{ route('getSubdistricts') }}",
                    data: {
                        city_id: $(this).val()
                    },
                    success: function(response) {

                        const listSubdistricts = $(".input-item div.subdistrict .list")
                        listSubdistricts.empty()
                        let stackSubdistricts =
                            `<li data-value class='option'>Pilih Kecamatan</li>`
                        let stackOptionSubdistricts =
                            `<option value=''>Pilih Kota/Kabupaten</option>`
                        response.forEach((item, _index) => {
                            stackSubdistricts +=
                                `<li data-value='${item.id}' class='option'>${item.name}</li>`
                            stackOptionSubdistricts +=
                                `<option value='${item.id}'>${item.name}</option>`
                        })
                        listSubdistricts.append(stackSubdistricts)
                        $(".input-item select.subdistrict").append(stackOptionSubdistricts)
                    }
                })
            })

        })
    </script>
@endsection

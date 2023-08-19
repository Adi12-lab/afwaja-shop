@extends('layouts.app')
@section('main')
    <!-- LOGIN AREA START (Register) -->
    <div class="ltn__login-area pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1 class="section-title">Registrasi <br>Akun Anda</h1>
                        <p>Dengan membuat akun, anda dapat menikmati berbagai fasilitas<br>
                            dari Afwaja Shop</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="account-login-inner">
                        <form method="POST" action="{{ route('register') }}" class="ltn__form-box contact-form-box">
                            @csrf
                            @error('name') <small class="text-danger">{{$message}}</small> @enderror
                            <input type="text" name="name" placeholder="Nama Anda" value="{{old('name')}}">
                            @error('email') <small class="text-danger">{{$message}}</small> @enderror
                            <input type="text" name="email" placeholder="Email*" value="{{old('email')}}">
                            @error('password') <small class="text-danger">{{$message}}</small> @enderror
                            <input type="password" name="password" placeholder="Password*">
                            @error('password_confirmation') <small class="text-danger">{{$message}}</small> @enderror
                            <input type="password" name="password_confirmation" placeholder="Confirm Password*">
                            <div class="btn-wrapper">
                                <button class="theme-btn-1 btn reverse-color btn-block" type="submit">Buat akun</button>
                            </div>
                        </form>
                        <div class="by-agree text-center">
                            <div class="go-to-btn mt-50">
                                <a href="{{route('login')}}">Sudah punya akun ?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

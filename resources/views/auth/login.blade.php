 @extends("layouts.app")
 @section("main")
 <!-- LOGIN AREA START -->
 <div class="ltn__login-area pb-65">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="section-title-area text-center">
                     <h1 class="section-title">Sign In <br>To Your Account</h1>
                     <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br>
                         Sit aliquid, Non distinctio vel iste.</p>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-lg-6">
                 <div class="account-login-inner">
                     <form method="POST" action="{{ route('login') }}" class="ltn__form-box contact-form-box">
                         @csrf
                         <input type="text" name="email" placeholder="Email*">
                         <input type="password" name="password" placeholder="Password*">
                         <div class="btn-wrapper mt-0">
                             <button class="theme-btn-1 btn btn-block" type="submit">SIGN IN</button>
                         </div>
                         <!-- Remember Me -->
                         <div class="block mt-4">
                             <label for="remember_me" class="inline-flex items-center">
                                 <input id="remember_me" type="checkbox"
                                     class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                     name="remember">
                                 <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                             </label>
                         </div>

                         {{-- <div class="go-to-btn mt-20">
                                    <a href="#"><small>FORGOTTEN YOUR PASSWORD?</small></a>
                                </div> --}}
                         @if (Route::has('password.request'))
                             <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                 href="{{ route('password.request') }}">
                                 {{ __('Forgot your password?') }}
                             </a>
                         @endif
                     </form>
                 </div>
             </div>
             <div class="col-lg-6">
                 <div class="account-create text-center pt-50">
                     <h4>DON'T HAVE AN ACCOUNT?</h4>
                     <p>Add items to your wishlistget personalised recommendations <br>
                         check out more quickly track your orders register</p>
                     <div class="btn-wrapper">
                         <a href="{{route("register")}}" class="theme-btn-1 btn black-btn">CREATE ACCOUNT</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- LOGIN AREA END -->
@endsection
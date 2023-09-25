   <!-- HEADER AREA START (header-4) -->
   <header
       class="ltn__header-area ltn__header-4 ltn__header-6 ltn__header-transparent{{ Request::is('/') ? '' : '---' }} gradient-color-2---">
       <!-- ltn__header-top-area start -->
       <div class="ltn__header-top-area top-area-color-white d-none">
           <div class="container">
               <div class="row">
                   <div class="col-md-7">
                       <div class="ltn__top-bar-menu">
                           <ul>
                               <li><a href="mailto:info@webmail.com?Subject=Flower%20greetings%20to%20you"><i
                                           class="icon-mail"></i> info@webmail.com</a></li>
                               <li><a href="locations.html"><i class="icon-placeholder"></i> 15/A, Nest Tower,
                                       NYC</a></li>
                           </ul>
                       </div>
                   </div>
                   <div class="col-md-5">
                       <div class="top-bar-right text-right">
                           <div class="ltn__top-bar-menu">
                               <ul>
                                   <li>
                                       <!-- ltn__social-media -->
                                       <div class="ltn__social-media">
                                           <ul>
                                               <li><a href="#" title="Facebook"><i
                                                           class="fab fa-facebook-f"></i></a></li>
                                               <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                                               </li>

                                               <li><a href="#" title="Instagram"><i
                                                           class="fab fa-instagram"></i></a></li>
                                               <li><a href="#" title="Dribbble"><i
                                                           class="fab fa-dribbble"></i></a></li>
                                           </ul>
                                       </div>
                                   </li>
                               </ul>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- ltn__header-top-area end -->

       <!-- ltn__header-middle-area start -->
       <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-white">
           <div class="container">
               <div class="row">
                   <div class="col">
                       <div class="site-logo">
                           <a href="index.html"><img src="img/logo.png" alt="Logo"></a>
                       </div>
                   </div>
                   <div class="col header-menu-column menu-color-white---">
                       <div class="header-menu d-none d-xl-block">
                           <nav>
                               <div class="ltn__main-menu">
                                   <ul>
                                       <li class="menu-icon"><a href="#">Home</a>
                                       </li>
                                       <li class="menu-icon"><a href="#">About Us</a>

                                       </li>
                                       <li class="menu-icon"><a href="#">Products</a>
                                           <livewire:frontend.header-category />
                                       </li>

                                       <li class="menu-icon"><a href="#">News</a>

                                       </li>
                                       <li><a href="contact.html">Contact</a></li>
                                   </ul>
                               </div>
                           </nav>
                       </div>
                   </div>
                   <div class="col">
                       <div class="ltn__header-options ltn__header-options-color-white----">

                           <!-- header-search-1 -->
                           <div class="header-search-wrap">
                               <div class="header-search-1">
                                   <div class="search-icon">
                                       <i class="icon-search for-search-show"></i>
                                       <i class="icon-cancel  for-search-close"></i>
                                   </div>
                               </div>
                               <div class="header-search-1-form">
                                   <form id="#" method="get" action="#">
                                       <input type="text" name="search" value=""
                                           placeholder="Search here..." />
                                       <button type="submit">
                                           <span><i class="icon-search"></i></span>
                                       </button>
                                   </form>
                               </div>
                           </div>
                           <!-- user-menu -->
                           <div class="ltn__drop-menu user-menu">
                               <ul>
                                   <li>
                                       <a href="#"><i class="icon-user"></i></a>
                                       <ul>
                                           @if (!Auth::check())
                                               <li><a href="{{route('login')}}">Login</a></li>
                                               <li><a href="{{route('register')}}">Registrasi</a></li>
                                           @else
                                               <li><a href="{{route('profil')}}">My Account</a></li>
                                               <li><a href="{{route("wishlist")}}">Wishlist</a></li>
                                               <li>
                                                   <form action="{{ route('logout') }}" method="POST">
                                                       @csrf
                                                       <button type="submit">Logout</button>
                                                   </form>
                                               </li>
                                           @endif
                                       </ul>
                                   </li>
                               </ul>
                           </div>
                           <!-- mini-cart -->
                           <livewire:frontend.cart.cart-counter />
                           <!-- Mobile Menu Button -->
                           <div class="mobile-menu-toggle d-xl-none">
                               <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                                   <svg viewBox="0 0 800 600">
                                       <path
                                           d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                           id="top"></path>
                                       <path d="M300,320 L540,320" id="middle"></path>
                                       <path
                                           d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                           id="bottom"
                                           transform="translate(480, 320) scale(1, -1) translate(-480, -318) ">
                                       </path>
                                   </svg>
                               </a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- ltn__header-middle-area end -->
   </header>
   <!-- HEADER AREA END -->

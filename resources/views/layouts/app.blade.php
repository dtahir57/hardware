<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Unishop - Universal E-Commerce Template">
    <meta name="keywords" content="shop, e-commerce, modern, flat style, responsive, online store, business, mobile, blog, bootstrap 4, html5, css3, jquery, js, gallery, slider, touch, creative, clean">
    <meta name="author" content="Rokaux">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon and Apple Icons-->
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="apple-touch-icon" href="touch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="180x180" href="touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="167x167" href="touch-icon-ipad-retina.png">
    <!-- Vendor Styles including: Bootstrap, Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="{{ asset('frontend/css/vendor.min.css')}}">
    <!-- Main Template Styles-->
    <link id="mainStyles" rel="stylesheet" media="screen" href="{{ asset('frontend/css/styles.min.css')}}">
    <!-- Modernizr-->
    <script src="{{ asset('frontend/js/modernizr.min.js')}}"></script>
  </head>
  <!-- Body-->
  <body>
    <!-- Header-->
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
    <header class="site-header navbar-sticky">
      <!-- Topbar-->
      <div class="topbar d-flex justify-content-between">
        <!-- Logo-->
        <div class="site-branding d-flex"><a class="site-logo align-self-center" href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" alt="PLC Hardware"></a></div>
        <!-- Search / Categories-->
        <div class="search-box-wrap d-flex">
          <div class="search-box-inner align-self-center">
            <div class="search-box d-flex">
              <div class="btn-group categories-btn">
                <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"><i class="icon-menu text-lg"></i>&nbsp;Categories</button>
                <div class="dropdown-menu mega-dropdown">
                  <div class="row">
                    @foreach($categories as $category)
                    <div class="col-sm-3">
                        <a class="d-block navi-link text-center mb-30" href="{{ route('category.show', $category->slug) }}">
                            <img class="d-block" src="{{ Storage::url($category->thumbnail) }}" alt="Category Image" />
                            <span class="text-gray-dark">{{ $category->title }}</span>
                        </a>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              <form class="input-group" method="get"><span class="input-group-btn">
                  <button type="submit"><i class="icon-search"></i></button></span>
                <input class="form-control" type="search" placeholder="Search for anything">
              </form>
            </div>
          </div>
        </div>
        <!-- Toolbar-->
        <div class="toolbar d-flex">
          <div class="toolbar-item visible-on-mobile mobile-menu-toggle"><a href="#">
              <div><i class="icon-menu"></i><span class="text-label">Menu</span></div></a></div>
          <div class="toolbar-item hidden-on-mobile"><a href="#">
              <div><i class="flag-icon"><img src="{{ asset('frontend/img/flags/EN.png')}}" alt="English"></i><span class="text-label">Eng / Usd</span></div></a>
            <ul class="toolbar-dropdown lang-dropdown">
              <li class="px-3 pt-1 pb-2">
                <select class="form-control form-control-sm">
                  <option value="usd">$ USD</option>
                  <option value="usd">€ EUR</option>
                  <option value="usd">£ UKP</option>
                  <option value="usd">¥ JPY</option>
                </select>
              </li>
              <li><a href="#"><i class="flag-icon"><img src="{{ asset('frontend/img/flags/FR.png') }}" alt="Français"></i>&nbsp;Français</a></li>
              <li><a href="#"><i class="flag-icon"><img src="{{ asset('frontend/img/flags/DE.png') }}" alt="Deutsch"></i>&nbsp;Deutsch</a></li>
              <li><a href="#"><i class="flag-icon"><img src="{{ asset('frontend/img/flags/IT.png') }}" alt="Italiano"></i>&nbsp;Italiano</a></li>
            </ul>
          </div>
          <div class="toolbar-item hidden-on-mobile"><a href="product-comparison.html">
              <div><span class="compare-icon"><i class="icon-repeat"></i><span class="count-label">{{ Cart::count() }}</span></span><span class="text-label">Compare</span></div></a></div>
          <div class="toolbar-item hidden-on-mobile">
            @guest
            <a href="{{ route('login') }}">
              <div>
                <i class="icon-user"></i>
                <span class="text-label">Sign In / Up</span>
              </div>
            </a>
            <div class="toolbar-dropdown text-center px-3">
              <p class="text-xs mb-3 pt-2">Sign in to your account or register new one to have full control over your orders, receive bonuses and more.</p><a class="btn btn-primary btn-sm btn-block" href="{{ route('register') }}">Sign In</a>
              <p class="text-xs text-muted mb-2">New customer?&nbsp;<a href="{{ route('register') }}">Register</a></p>
            </div>
            @else 
            <a href="{{ route('home') }}">
              <div>
                <i class="icon-user"></i>
                <span class="text-label">{{ Auth::user()->name }}</span>
              </div>
            </a>
            @endguest
          </div>
          <div class="toolbar-item"><a href="{{ route('cart.index') }}">
              <div><span class="cart-icon"><i class="icon-shopping-cart"></i><span class="count-label">{{ Cart::count() }}   </span></span><span class="text-label">Cart</span></div></a>
            <div class="toolbar-dropdown cart-dropdown widget-cart hidden-on-mobile">
              @foreach($cartItems as $cartItem)
              <div class="entry">
                <div class="entry-thumb"><a href=""><img src="{{ Storage::url($cartItem->options->image) }}" alt="Product"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="">{{ $cartItem->name }}</a></h4><span class="entry-meta">{{ $cartItem->qty }} x ${{ $cartItem->price }}</span>
                </div>
                <div class="entry-delete"><i class="icon-x"></i></div>
              </div>
              @endforeach
              <div class="text-right">
                <p class="text-gray-dark py-2 mb-0"><span class='text-muted'>Subtotal:</span> &nbsp;${{ Cart::subtotal() }}</p>
              </div>
              <div class="d-flex">
                <div class="pr-2 w-50"><a class="btn btn-secondary btn-sm btn-block mb-0" href="{{route('shop.index')}}">Expand Cart</a></div>
                <div class="pl-2 w-50"><a class="btn btn-primary btn-sm btn-block mb-0" href="{{ route('cart.index') }}">View Cart</a></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Mobile Menu-->
        <div class="mobile-menu">
          <!-- Search Box-->
          <div class="mobile-search">
            <form class="input-group" method="get"><span class="input-group-btn">
                <button type="submit"><i class="icon-search"></i></button></span>
              <input class="form-control" type="search" placeholder="Search site">
            </form>
          </div>
          <!-- Toolbar-->
          <div class="toolbar">
            <div class="toolbar-item"><a href="#">
                <div><i class="flag-icon"><img src="img/flags/EN.png" alt="English"></i><span class="text-label">Eng / Usd</span></div></a>
              <ul class="toolbar-dropdown lang-dropdown w-100">
                <li class="px-3 pt-1 pb-2">
                  <select class="form-control form-control-sm">
                    <option value="usd">$ USD</option>
                    <option value="usd">€ EUR</option>
                    <option value="usd">£ UKP</option>
                    <option value="usd">¥ JPY</option>
                  </select>
                </li>
                <li><a href="#"><i class="flag-icon"><img src="img/flags/FR.png" alt="Français"></i>&nbsp;Français</a></li>
                <li><a href="#"><i class="flag-icon"><img src="img/flags/DE.png" alt="Deutsch"></i>&nbsp;Deutsch</a></li>
                <li><a href="#"><i class="flag-icon"><img src="img/flags/IT.png" alt="Italiano"></i>&nbsp;Italiano</a></li>
              </ul>
            </div>
            <div class="toolbar-item"><a href="product-comparison.html">
                <div><span class="compare-icon"><i class="icon-repeat"></i><span class="count-label">3</span></span><span class="text-label">Compare</span></div></a></div>
            <div class="toolbar-item"><a href="{{ route('login') }}">
                <div><i class="icon-user"></i><span class="text-label">Sign In / Up</span></div></a></div>
          </div>
          <!-- Slideable (Mobile) Menu-->
          <nav class="slideable-menu">
            <ul class="menu" data-initial-height="385">
              <li class="has-children {{(Request::is('/')? 'active' : '')}}"><span><a href="{{ url('/') }}">Home</a></span>
              </li>
              <li class="has-children"><span><a href="{{ route('shop.index') }}">Shop</a><span class="sub-menu-toggle"></span></span>
                <ul class="slideable-submenu">
                    <li><a href="{{ route('shop.index') }}">Shop Categories</a></li>
                    <li><a href="{{ route('cart.index') }}">Cart</a></li>
                  <li class="has-children"><span><a href="{{ route('checkout.index') }}">Checkout</a><span class="sub-menu-toggle"></span></span>
                  </li>
                </ul>
              </li>
              @if(Auth::check())
              <li class="has-children"><span><a href="account-orders.html">Account</a><span class="sub-menu-toggle"></span></span>
                <ul class="slideable-submenu">
                    <li><a href="account-login.html">Login / Register</a></li>
                    <li><a href="account-password-recovery.html">Password Recovery</a></li>
                    <li><a href="account-orders.html">Orders List</a></li>
                    <li><a href="account-wishlist.html">Wishlist</a></li>
                    <li><a href="account-profile.html">Profile Page</a></li>
                    <li><a href="account-address.html">Contact / Shipping Address</a></li>
                    <li><a href="account-open-ticket.html">Open Ticket</a></li>
                    <li><a href="account-tickets.html">My Tickets</a></li>
                    <li><a href="account-single-ticket.html">Single Ticket</a></li>
                </ul>
              </li>
              @endif
              <li><span><a href="blog-rs.html">Blog</a><span class="sub-menu-toggle"></span></span>
              </li>
              <li><span><a href="components/accordion.html">Contact Us</a><span class="sub-menu-toggle"></span></span></li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- Navbar-->
      <div class="navbar">
        <div class="btn-group categories-btn">
          <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"><i class="icon-menu text-lg"></i>&nbsp;Categories</button>
          <div class="dropdown-menu mega-dropdown">
            
            <div class="row">
              <div class="col-sm-3"><a class="d-block navi-link text-center mb-30" href="shop-grid-ls.html"><img class="d-block" src="img/shop/header-categories/05.jpg"><span class="text-gray-dark">Headphones</span></a></div>
              <div class="col-sm-3"><a class="d-block navi-link text-center mb-30" href="shop-grid-ls.html"><img class="d-block" src="img/shop/header-categories/06.jpg"><span class="text-gray-dark">Wearable Electronics</span></a></div>
              <div class="col-sm-3"><a class="d-block navi-link text-center mb-30" href="shop-grid-ls.html"><img class="d-block" src="img/shop/header-categories/07.jpg"><span class="text-gray-dark">Printers &amp; Ink</span></a></div>
              <div class="col-sm-3"><a class="d-block navi-link text-center mb-30" href="shop-grid-ls.html"><img class="d-block" src="img/shop/header-categories/08.jpg"><span class="text-gray-dark">Video Games</span></a></div>
            </div>
          </div>
        </div>
        <!-- Main Navigation-->
        <nav class="site-menu">
          <ul>
            <li class="has-submenu {{(Request::is('/')? 'active' : '')}}"><a href="{{('/')}}">Home</a></li>
            <li class="has-submenu {{(Request::is('shop')? 'active' : '')}}"><a href="{{ route('shop.index') }}">Shop</a>
              <ul class="sub-menu">
                  <li><a href="{{ route('shop.index') }}">Shop Categories</a></li>
                  <li><a href="{{ route('cart.index') }}">Cart</a></li>
                <li><a href="{{ route('checkout.index') }}">Checkout</a></li>
              </ul>
            </li>
            <li class="has-megamenu"><a href="#">Mega Menu</a>
              <ul class="mega-menu">
                <li><span class="mega-menu-title">Top Categories</span>
                  <ul class="sub-menu">
                    @foreach($top_categories as $category)
                    <li><a href="{{ route('category.show', $category->slug) }}">{{ $category->title }}</a></li>
                    @endforeach
                  </ul>
                </li>
                <li><span class="mega-menu-title">Popular Brands</span>
                  <ul class="sub-menu">
                    @foreach($brands as $brand)
                    <li><a href="#">{{ $brand->name }}</a></li>
                    @endforeach
                  </ul>
                </li>
                <li><span class="mega-menu-title">Store Locator</span>
                  <div class="card mb-3">
                    <div class="card-body">
                      <ul class="list-icon">
                        <li> <i class="icon-map-pin text-muted"></i>514 S. Magnolia St. Orlando, FL 32806, USA</li>
                        <li> <i class="icon-phone text-muted"></i>+1 (786) 322 560 40</li>
                        <li class="mb-0"><i class="icon-mail text-muted"></i><a class="navi-link" href="mailto:orlando.store@unishop.com">orlando.store@unishop.com</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <ul class="list-icon">
                        <li> <i class="icon-map-pin text-muted"></i>44 Shirley Ave. West Chicago, IL 60185, USA</li>
                        <li> <i class="icon-phone text-muted"></i>+1 (847) 252 765 33</li>
                        <li class="mb-0"><i class="icon-mail text-muted"></i><a class="navi-link" href="mailto:chicago.store@unishop.comm">chicago.store@unishop.com</a></li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li><a class="card border-0 bg-secondary rounded-0" href="{{ route('shop.index') }}"><img class="d-block mx-auto" alt="Samsung Galaxy S9" src="{{ asset('frontend/img/banners/mega-menu.jpg') }}"></a></li>
              </ul>
            </li>
            @if(Auth::check())
            <li class="has-submenu"><a href="account-orders.html">Account</a>
              <ul class="sub-menu">
                  <li><a href="">Password Recovery</a></li>
                  <li><a href="{{ route('customer.order.index') }}">Orders List</a></li>
                  <li><a href="">Wishlist</a></li>
                  <li><a href="{{ route('home') }}">Profile Page</a></li>
              </ul>
            </li>
            @endif
            <li class="has-submenu"><a href="">Blog</a></li>
            <li class="has-submenu"><a href="">About Us</a></li>
            <li class="has-megamenu"><a href="">Contact Us</a></li>
          </ul>
        </nav>
        <!-- Toolbar ( Put toolbar here only if you enable sticky navbar )-->
        <div class="toolbar">
          <div class="toolbar-inner">
            <div class="toolbar-item"><a href="product-comparison.html">
                <div><span class="compare-icon"><i class="icon-repeat"></i><span class="count-label">3</span></span><span class="text-label">Compare</span></div></a></div>
            <div class="toolbar-item"><a href="{{ route('cart.index') }}">
                <div><span class="cart-icon"><i class="icon-shopping-cart"></i><span class="count-label">{{ Cart::count() }}  </span></span><span class="text-label">Cart</span></div></a>
              <div class="toolbar-dropdown cart-dropdown widget-cart">
                <!-- Entry-->
                <div class="entry">
                  @foreach($cartItems as $cartItem)
                  <div class="entry">
                    <div class="entry-thumb"><a href="shop-single.html"><img src="{{ Storage::url($cartItem->options->image) }}" alt="Product"></a></div>
                    <div class="entry-content">
                      <h4 class="entry-title"><a href="shop-single.html">{{ $cartItem->name }}</a></h4><span class="entry-meta">{{ $cartItem->qty }} x ${{ $cartItem->price }}</span>
                    </div>
                    <div class="entry-delete"><i class="icon-x"></i></div>
                  </div>
                  @endforeach
                <div class="text-right">
                  <p class="text-gray-dark py-2 mb-0"><span class='text-muted'>Subtotal:</span> &nbsp;$2,548.50</p>
                </div>
                <div class="d-flex">
                  <div class="pr-2 w-50"><a class="btn btn-secondary btn-sm btn-block mb-0" href="{{ route('cart.index') }}">Expand Cart</a></div>
                  <div class="pl-2 w-50"><a class="btn btn-primary btn-sm btn-block mb-0" href="{{ route('cart.index') }}">Cart</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    @yield('content')
    <!-- Site Footer-->
    <footer class="site-footer" style="background-image: url(img/footer-bg.png);">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <!-- Categories-->
            <section class="widget widget-links widget-light-skin">
              <h3 class="widget-title">Shop Departments</h3>
              <div class="row">
                <div class="col-md-6">
                  <ul>
                    @foreach($categories as $category)
                    <li><a href="{{ route('category.show', $category->slug) }}">{{ $category->title }}</a></li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </section>
          </div>
          <div class="col-lg-3 col-md-6">
            <!-- About Us-->
            <section class="widget widget-links widget-light-skin">
              <h3 class="widget-title">About Us</h3>
              <ul>
                <li><a href="#">Careers</a></li>
                <li><a href="#">About Unishop</a></li>
                <li><a href="#">Our Story</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Our Blog</a></li>
                <li><a href="#">Contacts</a></li>
              </ul>
            </section>
          </div>
          <div class="col-lg-3 col-md-6">
            <!-- Account / Shipping Info-->
            <section class="widget widget-links widget-light-skin">
              <h3 class="widget-title">Account &amp; Shipping Info</h3>
              <ul>
                <li><a href="#">My Account</a></li>
                <li><a href="#">Shipping Rates & Policies</a></li>
                <li><a href="#">Refunds & Replacements</a></li>
                <li><a href="#">Taxes</a></li>
                <li><a href="#">Delivery Info</a></li>
                <li><a href="#">Affiliate Program</a></li>
              </ul>
            </section>
          </div>
        </div>
        <hr class="hr-light mt-2 margin-bottom-2x hidden-md-down">
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <!-- Contact Info-->
            <section class="widget widget-light-skin">
              <h3 class="widget-title">Get In Touch With Us</h3>
              <p class="text-white">Phone: +1 (900) 33 169 7720</p>
              <ul class="list-unstyled text-sm text-white">
                <li><span class="opacity-50">Monday-Friday:&nbsp;</span>9.00 am - 8.00 pm</li>
                <li><span class="opacity-50">Saturday:&nbsp;</span>10.00 am - 6.00 pm</li>
              </ul>
              <p><a class="navi-link-light" href="#">support@unishop.com</a></p><a class="social-button shape-circle sb-facebook sb-light-skin" href="#"><i class="socicon-facebook"></i></a><a class="social-button shape-circle sb-twitter sb-light-skin" href="#"><i class="socicon-twitter"></i></a><a class="social-button shape-circle sb-instagram sb-light-skin" href="#"><i class="socicon-instagram"></i></a><a class="social-button shape-circle sb-google-plus sb-light-skin" href="#"><i class="socicon-googleplus"></i></a>
            </section>
          </div>
          <div class="col-lg-3 col-md-6">
            <!-- Mobile App Buttons-->
            <section class="widget widget-light-skin">
              <h3 class="widget-title">Our Mobile App</h3><a class="market-button apple-button mb-light-skin" href="#"><span class="mb-subtitle">Download on the</span><span class="mb-title">App Store</span></a><a class="market-button google-button mb-light-skin" href="#"><span class="mb-subtitle">Download on the</span><span class="mb-title">Google Play</span></a><a class="market-button windows-button mb-light-skin" href="#"><span class="mb-subtitle">Download on the</span><span class="mb-title">Windows Store</span></a>
            </section>
          </div>
          <div class="col-lg-6">
            <!-- Subscription-->
            <section class="widget widget-light-skin">
              <h3 class="widget-title">Be Informed</h3>
              <form class="row" action="//rokaux.us12.list-manage.com/subscribe/post?u=c7103e2c981361a6639545bd5&amp;amp;id=1194bb7544" method="post" target="_blank" novalidate>
                <div class="col-sm-9">
                  <div class="input-group input-light">
                    <input class="form-control" type="email" name="EMAIL" placeholder="Your e-mail"><span class="input-group-addon"><i class="icon-mail"></i></span>
                  </div>
                  <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                  <div style="position: absolute; left: -5000px;" aria-hidden="true">
                    <input type="text" name="b_c7103e2c981361a6639545bd5_1194bb7544" tabindex="-1">
                  </div>
                  <p class="form-text text-sm text-white opacity-50 pt-2">Subscribe to our Newsletter to receive early discount offers, latest news, sales and promo information.</p>
                </div>
                <div class="col-sm-3">
                  <button class="btn btn-primary btn-block mt-0" type="submit">Subscribe</button>
                </div>
              </form>
              <div class="pt-3"><img class="d-block" style="width: 324px;" alt="Cerdit Cards" src="img/credit-cards-footer.png"></div>
            </section>
          </div>
        </div>
        <!-- Copyright-->
        <p class="footer-copyright">© All rights reserved.</p>
      </div>
    </footer>
    <!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-chevron-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="{{ asset('frontend/js/vendor.min.js') }}"></script>
    <script src="{{ asset('frontend/js/scripts.min.js') }}"></script>
    @yield('script')
  </body>
</html>
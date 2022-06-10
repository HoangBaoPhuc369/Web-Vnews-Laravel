<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
    <meta name="keywords" content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
    <meta name="author" content="elemis">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('/assets/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
</head>

<body>
  <div class="content-wrapper">
    <header class="wrapper bg-soft-primary">
      <nav class="navbar navbar-expand-lg center-nav navbar-light navbar-bg-light">
        <div class="container flex-lg-row flex-nowrap align-items-center">
          <div class="navbar-brand w-100">
            <a href="{{ route('home') }}">
              <img src="./assets/img/logo.png" srcset="./assets/img/logo@2x.png 2x" alt="" />
            </a>
          </div>
          <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
            <div class="offcanvas-header d-lg-none">
              <h3 class="text-white fs-30 mb-0">Vnews</h3>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
              <ul class="navbar-nav">
                <li class="nav-item dropdown dropdown-mega">
                  <a class="nav-link " href="{{ route('home') }}" >Home</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="{{ route('categories.index') }}" >Categories</a>
                  <ul class="dropdown-menu">
                      @foreach($navbar_categories as $category)
                        <li class="nav-item">
                            <a class="dropdown-item" href="{{ route('categories.show', $category) }}" >{{ $category->name }}</a>
                        </li>
                      @endforeach 
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link " href="{{ route('about') }}" >About</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link " href="{{ route('contact.create') }}" >Contact</a>
                </li>
              </ul>
            </div>
            <!-- /.offcanvas-body -->
          </div>
          <!-- /.navbar-collapse -->
          <div class="navbar-other w-100 d-flex ms-auto">
            <ul class="navbar-nav flex-row align-items-center ms-auto">
                @guest
                    <li class="nav-item dropdown language-select text-uppercase">
                        <a class="nav-link" href="{{ route('login') }}" role="button">Sign In</a>
                    </li>
                    <li class="nav-item d-none d-md-block">
                        <a href="{{ route('register') }}" class="btn btn-sm btn-primary rounded-pill">Sign Up</a>
                    </li>
                    <!-- <li class="nav-item d-lg-none">
                        <button class="hamburger offcanvas-nav-btn"><span></span></button>
                    </li> -->
                @endguest

                @auth
                    <li class="nav-item dropdown language-select text-uppercase">
                      <a class="nav-link dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }} </a>
                      <ul class="dropdown-menu">
                        <li class="nav-item">
                          <a class="dropdown-item" onclick="event.preventDefault();
                                document.getElementById('nav-logout-form').submit()" 
                                href="#" href="#">Logout</a>
                        </li>
                        <form id="nav-logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                      </ul>
                    </li>
                @endauth
            </ul>
            <!-- /.navbar-nav -->
          </div>
          <!-- /.navbar-other -->
        </div>
        <!-- /.container -->
      </nav>
      <!-- /.navbar -->
    </header>
    <!-- /header -->
    <section class="wrapper bg-soft-primary">
      <div class="container text-center">
         <div class="row">
         <div class="col-md-8">
              <div class="swiper-container dots-over" data-margin="5" data-autoplay="true" data-dots="true" data-nav="true" >
                  <div class="swiper">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide ">
                        <img src="{{ asset('storage/' . $setting->banner_image_1) }}" alt="" />
                      </div>
                      <!--/.swiper-slide -->
                      <div class="swiper-slide ">
                        <img src="{{ asset('storage/' . $setting->banner_image_2) }}" alt="" />
                      </div>
                      <!--/.swiper-slide -->
                      <div class="swiper-slide">
                        <img src="{{ asset('storage/' . $setting->banner_image_3) }}" class="" alt="" />
                      </div>

                      <div class="swiper-slide">
                        <img src="{{ asset('storage/' . $setting->banner_image_4) }}" class="" alt="" />
                      </div>
                    </div>
                    <!--/.swiper-wrapper -->
                  </div>
                  <!-- /.swiper -->
                </div>
                <!-- /.swiper-container -->
                <!-- /column -->
              </div>

              <div class="col-md-4 pad-left-0">
                <div>
                  <img src="{{ asset('storage/' . $setting->sub_banner1) }}" style="width: 100%;height: 192.5px;margin-bottom: 15px;" alt="" />
                </div>
                <div>
                  <img src="{{ asset('storage/' . $setting->sub_banner2) }}" style="width: 100%;height: 192.5px;" alt="" />
                </div>
              </div>
         </div>
          </div>
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-light wrapper-border">
      <div class="container inner py-8">
        <div class="row gx-lg-8 gx-xl-12 gy-4 gy-lg-0">
          <div class="col-lg-8 align-self-center">
            <div class="blog-filter filter">
              <p>Blog Filter:</p>
              <ul>
                <li><a class="active" href="#">Paper</a></li>
                <li><a href="#">Fabric</a></li>
                <li><a href="#">Fashion</a></li>
                <li><a href="#">Party</a></li>
                <li><a href="#">Printables</a></li>
              </ul>
            </div>
            <!--/.filter -->
          </div>
          <!--/column -->
          <aside class="col-lg-4 sidebar">
            <form class="search-form" action="{{ route('search') }}" method="GET">
              @csrf
              <div class="form-floating mb-0">
                <input id="search-form" name="keywords" type="text" class="form-control" placeholder="Search">
                <label for="search-form">Search</label>
                <button class="search-btn-icon" name="" type="submit"></button>
              </div>
            </form>
            <!-- /.search-form -->
          </aside>
          <!-- /column .sidebar -->
        </div>
        <!--/.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-light">
      <div class="container py-14 py-md-16">
        <div class="row gx-lg-8 gx-xl-12">

        @yield('content')

        <aside class="col-lg-4 sidebar mt-8 mt-lg-6">
            <div class="widget">
              <h4 class="widget-title mb-3">Follow Us On Social</h4>
              <nav class="nav social">
                <a href="#"><i class="uil uil-twitter"></i></a>
                <a href="#"><i class="uil uil-facebook-f"></i></a>
                <a href="#"><i class="uil uil-dribbble"></i></a>
                <a href="#"><i class="uil uil-instagram"></i></a>
                <a href="#"><i class="uil uil-youtube"></i></a>
              </nav>
              <!-- /.social -->
            </div>
            <!-- /.widget -->
            <x-blog.side-recent-posts :recentPosts="$recent_posts"/>
           
            <!-- /.widget -->
            <x-blog.side-categories :categories="$categories"/>
            <!-- /.widget -->
            <x-blog.side-tags :tags="$tags"/>
           
          </aside>
          <!-- /column .sidebar -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="bg-dark text-inverse">
    <div class="container py-13 py-md-15">
      <div class="row gy-6 gy-lg-0">
        <div class="col-md-4 col-lg-3">
          <div class="widget">
            <img class="mb-4" src="./assets/img/logo-light.png" srcset="./assets/img/logo-light@2x.png 2x" alt="" />
            <p class="mb-4">© 2021 Sandbox. <br class="d-none d-lg-block" />All rights reserved.</p>
            <nav class="nav social social-white">
              <a href="#"><i class="uil uil-twitter"></i></a>
              <a href="#"><i class="uil uil-facebook-f"></i></a>
              <a href="#"><i class="uil uil-dribbble"></i></a>
              <a href="#"><i class="uil uil-instagram"></i></a>
              <a href="#"><i class="uil uil-youtube"></i></a>
            </nav>
            <!-- /.social -->
          </div>
          <!-- /.widget -->
        </div>
        <!-- /column -->
        <div class="col-md-4 col-lg-3">
          <div class="widget">
            <h4 class="widget-title text-white mb-3">Get in Touch</h4>
            <address class="pe-xl-15 pe-xxl-17">Moonshine St. 14/05 Light City, London, United Kingdom</address>
            <a href="mailto:#">info@email.com</a><br /> 00 (123) 456 78 90
          </div>
          <!-- /.widget -->
        </div>
        <!-- /column -->
        <div class="col-md-4 col-lg-3">
          <div class="widget">
            <h4 class="widget-title text-white mb-3">Learn More</h4>
            <ul class="list-unstyled  mb-0">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Our Story</a></li>
              <li><a href="#">Projects</a></li>
              <li><a href="#">Terms of Use</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>
          </div>
          <!-- /.widget -->
        </div>
        <!-- /column -->
        <div class="col-md-12 col-lg-3">
          <div class="widget">
            <h4 class="widget-title text-white mb-3">Our Newsletter</h4>
            <p class="mb-5">Subscribe to our newsletter to get our news & deals delivered to you.</p>
            <div class="newsletter-wrapper">
              <!-- Begin Mailchimp Signup Form -->
              <div id="mc_embed_signup2">
                <form action="https://elemisfreebies.us20.list-manage.com/subscribe/post?u=aa4947f70a475ce162057838d&amp;id=b49ef47a9a" method="post" id="mc-embedded-subscribe-form2" name="mc-embedded-subscribe-form" class="validate dark-fields" target="_blank" novalidate>
                  <div id="mc_embed_signup_scroll2">
                    <div class="mc-field-group input-group form-floating">
                      <input type="email" value="" name="EMAIL" class="required email form-control" placeholder="Email Address" id="mce-EMAIL2">
                      <label for="mce-EMAIL2">Email Address</label>
                      <input type="submit" value="Join" name="subscribe" id="mc-embedded-subscribe2" class="btn btn-primary ">
                    </div>
                    <div id="mce-responses2" class="clear">
                      <div class="response" id="mce-error-response2" style="display:none"></div>
                      <div class="response" id="mce-success-response2" style="display:none"></div>
                    </div> <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_ddc180777a163e0f9f66ee014_4b1bcfa0bc" tabindex="-1" value=""></div>
                    <div class="clear"></div>
                  </div>
                </form>
              </div>
              <!--End mc_embed_signup-->
            </div>
            <!-- /.newsletter-wrapper -->
          </div>
          <!-- /.widget -->
        </div>
        <!-- /column -->
      </div>
      <!--/.row -->
    </div>
    <!-- /.container -->
  </footer>
  <div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
  </div>
  <script src="./assets/js/plugins.js"></script>
  <script src="./assets/js/theme.js"></script>
  @yield('custom_js')
</body>
</html>

<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en" class="no-js">

<head>
    <!-- Basic need -->
    <title>Kino Wave</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <link rel="profile" href="#">

    <!--Google Font-->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600'/>
    <!-- Mobile specific meta -->
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone-no">

    <!-- CSS files -->
    <link rel="stylesheet" href="/css/plugins.css">
    <link rel="stylesheet" href="/css/style.css">

    <!-- custom css -->
    <link rel="stylesheet" href="/css/custom-css.css">

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/807f2d6ec6.js" crossorigin="anonymous"></script>

    <!-- fancybox -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
    />
</head>
<body>
<!--preloading-->
<div id="preloader">
    <img class="logo" src="/images/logo1.png" alt="" width="119" height="58">
    <div id="status">
        <span></span>
        <span></span>
    </div>
</div>
<!--end of preloading-->
<!--login form popup-->
<div class="login-wrapper" id="login-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>Login</h3>
        @include('partials.login_form')
    </div>
</div>
<!--end of login form popup-->
<!--signup form popup-->
<div class="login-wrapper" id="signup-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>sign up</h3>
        <form method="POST" action="/register">
            @csrf

            <div class="row">
                <label for="username-2">
                    Username:
                    <input type="text" name="username" id="username-2" placeholder="Hugh Jackman"
                           pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" required="required"/>
                </label>
            </div>

            <div class="row">
                <label for="email-2">
                    your email:
                    <input type="email" name="email" id="email-2" placeholder=""
                           required="required"/>
                </label>
            </div>
            <div class="row">
                <label for="password-2">
                    Password:
                    <input type="password" name="password" id="password-2" placeholder=""
                           required="required"/>
                </label>
            </div>
            <div class="row">
                <button type="submit">sign up</button>
            </div>

            <div style="margin-right: 5px;">
                <a href="/login/github" class="login-social"><i class="fa-brands fa-github"></i></a>
            </div>
        </form>
    </div>
</div>
<!--end of signup form popup-->

<!-- BEGIN | Header -->
<header class="ht-header">
    <div class="container">
        <nav class="navbar navbar-default navbar-custom">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header logo">
                <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <div id="nav-icon1">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <a href="/"><img class="logo" src="/images/logo1.png" alt="" width="119" height="58"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav flex-child-menu menu-left">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li><a href="/">Home</a></li>
                    <li><a href="/movies">Movies</a></li>
                    <li><a href="/shows">Shows</a></li>
                    <li><a href="/playlists">Lists</a></li>
                </ul>
                <ul class="nav navbar-nav flex-child-menu menu-right">
                    @auth
                        <li class="dropdown first">
                            <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                                profile <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu level1">
                                <li><a href="/profile">Profile</a></li>
                                <li><a href="/profile/watchlists">Watchlist</a></li>
                                <li><a href="/profile/reviews">Reviews</a></li>
                                @can('admin')
                                    <li><a href="/admin/users">Admin Dashboard</a></li>
                                @endcan
                            </ul>
                        </li>
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="logoutBtn">Log Out</button>
                            </form>
                        </li>
                    @else
                        <li class="loginLink"><a href="#">LOG In</a></li>
                        <li class="btn signupLink"><a href="#">sign up</a></li>
                    @endauth
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </div>
</header>
<!-- END | Header -->

{{ $slot }}

<!-- footer section-->
<footer class="ht-footer">
    <div class="container">
        <div class="flex-parent-ft">
            <div class="flex-child-ft item1">
                <a href="index-2.html"><img class="logo" src="/images/logo1.png" alt=""></a>
                <p>5th Avenue st, manhattan<br>
                    New York, NY 10001</p>
                <p>Call us: <a href="#">(+01) 202 342 6789</a></p>
            </div>
{{--            <div class="flex-child-ft item2">--}}
{{--                <h4>Resources</h4>--}}
{{--                <ul>--}}
{{--                    <li><a href="#">About</a></li>--}}
{{--                    <li><a href="#">Blockbuster</a></li>--}}
{{--                    <li><a href="#">Contact Us</a></li>--}}
{{--                    <li><a href="#">Forums</a></li>--}}
{{--                    <li><a href="#">Blog</a></li>--}}
{{--                    <li><a href="#">Help Center</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--            <div class="flex-child-ft item3">--}}
{{--                <h4>Legal</h4>--}}
{{--                <ul>--}}
{{--                    <li><a href="#">Terms of Use</a></li>--}}
{{--                    <li><a href="#">Privacy Policy</a></li>--}}
{{--                    <li><a href="#">Security</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--            <div class="flex-child-ft item4">--}}
{{--                <h4>Account</h4>--}}
{{--                <ul>--}}
{{--                    <li><a href="#">My Account</a></li>--}}
{{--                    <li><a href="#">Watchlist</a></li>--}}
{{--                    <li><a href="#">Collections</a></li>--}}
{{--                    <li><a href="#">User Guide</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--            <div class="flex-child-ft item5">--}}
{{--                <h4>Newsletter</h4>--}}
{{--                <p>Subscribe to our newsletter system now <br> to get latest news from us.</p>--}}
{{--                <form action="#">--}}
{{--                    <input type="text" placeholder="Enter your email...">--}}
{{--                </form>--}}
{{--                <a href="#" class="btn">Subscribe now <i class="fa-solid fa-arrow-right"></i></a>--}}
{{--            </div>--}}
        </div>
    </div>
    <div class="ft-copyright">
        <div class="ft-left">
            <p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
        </div>
        <div class="backtotop">
            <p><a href="#" id="back-to-top">Back to top <i class="fa-solid fa-up-long fa-sm"></i></a></p>
        </div>
    </div>
</footer>
<!-- end of footer section-->

<script src="/js/jquery.js"></script>
<script src="/js/plugins.js"></script>
<script src="/js/plugins2.js"></script>
<script src="/js/custom.js"></script>

<!-- custom js -->
<script src="/js/myjs.js"></script>

<!-- fancybox -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    Fancybox.bind('[data-fancybox]', {
        // Custom options
    });
</script>
</body>
</html>

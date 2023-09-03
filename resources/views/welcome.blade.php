<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
   <link rel="stylesheet" href="{{asset('public/assets/site/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/site/css/FontAwosome5.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/site/css/uikit.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/light.css">
        <link rel="stylesheet" href="{{asset('public/assets/site/scss/haeder.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/site/scss/footer.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/site/scss/home.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/site/scss/effect.css')}}">

    @yield('styles')

</head>

<body>
<header class="header">
    <div class="container-fluid">
        <nav class="nav_main">
            <div class="left_main_nav">
                <div class="logo">
                    <img src="imges/logo.png" alt="">
                </div>
            </div>
            <div class="right_main_nav">
                <a href="{{route('login')}}">login</a>
                <a href="{{route('register')}}">signup</a>

            </div>
            <a class="sidebar" href="#offcanvas-overlay" uk-toggle>
                <i class="fal fa-bars"></i>
            </a>
        </nav>
    </div>
    <!-- off canvas Side Menu -->
    <div id="offcanvas-overlay" uk-offcanvas="overlay: true">
        <div class="uk-offcanvas-bar">
            <button class="uk-offcanvas-close" type="button" uk-close></button>
            <p class="mb-2 mt-3"><a href="index.html">
                    <img src="imges/logo.png" alt="">

                </a></p>
            <div class="links_side_bar">

                <ul class="links_rep">

                    <li class="links_rep_child">
                        <a href="{{route('login')}}">Login</a>
                    </li>
                    <li class="links_rep_child">
                        <a href="{{route('register')}}">SignUp</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
    <!-- End Off canvas Side Menu  -->
</header>
<div class="home_main_slider mt-4">
    <div class="container mt-4" >
        <h3 style="    margin-top: 50px;">Users</h3>
        <table class="table" style="    margin-top: 150px;">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">currency</th>
                <th scope="col">balance</th>
                <th scope="col">Handle</th>
            </tr>
            </thead>
            <tbody>
            @if($users && count($users) > 0)
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{isset($user->account->currency_data) ? $user->account->currency_data->name : ''}}</td>
                        <td>{{isset($user->account) ? (float)$user->account->balance : 0}}</td>
                        <td>
                            <a href="{{route('user.transactions',$user->id)}}" class="btn btn-primary">transactions</a>
                        </td>
                    </tr>
                @endforeach
            @endif


            </tbody>
        </table>
    </div>
</div>
<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">

            <!-- Footer Column -->
            <div class="col-lg-6 footer_column">
                <div class="footer_col">
                    <div class="footer_content footer_about">
                        <div class="logo_container footer_logo">
                            <div class="logo"><a href="#"><img src="imges/logo.png" alt=""></a></div>
                        </div>
                        <p class="footer_about_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Vivamus quis vu lputate eros, iaculis consequat nisl. Nunc et suscipit urna. Integer
                            eleme ntum orci eu vehicula pretium.</p>
                        <ul class="footer_social_list">
                            <li class="footer_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="footer_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li class="footer_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li class="footer_social_item"><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                            <li class="footer_social_item"><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Footer Column -->
            <div class="col-lg-6 footer_column">
                <div class="footer_col">
                    <div class="footer_title">Useful Links</div>
                    <div class="footer_content footer_tags">
                        <ul class="tags_list clearfix">
                            <li class="tag_item"><a href="index.html">login</a></li>
                            <li class="tag_item"><a href="explor.html">register</a></li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="copyright">
        <p>Copyright ©2022 All rights reserved </p>
    </div>
</footer>

<!-- script Files -->
<script src="{{asset('public/assets/site/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('public/assets/site/js/poperV5.js')}}"></script>
<script src="{{asset('public/assets/site/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/assets/site/js/uikit.min.js')}}"></script>
</body>


</html>



<!-- /.booking-form__input -->

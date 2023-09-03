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
                <a href="#">login</a>
                <a href="#">signup</a>

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
                        <a href="#">Login</a>
                    </li>
                    <li class="links_rep_child">
                        <a href="#">SignUp</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
    <!-- End Off canvas Side Menu  -->
</header>
<div class="home_main_slider mt-4">
    <div class="container mt-4" >
        <h3 style="    margin-top: 50px;">Transaction : {{isset($account->user) ? $account->user->name : ''}}</h3>
        <table class="table" style="    margin-top: 150px;">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">type</th>
                <th scope="col">amount</th>
                <th scope="col">created at</th>
                <th scope="col">updated at</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($account->transactions) && count($account->transactions) > 0)
                @foreach($account->transactions as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>
                            <select name="type" class="form-control" id="type">
                                <option value="1" item_id="{{$item->id}}" {{$item->type_id == 1 ? 'selected' : ''}}>debit</option>
                                <option value="2" item_id="{{$item->id}}" {{$item->type_id == 2 ? 'selected' : ''}}>credit</option>
                            </select>
                        </td>
                        <td><input type="number" id="balance" step="any" item_id="{{$item->id}}" value="{{(float)$item->amount}}" class="form-control"></td>
                        <td>{{date('d/m/Y H:i',strtotime($item->created_at))}}</td>
                        <td>{{date('d/m/Y H:i',strtotime($item->updated_at))}}</td>
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

<script>
    $(document).on('change', '#type', function () {
        var item_val = $(this).find('option:selected').val();
        var item_id = $(this).find('option:selected').attr('item_id');
        $.ajax({
            type: 'post',
            url: "{{route('update_type')}}",
            data: {
                '_token': "{{csrf_token()}}",
                'id': item_id,
                'type_id': item_val
            },
            success: function (data) {
                if (data.status == true) {
                    alert('updated succeess');
                }
            }
        })
    })

    $(document).on('keyup', '#balance', function () {
        var item_val = $(this).val();
        var item_id = $(this).attr('item_id');
        $.ajax({
            type: 'post',
            url: "{{route('update_balance')}}",
            data: {
                '_token': "{{csrf_token()}}",
                'id': item_id,
                'amount': item_val
            },
            success: function (data) {
                if (data.status == true) {
                    alert('updated succeess');
                }
            }
        })
    })
</script>
</html>



<!-- /.booking-form__input -->

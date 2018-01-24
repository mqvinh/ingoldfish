<!DOCTYPE html>
<html lang="en">
<head>
@if(!empty($seo))
  <title>{{ $seo['title'] }}</title>
  <meta name="description" content="{{ $seo['description'] }}" />
  <meta name="keywords" content="{{ $seo['keywords'] }}" />
@endif
<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

 	<link rel="stylesheet" href="{{ url('public/public/assets/bootstrap/css/bootstrap.css') }}" />
  <link rel="stylesheet" href="{{ url('public/public/assets/style.css') }}"/>
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="{{ url('public/public/assets/bootstrap/js/bootstrap.js') }}"></script>
  <script src="{{ url('public/public/assets/script.js') }}"></script>



<!-- Owl stylesheet -->
<link rel="stylesheet" href="{{ url('public/public/assets/owl-carousel/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ url('public/public/assets/owl-carousel/owl.theme.css') }}">
<script src="{{ url('public/public/assets/owl-carousel/owl.carousel.js') }}"></script>
<!-- Owl stylesheet -->


<!-- slitslider -->
    <link rel="stylesheet" type="text/css" href="{{ url('public/public/assets/slitslider/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('public/public/assets/slitslider/css/custom.css') }}" />
    <script type="text/javascript" src="{{ url('public/public/assets/slitslider/js/modernizr.custom.79639.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/public/assets/slitslider/js/jquery.ba-cond.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/public/assets/slitslider/js/jquery.slitslider.js') }}"></script>
<!-- slitslider -->

</head>

<body>


<!-- Header Starts -->
<div class="navbar-wrapper">

        <div class="navbar-inverse" role="navigation">
          <div class="container">
            <div class="navbar-header">


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right">
                <li class="@if($active=='index') active @endif"><a href="{{ route('public.getIndex') }}">Trang chủ</a></li>
                <li class="@if($active=='product') active @endif"><a href="{{ route('public.product.getIndex') }}">Sản phẩm</a></li>
                <li class="@if($active=='post') active @endif"><a href="{{ route('public.post.getIndex') }}">Góc chia sẽ</a></li>        
                <li><a href="{{ route('public.post.getIndex') }}">Liên hệ</a></li> 
                <li><a href="blog.php">Blog</a></li>
              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

    </div>
<!-- #Header Starts -->





<div class="container">

<!-- Header Starts -->
{{-- <div class="header">
<a href="index.php"><img src="images/logo.png" alt="Realestate"></a>

              <ul class="pull-right">
                <li><a href="buysalerent.php">Buy</a></li>
                <li><a href="buysalerent.php">Sale</a></li>         
                <li><a href="buysalerent.php">Rent</a></li>
              </ul>
</div> --}}
<!-- #Header Starts -->
</div>
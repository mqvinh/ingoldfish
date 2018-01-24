@extends('public.master')
@section('content')
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="{{ route('public.getIndex') }}">Trang chủ</a> / <a href="{{ route('public.product.getIndex') }}">Sản phẩm</a> / <a href="{{ route('public.product.getPro', $Cate['slug']) }}">{{ $Cate['name'] }}</a> / {{ $Pro['name'] }}</span>
    <h2>{{ $Cate['name'] }}</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 hidden-xs">

<div class="hot-properties hidden-xs">
<h4>Sản phẩm liên quan</h4>
@foreach($lProLq as $ProLq)
<div class="row">
  <div class="col-lg-4 col-sm-5"><img src="{{ asset('/resources/upload/'.$ProLq['picture']) }}" class="img-responsive img-circle" alt="properties"/></div>
  <div class="col-lg-8 col-sm-7">
    <h5><a href="{{ route('public.product.getDetail', [$Cate['slug'], $ProLq['slug']]) }}">{{ $ProLq['name'] }}</a></h5>
    <p class="price">Giá: {{ number_format($ProLq['price']) }} VNĐ</p> </div>
</div>
@endforeach
</div>

</div>

<div class="col-lg-9 col-sm-8 ">

<h2>{{ $Pro['name'] }}</h2>
<div class="row">
  <div class="col-lg-8">
  <div class="property-images">
    <!-- Slider Starts -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators hidden-xs">
    <?php $ii=0; ?>
    @foreach($lImg as $Img)
    <li data-target="#myCarousel" data-slide-to="{{ $ii }}" class="@if($ii==0) active @endif"></li>
    <?php $ii=$ii+1; ?>
    @endforeach
  </ol>
  <div class="carousel-inner">
    <?php $i=0; ?>
    @foreach($lImg as $Img)
    <!-- Item 1 -->
    <div class="item @if($i==0) active @endif">
      <img style="width: 580px;height: 400px" src="{{ asset('/resources/upload/imgpro/'.$Img['picture']) }}" class="properties" alt="properties" />
    </div>
    <!-- #Item 1 -->
    <?php $i=$i+1; ?>
    @endforeach
  </div>
  <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>
<!-- #Slider Ends -->

  </div>
  



  <div style="max-width: 580px" class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Chi tiết sản phẩm</h4>
  {!! $Pro['detail'] !!}

  </div>

  </div>
  <div class="col-lg-4">
  <div class="col-lg-12  col-sm-6">
<div class="property-info">
<p class="price">Giá: {{ number_format($Pro['price'], 0, ',', '.') }} VNĐ</p>
  <p class="area"><span class="glyphicon glyphicon-paperclip"></span>Ngày đăng: {!! $Pro['date_create'] !!}</p>
  
  <div class="profile">
  <span class="glyphicon glyphicon-info-sign"></span> Mô tả: 
  {!! $Pro['preview'] !!}
  </div>
</div>

    <h6><span class="glyphicon glyphicon-tags"></span> Tag: <a href="#">{!! $Pro['tag'] !!}</a></h6>
    <div class="listing-detail">
    </div>

</div>
<div class="col-lg-12 col-sm-6 ">
<div class="enquiry">
  <h6><span class="glyphicon glyphicon-envelope"></span>Gửi Ý kiến cho sản phẩm này</h6>
  <form role="form">
                <input type="text" class="form-control" placeholder="Họ tên"/>
                <input type="text" class="form-control" placeholder="Email"/>
                <input type="text" class="form-control" placeholder="Số điện thoại"/>
                <textarea rows="6" class="form-control" placeholder="Nội dung"></textarea>
      <button type="submit" class="btn btn-primary" name="Submit">Gửi</button>
      </form>
 </div>         
</div>
  </div>
</div>
</div>
</div>
</div>
</div>

@endsection
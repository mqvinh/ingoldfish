@extends('public.master')
@section('content')
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="{{ route('public.getIndex') }}">Trang chủ</a> / Sản phẩm</span>
    <h2>Danh mục sản phẩm</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer blog">
<div class="row">
  <div class="col-lg-8 col-sm-12 ">
@foreach($lCate as $Cate)
  <!-- blog list -->
  <div class="row">
    <div class="col-lg-4 col-sm-4 "><a href="{{ route('public.product.getPro', $Cate['slug']) }}" class="thumbnail"><img style="width: 300px; height: 150px" src="{{ asset('/resources/upload/'.$Cate['picture']) }}" alt="blog title"></a></div>
    <div class="col-lg-8 col-sm-8 ">
    <h3><a href="{{ route('public.product.getPro', $Cate['slug']) }}">{{ $Cate['name'] }}</a></h3>
    <div class="info">Ngày tạo: {{ $Cate['date_create'] }}</div>                                               
    {{ $Cate['preview'] }}
    <a href="{{ route('public.product.getPro', $Cate['slug']) }}" class="more">Xem tất cả</a>
    </div>
  </div>
  <!-- blog list -->
@endforeach
  </div>
  <div class="col-lg-4 visible-lg">

  <!-- tabs -->
  <div class="tabbable">
              <ul class="nav nav-tabs">
                <li class=""><a href="#tab1" data-toggle="tab">Recent Post</a></li>
                <li class=""><a href="#tab2" data-toggle="tab">Most Popular</a></li>
                <li class="active"><a href="#tab3" data-toggle="tab">Most Commented</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane" id="tab1">
                  <ul class="list-unstyled">
                  <li>
                  <h5><a href="blogdetail.php">Real estate marketing growing</a></h5>
                            <div class="info">Posted on: Jan 20, 2013</div>  
                            </li>
                             <li>
                  <h5><a href="blogdetail.php">Real estate marketing growing</a></h5>
                            <div class="info">Posted on: Jan 20, 2013</div>  
                            </li>
                             <li>
                  <h5><a href="blogdetail.php">Real estate marketing growing</a></h5>
                            <div class="info">Posted on: Jan 20, 2013</div>  
                            </li>
                            </ul>
                </div>
                <div class="tab-pane" id="tab2">
                <ul  class="list-unstyled">
                  <li>
                  <h5><a href="blogdetail.php">Market update on new apartments</a></h5>
                            <div class="info">Posted on: Jan 20, 2013</div>  
                            </li>

                  <li>
                  <h5><a href="blogdetail.php">Market update on new apartments</a></h5>
                            <div class="info">Posted on: Jan 20, 2013</div>  
                            </li>

                  <li>
                  <h5><a href="blogdetail.php">Market update on new apartments</a></h5>
                            <div class="info">Posted on: Jan 20, 2013</div>  
                            </li>
                            </ul>
                </div>
                <div class="tab-pane active" id="tab3">
                <ul class="list-unstyled">      
                            <li>
                  <h5><a href="blogdetail.php">Creative business to takeover the market</a></h5>
                            <div class="info">Posted on: Jan 20, 2013</div>  
                            </li>
                            
                            <li>
                  <h5><a href="blogdetail.php">Creative business to takeover the market</a></h5>
                            <div class="info">Posted on: Jan 20, 2013</div>  
                            </li>
                            </ul>
                </div>
              </div>
              
              
              
            </div>
  <!-- tabs -->

  </div>
</div>
</div>
</div>

@endsection
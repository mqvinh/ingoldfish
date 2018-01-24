@extends('public.master')
@section('content')
<div class="">
    
            <div id="slider" class="sl-slider-wrapper">

        <div class="sl-slider">
          @foreach($lSlide as $Slide)
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="4">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-1">
                <img style="width: 100%; height: 100%" src="{{ asset('/resources/upload/'.$Slide['picture']) }}">
              </div>
              <h2><a href="#">{{ $Slide['name'] }}</a></h2>
              <blockquote>              
              {{ $Slide['preview'] }}
              </blockquote>
            </div>
          </div>
          @endforeach
        </div><!-- /sl-slider -->



        <nav id="nav-dots" class="nav-dots">
          <?php $i=0 ?>
          @foreach($lSlide as $Slide)
          @if($i==0)
          <span class="nav-dot-current"></span>
          @else
          <span></span>
          @endif
          <?php $i=$i+1 ?>
          @endforeach
        </nav>

      </div><!-- /slider-wrapper -->
</div>



<div class="banner-search">
  <div class="container"> 
    <!-- banner -->
    <h3>Tìm kiếm sản phẩm</h3>
    <form action="">
    <div class="searchbar">
      <div class="row">
        <div class="col-lg-6 col-sm-6">
          <input name="keyseach" type="text" class="form-control" placeholder="Nhập từ khóa">
          <div class="row">
            <div class="col-lg-9 col-sm-3 ">
              <select name="id_cate" class="form-control">
                <option value="0">Chọn Danh mục</option>
                @foreach($lCate as $Cate)
                <option value="{{ $Cate['id'] }}">{{ $Cate['name'] }}</option>
                @endforeach
              </select>
            </div>
              <div class="col-lg-3 col-sm-4">
              <button class="btn btn-success" type="submit">Tìm</button>
              </div>
          </div>
        </div>
        <div class="col-lg-3">
          <h4 style="color: #00FF00"><i class="glyphicon glyphicon-arrow-right"></i> Sản phẩm chất lượng</h4>    
          <h4 style="color: #00FF00"><i class="glyphicon glyphicon-arrow-right"></i> Phục vụ chu đáo</h4>
        </div>
        <div class="col-lg-3">    
          <h4 style="color: #00FF00"><i class="glyphicon glyphicon-arrow-right"></i> Giá cả phải chăng</h4>  
          <h4 style="color: #00FF00; font-weight: bold; "><i class="glyphicon glyphicon-ok"></i> Hãy như InGoldfish</h4>      
        </div>
      </div>
    </div>
    </form>
  </div>
</div>
<!-- banner -->
<div class="container">
  <div class="properties-listing spacer"> <a href="{{ route('public.product.getIndex') }}" class="pull-right viewall">Xem tất cả</a>
    <h2>Sản phẩm tại InGoldfish</h2>
    <div id="owl-example" class="owl-carousel">
      @foreach($lPro as $Pro)
      <?php $slugCate=""; ?>
      @foreach($lCate as $Cate)
        @if($Cate['id']==$Pro['id_cate'])
        <?php $slugCate=$Cate['slug']; ?>
        @endif
      @endforeach
      <div class="properties">
        <div class="image-holder"><img style="height: 150px; width: 200px" src="{{ asset('/resources/upload/'.$Pro['picture']) }}" class="img-responsive" alt="properties"/>
        </div>
        <h4><a href="{{ route('public.product.getDetail', [$slugCate, $Pro['slug']]) }}">{{ $Pro['name'] }}</a></h4>
        <p class="price">Giá: {{ number_format($Pro['price']) }} VNĐ</p>
        <a class="btn btn-primary" href="{{ route('public.product.getDetail', [$slugCate, $Pro['slug']]) }}">Xem chi tiết</a>
      </div>
      @endforeach
    </div>
  </div>
  <div class="spacer">
    <div class="row">
      <div class="col-lg-6 col-sm-9 recent-view">
        <h3>Giới thiệu</h3>
        <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<br><a href="about.php">Chi tiết</a></p>
      
      </div>
      <div class="col-lg-5 col-lg-offset-1 col-sm-3 recommended">
        <h3>Góc chia sẽ</h3>
        <div id="myCarousel" class="carousel slide">
          <ol class="carousel-indicators">
            <?php $ii=0 ?>
            @foreach($lPost as $Post)
            <li data-target="#myCarousel" data-slide-to="{{ $ii }}" class="@if($ii==0) active @endif"></li>
            <?php $ii=$ii+1 ?>
            @endforeach
          </ol>
          <!-- Carousel items -->
          <div class="carousel-inner">
            <?php $i=0 ?>
            @foreach($lPost as $Post)
            <div class="item @if($i==0) active @endif">
              <div class="row">
                <div class="col-lg-4"><img style="width: 350px; height: 120px" src="{{ asset('/resources/upload/'.$Post['picture']) }}" class="img-responsive" alt="properties"/></div>
                <div class="col-lg-8">
                  <h5><a href="property-detail.php">{{ $Post['name'] }}</a></h5>
                  <p class="price">$300,000</p>
                  <a href="property-detail.php" class="more">Xem thêm</a> </div>
              </div>
            </div>
            <?php $i=$i+1 ?>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
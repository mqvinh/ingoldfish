@extends('public.master')
@section('content')
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="{{ route('public.getIndex') }}">Trang chủ</a> / <a href="{{ route('public.product.getIndex') }}">Sản phẩm</a> / {{ $Cate['name'] }}</span>
    <h2><a href="{{ route('public.product.getPro', $Cate['slug']) }}">{{ $Cate['name'] }}</a></h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 ">
<form action="">
<div class="search-form"><h4><span class="glyphicon glyphicon-search"></span>Tìm kiếm</h4>
  <input name="keyseach" type="text" class="form-control" placeholder="Nhập từ khóa">
  <div class="row">
    <div class="col-lg-12">
      <select name="id_cate" class="form-control">
        <option value="0">Tất cả</option>
        @foreach($lCate as $value)
        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
        @endforeach
      </select>
      </div>
  </div>
  <button type="submit" class="btn btn-primary">Tìm</button>
</div>
</form>



<div class="hot-properties hidden-xs">
<h4>Có thể bạn quan tâm</h4>
@foreach($lProLq as $ProLq)
<div class="row">
  <div class="col-lg-4 col-sm-5"><img src="{{ asset('/resources/upload/'.$ProLq['picture']) }}" class="img-responsive img-circle" alt="properties"></div>
  <div class="col-lg-8 col-sm-7">
    <h5><a href="{{ route('public.product.getDetail', [$Cate['slug'], $ProLq['slug']]) }}">{{ $ProLq['name'] }}</a></h5>
    <p class="price">Giá: {{ number_format($ProLq['price']) }} VNĐ</p> </div>
</div>
@endforeach
</div>


</div>

<div class="col-lg-9 col-sm-8">
<div class="sortby clearfix">
<div class="pull-left result">Hiển thị: {{ $count }} của {{ count($lPro) }} </div>
  <div class="pull-right">
  <select class="form-control">
  <option>Sắp xếp</option>
  <option>Giá: Thấp đến cao</option>
  <option>Giá: Cao đến thấp</option>
</select></div>

</div>
<div class="row">
      @foreach($lPro as $Pro)
      <!-- properties -->
      <div class="col-lg-4 col-sm-6">
      <div class="properties">
        <div class="image-holder"><img style="width: 300px; height: 150px" src="{{ asset('/resources/upload/'.$Pro['picture']) }}" class="img-responsive" alt="properties">
        </div>
        <h4><a href="{{ route('public.product.getDetail', [$Cate['slug'], $Pro['slug']]) }}">{{ $Pro['name'] }}</a></h4>
        <p class="price">Giá: {{ number_format($Pro['price'], 0, '.', ',') }} VNĐ</p>
        <a class="btn btn-primary" href="{{ route('public.product.getDetail', [$Cate['slug'], $Pro['slug']]) }}">Xem chi tiết</a>
      </div>
      </div>
      <!-- properties -->
      @endforeach
</div>
<div class="center">
    <ul class="pagination">
    <?php 
    if ($key!="") {
        $key="&".$key;
    }
    if($lPro->currentPage()<=1)
        $urlPrev = "#";
    else
        $urlPrev = $lPro->url($lPro->currentPage()-1).$key;
    ?>
    <li><a href="{!! $urlPrev !!}">Prev</a></li>
    @for($i=1;$i<=$lPro->lastPage(); $i=$i+1)
    <li class="{!! ($lPro->currentPage()==$i)? 'active': '' !!}"><a href="{!! $lPro->url($i).$key !!}">{!! $i !!}</a></li>
    @endfor
    <?php 
    if($lPro->currentPage()>=$lPro->lastPage())
        $urlNext = "#";
    else
        $urlNext = $lPro->url($lPro->currentPage()+1).$key;
    ?>
    <li><a href="{!! $urlNext !!}">Next</a></li>
    </ul>
</div>
</div>
</div>
</div>
</div>


@endsection
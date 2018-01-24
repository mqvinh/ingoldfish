@extends('public.master')
@section('content')
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="{{ route('public.getIndex') }}">Trang chủ</a> / Góc chia sẽ</span>
    <h2>Góc chia sẽ</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer blog">
<div class="row">
  <div class="col-lg-8 col-sm-12 ">
@foreach($lPost as $Post)
  <!-- blog list -->
  <div class="row">
    <div class="col-lg-4 col-sm-4 "><a href="{{ route('public.post.getDetail', [$CatePost['slug'], $Post['slug']]) }}" class="thumbnail"><img style="width: 300px; height: 150px" src="{{ asset('/resources/upload/'.$Post['picture']) }}" alt="blog title"></a></div>
    <div class="col-lg-8 col-sm-8 ">
    <h3><a href="{{ route('public.post.getDetail', [$CatePost['slug'], $Post['slug']]) }}">{{ $Post['name'] }}</a></h3>
    <div class="info">Ngày tạo: {{ $Post['date_create'] }}</div>                                               
    {{ $Post['preview'] }}
    <a href="{{ route('public.post.getDetail', [$CatePost['slug'], $Post['slug']]) }}" class="more">Xem thêm</a>
    </div>
  </div>
  <!-- blog list -->
@endforeach
  <div class="center">
      <ul class="pagination">
      <?php 
      if ($key!="") {
          $key="&".$key;
      }
      if($lPost->currentPage()<=1)
          $urlPrev = "#";
      else
          $urlPrev = $lPost->url($lPost->currentPage()-1).$key;
      ?>
      <li><a href="{!! $urlPrev !!}">Prev</a></li>
      @for($i=1;$i<=$lPost->lastPage(); $i=$i+1)
      <li class="{!! ($lPost->currentPage()==$i)? 'active': '' !!}"><a href="{!! $lPost->url($i).$key !!}">{!! $i !!}</a></li>
      @endfor
      <?php 
      if($lPost->currentPage()>=$lPost->lastPage())
          $urlNext = "#";
      else
          $urlNext = $lPost->url($lPost->currentPage()+1).$key;
      ?>
      <li><a href="{!! $urlNext !!}">Next</a></li>
      </ul>
  </div>
  </div>
  <div class="col-lg-4 visible-lg">

  <!-- tabs -->
 <form action="">
<div class="search-form"><h4><span class="glyphicon glyphicon-search"></span>Tìm kiếm</h4>
  <input name="keyseach" type="text" class="form-control" placeholder="Nhập từ khóa">
  <div class="row">
    <div class="col-lg-12">
      <select name="id_cate" class="form-control">
        <option value="0">Tất cả</option>
        @foreach($lCatePost as $value)
        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
        @endforeach
      </select>
      <button type="submit" class="btn btn-primary">Tìm</button>
      </div>
  </div>
</div>
</form>
  <!-- tabs -->

  </div>
</div>
</div>
</div>

@endsection
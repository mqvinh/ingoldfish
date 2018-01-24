@extends('public.master')
@section('content')
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="{{ route('public.getIndex') }}">Trang chủ</a> 
      / <a href="{{ route('public.post.getIndex') }}">Góc chia sẽ</a> 
      / <a href="{{ route('public.post.getPost', $CatePost['slug']) }}">{{ $CatePost['name'] }}</a> 
      / {{ $Post['name'] }}</span>
    <h2>{{ $Post['name'] }}</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 hidden-xs">

<div class="hot-properties hidden-xs">
<h4><span class="glyphicon glyphicon-heart"></span> Có thể bạn quan tâm</h4>
@foreach($lPostLq as $PostLq)
@if($PostLq['id']!=$Post['id'])
<div class="row">
  <div class="col-lg-4 col-sm-5"><img src="{{ asset('/resources/upload/'.$PostLq['picture']) }}" class="img-responsive img-circle" alt="properties"/></div>
  <div class="col-lg-8 col-sm-7">
    <h5><a href="property-detail.php">{{ $PostLq['name'] }}</a></h5>
    <p>{{ change_str($PostLq['preview'], 20, true) }}</p>
  </div>
</div>
@endif
@endforeach
</div>



<div class="advertisement">
  <h4><span class="glyphicon glyphicon-tags"></span> Tag</h4>
  <a href="#">{!! $Post['tag'] !!}</a>
</div>

</div>

<div class="col-lg-9 col-sm-8 ">

<h2>{{ $Post['name'] }}</h2>
<div class="row">
  <div class="col-lg-12">
  
  <div class="spacer"><h4><span class="glyphicon glyphicon-time"></span> {{ $Post['date_create'] }}</h4>
  {!! $Post['detail'] !!}
  </div>

  </div>
</div>
</div>
</div>
</div>
</div>

@endsection
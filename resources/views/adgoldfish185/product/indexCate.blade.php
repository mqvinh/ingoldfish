@extends('adgoldfish185.master')
@section('content')
<div style="float: left; width: 82%">
    <div class="inner" >
        <div class="row">
        <div class="col-lg-12">
            <h1>Danh mục sản phẩm</h1>
        </div>
    </div>
      <hr />
      <div class="inner" style="min-height: 700px;">
        <div class="row">
        <div class="col-lg-12">
            @if(Session::has('add_ms'))
                <div class="alert alert-success" style="text-align: center;">
                    {!! Session::get('add_ms') !!}
                </div>
            @endif
            @if(Session::has('del_ms'))
                <div class="alert alert-success" style="text-align: center;">
                    {!! Session::get('del_ms') !!}
                </div>
            @endif
            @if(Session::has('edit_ms'))
                <div class="alert alert-success" style="text-align: center;">
                    {!! Session::get('edit_ms') !!}
                </div>
            @endif
            @if(Session::has('addmin_ms'))
                <div class="alert alert-danger" style="text-align: center;">
                    {!! Session::get('addmin_ms') !!}
                </div>
            @endif
            @if(Session::has('error_ms'))
                <div class="alert alert-danger" style="text-align: center;">
                    {!! Session::get('error_ms') !!}
                </div>
            @endif
        </div>
    </div>
     <!--BLOCK SECTION -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Danh mục
                    </div>
                    <div class="panel-body">
                        <p><a href="{{ route('adgoldfish185.product.getAddCate') }}" class="btn btn-info">Thêm danh mục</a> </p>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">#</th>
                                        <th>Tên</th>
                                        <th>Mô tả</th>
                                        <th>Hình ảnh</th>
                                        <th>Ngày tạo</th>
                                        <th>title</th>
                                        <th>Keywords</th>
                                        <th>description</th>
                                        <th>Trạng thái</th>
                                        <th style="width: 12%">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i=1;
                                    ?>
                                    @foreach($lCate as $Cate)
                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td><a href="">{!! $Cate['name'] !!}</a></td>
                                        <td><a href="">{!! $Cate['preview'] !!}</a></td>
                                        <td><img width="100px" height="100px" src="{{ asset('/resources/upload/'.$Cate['picture']) }}"></td>
                                        <td>{{ $Cate['date_create'] }}</td>
                                        <td>{{ $Cate['title'] }}</td>
                                        <td>{{ $Cate['keywords'] }}</td>
                                        <td>{{ $Cate['description'] }}</td>
                                        <td>
                                            <?php 
                                                $clstatus='switch-on';
                                                if($Cate['status']==0){
                                                    $clstatus='switch-off';
                                                }
                                             ?>
                                            <div id="change{!! $Cate['id'] !!}" idCate="{!! $Cate['id'] !!}" class="make-switch has-switch changestatusCate" data-on="warning" data-off="danger">
                                                <div id="change" class="{!! $clstatus !!}">
                                                <input type="checkbox" checked="checked"><span class="switch-left switch-warning">Hiện</span><label>&nbsp;</label><span class="switch-right switch-danger">Ẩn</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="{{ route('adgoldfish185.product.getEditCate', $Cate['id']) }}" class="btn btn-success">Sửa</a>
                                            <a href="{{ route('adgoldfish185.product.getDelCate', $Cate['id']) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa!!!')"  class="btn btn-success">Xóa</a>
                                        </td>
                                    </tr>
                                    <?php
                                        $i=$i+1;
                                    ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</div>
@endsection()

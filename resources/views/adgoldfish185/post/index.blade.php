@extends('adgoldfish185.master')
@section('content')
<div id="" style="float: left; width: 82%">
    <div class="inner">
        <div class="row">
        <div class="col-lg-12">
            <h1>Quản lý bài viết</h1>
        </div>
        </div>
        <hr />
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
                        Bài viết
                    </div>
                    <div class="panel-body">
                        <p><a href={{ route('adgoldfish185.post.getAdd') }} class="btn btn-info">Thêm bài viết</a> </p>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">#</th>
                                        <th>Tên</th>
                                        <th>Hình ảnh</th>
                                        <th>Mô tả</th>
                                        <th>Danh mục</th>
                                        <th>Ngày tạo</th>
                                        <th>Title</th>
                                        <th>Keywords</th>
                                        <th>Description</th>
                                        <th>Trạng thái</th>
                                        <th style="width: 12%">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i=1;
                                    ?>
                                    @foreach($lPost as $Post)
                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td><a href="">{!! $Post['name'] !!}</a></td>
                                        <td><img width="100px" height="100px" src="{{ asset('/resources/upload/'.$Post['picture']) }}"></td>
                                        <td>{!! $Post['preview'] !!}</td>
                                        <td>
                                            @foreach($lCate as $Cate)
                                                @if($Cate['id']==$Post['id_cate'])
                                                    {!! $Cate['name'] !!}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{!! $Post['date_create'] !!}</td>
                                        <td>{{ $Post['title'] }}</td>
                                        <td>{{ $Post['keywords'] }}</td>
                                        <td>{{ $Post['description'] }}</td>
                                        <td>
                                            <?php 
                                                $clstatus='switch-on';
                                                if($Post['status']==0){
                                                    $clstatus='switch-off';
                                                }
                                             ?>
                                            <div id="change{!! $Post['id'] !!}" idPost="{!! $Post['id'] !!}" class="make-switch has-switch changestatusPost" data-on="warning" data-off="danger">
                                                <div id="change" class="{!! $clstatus !!}">
                                                <input type="checkbox" checked="checked"><span class="switch-left switch-warning">Hiện</span><label>&nbsp;</label><span class="switch-right switch-danger">Ẩn</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="{{ route('adgoldfish185.post.getEdit', $Post['id']) }}" class="btn btn-success">Sửa</a>
                                            <a href="{{ route('adgoldfish185.post.getDel', $Post['id']) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa!!!')"  class="btn btn-success">Xóa</a>
                                        </td>
                                    </tr>
                                    <?php
                                        $i=$i+1;
                                    ?>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Pagination -->
                            <div style="text-align: center;">
                                <ul class="pagination">
                                <?php 
                                if($lPost->currentPage()<=1)
                                    $urlPrev = "#";
                                else
                                    $urlPrev = $lPost->url($lPost->currentPage()-1);
                                ?>
                                <li><a href="{!! $urlPrev !!}">Prev</a></li>
                                @for($i=1;$i<=$lPost->lastPage(); $i=$i+1)
                                <li class="{!! ($lPost->currentPage()==$i)? 'active': '' !!}"><a href="{!! $lPost->url($i) !!}">{!! $i !!}</a></li>
                                @endfor
                                <?php 
                                if($lPost->currentPage()>=$lPost->lastPage())
                                    $urlNext = "#";
                                else
                                    $urlNext = $lPost->url($lPost->currentPage()+1);
                                ?>
                                <li><a href="{!! $urlNext !!}">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection()

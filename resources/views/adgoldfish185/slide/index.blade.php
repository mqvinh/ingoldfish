@extends('adgoldfish185.master')
@section('content')
<div id="" style="float: left; width: 82%">
    <div class="inner">
        <div class="row">
        <div class="col-lg-12">
            <h1>Quản lý slide</h1>
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
                        Slide
                    </div>
                    <div class="panel-body">
                        <p><a href={{ route('adgoldfish185.slide.getAdd') }} class="btn btn-info">Thêm slide</a> </p>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">#</th>
                                        <th>Tên</th>
                                        <th>Hình ảnh</th>
                                        <th>Mô tả</th>
                                        <th>Ngày tạo</th>
                                        <th>Trạng thái</th>
                                        <th style="width: 12%">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i=1;
                                    ?>
                                    @foreach($lSlide as $Slide)
                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td><a href="">{!! $Slide['name'] !!}</a></td>
                                        <td><img width="100px" height="100px" src="{{ asset('/resources/upload/'.$Slide['picture']) }}"></td>
                                        <td>{!! $Slide['preview'] !!}</td>
                                        <td>{!! $Slide['date_create'] !!}</td>
                                        <td>
                                            <?php 
                                                $clstatus='switch-on';
                                                if($Slide['status']==0){
                                                    $clstatus='switch-off';
                                                }
                                             ?>
                                            <div id="change{!! $Slide['id'] !!}" idSlide="{!! $Slide['id'] !!}" class="make-switch has-switch changestatusSlide" data-on="warning" data-off="danger">
                                                <div id="change" class="{!! $clstatus !!}">
                                                <input type="checkbox" checked="checked"><span class="switch-left switch-warning">Hiện</span><label>&nbsp;</label><span class="switch-right switch-danger">Ẩn</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="{{ route('adgoldfish185.slide.getEdit', $Slide['id']) }}" class="btn btn-success">Sửa</a>
                                            <a href="{{ route('adgoldfish185.slide.getDel', $Slide['id']) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa!!!')"  class="btn btn-success">Xóa</a>
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
                                if($lSlide->currentPage()<=1)
                                    $urlPrev = "#";
                                else
                                    $urlPrev = $lSlide->url($lSlide->currentPage()-1);
                                ?>
                                <li><a href="{!! $urlPrev !!}">Prev</a></li>
                                @for($i=1;$i<=$lSlide->lastPage(); $i=$i+1)
                                <li class="{!! ($lSlide->currentPage()==$i)? 'active': '' !!}"><a href="{!! $lSlide->url($i) !!}">{!! $i !!}</a></li>
                                @endfor
                                <?php 
                                if($lSlide->currentPage()>=$lSlide->lastPage())
                                    $urlNext = "#";
                                else
                                    $urlNext = $lSlide->url($lSlide->currentPage()+1);
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

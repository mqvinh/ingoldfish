@extends('adgoldfish185.master')
@section('content')
<div id="" style="float: left; width: 82%">
    <div class="inner">
        <div class="row">
        <div class="col-lg-12">
            <h1>Quản lý người dùng</h1>
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
                        Người dùng
                    </div>
                    <div class="panel-body">
                        <p><a href="{{ route('adgoldfish185.user.getAdd') }}" class="btn btn-info">Thêm người dùng</a> </p>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">#</th>
                                        <th>Username</th>
                                        <th>Fullname</th>
                                        <th>Hình ảnh</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Trạng thái</th>
                                        <th style="width: 12%">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i=1;
                                    ?>
                                    @foreach($lUser as $User)
                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td><a href="">{!! $User['username'] !!}</a></td>
                                        <th>{!! $User['fullname'] !!}</th>
                                        <td><img width="100px" height="100px" src="{{ asset('/resources/upload/'.$User['picture']) }}"></td>
                                        <th>{!! $User['email'] !!}</th>
                                        <th>
                                            @foreach($lLevel as $Level)
                                                @if($Level['id']==$User['id_level'])
                                                    {!! $Level['name'] !!}
                                                @endif
                                            @endforeach
                                        </th>
                                        <td>
                                            <?php 
                                                $clstatus='switch-on';
                                                if($User['status']==0){
                                                    $clstatus='switch-off';
                                                }
                                             ?>
                                            <div id="change{!! $User['id'] !!}" idUser="{!! $User['id'] !!}" class="make-switch has-switch changestatusUser" data-on="warning" data-off="danger">
                                                <div id="change" class="{!! $clstatus !!}">
                                                <input type="checkbox" checked="checked"><span class="switch-left switch-warning">Hiện</span><label>&nbsp;</label><span class="switch-right switch-danger">Ẩn</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="{{ route('adgoldfish185.user.getEdit', $User['id']) }}" class="btn btn-success">Sửa</a>
                                            <a href="{{ route('adgoldfish185.user.getDel', $User['id']) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa!!!')"  class="btn btn-success">Xóa</a>
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
                                if($lUser->currentPage()<=1)
                                    $urlPrev = "#";
                                else
                                    $urlPrev = $lUser->url($lUser->currentPage()-1);
                                ?>
                                <li><a href="{!! $urlPrev !!}">Prev</a></li>
                                @for($i=1;$i<=$lUser->lastPage(); $i=$i+1)
                                <li class="{!! ($lUser->currentPage()==$i)? 'active': '' !!}"><a href="{!! $lUser->url($i) !!}">{!! $i !!}</a></li>
                                @endfor
                                <?php 
                                if($lUser->currentPage()>=$lUser->lastPage())
                                    $urlNext = "#";
                                else
                                    $urlNext = $lUser->url($lUser->currentPage()+1);
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

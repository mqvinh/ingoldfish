@extends('adgoldfish185.master')
@section('content')
<div id="" style="float: left; width: 82%">
    <div class="inner">
        <div class="row">
        <div class="col-lg-12">
            <h1>Quản lý liên hệ</h1>
        </div>
        </div>
        <hr />
        <div class="row">
        <div class="col-lg-12">
            @if(Session::has('del_ms'))
                <div class="alert alert-success" style="text-align: center;">
                    {!! Session::get('del_ms') !!}
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
                        Liên hệ
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">#</th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Chủ đề</th>
                                        <th>Trạng thái</th>
                                        <th style="width: 12%">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i=1;
                                    ?>
                                    @foreach($lContact as $Contact)
                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td><a href="">{!! $Contact['name'] !!}</a></td>
                                        <th>{!! $Contact['email'] !!}</th>
                                        <th>{!! $Contact['phone'] !!}</th>
                                        <th>{!! $Contact['subject'] !!}</th>
                                        <td>
                                            @if($Contact['status']==1)
                                                Đã xem
                                            @else
                                                Chưa xem
                                            @endif
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="{{ route('adgoldfish185.contact.getDetail', $Contact['id']) }}" class="btn btn-success">Xem chi tiết</a>
                                            <a href="{{ route('adgoldfish185.user.getDel', $Contact['id']) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa!!!')"  class="btn btn-success">Xóa</a>
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
                                if($lContact->currentPage()<=1)
                                    $urlPrev = "#";
                                else
                                    $urlPrev = $lContact->url($lContact->currentPage()-1);
                                ?>
                                <li><a href="{!! $urlPrev !!}">Prev</a></li>
                                @for($i=1;$i<=$lContact->lastPage(); $i=$i+1)
                                <li class="{!! ($lContact->currentPage()==$i)? 'active': '' !!}"><a href="{!! $lContact->url($i) !!}">{!! $i !!}</a></li>
                                @endfor
                                <?php 
                                if($lContact->currentPage()>=$lContact->lastPage())
                                    $urlNext = "#";
                                else
                                    $urlNext = $lContact->url($lContact->currentPage()+1);
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

@extends('adgoldfish185.master')
@section('content')
<div style="float: left; width: 82%">
    <div class="inner" >
        <div class="row">
        <div class="col-lg-12">
            <h1>Cấp bậc</h1>
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
                        Cấp bậc
                    </div>
                    <div class="panel-body">
                        <p><a href="{{ route('adgoldfish185.level.getAddLevel') }}" class="btn btn-info">Thêm cấp bậc</a> </p>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">#</th>
                                        <th>Tên</th>
                                        <th style="width: 15%">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i=1;
                                    ?>
                                    @foreach($lLevel as $Level)
                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td><a href="">{!! $Level['name'] !!}</a></td>
                                        <td style="text-align: center;">
                                            <a href="{{ route('adgoldfish185.level.getEditLevel', $Level['id']) }}" class="btn btn-success">Sửa</a>
                                            <a href="{{ route('adgoldfish185.level.getDelLevel', $Level['id']) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa!!!')"  class="btn btn-success">Xóa</a>
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

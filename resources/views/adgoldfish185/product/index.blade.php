@extends('adgoldfish185.master')
@section('content')
<div id="" style="float: left; width: 82%">
    <div class="inner">
        <div class="row">
        <div class="col-lg-12">
            <h1>Quản lý sản phẩm</h1>
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
                        Sản phẩm
                    </div>
                    <div class="panel-body">
                        <p><a href={{ route('adgoldfish185.product.getAdd') }} class="btn btn-info">Thêm sản phẩm</a> </p>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">#</th>
                                        <th>Tên</th>
                                        <th>Hình ảnh</th>
                                        <th>Giá</th>
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
                                    @foreach($lProduct as $Product)
                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td><a href="">{!! $Product['name'] !!}</a></td>
                                        <td><img width="100px" height="100px" src="{{ asset('/resources/upload/'.$Product['picture']) }}"></td>
                                        <td>{!! $Product['price'] !!}</td>
                                        <td>{!! $Product['preview'] !!}</td>
                                        <td>
                                            @foreach($lCate as $Cate)
                                                @if($Cate['id']==$Product['id_cate'])
                                                    {!! $Cate['name'] !!}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{!! $Product['date_create'] !!}</td>
                                        <td>{{ $Product['title'] }}</td>
                                        <td>{{ $Product['keywords'] }}</td>
                                        <td>{{ $Product['description'] }}</td>
                                        <td>
                                            <?php 
                                                $clstatus='switch-on';
                                                if($Product['status']==0){
                                                    $clstatus='switch-off';
                                                }
                                             ?>
                                            <div id="change{!! $Product['id'] !!}" idPro="{!! $Product['id'] !!}" class="make-switch has-switch changestatusPro" data-on="warning" data-off="danger">
                                                <div id="change" class="{!! $clstatus !!}">
                                                <input type="checkbox" checked="checked"><span class="switch-left switch-warning">Hiện</span><label>&nbsp;</label><span class="switch-right switch-danger">Ẩn</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="{{ route('adgoldfish185.product.getEdit', $Product['id']) }}" class="btn btn-success">Sửa</a>
                                            <a href="{{ route('adgoldfish185.product.getDel', $Product['id']) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa!!!')"  class="btn btn-success">Xóa</a>
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
                                if($lProduct->currentPage()<=1)
                                    $urlPrev = "#";
                                else
                                    $urlPrev = $lProduct->url($lProduct->currentPage()-1);
                                ?>
                                <li><a href="{!! $urlPrev !!}">Prev</a></li>
                                @for($i=1;$i<=$lProduct->lastPage(); $i=$i+1)
                                <li class="{!! ($lProduct->currentPage()==$i)? 'active': '' !!}"><a href="{!! $lProduct->url($i) !!}">{!! $i !!}</a></li>
                                @endfor
                                <?php 
                                if($lProduct->currentPage()>=$lProduct->lastPage())
                                    $urlNext = "#";
                                else
                                    $urlNext = $lProduct->url($lProduct->currentPage()+1);
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

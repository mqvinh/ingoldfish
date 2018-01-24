@extends('adgoldfish185.master')
@section('content')
<!--PAGE CONTENT -->
<div style="float: left; width: 82%">
     
    <div class="inner" style="min-height: 700px;">
        <div class="row">
        <div class="col-lg-12">
            <h1>Sửa người dùng</h1>
        </div>
    </div>
      <hr />
     <!--BLOCK SECTION -->
        <p><a href="{{ route('adgoldfish185.user.getIndex') }}" class="btn btn-info">Quay lại</a> </p>
         <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <header>
                            <div class="icons"><i class="icon-th-large"></i></div>
                            <h5>Sửa người dùng</h5>
                            <div class="toolbar">
                                <ul class="nav">
                                    <li>
                                        <div class="btn-group">
                                            <a class="accordion-toggle btn btn-xs minimize-box" data-toggle="collapse"
                                                href="#collapseOne">
                                                <i class="icon-chevron-up"></i>
                                            </a>
                                            <button class="btn btn-xs btn-danger close-box">
                                                <i class="icon-remove"></i>
                                            </button>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </header>
                        <div id="collapseOne" class="accordion-body collapse in body">
                            <form action="{{ route('adgoldfish185.user.postEdit', $User['id']) }}" class="form-horizontal" id="block-validate" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Tên đăng nhập</label>
                                    <div class="col-lg-4">
                                        <input type="text" id="username" name="username" class="form-control" value="{!! $User['username'] !!}"/>
                                        <div style="text-align: center; color: red">{!! $errors->first('username') !!}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Tên đầy đủ</label>
                                    <div class="col-lg-4">
                                        <input type="text" id="fullname" name="fullname" class="form-control" value="{!! $User['fullname'] !!}"/>
                                        <div style="text-align: center; color: red">{!! $errors->first('fullname') !!}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Hình ảnh</label>
                                    <div class="col-lg-4" style="text-align: center;">
                                        <img width="100px" src="{{ asset('/resources/upload/'.$User['picture']) }}"><br><br>
                                        <input type="file" id="picture" name="picture" class="form-control" />
                                        <div style="text-align: center; color: red">{!! $errors->first('picture') !!}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Mật khẩu</label>
                                    <div class="col-lg-4">
                                        <input type="password" id="password" name="password" class="form-control" value=""/>
                                        <div style="text-align: center; color: red">{!! $errors->first('password') !!}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Nhập lại mật khẩu</label>
                                    <div class="col-lg-4">
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" value=""/>
                                        <div style="text-align: center; color: red">{!! $errors->first('password_confirmation') !!}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Cấp bậc</label>
                                    <div class="col-lg-4">
                                        <select class="form-control" name="id_level">
                                            <option value="">--Chọn cấp bậc--</option>
                                            <?php cate_parent ($lLevel, $User['id_level']); ?>
                                        </select>
                                        <div style="text-align: center; color: red">{!! $errors->first('id_level') !!}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Email</label>
                                    <div class="col-lg-4">
                                        <input type="text" id="email" name="email" class="form-control" value="{!! $User['email'] !!}"/>
                                        <div style="text-align: center; color: red">{!! $errors->first('email') !!}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Phone</label>
                                    <div class="col-lg-4">
                                        <input type="text" id="phone" name="phone" class="form-control" value="{!! $User['phone'] !!}"/>
                                        <div style="text-align: center; color: red">{!! $errors->first('phone') !!}</div>
                                    </div>
                                </div>
                                <div class="form-actions no-margin-bottom" style="text-align:center;">
                                    <input type="submit" value="Sửa" class="btn btn-primary btn-sm " />
                                    <input type="reset" value="Nhập lại" class="btn btn-primary btn-sm " />
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>

</div>
<!--END PAGE CONTENT -->

 <!-- RIGHT STRIP  SECTION -->

@endsection()
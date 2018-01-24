@extends('adgoldfish185.master')
@section('content')
<!--PAGE CONTENT -->
<div style="float: left; width: 82%">
     
    <div class="inner" style="min-height: 700px;">
        <div class="row">
        <div class="col-lg-12">
            <h1>Chi tiết liên hệ</h1>
        </div>
    </div>
      <hr />
     <!--BLOCK SECTION -->
        <p><a href="{{ route('adgoldfish185.contact.getIndex') }}" class="btn btn-info">Quay lại</a> </p>
         <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <header>
                            <div class="icons"><i class="icon-th-large"></i></div>
                            <h5>Chi tiết liên hệ</h5>
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
                            <form action="{{ route('adgoldfish185.contact.getDel', $Contact['id']) }}" class="form-horizontal" id="block-validate" method="get">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Họ tên</label>
                                    <div class="col-lg-4">
                                        <input type="text" id="name" name="name" class="form-control" value="{!! $Contact['name'] !!}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Email</label>
                                    <div class="col-lg-4">
                                        <input type="text" id="email" name="email" class="form-control" value="{{ $Contact['email'] }}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Số điện thoại</label>
                                    <div class="col-lg-4">
                                        <input type="text" id="phone" name="phone" class="form-control" value="{!! $Contact['phone'] !!}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Chủ đề</label>
                                    <div class="col-lg-4">
                                        <input type="text" id="subject" name="subject" class="form-control" value="{{ $Contact['subject'] }}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Nội dung</label>
                                    <div class="col-lg-4">
                                        <textarea id="content" name="content" class="form-control" value="{!! $Contact['content'] !!}"></textarea>
                                    </div>
                                </div>
                                <div class="form-actions no-margin-bottom" style="text-align:center;">
                                    <input type="submit" value="Xóa" class="btn btn-primary btn-sm " />
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
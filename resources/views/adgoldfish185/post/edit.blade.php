@extends('adgoldfish185.master')
@section('content')
<!--PAGE CONTENT -->
<div style="clear: bold"></div>
<div style="float: left; width: 82%">
     
    <div class="inner" style="min-height: 700px;">
        <div class="row">
        <div class="col-lg-12">
            <h1>Sửa bài viết</h1>
        </div>
    </div>
      <hr />
     <!--BLOCK SECTION -->
        <p><a href="{{ route('adgoldfish185.post.getIndex') }}" class="btn btn-info">Quay lại</a> </p>
         <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <header>
                            <div class="icons"><i class="icon-th-large"></i></div>
                            <h5>Sửa bài viết</h5>
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
                            <form action="{{ route('adgoldfish185.post.postEdit', $Post['id']) }}" class="form-horizontal" id="block-validate" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Tên sản phẩm</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="name" name="name" class="form-control" value="{!! $Post['name'] !!}"/>
                                        <div style="text-align: center; color: red">{!! $errors->first('name') !!}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Danh mục</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="id_cate">
                                            <option value="">--Chọn danh mục--</option>
                                            <?php cate_parent ($lCate, $Post['id_cate']); ?>
                                        </select>
                                        <div style="text-align: center; color: red">{!! $errors->first('id_cate') !!}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Hình ảnh</label>
                                    <div class="col-lg-8">
                                        <img width="200px" height="200px" src="{{ asset('/resources/upload/'.$Post['picture']) }}">
                                        <input type="file" id="picture" name="picture" class="form-control" />
                                        <div style="text-align: center; color: red">{!! $errors->first('picture') !!}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Mô tả</label>
                                    <div class="col-lg-8">
                                        <textarea rows="10" id="preview" name="preview" class="form-control">{!! $Post['preview'] !!}</textarea>
                                        <div style="text-align: center; color: red">{!! $errors->first('preview') !!}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Keywords</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="keywords" name="keywords" class="form-control" value="{!! $Post['keywords'] !!}"/>
                                        <div style="text-align: center; color: red">{!! $errors->first('keywords') !!}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Description</label>
                                    <div class="col-lg-8">
                                        <textarea rows="10" id="description" name="description" class="form-control">{!! $Post['description'] !!}</textarea>
                                        <div style="text-align: center; color: red">{!! $errors->first('description') !!}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Title</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="title" name="title" class="form-control" value="{!! $Post['title'] !!}">
                                        <div style="text-align: center; color: red">{!! $errors->first('title') !!}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Tag</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="tag" name="tag" class="form-control" value="{!! $Post['tag'] !!}">
                                        <div style="text-align: center; color: red">{!! $errors->first('tag') !!}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Chi tiết</label>
                                    <div class="col-lg-8">
                                        <textarea id="detail" name="detail" class="form-control">{!! $Post['detail'] !!}</textarea>
                                        <div style="text-align: center; color: red">{!! $errors->first('detail') !!}</div>
                                    </div>
                                </div>
                                <script>
                                     CKEDITOR.replace( 'detail');
                                </script>
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
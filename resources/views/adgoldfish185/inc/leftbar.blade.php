
        <!-- MENU SECTION -->
       <div id="left" >
            <div class="media user-media well-small">
                <a class="user-link" href="#">
                    <img style="width: 200px" class="media-object img-thumbnail user-img" alt="" src="" />
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading"></h5>
                    <ul class="list-unstyled user-info">
                        
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online
                        </li>
                       
                    </ul>
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">
                <li class="panel @if(!empty($active) && $active=='index') active @endif">
                    <a href="{{ route('adgoldfish185.getIndex') }}" >
                        <i class="icon-table"></i> Trang chủ
                    </a>                   
                </li>

                <li class="panel @if(!empty($active) && $active=='user') active @endif">
                    <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#user-nav">
                        <i class="icon-tasks"> </i> Quản lý người dùng (6)
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                    </a>
                    <ul class="collapse @if(!empty($active) && $active=='user') in @endif" id="user-nav">
                        <li class="@if(!empty($activei) && $activei=='user') active @endif"><a href="{{ route('adgoldfish185.user.getIndex') }}"><i class="icon-angle-right"></i> Người dùng </a></li>
                        <li class="@if(!empty($activei) && $activei=='level') active @endif"><a href="{{ route('adgoldfish185.level.getIndex') }}"><i class="icon-angle-right"></i> Cấp bậc </a></li>
                    </ul>
                </li>

                <li class="panel @if(!empty($active) && $active=='product') active @endif">
                    <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#product-nav">
                        <i class="icon-tasks"> </i> Quản lý sản phẩm (6)
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                    </a>
                    <ul class="collapse @if(!empty($active) && $active=='product') in @endif" id="product-nav">
                        <li class="@if(!empty($activei) && $activei=='product') active @endif"><a href="{{ route('adgoldfish185.product.getIndex') }}"><i class="icon-angle-right"></i> Sản phẩm </a></li>
                        <li class="@if(!empty($activei) && $activei=='cate') active @endif"><a href="{{ route('adgoldfish185.product.getIndexCate') }}"><i class="icon-angle-right"></i> Danh mục </a></li>
                    </ul>
                </li>

                <li class="panel @if(!empty($active) && $active=='post') active @endif">
                    <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#post-nav">
                        <i class="icon-tasks"> </i> Quản lý bài viết (6)
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                    </a>
                    <ul class="collapse @if(!empty($active) && $active=='post') in @endif" id="post-nav">
                        <li class="@if(!empty($activei) && $activei=='post') active @endif"><a href="{{ route('adgoldfish185.post.getIndex') }}"><i class="icon-angle-right"></i> Bài viết </a></li>
                        <li class="@if(!empty($activei) && $activei=='catePost') active @endif"><a href="{{ route('adgoldfish185.post.getIndexCate') }}"><i class="icon-angle-right"></i> Danh mục </a></li>
                    </ul>
                </li>

                <li class=" @if(!empty($active) && $active=='slide') active @endif">
                    <a href="{{ route('adgoldfish185.slide.getIndex') }}"><i class="icon-map-marker"></i> Slide </a>
                </li>

                <li class=" @if(!empty($active) && $active=='contact') active @endif">
                    <a href="{{ route('adgoldfish185.contact.getIndex') }}"><i class="icon-columns"></i> Contact </a>
                </li>
                 <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav">
                        <i class="icon-check-empty"></i> Blank Pages
	   
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                         &nbsp; <span class="label label-success">2</span>&nbsp;
                    </a>
                    <ul class="collapse" id="blank-nav">
                       
                        <li><a href="blank.html"><i class="icon-angle-right"></i> Blank Page One  </a></li>
                        <li><a href="blank2.html"><i class="icon-angle-right"></i> Blank Page Two  </a></li>
                    </ul>
                </li>
                <li><a href=""><i class="icon-signin"></i> Đăng xuất </a></li>

            </ul>

        </div>
        <!--END MENU SECTION -->
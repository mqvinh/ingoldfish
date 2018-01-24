


<div class="footer">

<div class="container">



<div class="row">
            <div class="col-lg-3 col-sm-3">
              <h4>Danh mục</h4>
              <ul class="row">
                @foreach($lCate as $Cate)
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="{{ route('public.product.getPro', $Cate['slug']) }}">{{ $Cate['name'] }}</a></li>
                @endforeach
              </ul>
            </div>
            
            <div class="col-lg-3 col-sm-3">
                    <h4>Nhận thông tin mới nhất</h4>
                    <p>Nhập địa chỉ Email của bạn để nhận được những cập nhật về sản phẩm mới nhất</p>
                    <form class="form-inline" role="form">
                            <input type="text" placeholder="Nhập Email" class="form-control">
                                <button class="btn btn-success" type="button">Gửi</button></form>
            </div>
            
            <div class="col-lg-3 col-sm-3">
                    <h4>Theo dõi chúng tôi</h4>
                    <a href="#"><img src="{{ url('public/public/images/facebook.png') }}" alt="facebook"></a>
                    <a href="#"><img src="{{ url('public/public/images/twitter.png') }}" alt="twitter"></a>
                    <a href="#"><img src="{{ url('public/public/images/linkedin.png') }}" alt="linkedin"></a>
                    <a href="#"><img src="{{ url('public/public/images/instagram.png') }}" alt="instagram"></a>
            </div>

             <div class="col-lg-3 col-sm-3">
                    <h4>In Goldfish</h4>
                    <p><b>Thông tin liên hệ</b><br>
<span class="glyphicon glyphicon-map-marker"></span> Vp: 474 Tôn Đức Thắng - TP Đà Nẵng<br>
<span class="glyphicon glyphicon-envelope"></span> Email: maiquangvinhi4@gmail.com<br>
<span class="glyphicon glyphicon-earphone"></span> Số điện thoại: 01666 79 66 76</p>
            </div>
        </div>
<p class="copyright">Copyright 2013. All rights reserved.	</p>


</div></div>




<!-- Modal -->
<div id="loginpop" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="row">
        <div class="col-sm-6 login">
        <h4>Login</h4>
          <form class="" role="form">
        <div class="form-group">
          <label class="sr-only" for="exampleInputEmail2">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label class="sr-only" for="exampleInputPassword2">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox"> Remember me
          </label>
        </div>
        <button type="submit" class="btn btn-success">Sign in</button>
      </form>          
        </div>
        <div class="col-sm-6">
          <h4>New User Sign Up</h4>
          <p>Join today and get updated with all the properties deal happening around.</p>
          <button type="submit" class="btn btn-info"  onclick="window.location.href='register.php'">Join Now</button>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- /.modal -->



</body>
</html>




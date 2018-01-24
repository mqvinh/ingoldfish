@extends('public.master')
@section('content')
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="{{ route('public.getIndex') }}">Trang chủ</a> / Liên hệ</span>
    <h2>Liên hệ với chúng tôi</h2>
</div>
</div>
<!-- banner -->
<div class="container">
  <div class="spacer">
    <div class="row contact">\
      <form action="">
        <div class="col-lg-6 col-sm-6 ">
          <input type="text" class="form-control" placeholder="Tên đầy đủ">
          <input type="text" class="form-control" placeholder="Địa chỉ email">
          <input type="text" class="form-control" placeholder="Số điện thoại">
          <input type="text" class="form-control" placeholder="Chủ đề">
          <textarea rows="6" class="form-control" placeholder="Nội dung"></textarea>
          <button type="submit" class="btn btn-success" name="Submit">Gửi</button>   
        </div>
      </form>
      <div class="col-lg-6 col-sm-6 ">
        <div class="well"><iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Pulchowk,+Patan,+Central+Region,+Nepal&amp;aq=0&amp;oq=pulch&amp;sll=37.0625,-95.677068&amp;sspn=39.371738,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Pulchowk,+Patan+Dhoka,+Patan,+Bagmati,+Central+Region,+Nepal&amp;ll=27.678236,85.316853&amp;spn=0.001347,0.002642&amp;t=m&amp;z=14&amp;output=embed"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
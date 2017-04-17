<!-- by thanh doi -->

@extends('layout.layout')
@section('content')
<div class="ncontent">
<div class="contact">
  <div class="container">
    <div class="contact-top heading">
      <h2>LIÊN HỆ</h2>
    </div>
      <div class="contact-text">
      <div class="col-md-3 contact-left">
          <div class="address">
            <h5>Trụ sở</h5>
            <p>Số 50,
            <span>Đường Tiên sơn</span>
            Quận Hải Châu.</p>
          </div>
          <div class="address">
            <h5>Liên lạc</h5>
            <p>Tel:01657173786,
            <span>Fax:190-4509-494</span>
            Email: <a href="https://www.facebook.com/B%C3%A1n-h%C3%A0ng-sida-442803119398346/">https://www.facebook.com/B%C3%A1n-h%C3%A0ng-sida-442803119398346/</a></p>
          </div>
        </div>
        <div class="col-md-9 contact-right">
          <form class="form-horizontal " action="{!! url('cusproduct/lien-he') !!}"  method="post">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
              <input type="text" placeholder="Name" id="name" name="name" required><br/>
              <input type="email" placeholder="Email" id="email" name="email" required style="margin-top: 1.4%;"><br/>
              <input type="text" placeholder="Phone" id="phone" name="phone" style="margin-top: 1.4%;">
            <br/>
              <textarea placeholder="Message" required id="message" name="message"></textarea>
            <div class="submit-btn">
              <input type="submit" value="SUBMIT">
              <input type="reset" value="Delete All" class="btn btn-danger">
            </div>
          </form>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="fb-page" data-href="https://www.facebook.com/B%C3%A1n-h%C3%A0ng-sida-442803119398346/" data-tabs="timeline" data-width="250" data-height="50" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/B%C3%A1n-h%C3%A0ng-sida-442803119398346/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/B%C3%A1n-h%C3%A0ng-sida-442803119398346/">Bán hàng sida</a></blockquote></div>
				<div class="fb-comments" data-href="https://www.facebook.com/B%C3%A1n-h%C3%A0ng-sida-442803119398346/" data-numposts="5"></div>
				<div class="fb-like" data-href="https://www.facebook.com/B%C3%A1n-h%C3%A0ng-sida-442803119398346/" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
				<div id="tabs-tab-title-3">
            <p>Chi nhánh 1 : 50 Xô viết nghệ tĩnh - Đà Nẵng</p><br/>
             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.5969009049372!2d108.21878392976174!3d16.034486028832287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219eebd7d1e0f%3A0xd7a370a6d04c1966!2zVGnDqm4gU8ahbiA5LCBI4bqjaSBDaMOidSwgxJDDoCBO4bq1bmcsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1492451652083" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
		</div>
		<div id="fb-root"></div>
</div>
</div>
@stop
@section('script')
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  @if(isset(Auth::guard('customers')->user()->Name))
    $('#name').val('{{ Auth::guard('customers')->user()->Name }}');
    $('#email').val('{{ Auth::guard('customers')->user()->Email }}');
    $('#phone').val('{{ Auth::guard('customers')->user()->Phone }}');
  @endif
  </script>
@stop
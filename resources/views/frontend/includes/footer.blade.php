<hr class="footer_hr_top">
<div class="section_five">
  <div class="col-xs-12">
    <div class="col-md-5 footer_hidden_links">
      <img src="{{url('/')}}/frontend/img/footer_logo.png"><br>
      <ul>
        <li><a href="{{ url('/') }}">HOME</a><br></li>
        <li><a id="profile_footer_tab" href="{{ route('frontend.show-page', 'profile') }}">PROFILE</a><br></li>
        <li><a id="recognition_footer_tab" href="{{ route('frontend.show-page', 'recognition') }}">RECOGNITION</a><br></li>
        <li><a id="nation_building_footer_tab" href="{{ route('frontend.show-page', 'nation_building') }}">NATION BUILDING</a><br></li>
        <li><a id="foundation_footer_tab" href="{{ route('frontend.show-page', 'foundation') }}">FOUNDATION</a><br></li>
        <li><a id="media_footer_tab" href="{{ route('frontend.show-page', 'media') }}">MEDIA</a></li>
      </ul>
    </div>
    <div class="col-md-7 footer_contact_us">
        <h3>Contact Us</h3>
        <p>We welcome your enquiries, feedback, opinions and suggestions. Please share them with us here.</p>
        {{ html()->form('POST', route('frontend.email-subscription'))->class('email-subscribe-form')->open() }}
            <input type="email" class="footer_email_input" name="email" placeholder="Email" required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}">
            <button type="submit" class="footer_submit_input">Send</button>
        {{ html()->form()->close() }}
    </div>
  </div>
  <div class="col-xs-12 footer_copyright">
    <div class="col-md-5">
      <img src="{{url('/')}}/frontend/img/footer_logo.png" class="footer_logo_mobile">
      <span><p>Tan Sri Dr Limkokwing Official Twitter account</p></span><span><i class="fab fa-twitter"></i></span>
    </div>
    <hr class="footer_hr">
    <div class="col-xs-12 col-md-6" style="float: right;">
     <a href="https://www.limkokwing.net/"><img src="{{url('/')}}/frontend/img/logo_lkw_footer.png" class="footer_img2" class="footer_img2"></a>
      <p>Limkokwing University social media</p>
      <span><i class="fab fa-twitter"></i></span>
      <span><i class="fab fa-facebook"></i></span>
      <span><i class="fab fa-instagram"></i></span>
      <span><i class="fab fa-youtube"></i></span>
    </div>
  </div>
  <div class="col-xs-12 footer_last" style="position: relative;">
    <p>Copyright © 2018 Tan Sri Dato’ Sri Paduka Dr Lim Kok Wing. All Right Reserved.<br>Designed & maintained by World Wide Web Domination, Centre for Content Creation.</p>
  </div>
</div>

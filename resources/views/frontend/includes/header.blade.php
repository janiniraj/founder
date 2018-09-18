<header>
  <div id="small">
    <a href="{{ route('frontend.index') }}"><img src="{{url('/')}}/frontend/img/logo.png"></a>
  </div>
  <div class="menu">
    <a href="{{url('/')}}" id="home_page_tab">Home</a>
    <a href="{{url('/')}}/page/profile" id="profile_page_tab">Profile</a>
    <a href="{{url('/')}}/page/recognition" id="recognition_page_tab">Recognition</a>
    <a href="{{url('/')}}/page/nation_building" id="nation_building_tab">Nation building</a>
    <a href="{{url('/')}}/page/foundation" id="foundation_page_tab">Foundation</a>
    <a href="{{url('/')}}/page/media" id="media_page_tab">Media</a>
  </div>
</header>

<div class="mobile_menu">
  <div class="header">
    <div class="container">
      <div class="nav-icon cross">
        <div class="span"></div>
      </div>
       <a href="{{ route('frontend.index') }}"><img class="mobile_home_logo" src="{{url('/')}}/frontend/img/logo.png"></a>
      <ul class="ul_menu menu">    
        <div class="inner_menu">
          <li><a id="home_page_tab_mobile" href="{{url('/')}}">Home</a></li>
          <li><a id="profile_page_tab_mobile" href="{{url('/')}}/page/profile">Profile</a></li>
          <li><a id="recognition_page_tab_mobile" href="{{url('/')}}/page/recognition">Recognition</a></li>
          <li><a id="nation_building_tab_mobile" href="{{url('/')}}/page/nation_building">Nation Building</a></li>
          <li><a id="foundation_page_tab_mobile" href="{{url('/')}}/page/foundation">Foundation</a></li>
          <li><a id="media_page_tab_mobile" href="{{url('/')}}/page/media">Media</a></li>
        </div>              
      </ul>        
    </div>
  </div>
</div>

 
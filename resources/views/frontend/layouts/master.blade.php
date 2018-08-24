<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>limkokwing.com</title>

    <!-- Boostrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Styles -->
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.6.6/jquery.fullPage.css'>
    <link rel="stylesheet" href="{{ url('/')  }}/frontend/css/style.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville|Libre+Franklin:100|Montserrat|Montserrat:500|Montserrat:600|Montserrat:800" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <!-- jQuery -->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

</head>
<body>
    @include('frontend.includes.header')
    <div class="desktop_header_space"></div>
    @yield('content')
    <footer id="fullpage">
        @include('frontend.includes.footer')
    </footer>

    @stack('before-scripts')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="{{ url('/')  }}/frontend/js/index.js"></script>

    <script src="{{ url('/')  }}/frontend/js/custom.js"></script>

    <script>
        $(document).on("scroll", function() {

            if($(document).scrollTop()>50) {
                $("header").addClass("small");
            } else {
                $("header").removeClass("small");
            }

        });
    </script>

    <script >
        $('.panel-collapse').on('show.bs.collapse', function () {
            $(this).siblings('.panel-heading').addClass('active');
        });

        $('.panel-collapse').on('hide.bs.collapse', function () {
            $(this).siblings('.panel-heading').removeClass('active');
        });
    </script>
    
    <!-- PAGES SCRIPTS -->
    <script>
      // MENU active script
      var current_href = window.location.pathname;
      var current_page = current_href.substring(current_href.lastIndexOf('/') + 1);

      if(current_page == 'media.php' || current_page == 'blog.php' || current_page == 'blog_content.php' || current_page == 'publication.php'
                          || current_page == 'speech.php' || current_page == 'speech_content.php'){
        $('#media_page_tab').addClass('menu_active');
        $('#media_page_tab_mobile').addClass('menu_active');
        $('#media_footer_tab').addClass('footer_menu_active');
      }
      if(current_page == 'nation_building.php'  || current_page == 'malaysia.php'  
                          || current_page == 'botswana.php'  || current_page == 'cambodia.php'  || current_page == 'london.php'  || current_page == 'lesotho.php'  || current_page == 'sierra_leone.php'  || current_page == 'south_africa.php' || current_page == 'swaziland.php'){
        $('#nation_building_tab').addClass('menu_active');
        $('#nation_building_tab_mobile').addClass('menu_active');
        $('#nation_building_footer_tab').addClass('footer_menu_active');
      }
      if(current_page == 'foundation.php'){
        $('#foundation_page_tab').addClass('menu_active');
        $('#foundation_page_tab_mobile').addClass('menu_active');
        $('#foundation_footer_tab').addClass('footer_menu_active');
      }
      if(current_page == 'profile.php' || current_page == 'milestones.php'){
        $('#profile_page_tab').addClass('menu_active');
        $('#profile_page_tab_mobile').addClass('menu_active');
        $('#profile_footer_tab').addClass('footer_menu_active');
      }
      if(current_page == 'recognition.php' || current_page == 'recognition-awards.php' || current_page == 'recognition-quotes.php'){
        $('#recognition_page_tab').addClass('menu_active');
        $('#recognition_page_tab_mobile').addClass('menu_active');
        $('#recognition_footer_tab').addClass('footer_menu_active');
      }

      // BLOG PAGE script
      if($(window).width() > 1025) {
        var txt= $('.blog-desc').text();
        $(".blog-desc").text(function(index, currentText) {
          return currentText.substr(0, 250) + "...";
        });
      }
      else if($(window).width() > 769) {
        $(".blog-desc").text(function(index, currentText) {
          return currentText.substr(0, 70) + "...";
        });
      }
      else if($(window).width() > 500) {
        $(".blog-desc").text(function(index, currentText) {
          return currentText.substr(0, 250) + "...";
        });
      }

      // NATION BUILDING PAGE script
      jQuery(document).ready(function($) {
          $(".clickable-row").click(function() {
              window.location = $(this).data("href");
          });
      })

      // PUBLICATION PAGE script
      // Change content of preview from clicked div
      $(document).ready(function(){
        $(".all-book").on('click', function(){
          var src = $(this).find('img').attr('mainimage');
          $('.publication-main-image').attr('src', src);

          var headline = $(this).find('.book-small-media').text();
            $(".book-title-media").html(headline);

            var year = $(this).find('.book-year-media-small').text();
            $(".book-year-media").html(year);

            var description = $(this).find('.book-desc-media-small').text();
            $(".book-desc-media").html(description);
        });
      });

      $(document).ready(function() {
        if (window.matchMedia('(max-width: 500px)').matches) {
          var mobile_src = $('.book-space').find('img').attr('mainimage');
          $('.book-space>img').attr('src', mobile_src);
        }
      });
    </script>

    @stack('after-scripts')
</body>
</html>
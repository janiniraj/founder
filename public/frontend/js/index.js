if (window.matchMedia('(min-width: 1025px)').matches){
  // variables
  var $header_top = $('.header-top');
  var $nav = $('nav');

  // fullpage customization
    if($('body').hasClass('main-page'))
    {
        $('#fullpage').fullpage({
            sectionsColor: ['#B8AE9C', '#348899', '#F2AE72', '#5C832F', '#B8B89F'],
            sectionSelector: '.vertical-scrolling',
            slideSelector: '.horizontal-scrolling',
            navigation: true,
            slidesNavigation: true,
            controlArrows: false,
            anchors: ['firstSection', 'secondSection', 'thirdSection', 'fourthSection', 'fifthSection'],
            menu: '#menu',

            afterLoad: function(anchorLink, index) {
                $header_top.css('background', 'rgba(0, 47, 77, .3)');
                $nav.css('background', 'rgba(0, 47, 77, .25)');
                if (index == 6) {
                    $('#fp-nav').hide();
                    $.fn.fullpage.moveTo(6, 0);
                }
            },

            onLeave: function(index, nextIndex, direction) {

                if(index == 5) {
                    $('#fp-nav').show();
                }
            },

            afterSlideLoad: function( anchorLink, index, slideAnchor, slideIndex) {
                if(anchorLink == 'fifthSection' && slideIndex == 1) {
                    $.fn.fullpage.setAllowScrolling(false, 'up');
                    $header_top.css('background', 'transparent');
                    $nav.css('background', 'transparent');
                    $(this).css('background', '#374140');
                    $(this).find('h2').css('color', 'white');
                    $(this).find('h3').css('color', 'white');
                    $(this).find('p').css(
                        {
                            'color': '#DC3522',
                            'opacity': 1,
                            'transform': 'translateY(0)'
                        }
                    );
                }
            },

            onSlideLeave: function( anchorLink, index, slideIndex, direction) {
                if(anchorLink == 'fifthSection' && slideIndex == 1) {
                    $.fn.fullpage.setAllowScrolling(true, 'up');
                    $header_top.css('background', 'rgba(0, 47, 77, .3)');
                    $nav.css('background', 'rgba(0, 47, 77, .25)');
                }
            }

        });
    }

}

// MENU MOBILE
$(document).ready(function(){
  $(".nav-icon").click(function(){
    $("ul").toggleClass("open");
    
  });
});
$(function(){
 var obj = document.querySelectorAll('.nav-icon');
  for(var i = obj.length -1;i>=0;i--){
    var toggle = obj[i];
    toggleactive(toggle);
  }
  
  function toggleactive(toggle) {
  toggle.addEventListener("click",function() {
    
    if(this.classList.contains("active") === true) {
    this.classList.remove("active");
    }
    else {
    this.classList.add("active");
    }
  });
  }
});





//MENU SCRIPT
$(document).on("scroll", function() {

    if($(document).scrollTop()>50) {
            $("header").addClass("small");
        } else {
            $("header").removeClass("small");
        }

});



//SCRIPT
$('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('active');
});

$('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('active');
});

    


// MENU active script

var current_href = window.location.pathname;
var current_page = current_href.substring(current_href.lastIndexOf('/') + 1);


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
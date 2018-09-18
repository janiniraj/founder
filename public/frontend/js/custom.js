// MENU ACTIVE SCRIPT
//Nation Building
var nationalBuildings = [
    '/cambodia',
    '/malaysia',
    '/lesotho',
    '/botswana',
    '/london',
    '/sierra_leone',
    '/sounth_africa'

];

$.each(nationalBuildings, function(){
    if(window.location.pathname.indexOf(this) > -1)
    {
        $(".menu #nation_building_tab").addClass('activeMenuItem');
    }
});



//header
$(".menu a").each(function() {
    var urlHref= $(this).attr('href');
    if(urlHref.indexOf(window.location.pathname) > -1)
    {
        $(this).addClass('activeMenuItem');
    }
});

//footer
$(".section_five a").each(function() {
    var urlHref= $(this).attr('href');
    if(urlHref.indexOf(window.location.pathname) > -1)
    {
        $(this).addClass('footer_menu_active');
    }
});

// MENU ACTIVE SCRIPT END





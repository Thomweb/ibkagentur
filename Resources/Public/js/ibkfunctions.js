$(document).ready(function () {
	$(".nodisplay").css('display', 'block');
    $(".div_box_content:visible").hide();

    $(".div_box").mouseover(function () {
        $(this).children().fadeIn(500);    
    
    });

    $(".div_box").mouseleave(function () {
        $(".div_box_content:visible").fadeOut(400);
    }); 
});

$(function() {
$("#accordion").accordion({
  collapsible:true, active:0, event:'click', heightStyle:'content', animate:{duration:'2000',easing:'swing'}
  });
});

$(function() {
  $(".faqlist").accordion({
    collapsible:true, active:false, event:'click', heightStyle:'content', animate:{duration:'1000',easing:'swing'}
  });
});

/* Megamenu Bootstrap 5 */

document.addEventListener("DOMContentLoaded", function(){
  /////// Prevent closing from click inside dropdown
  document.querySelectorAll('.dropdown-menu').forEach(function(element){
    element.addEventListener('click', function (e) {
      e.stopPropagation();
    });
  })
}); 

/* Suchbox einblenden und ausblenden */
$(document).ready(function () {

  $("#search-top-in").click(function () {
    $(".ke-search-top").slideDown(500);
    $("#search-top-in").fadeOut(0);
    $("#search-top-out").delay(0).fadeIn(0);
  }); 

  $("#search-top-out").click(function () {
    $(".ke-search-top").slideUp(500);
    $("#search-top-out").fadeOut(0);
    $("#search-top-in").delay(0).fadeIn(0);
  }); 
});

/* Blog - die nächsten Beiträge - ein- und ausblenden */
$(document).ready(function () {

  $(".blog-toggle-open").click(function () {
    $(".blog-toggle").slideDown(500);
    $(".blog-toggle-close").show(0);
    $(".blog-toggle-open").hide(0);
  }); 
  $(".blog-toggle-close").click(function () {
    $(".blog-toggle").slideUp(500);
    $(".blog-toggle-close").hide(0);
    $(".blog-toggle-open").show(0);
  }); 
});

/* Breadcrumb Navigation ein- und ausblenden */
$(document).ready(function () {

  $(".bread-navigation-open").click(function () {
      $("#breadcrumb").slideDown(300);
      $(".bread-navigation-close").css('display', 'block');
      $(".bread-navigation-open").css('display', 'none');

  });
  $(".bread-navigation-close").click(function () {
     $("#breadcrumb").slideUp(300);
     $(".bread-navigation-close").css('display', 'none');
     $(".bread-navigation-open").css('display', 'block');
  });
});


/* Link Back to top */

$(document).ready(function () {
	$('.link-home').click(function(){
		$("html, body").animate({ scrollTop: 0 }, 500);
		return false;
	});
});

/* Bootstrap 4 Mega Menu */

$(document).ready(function() {
	$(".megamenu").on("click", function(e) {
		e.stopPropagation();
	});
});

/* Leiste unten anzeigen */

$(document).ready(function() {
  $(function () {
    $(window).scroll(function () {
      if ($(this).scrollTop() > 600) {
        $('#bottom').fadeIn();
        $('#navtotop').fadeIn();
      } else {
        $('#bottom').fadeOut();
        $('#navtotop').fadeOut();
      }
    });
  });
});

// Swiper Bildergalerie
const swiper = new Swiper('.swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    slidesPerView: 1,
    slidesPerGroup: 1,
    spaceBetween: 0,

    breakpoints: {
        400: {
            slidesPerView: 2,
            spaceBetween: 5
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 5
        },
        992: {
            slidesPerView: 4,
            spaceBetween: 5
        }
    },
    speed: 500,
    autoplay: {
        delay: 2000,
    },

    // If we need pagination
    // pagination: {
    //     el: '.swiper-pagination',
    //     type: 'bullets',
    // },
    // Navigation arrows
    // navigation: {
    //     nextEl: '.swiper-button-next',
    //     prevEl: '.swiper-button-prev',
    // },
});
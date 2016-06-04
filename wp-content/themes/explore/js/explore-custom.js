/*
 * Main Theme's JavaScript files
 */

jQuery(document).ready(function(){

  var RSopened = false;
  var SearchOpened = false; 

   // For Search Icon Toggle effect added at the top
   jQuery(".search-top").click(function(){
      if (!SearchOpened) {
        jQuery("#masthead .search-form-top").toggle(300);
        SearchOpened = true;
      }
   });

   jQuery("#main").click(function(){
      if (SearchOpened) {
        jQuery("#masthead .search-form-top").toggle(300);
        SearchOpened = false;
      }
   });

   jQuery(".header-widget-controller").click(function(){
      jQuery(".header-widgets-wrapper").slideToggle('slow');
   });

   // For scroll to top setting
	jQuery("#scroll-up").hide();
	jQuery(function () {
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 800) {
				jQuery('#scroll-up').fadeIn();
			} else {
				jQuery('#scroll-up').fadeOut();
			}
		});
		jQuery('a#scroll-up').click(function () {
			jQuery('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

   // For Header Sidebar Toggle effect added at the top
   jQuery(".header-sidebar-ribbon").click(function(){
      jQuery("#masthead .header-widgets-wrapper").slideToggle('slow');
   });

   // Setting for the responsive video using fitvids
   if ( typeof jQuery.fn.fitVids !== 'undefined' ) {
      jQuery(".fitvids-video").fitVids();
   }

   // Setting for the sticky menu
   if ( typeof jQuery.fn.sticky !== 'undefined' ) {
      var wpAdminBar = jQuery('#wpadminbar');
      if (wpAdminBar.length) {
         jQuery("#header-text-nav-container").sticky({topSpacing:wpAdminBar.height()});
      } else {
         jQuery("#header-text-nav-container").sticky({topSpacing:0});
      }
   }

   // Setting for the bxSlider
   if ( typeof jQuery.fn.bxSlider !== 'undefined' ) {
      jQuery(".slider-rotate").bxSlider({
         mode: 'horizontal',
         speed: 1500,
         auto: true,
         pause: 5000,
         adaptiveHeight: true,
         nextText: '<a class="slide-next"><i class="fa fa-angle-right"></i></a>',
         prevText: '<a class="slide-prev"><i class="fa fa-angle-left"></i></a>',
         pager: false,
         tickerHover: true
      });
   }

  jQuery('.go-anchor-button').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = jQuery(this.hash);
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        jQuery('html, body').animate({
          scrollTop: target.offset().top
        }, 300);
        return false;
      }
    }

  });

  jQuery('a').click(function(){
      jQuery('html, body').animate({
          scrollTop: jQuery( jQuery.attr(this, 'href') ).offset().top
      }, 500);
      return false;
  });

  jQuery('.moreRS').click(function() {
    if (RSopened) {
      jQuery('.rrss-box').animate({height: '1000px'});
      jQuery('.moreRS').text('Mostrar más');
      RSopened = false;
    } else {
      jQuery('.rrss-box').animate({height: '100%'});
      jQuery('.moreRS').text('Mostrar menos');
      RSopened = true;
    }


  });

  jQuery('.make-bigger').click(function() {
      jQuery('.image-big-box').show(300);
  });

  jQuery('.close-big-box').click(function() {
      jQuery('.image-big-box').hide(300);
  });


  //Movil

  jQuery('.mb-avisos-icon').click(function() {
      jQuery('.mb-avisos-section').toggle(300);
      jQuery('.mb-horarios-section').hide(300);
      jQuery('.mb-calendario-section').hide(300);
      jQuery('.mb-evangelio-section').hide(300);
      jQuery('.mb-redes-section').hide(300);
      jQuery('.mb-suscribete-section').hide(300);
  })

  jQuery('.mb-horarios-icon').click(function() {
      jQuery('.mb-avisos-section').hide(300);
      jQuery('.mb-horarios-section').toggle(300);
      jQuery('.mb-calendario-section').hide(300);
      jQuery('.mb-evangelio-section').hide(300);
      jQuery('.mb-redes-section').hide(300);
      jQuery('.mb-suscribete-section').hide(300);
  })

  jQuery('.mb-calendario-icon').click(function() {
      jQuery('.mb-avisos-section').hide(300);
      jQuery('.mb-horarios-section').hide(300);
      jQuery('.mb-calendario-section').toggle(300);
      jQuery('.mb-evangelio-section').hide(300);
      jQuery('.mb-redes-section').hide(300);
      jQuery('.mb-suscribete-section').hide(300);
  })

  jQuery('.mb-evangelio-icon').click(function() {
      jQuery('.mb-avisos-section').hide(300);
      jQuery('.mb-horarios-section').hide(300);
      jQuery('.mb-calendario-section').hide(300);
      jQuery('.mb-evangelio-section').toggle(300);
      jQuery('.mb-redes-section').hide(300);
      jQuery('.mb-suscribete-section').hide(300);
  })

  jQuery('.mb-redes-icon').click(function() {
      jQuery('.mb-avisos-section').hide(300);
      jQuery('.mb-horarios-section').hide(300);
      jQuery('.mb-calendario-section').hide(300);
      jQuery('.mb-evangelio-section').hide(300);
      //jQuery('.mb-redes-section').toggle(300);
      jQuery('.mb-suscribete-section').hide(300);
      toggleSocialMobile();
  })

  jQuery('.mb-suscribete-icon').click(function() {
      jQuery('.mb-avisos-section').hide(300);
      jQuery('.mb-horarios-section').hide(300);
      jQuery('.mb-calendario-section').hide(300);
      jQuery('.mb-evangelio-section').hide(300);
      jQuery('.mb-redes-section').hide(300);
      jQuery('.mb-suscribete-section').toggle(300);
  })

  jQuery('.mb-pope-icon').click(function() {
      jQuery('.mb-pope-timeline').toggle(300);
      jQuery('.mb-parroquia-timeline').hide(300);
      jQuery('.mb-diocesis-timeline').hide(300);
  })

  jQuery('.mb-parroquia-icon').click(function() {
      jQuery('.mb-pope-timeline').hide(300);
      jQuery('.mb-parroquia-timeline').toggle(300);
      jQuery('.mb-diocesis-timeline').hide(300);
  })

  jQuery('.mb-diocesis-icon').click(function() {
      jQuery('.mb-pope-timeline').hide(300);
      jQuery('.mb-parroquia-timeline').hide(300);
      jQuery('.mb-diocesis-timeline').toggle(300);
  })

var toggleSocialMobile = function() {
  if (jQuery('.mb-redes-section').css('display') == 'none') {
    jQuery('.mb-redes-section').toggle(300);
  }
}

if (typeof newsletter_check !== "function") {
window.newsletter_check = function (f) {
    var re = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-]{1,})+\.)+([a-zA-Z0-9]{2,})+$/;
    if (!re.test(f.elements["ne"].value)) {
        alert("¡Oh, se te ha debido olvidar algo!");
        return false;
    }
    for (var i=1; i<20; i++) {
    if (f.elements["np" + i] && f.elements["np" + i].required && f.elements["np" + i].value == "") {
        alert("");
        return false;
    }
    }
    if (f.elements["ny"] && !f.elements["ny"].checked) {
        alert("You must accept the privacy statement");
        return false;
    }
    return true;
}
}


});
/* jshint devel:true */

/**
 * Vertically Centering
 * @usedPlugins jquery,flexbox-fallback
 */

if ($('html').hasClass('no-flexbox') && $('html').hasClass('no-flexboxlegacy')) {
	if ($('header nav > ul > li > a').length > 0) $('header nav > ul > li > a').flexVerticalCenter('top');

}
//if($('.dl-menuwrapper').length > 0) $('.dl-menuwrapper').flexVerticalCenter('top');

/**
 * DL Menu
 * @usedPlugins jquery, dlmenu
 * @usedAt      shortcode
 */
var dl_menu = $('#dl-menu');
if (dl_menu.length > 0) {

	dl_menu.dlmenu({
		animationClasses: {
			'in': 'dl-animate-in-3',
			'out': 'dl-animate-out-3'
		}
	});


}


/**
 * Main Menu
 * @usedPlugins jquery, superfish, hoverIntent
 * @usedAt      Global
 */
var main_menu = $('.header_1 > nav > ul');
if (main_menu.length > 0 && !$('html').hasClass('touch')) {
	main_menu.superfish({
		delay: 250
	});

}

/**
 * Slider
 * @usedPlugins jquery, jquery-easing-1.3, jquery-transit-modified, layerslider.kreaturamedia, layerslider.transitions
 * @usedAt      Home Page
 */
var layerSlider = $('#layerslider');
if (layerSlider.length > 0) {
	layerSlider.layerSlider({
		width: '100%',
		height: '318px',
		skinsPath: 'scripts/layerslider_skins/',
		skin: 'fullwidth',
		thumbnailNavigation: 'hover',
		hoverPrevNext: false,
		responsive: true,
		responsiveUnder: 1000,
		sublayerContainer: 1000,
		touchNav: true,
		navStartStop: false,
		navButtons: false
	});
}

var eventCarousel = $('.carousel');
if (eventCarousel.length > 0) {
	eventCarousel.carousel();
}

	/**
	 * Php Ajax Contact Form
	 * @usedPlugins jquery
	 * @usedAt      Contact Page
	 */
	$('.contact-form').bind('submit', function() {
		var form = $(this);
		var me = $(this).children('button[type=submit]');

		me.attr('disabled', 'disabled');
		var message = $('.output-contact');
		$.ajax({
			type: "POST",
			url: "http://sitesobg.dev/contact-us",
			data: form.serialize(),
			beforeSend: function(){
				message.html('Sending your message....');
			},
			success: function(returnedInfo) {
				
				returnedInfo == 1 ? message.html('Message was successfully delivered') : message.html('Our Mail Servers Are Currently Down').show();
				setInterval(function() {
					message.fadeOut()
				}, 5000);
				me.removeAttr('disabled');
				form[0].reset();

			}
		});
		return false;
	});

/**
 * Scroll Speed and Styling
 * @usedPlugins jquery,nicescroll
 * @usedAt      Every page that contains body tag with data-smooth-scrolling 1
 */
if ($('body').attr('data-smooth-scrolling') == 1 && !$('html').hasClass('touch')) {
	$("html").niceScroll({
		scrollspeed: 60,
		mousescrollstep: 35,
		cursorwidth: 5,
		cursorcolor: '#C9532D',
		cursorborder: 'none',
		background: 'rgba(255,255,255,0.3)',
		cursorborderradius: 3,
		autohidemode: false,
		cursoropacitymin: 0.1,
		cursoropacitymax: 1
	});
}

/**
 * lightbox for videos
 * @usedPlugins magnific-pop-up
 * @usedAt kailas-tips
 */

if($('.video-instructions').length>0){
	$('.video-instructions a').magnificPopup()
}




equalheight = function(container) {

	var currentTallest = 0,
		currentRowStart = 0,
		rowDivs = new Array(),
		$el,
		topPosition = 0;
	$(container).each(function() {

		$el = $(this);
		$($el).height('auto')
		topPostion = $el.position().top;

		if (currentRowStart != topPostion) {
			for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
				rowDivs[currentDiv].height(currentTallest);
			}
			rowDivs.length = 0; // empty the array
			currentRowStart = topPostion;
			currentTallest = $el.height();
			rowDivs.push($el);
		} else {
			rowDivs.push($el);
			currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
		}
		for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
			rowDivs[currentDiv].height(currentTallest);
		}
	});
}

$(window).load(function() {
	equalheight('.col-text');
});


$(window).resize(function() {
	equalheight('.col-text');
});


$('.address-same').change(function(){
    if(this.checked){

    	$( "input[name ='shipping-name']" ).val($( "input[name ='billing-name']" ).val());
    	$( "input[name ='shipping-address_1']" ).val($( "input[name ='billing-address_1']" ).val());
    	$( "input[name ='shipping-address_2']" ).val($( "input[name ='billing-address_2']" ).val());
    	$( "input[name ='shipping-city']" ).val($( "input[name ='billing-city']" ).val());
    	$( "input[name ='shipping-state']" ).val($( "input[name ='billing-state']" ).val());
    	$( "input[name ='shipping-country']" ).val($( "input[name ='billing-country']" ).val());
    	$( "input[name ='shipping-contact_number_1']" ).val($( "input[name ='billing-contact_number_1']" ).val());
    	$( "input[name ='shipping-contact_number_2']" ).val($( "input[name ='billing-contact_number_2']" ).val());
  	}else{
  		$( "input[name *='shipping']" ).val('');
  	}

});
/**
 * Members
 * @usedPlugins jquery
 * @usedAt Member Login page
 */
  $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

/**
 * profile date
 * @usedPlugins datepicker, jquery
 * @usedAt Member profile page
 */
	$('.input-group.date').datepicker({
	    autoclose: true,
	    todayHighlight: true,
	    toggleActive: true
	});


/**
 * hover overlay in albums
 * @usedPlugins hoverdir, jquery
 * @usedAt Member albums page
 */

	$('.album-preview').each(function(){
		$(this).hoverdir({
			speed: 300,
			easing: 'ease',
			hoverDelay: 0,
			inverse: false
		});
	});

	var $container = $('.photos-container').masonry();
	// initialize Masonry after all images have loaded  
	$container.imagesLoaded( function() {
	  $container.masonry({
		  itemSelector: '.photo'
	  });
	});

	$('.image-link').magnificPopup({
		type:'image',
		mainClass: 'mfp-with-zoom', // this class is for CSS animation below
		gallery:{
	    enabled:true
	  },
	  zoom: {
	    enabled: true, // By default it's false, so don't forget to enable it

	    duration: 300, // duration of the effect, in milliseconds
	    easing: 'ease-in-out', // CSS transition easing function 

	    // The "opener" function should return the element from which popup will be zoomed in
	    // and to which popup will be scaled down
	    // By defailt it looks for an image tag:
	    opener: function(openerElement) {
	      // openerElement is the element on which popup was initialized, in this case its <a> tag
	      // you don't need to add "opener" option if this code matches your needs, it's defailt one.
	      return openerElement.is('img') ? openerElement : openerElement.find('img');
	    }
	  }
	});

/**
 * Google Map
 * @usedPlugins jquery,nicescroll
 * @usedAt contact page
 */
var respMap;
var mapCanvas = document.getElementById('map-canvas');
var FlatMap =
	[{
		"featureType": "water",
		"elementType": "all",
		"stylers": [{
			"hue": "#7fc8ed"
		}, {
			"saturation": 55
		}, {
			"lightness": -6
		}, {
			"visibility": "on"
		}]
	}, {
		"featureType": "water",
		"elementType": "labels",
		"stylers": [{
			"hue": "#7fc8ed"
		}, {
			"saturation": 55
		}, {
			"lightness": -6
		}, {
			"visibility": "off"
		}]
	}, {
		"featureType": "poi.park",
		"elementType": "geometry",
		"stylers": [{
			"hue": "#83cead"
		}, {
			"saturation": 1
		}, {
			"lightness": -15
		}, {
			"visibility": "on"
		}]
	}, {
		"featureType": "landscape",
		"elementType": "geometry",
		"stylers": [{
			"hue": "#f3f4f4"
		}, {
			"saturation": -84
		}, {
			"lightness": 59
		}, {
			"visibility": "on"
		}]
	}, {
		"featureType": "landscape",
		"elementType": "labels",
		"stylers": [{
			"hue": "#ffffff"
		}, {
			"saturation": -100
		}, {
			"lightness": 100
		}, {
			"visibility": "off"
		}]
	}, {
		"featureType": "road",
		"elementType": "geometry",
		"stylers": [{
			"hue": "#ffffff"
		}, {
			"saturation": -100
		}, {
			"lightness": 100
		}, {
			"visibility": "on"
		}]
	}, {
		"featureType": "road",
		"elementType": "labels",
		"stylers": [{
			"hue": "#bbbbbb"
		}, {
			"saturation": -100
		}, {
			"lightness": 26
		}, {
			"visibility": "on"
		}]
	}, {
		"featureType": "road.arterial",
		"elementType": "geometry",
		"stylers": [{
			"hue": "#ffcc00"
		}, {
			"saturation": 100
		}, {
			"lightness": -35
		}, {
			"visibility": "simplified"
		}]
	}, {
		"featureType": "road.highway",
		"elementType": "geometry",
		"stylers": [{
			"hue": "#ffcc00"
		}, {
			"saturation": 100
		}, {
			"lightness": -22
		}, {
			"visibility": "on"
		}]
	}, {
		"featureType": "poi.school",
		"elementType": "all",
		"stylers": [{
			"hue": "#d7e4e4"
		}, {
			"saturation": -60
		}, {
			"lightness": 23
		}, {
			"visibility": "on"
		}]
	}]


var GreyMap = [{
	"featureType": "landscape",
	"stylers": [{
		"saturation": -100
	}, {
		"lightness": 65
	}, {
		"visibility": "on"
	}]
}, {
	"featureType": "poi",
	"stylers": [{
		"saturation": -100
	}, {
		"lightness": 51
	}, {
		"visibility": "simplified"
	}]
}, {
	"featureType": "road.highway",
	"stylers": [{
		"saturation": -100
	}, {
		"visibility": "simplified"
	}]
}, {
	"featureType": "road.arterial",
	"stylers": [{
		"saturation": -100
	}, {
		"lightness": 30
	}, {
		"visibility": "on"
	}]
}, {
	"featureType": "road.local",
	"stylers": [{
		"saturation": -100
	}, {
		"lightness": 40
	}, {
		"visibility": "on"
	}]
}, {
	"featureType": "transit",
	"stylers": [{
		"saturation": -100
	}, {
		"visibility": "simplified"
	}]
}, {
	"featureType": "administrative.province",
	"stylers": [{
		"visibility": "off"
	}]
}, {
	"featureType": "water",
	"elementType": "labels",
	"stylers": [{
		"visibility": "on"
	}, {
		"lightness": -25
	}, {
		"saturation": -100
	}]
}, {
	"featureType": "water",
	"elementType": "geometry",
	"stylers": [{
		"hue": "#ffff00"
	}, {
		"lightness": -25
	}, {
		"saturation": -97
	}]
}]

function mymapini() {
	var mapPos = new google.maps.LatLng(8.507804, 77.00345); //Set the coordinates
	var mapOpts = {
		zoom: 16, //You can change this according your needs
		disableDefaultUI: true, //Disabling UI Controls (Optional)
		center: mapPos, //Center the map according coordinates
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		styles: FlatMap
	};

	respMap = new google.maps.Map(mapCanvas,
		mapOpts);

	var mapMarker = new google.maps.Marker({
		position: mapPos,
		map: respMap,
		title: 'Salagramam'
	});

	//This centers automatically to the marker even if you resize your window
	google.maps.event.addListener(respMap, 'idle', function() {
		window.setTimeout(function() {
			respMap.panTo(mapMarker.getPosition());
		}, 1000);
	});

	respMap.panTo(mapMarker.getPosition());

}



if (mapCanvas != null) {

	google.maps.event.addDomListener(window, 'load', mymapini);



}





(function ($) {
	"use strict";

	/* Init Elementor Front Scripts */
	$(window).on('elementor/frontend/init', function () {

		// Widgets
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ryancv-testimonials.default', function() {
			/*
				Tesimonials Carousel
			*/

			var revs_slider = $(".revs-carousel .owl-carousel");
			var is_rtl = false;
			var is_autoplay = revs_slider.data('autoplay');
			var is_autoplaytime = revs_slider.data('autoplaytime');
			var is_dots = revs_slider.data('dots');
			var is_loop = revs_slider.data('loop');
			var is_rewind = revs_slider.data('rewind');
			if ($('body.rtl').length) {
				is_rtl = true;
			}
			
			revs_slider.find('.revs-item').css({'width':revs_slider.width()});

			revs_slider.owlCarousel({
				margin: 0,
				items: 1,
				autoWidth: true,
				autoplay: is_autoplay,
				autoplayTimeout: is_autoplaytime,
				loop: is_loop,
				rewind: is_rewind,
				nav: false,
				rtl: is_rtl,
				dots: is_dots,
				responsive : {
					0: {
						autoWidth: false,
					},
					1200 : {
						autoWidth: true,
					}
				}
			});
		} );

		elementorFrontend.hooks.addAction( 'frontend/element_ready/ryancv-skills.default', function() {
			/*
				Dotted Skills Line
			*/

			function skills(){
				var skills_dotted = $('.skills-list.dotted .progress');
				var skills_dotted_w = skills_dotted.width();
				if(skills_dotted.length){
					skills_dotted.append('<span class="dg"><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></span>');
					skills_dotted.find('.percentage').append('<span class="da"><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></span>');
					skills_dotted.find('.percentage .da').css({'width':skills_dotted_w});
				}
			}
			setTimeout(skills, 1000);

			/*
				Circle Skills Line
			*/

			var skills_circles = $('.skills-list.circles .progress');
			if(skills_circles.length){
				skills_circles.append('<div class="slice"><div class="bar"></div><div class="fill"></div></div>');
			}
		} );

		// Global
		elementorFrontend.hooks.addAction( 'frontend/element_ready/global', function( $scope ) {
			
		} );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/widget', function( $scope ) {
			
		} );
	});
})(jQuery);
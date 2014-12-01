$('html').removeClass('no_js');
$('html').addClass('js');

var Carousel = {

	init: function() {
		if ($('[data-carousel]').length) {
			this.build();
		}
	},

	build: function() {
		$('[data-carousel]').swiper({
			'calculateHeight': true,
			'keyboardControl': true,
			'onSwiperCreated': function(swiper) {
				Carousel.bindClickEvent();
				Carousel.highlightThumbnail(swiper);
			},
			'onSlideChangeStart': function(swiper) {
				Carousel.highlightThumbnail(swiper);
			}
		});
		this.bindDirectionNav();
	},

	bindClickEvent: function() {
		$('[data-carousel-thumbnail] button').on('click', function() {
			var $this = $(this),
				carousel = $('[data-carousel]').data('swiper');
			carousel.swipeTo($this.parent().index());
			Carousel.highlightThumbnail(carousel);
		});
	},

	highlightThumbnail: function(swiper) {
		$('[data-carousel-thumbnail] button').removeClass('highlight');
		$('[data-carousel-thumbnail] li').eq(swiper.activeIndex).find('button').addClass('highlight');
	},

	bindDirectionNav: function() {
		$('[class*="direction_"]').on('click', function(e) {

			var $this = $(this),
				thisCarousel = $('[data-carousel').data('swiper'),
				direction = $this.data('carousel-direction');

			// go to next slide else go to prev slide
			if (direction == 'next') {
				thisCarousel.swipeNext();
			} else if (direction == 'prev') {
				thisCarousel.swipePrev();
			}

			e.preventDefault();
		});
	}

};


var Utils = {

	hexHover: function() {

		$('a[class*="anchor_"]').on({
			'mouseenter focus': function() {
				$(this).parent().addClass('hover');
			},
			'mouseleave blur': function() {
				$(this).parent().removeClass('hover');
			}
		});

	},

	addCurrent: function() {
		$('.Calendar').find('a[title="Calendar"]').parent().addClass('current');
		$('.page_calendar').find('a[title="Calendar"]').parent().addClass('current');
	},

	addPlaceholder: function() {
		$('#MemberLoginForm_LoginForm_Email').attr('placeholder', 'Username');
		$('#MemberLoginForm_LoginForm_Password').attr('placeholder', 'Password');
	}

};

var Main = {
	run: function() {
		Utils.hexHover();
		Utils.addCurrent();
		Carousel.init();
	}
};

$(document).ready(Main.run());

jQuery.extend(jQuery.easing, {
	easeInOutQuad: function(x, t, b, c, d) {
		if ((t /= d / 2) < 1) return c / 2 * t * t + b;
		return -c / 2 * ((--t) * (t - 2) - 1) + b;
	}
});

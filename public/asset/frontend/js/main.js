//Global var
var CRUMINA = {};

(function ($) {

	// USE STRICT
	"use strict";

	//----------------------------------------------------/
	// Predefined Variables
	//----------------------------------------------------/
	var $window = $(window),
		$document = $(document),
		$body = $('body'),

		//Elements
		$pie_chart = $('.pie-chart'),
		$header = $('#site-header'),
		$counter = $('.counter'),
		$countdown = $('.crumina-countdown'),
		$countdown_number = $('.crumina-countdown-number'),
		$progress_bar = $('.crumina-skills-item'),
		$primaryMenu = $('#primary-menu'),
		$preloader = $('#hellopreloader');


	/* -----------------------
	 * Preloader
	 * --------------------- */

	CRUMINA.preloader = function () {
		$window.scrollTop(0);
		setTimeout(function () {
			$preloader.fadeOut(800);
		}, 500);
		return false;
	};

	/* -----------------------
	 * Spinner animation
	 * https://codepen.io/funxer/pen/Zvjebx
	 * --------------------- */

	CRUMINA.spinnerAnimation = function () {
		var canvas = document.getElementById("can");
		var ctx = canvas.getContext("2d");
		var points = [];
		var fov = 100;
		var dist = 100;
		var opacity = 1;
		var particleSize = 1.5;
		var maxAmplitude = 1500; // Best results with values > 500
		var sideLength = 50; // How many particles per side
		var spacing = 200; // Particle distance from each other

		var rotXCounter = 0;
		var rotYCounter = 0;
		var rotZCounter = 0;
		var counter = 0;

		canvas.width = window.innerWidth;
		canvas.height = window.innerHeight;

		function Vector3(x, y, z) {
			this.x = x;
			this.y = y;
			this.z = z;
			this.color = "#0D0";
		}

		Vector3.prototype.rotateX = function (angle) {
			var z = this.z * Math.cos(angle) - this.x * Math.sin(angle);
			var x = this.z * Math.sin(angle) + this.x * Math.cos(angle);
			return new Vector3(x, this.y, z);
		};

		Vector3.prototype.rotateY = function (angle) {
			var y = this.y * Math.cos(angle) - this.z * Math.sin(angle);
			var z = this.y * Math.sin(angle) + this.z * Math.cos(angle);
			return new Vector3(this.x, y, z);
		};
		Vector3.prototype.rotateZ = function (angle) {
			var x = this.x * Math.cos(angle) - this.y * Math.sin(angle);
			var y = this.x * Math.sin(angle) + this.y * Math.cos(angle);
			return new Vector3(x, y, this.z);
		};

		Vector3.prototype.perspectiveProjection = function (fov, viewDistance) {
			var factor = fov / (viewDistance + this.z);
			var x = this.x * factor + canvas.width / 2;
			var y = this.y * factor + canvas.height / 2;
			return new Vector3(x, y, this.z);
		};
		Vector3.prototype.draw = function () {
			var frac = this.y / maxAmplitude;
			var r = 255;
			var g = 186;
			var b = 0;
			var vec = this.rotateX(rotXCounter).rotateY(rotYCounter).rotateZ(rotZCounter).perspectiveProjection(fov, dist);

			this.color = "rgb(" + r + ", " + g + ", " + b;
			ctx.fillStyle = this.color;
			ctx.fillRect(vec.x, vec.y, particleSize, particleSize);
		};

// Init
		for (var z = 0; z < sideLength; z++) {
			for (var x = 0; x < sideLength; x++) {
				var xStart = -(sideLength * spacing) / 2;
				points.push(
					new Vector3(xStart + x * spacing, 0, xStart + z * spacing));

			}
		}

		(function loop() {
			ctx.fillStyle = "rgba(22, 24, 29, " + opacity + ")";
			ctx.fillRect(0, 0, canvas.width, canvas.height);

			for (var i = 0, max = points.length; i < max; i++) {
				var _x = i % sideLength;
				var _z = Math.floor(i / sideLength);
				var xFinal = Math.sin(_x / sideLength * 4 * Math.PI + counter);
				var zFinal = Math.cos(_z / sideLength * 4 * Math.PI + counter);
				var gap = maxAmplitude * 0.3;
				var amp = maxAmplitude - gap;

				points[_z * sideLength + _x].y = maxAmplitude + xFinal * zFinal * amp;

				points[i].draw();
			}
			counter += 0.03;

			rotXCounter += 0.005;
			rotYCounter += 0.005;
			//rotZCounter += 0.005;

			window.requestAnimationFrame(loop);
		})();
	};


	/* -----------------------
	 * Flying Balls
	 * Author : Vincent Garreau  - vincentgarreau.com
	 * MIT license: http://opensource.org/licenses/MIT
	 * Demo / Generator : vincentgarreau.com/particles.js
	 * --------------------- */

	CRUMINA.flyingBalls = function () {

		setTimeout(function () {
			$('.particles-js').each(function () {
				var id = 'particle-' + (Math.floor(Math.random() * (999 - 111 + 1)) + 111);
				$(this).attr('id', id);
				particlesJS.load(id, './js/' + $(this).data('settings') + '.json', function () {
				});
			});
		}, 500);
	};


	/* -----------------------
     * Fixed Header
     * --------------------- */

	CRUMINA.fixedHeader = function () {
		// grab an element
		$header.headroom(
			{
				"offset": 10,
				"tolerance": 5,
				"classes": {
					"initial": "animated",
					"pinned": "slideDown",
					"unpinned": "slideUp"
				}
			}
		);
	};

	//Scroll to top.
	jQuery('.back-to-top').on('click', function () {
		$('html,body').animate({
			scrollTop: 0
		}, 1200);
		return false;
	});


	/* -----------------------
     * COUNTER NUMBERS
     * --------------------- */

	CRUMINA.counters = function () {
		if ($counter.length) {
			$counter.each(function () {
				jQuery(this).waypoint(function () {
					$(this.element).find('span').countTo();
					this.destroy();
				}, {offset: '95%'});
			});
		}
	};


	/* -----------------------
     * COUNTDOWN
     * --------------------- */

	CRUMINA.countdowns = function () {

		$countdown.each(function () {
			$(this).TimeCircles({
				circle_bg_color: '#15171c',
				animation_interval: 'ticks',
				fg_width: 0.05,
				bg_width: 1.2,
				number_size: 0.36,
				text_size: 0.16,

				time: {
					Days: {color: '#ffba00'},
					Hours: {color: '#ffba00'},
					Minutes: {color: '#ffba00'},
					Seconds: {color: '#ffba00'}
				}
			});

		});

		$countdown_number.each(function () {
			$(this).TimeCircles({
				circle_bg_color: 'transparent',
				animation_interval: 'ticks',
				number_size: 0.46,
				text_size: 0.12,

				time: {
					Days: {color: 'transparent'},
					Hours: {color: 'transparent'},
					Minutes: {color: 'transparent'},
					Seconds: {color: 'transparent'}
				}
			});

		});
	};


	/* -----------------------------
	 * Isotope sorting
	 * ---------------------------*/

	CRUMINA.IsotopeSort = function () {
		var $container = $('.sorting-container');
		$container.each(function () {
			var $current = $(this);
			var layout = ($current.data('layout').length) ? $current.data('layout') : 'masonry';
			$current.isotope({
				itemSelector: '.sorting-item',
				layoutMode: layout,
				percentPosition: true
			});

			$current.imagesLoaded().progress(function () {
				$current.isotope('layout');
			});

			var $sorting_buttons = $current.siblings('.sorting-menu').find('li');

			$sorting_buttons.on('click', function () {
				if ($(this).hasClass('active')) return false;
				$(this).parent().find('.active').removeClass('active');
				$(this).addClass('active');
				var filterValue = $(this).data('filter');
				if (typeof filterValue != "undefined") {
					$current.isotope({filter: filterValue});
					return false;
				}
			});
		});
	};

	/* -----------------------------
     * Embedded Video in pop up
     * ---------------------------*/
	CRUMINA.mediaPopups = function () {
		$('.js-popup-iframe').magnificPopup({
			disableOn: 700,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,

			fixedContentPos: false
		});
		$('.js-zoom-image, .link-image').magnificPopup({
			type: 'image',
			removalDelay: 500, //delay removal by X to allow out-animation
			callbacks: {
				beforeOpen: function () {
					// just a hack that adds mfp-anim class to markup
					this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
					this.st.mainClass = 'mfp-zoom-in';
				}
			},
			closeOnContentClick: true,
			midClick: true
		});
	};

	/* -----------------------
     * Progress bars Animation
     * --------------------- */

	CRUMINA.progresBars = function () {
		if ($progress_bar.length) {
			$progress_bar.each(function () {
				jQuery(this).waypoint(function () {
					$(this.element).find('.count-animate').countTo();
					$(this.element).find('.skills-item-meter-active').fadeTo(300, 1).addClass('skills-animate');
					this.destroy();
				}, {offset: '90%'});
			});
		}
	};

	/* -----------------------
	 * Pie chart Animation
	 * --------------------- */

	CRUMINA.pieCharts = function () {
		if ($pie_chart.length) {
			$pie_chart.each(function () {
				jQuery(this).waypoint(function () {
					var current_cart = $(this.element);
					var startColor = current_cart.data('start-color');
					var endColor = current_cart.data('end-color');
					var counter = current_cart.data('value') * 100;

					current_cart.circleProgress({
						thickness: 16,
						startAngle: -Math.PI / 4 * 2,
						emptyFill: 'transparent',
						lineCap: 'round',
						fill: {
							gradient: [startColor, endColor],
							gradientAngle: Math.PI / 4
						}
					}).on('circle-animation-progress', function (event, progress) {
						current_cart.find('.content').html(parseInt(counter * progress, 10) + '<span>%</span>'
						)
					}).on('circle-animation-end', function () {

					});
					this.destroy();

				}, {offset: '90%'});
			});
		}
	};


	/* -----------------------------
	* Sliders and Carousels
	* ---------------------------*/

	CRUMINA.Swiper = {
		$swipers: {},
		init: function () {
			var _this = this;
			$('.swiper-container').each(function (idx) {
				var $self = $(this);
				var id = 'swiper-unique-id-' + idx;
				$self.addClass(id + ' initialized').attr('id', id);
				$self.closest('.crumina-module').find('.swiper-pagination').addClass('pagination-' + id);

				_this.$swipers[id] = new Swiper('#' + id, _this.getParams($self, id));
				_this.addEventListeners(_this.$swipers[id]);
			});
		},
		getParams: function ($swiper, id) {
			var params = {
				parallax: true,
				breakpoints: false,
				keyboardControl: true,
				setWrapperSize: true,
				preloadImages: true,
				updateOnImagesReady: true,
				prevNext: ($swiper.data('prev-next')) ? $swiper.data('prev-next') : false,
				changeHandler: ($swiper.data('change-handler')) ? $swiper.data('change-handler') : '',
				direction: ($swiper.data('direction')) ? $swiper.data('direction') : 'horizontal',
				mousewheelControl: ($swiper.data('mouse-scroll')) ? $swiper.data('mouse-scroll') : false,
				mousewheelReleaseOnEdges: ($swiper.data('mouse-scroll')) ? $swiper.data('mouse-scroll') : false,
				slidesPerView: ($swiper.data('show-items')) ? $swiper.data('show-items') : 1,
				slidesPerGroup: ($swiper.data('scroll-items')) ? $swiper.data('scroll-items') : 1,
				spaceBetween: ($swiper.data('space-between') || $swiper.data('space-between') == 0) ? $swiper.data('space-between') : 20,
				centeredSlides: ($swiper.data('centered-slider')) ? $swiper.data('centered-slider') : false,
				autoplay: ($swiper.data('autoplay')) ? parseInt($swiper.data('autoplay'), 10) : 0,
				autoHeight: ($swiper.hasClass('auto-height')) ? true : false,
				loop: ($swiper.data('loop') == false) ? $swiper.data('loop') : true,
				effect: ($swiper.data('effect')) ? $swiper.data('effect') : 'slide',
				pagination: {
					type: ($swiper.data('pagination')) ? $swiper.data('pagination') : 'bullets',
					el: '.pagination-' + id,
					clickable: true
				},
				coverflow: {
					stretch: ($swiper.data('stretch')) ? $swiper.data('stretch') : 0,
					depth: ($swiper.data('depth')) ? $swiper.data('depth') : 0,
					slideShadows: false,
					rotate: 0,
					modifier: 2,
				},
				fade: {
					crossFade: ($swiper.data('crossfade')) ? $swiper.data('crossfade') : true
				},
			}

			if (params['slidesPerView'] > 1) {
				params['breakpoints'] = {
					480: {
						slidesPerView: 1,
						slidesPerGroup: 1
					},
					768: {
						slidesPerView: 2,
						slidesPerGroup: 2
					}
				};
			}

			return params;
		},
		addEventListeners: function ($swiper) {
			var _this = this;
			var $wrapper = $swiper.$el.closest('.crumina-module-slider');

			//Prev Next clicks
			if ($swiper.params.prevNext) {
				$wrapper.on('click', '.swiper-btn-next, .swiper-btn-prev', function (event) {
					event.preventDefault();
					var $self = $(this);

					if ($self.hasClass('swiper-btn-next')) {
						$swiper.slideNext();
					} else {
						$swiper.slidePrev();
					}
				});
			}

			//Thumb/times clicks
			$wrapper.on('click', '.slider-slides .slides-item', function (event) {
				event.preventDefault();
				var $self = $(this);
				if ($swiper.params.loop) {
					$swiper.slideToLoop($self.index());
				} else {
					$swiper.slideTo($self.index());
				}
			});

			//Times clicks
			$wrapper.on('click', '.time-line-slides .slides-item', function (event) {
				event.preventDefault();
				var $self = $(this);
				_this.changes.timeLine($swiper, $wrapper, _this, $self.index());
			});

			//Run handler after change slide
			$swiper.on('slideChange', function () {
				var handler = _this.changes[$swiper.params.changeHandler];
				if (typeof handler === 'function') {
					handler($swiper, $wrapper, _this, this.realIndex);
				}
			});
		},
		changes: {
			'thumbsParent': function ($swiper, $wrapper) {
				var $thumbs = $wrapper.find('.slider-slides .slides-item');
				$thumbs.removeClass('swiper-slide-active');
				$thumbs.eq($swiper.realIndex).addClass('swiper-slide-active');
			},
			'timeParent': function ($swiper, $wrapper, main, index) {
				var timeSwiperId = $wrapper.find('.swiper-time-line').attr('id');
				var $timeSwiper = main.$swipers[timeSwiperId];
				$timeSwiper.slideTo(index);
				main.changes.timeLine($timeSwiper, $wrapper, main, index);
			},
			'timeLine': function ($swiper, $wrapper, main, index) {
				var $times = $swiper.$el.find('.swiper-slide');
				var $active = $times.eq(index);

				if ($active.hasClass('time-active')) {
					return;
				}

				$times.removeClass('time-active');
				$active.addClass('time-active').removeClass('visited');
				$active.prevAll('.swiper-slide').addClass('visited');
				$active.nextAll('.swiper-slide').removeClass('visited');
			}
		}
	};


	$('.js-open-popup').on('click', function () {
		$(this).closest('.has-popup').find('.window-popup').toggleClass('active');
		$body.toggleClass('popup-active');
		return false;
	});


	// Ion.RangeSlider
	// version 2.2.0 Build: 380
	// © Denis Ineshin, 2017
	// https://github.com/IonDen
	//
	// Project page:    http://ionden.com/a/plugins/ion.rangeSlider/en.html
	// GitHub page:     https://github.com/IonDen/ion.rangeSlider
	//
	// Released under MIT licence:
	// http://ionden.com/a/plugins/licence-en.html

	CRUMINA.rangeSlider = function () {
		$(".range-slider-js").ionRangeSlider({
				type: "double",
				grid: true,
				min: 0,
				max: 1000,
				from: 200,
				to: 800,
				prefix: "$"
			}
		);
	};


	/* -----------------------------
     * Select2 Initialization
     * https://select2.org/getting-started/basic-usage
     * ---------------------------*/

	CRUMINA.select2Init = function () {
		$('.woox--select').select2();
	};

	/* -----------------------------
     * Select2 for Language Switcher Initialization
     * https://select2.org/getting-started/basic-usage
     * ---------------------------*/

	CRUMINA.select2LS = function () {
		var $switcher = $( '.language-switcher' );
		$switcher.select2( {
			templateResult: formatOptions
		} );

		$switcher.on( 'select2:select', function ( e ) {
			var data = e.params.data;
			var $self = jQuery(data.element);
			if ( !$self.length || data.selected !== true || data.disabled === true ) {
				return;
			}

			var href = $self.data('href');

			if(href){
				location.href = href;
			}

		} );
	};


	function formatOptions(state) {
		if (!state.id) {
			return state.text;
		}
		var $state = $(
			'<span ><img class="woox-icon" sytle="display: inline-block;" src="img/' + state.element.value.toLowerCase() + '.png" /> ' + state.text + '</span>'
		);
		return $state;
	}



	/* -----------------------------
		 * Dropdown For Sorting Menu
		 * ---------------------------*/

	$(".custom-dropdown").on("click", ".init", function () {
		$(this).closest(".custom-dropdown").children('li:not(.init)').toggle();
	});

	var allOptions = $(".custom-dropdown").children('li:not(.init)');
	$(".custom-dropdown").on("click", "li:not(.init)", function () {
		allOptions.removeClass('selected');
		$(this).addClass('selected');
		$(".custom-dropdown").children('.init').html($(this).html());
		allOptions.toggle();
	});


	/* -----------------------------
	 * Overlay Menu
	 * https://codepen.io/KingKabir/pen/QyPwgG
	 * ---------------------------*/

	CRUMINA.overlayMenu = function () {
		$('.js-open-aside').click(function () {
			$('body').toggleClass('popup-active');
			$('#overlay-menu').toggleClass('open');
		});
	};

	/* -----------------------------
	 * Overlay for Body
	 * ---------------------------*/

	CRUMINA.overlayBody = function () {
		$('.js-body-overlay').click(function () {
			$('body').toggleClass('body-overlay-active');
		});
	};

	/* -----------------------------
     * Material design js effects
     * Script file: material.min.js
     * Documentation about used plugin:
     * http://demos.creative-tim.com/material-kit/components-documentation.html
     * ---------------------------*/

	CRUMINA.Materialize = function () {
		$.material.init();

		$('.checkbox > label').on('click', function () {
			$(this).closest('.checkbox').addClass('clicked');
		});

		var $picker = $('.datepicker');
		$picker.each(function () {
			var $self = jQuery(this);

			$self.datepicker().on('changeDate', function (ev) {
				$self.datepicker('hide');
			});

		});

	};


	CRUMINA.mainMenu = {
		$links: null,
		init: function () {
			this.$links = $('.overlay-menu-list > .overlay-menu-item');
		},
		addEventListeners: function () {
			var _this = this;

			this.removeEventListeners();
			if (CRUMINA.isTouch()) {

				$(document).on('click.menu', function (event) {
					var $self = $(event.target);
					if (!$self.closest('.overlay-menu-item').length && !$self.hasClass('overlay-menu-item')) {
						_this.$links.find('.sub-menu').removeClass('open');
					}
				});

				this.$links.on('click.menu', function () {
					var $self = $(this);
					var $subMenu = $self.find('.sub-menu');
					if ($subMenu.hasClass('open')) {
						$subMenu.removeClass('open');
						return;
					}

					_this.$links.find('.sub-menu').removeClass('open');
					$self.find('.sub-menu').addClass('open');
				});
			} else {
				this.$links.on('mouseenter.menu mouseleave.menu', function (event) {
					var $self = $(this);
					if (event.type === 'mouseenter') {
						$self.find('.sub-menu').addClass('open');
					}
					if (event.type === 'mouseleave') {
						$self.find('.sub-menu').removeClass('open');
					}
				});
			}
		},
		removeEventListeners: function () {
			$(document).off(".menu");
			this.$links.off(".menu");
		}
	};

	CRUMINA.isTouch = function () {
		if (navigator.userAgent.match(/Android/i)
			|| navigator.userAgent.match(/webOS/i)
			|| navigator.userAgent.match(/iPhone/i)
			|| navigator.userAgent.match(/iPad/i)
			|| navigator.userAgent.match(/iPod/i)
			|| navigator.userAgent.match(/BlackBerry/i)
			|| navigator.userAgent.match(/Windows Phone/i)
		) {
			return true;
		} else {
			return false;
		}
	};


	CRUMINA.updateResponsiveInit = function () {
		var resizeTimer = null;
		var resize = function () {
			resizeTimer = null;

			// Methods
			CRUMINA.mainMenu.addEventListeners();
		};

		$(window).on('resize', function () {
			if (resizeTimer === null) {
				resizeTimer = window.setTimeout(function () {
					resize();
				}, 200);
			}
		}).resize();
	};

	/* -----------------------
		 * Chart Staistics
		 * Highcharts JS v6.1.4 (2018-09-25)
 			(c) 2009-2016 Torstein Honsi
 			License: www.highcharts.com/license
	* --------------------- */

	CRUMINA.chartStatistics = function () {
		var seriesOptions = [],
			seriesCounter = 0,
			names = [
				{
					name: 'MarketCap',
					color: '#3a3e48'
				},
				{
					name: 'Ethereum',
					color: '#2a2e36'
				},
				{
					name: 'WOOX',
					color: '#ffba00'
				}
			];

		/**
		 * Create the chart when all data is loaded
		 * @returns {undefined}
		 */

		CRUMINA.elementChart = function () {

			setTimeout(function () {
				$('.js-chart-statistic').each(function () {
					var id = 'chart-' + (Math.floor(Math.random() * (999 - 111 + 1)) + 111);
					$(this).attr('id', id);
					Highcharts.stockChart(id, {

						credits:
							{
								enabled: false
							},

						chart: {
							backgroundColor: '#181a20',
						},
						rangeSelector: {
							buttons: [{
								type: 'day',
								count: 1,
								text: '1d'
							}, {
								type: 'week',
								count: 1,
								text: '1w'
							}, {
								type: 'month',
								count: 1,
								text: '1m'
							}, {
								type: 'month',
								count: 3,
								text: '3m'
							}, {
								type: 'year',
								count: 1,
								text: '1y'
							}, {
								type: 'all',
								text: 'All'
							}],

							inputEnabled: false,
						},

						navigator: {
							enabled: false
						},
						scrollbar: {
							enabled: false
						},

						xAxis: {
							lineColor: '#21232b',
							gridLineColor: '#21232b',
							gridLineWidth: 1
						},

						yAxis: {
							min: 0,
							gridLineColor: '#21232b',
							gridLineWidth: 2,

							title: {
								text: 'Price (USD)'
							},
							labels: {
								format: '{value} $'
							},
							plotLines: [{
								value: 0,
								width: 2,
								color: 'silver'
							}]
						},

						plotOptions: {
							series: {
								compare: 'value',
								showInNavigator: true,
								lineWidth: 4,
								colorIndex: 20
							}
						},

						tooltip: {
							pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.change}%)<br/>',
							valueDecimals: 2,
							split: true
						},

						series: seriesOptions,
					})
				});
			}, 500);
		};

		$.each(names, function (i, item) {

			$.getJSON('json/' + item.name.toLowerCase() + '-c.json', function (data) {

				seriesOptions[i] = {
					name: item.name,
					data: data,
					color: item.color
				};

				// As we're loading the data asynchronously, we don't know what order it will arrive. So
				// we keep a counter and create the chart when all the data is loaded.
				seriesCounter += 1;

				if (seriesCounter === names.length) {
					CRUMINA.elementChart();
				}
			});
		});
	}

	/* -----------------------
     * SmoothScroll
     * --------------------- */

	CRUMINA.initSmoothScroll = function () {

		// Cut the mustard
		var supports = 'querySelector' in document && 'addEventListener' in window;
		if (!supports) return;

		// Get all Toggle selectors
		var anchors = $('#primary-menu a[href*=\\#], .btn[href*=\\#]').filter(function () {
			return $(this).is(":not([href=\\#])");
		});

		// Add smooth scroll to all anchors
		for (var i = 0, len = anchors.length; i < len; i++) {
			var url = new RegExp(window.location.hostname + window.location.pathname);
			if (!url.test(anchors[i].href)) continue;
			anchors[i].setAttribute('data-scroll', true);
		}

		if (window.location.hash) {
			var anchor = document.querySelector(window.location.hash); // Get the anchor
			var toggle = document.querySelector('a[href*="' + window.location.hash + '"]'); // Get the toggle (if one exists)
			var options = {}; // Any custom options you want to use would go here
			smoothScroll.animateScroll(anchor, toggle, options);
		}

		smoothScroll.init({
			selector: '[data-scroll]',
			speed: 500, // Integer. How fast to complete the scroll in milliseconds
			easing: 'easeOutQuad', // Easing pattern to use
			offset: $header.height(),
			updateURL: true, // Boolean. If true, update the URL hash on scroll
			callback: function (anchor, toggle) {
			} // Function to run after scrolling
		});

		$('#primary-menu').find('[href=\\#]').on('click', function () {
			return false
		})

	};


	CRUMINA.shareButtons = function () {

		$('.btn--share-js').on('click', function () {
			var $this = $(this);

			if ($this.hasClass('open')) {
				$this.removeClass('open');
			} else {
				$this.toggleClass('open');
			}
		});

		$('.btn--share-js a').on('click', function (e) {
			var $links = $(this);

			if (!$links.closest('.btn--share-js').hasClass('open')) {
				e.preventDefault();
			} else {
				window.Sharer.init();
			}
		});

	};

	/* -----------------------
		 * Animation for open-menu-button
		 * --------------------- */

	CRUMINA.burgerAnimation = function () {
		/* In animations (to close icon) */

		var beginAC = 80,
			endAC = 320,
			beginB = 80,
			endB = 320;

		function inAC(s) {
			s.draw('80% - 240', '80%', 0.3, {
				delay: 0.1,
				callback: function () {
					inAC2(s)
				}
			});
		}

		function inAC2(s) {
			s.draw('100% - 545', '100% - 305', 0.6, {
				easing: ease.ease('elastic-out', 1, 0.3)
			});
		}

		function inB(s) {
			s.draw(beginB - 60, endB + 60, 0.1, {
				callback: function () {
					inB2(s)
				}
			});
		}

		function inB2(s) {
			s.draw(beginB + 120, endB - 120, 0.3, {
				easing: ease.ease('bounce-out', 1, 0.3)
			});
		}

		/* Out animations (to burger icon) */

		function outAC(s) {
			s.draw('90% - 240', '90%', 0.1, {
				easing: ease.ease('elastic-in', 1, 0.3),
				callback: function () {
					outAC2(s)
				}
			});
		}

		function outAC2(s) {
			s.draw('20% - 240', '20%', 0.3, {
				callback: function () {
					outAC3(s)
				}
			});
		}

		function outAC3(s) {
			s.draw(beginAC, endAC, 0.7, {
				easing: ease.ease('elastic-out', 1, 0.3)
			});
		}

		function outB(s) {
			s.draw(beginB, endB, 0.7, {
				delay: 0.1,
				easing: ease.ease('elastic-out', 2, 0.4)
			});
		}

		/* Scale functions */

		function addScale(m) {
			m.className = 'menu-icon-wrapper scaled';
		}

		function removeScale(m) {
			m.className = 'menu-icon-wrapper';
		}

		/* Awesome burger scaled */

		var pathD = document.getElementById('pathD'),
			pathE = document.getElementById('pathE'),
			pathF = document.getElementById('pathF'),
			segmentD = new Segment(pathD, beginAC, endAC),
			segmentE = new Segment(pathE, beginB, endB),
			segmentF = new Segment(pathF, beginAC, endAC),
			wrapper2 = document.getElementById('menu-icon-wrapper'),
			trigger2 = document.getElementById('menu-icon-trigger'),
			toCloseIcon2 = true;

		wrapper2.style.visibility = 'visible';

		trigger2.onclick = function () {
			addScale(wrapper2);
			if (toCloseIcon2) {
				inAC(segmentD);
				inB(segmentE);
				inAC(segmentF);
			} else {
				outAC(segmentD);
				outB(segmentE);
				outAC(segmentF);

			}
			toCloseIcon2 = !toCloseIcon2;
			setTimeout(function () {
				removeScale(wrapper2)
			}, 450);
		};
	};


	// Close on "Esc" click
	$window.keydown(function (eventObject) {
		if (eventObject.which == 27) {
			$('#overlay-menu').removeClass('open');
			$body.removeClass('popup-active');
			$('.window-popup').removeClass('active');
			$('body').removeClass('body-overlay-active');
		}
	});


	/* -----------------------
  * Create the map
  * https://leafletjs.com/
  * --------------------- */

	CRUMINA.maps = {
		maps: {
			mapMain: {

				config: {
					id: 'map',
					map: {
						center: new L.LatLng(-37.613611, 144.963056),
						zoom: 10,
						maxZoom: 18,
						layers: new L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
							attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
							subdomains: 'abcd',
							maxZoom: 19
						})
					},
					icon: {
						iconSize: [70, 87],
						iconAnchor: [22, 94],
						className: 'icon-map'
					},
					cluster: {
						iconSize: [40, 40]
					}
				},

				markers: [
					{
						coords: [-37.813611, 144.963056],
						icon: 'marker-google.png'
					}
				]

			},
		},
		init: function () {
			var _this = this;

			for (var key in this.maps) {
				var data = this.maps[key];

				if (!data.config || !data.markers) {
					continue;
				}

				if (!document.getElementById(data.config.id)) {
					continue;
				}

				var map = new L.map(data.config.id, data.config.map);
				var cluster = L.markerClusterGroup({
					iconCreateFunction: function (cluster) {
						var childCount = cluster.getChildCount();
						var config = data.config.cluster;
						return new L.DivIcon({
							html: '<div><span>' + childCount + '</span></div>',
							className: 'marker-cluster marker-cluster-' + key,
							iconSize: new L.Point(config.iconSize[0], config.iconSize[1])
						});
					}
				});
				data.markers.forEach(function (item) {
					data.config.icon['iconUrl'] = './img/' + item.icon;
					var icon = L.icon(data.config.icon);

					var marker = L.marker(item.coords, {icon: icon});
					cluster.addLayer(marker);
				});

				map.addLayer(cluster);
				this.disableScroll(jQuery("#" + data.config.id), map);
			}
		},
		disableScroll: function ($map, map) {
			map.scrollWheelZoom.disable();

			$map.bind('mousewheel DOMMouseScroll', function (event) {
				event.stopPropagation();
				if (event.ctrlKey == true) {
					event.preventDefault();
					map.scrollWheelZoom.enable();
					setTimeout(function () {
						map.scrollWheelZoom.disable();
					}, 1000);
				} else {
					map.scrollWheelZoom.disable();
				}
			});

		}
	};

	$document.ready(function () {


		if ($('#menu-icon-wrapper').length) {
			CRUMINA.burgerAnimation();
		}

		// 3-d party libs run
		$primaryMenu.crumegamenu({
			showSpeed: 0,
			hideSpeed: 0,
			trigger: "hover",
			animation: "drop-up",
			effect: "fade",
			indicatorFirstLevel: "",
			indicatorSecondLevel: ""
		});

		CRUMINA.fixedHeader();
		CRUMINA.Materialize();
		CRUMINA.Swiper.init();
		CRUMINA.select2Init();
		CRUMINA.select2LS();
		CRUMINA.mediaPopups();
		CRUMINA.IsotopeSort();
		CRUMINA.overlayMenu();
		CRUMINA.overlayBody();
		CRUMINA.flyingBalls();
		CRUMINA.maps.init();
		CRUMINA.countdowns();
		CRUMINA.initSmoothScroll();
		CRUMINA.shareButtons();
		CRUMINA.rangeSlider();

		if ($('#can').length) {
			CRUMINA.spinnerAnimation();
		}

		if ($('.js-chart-statistic').length) {
			CRUMINA.chartStatistics();
		}

		// On Scroll animations.
		CRUMINA.progresBars();
		CRUMINA.pieCharts();
		CRUMINA.counters();

		$('.perfect-scroll').perfectScrollbar({wheelPropagation: false});

		CRUMINA.mainMenu.init();
		CRUMINA.updateResponsiveInit();
		CRUMINA.preloader();

		$('.mCustomScrollbar').perfectScrollbar({wheelPropagation: false});
	});

})(jQuery);
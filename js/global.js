/*!
 * Script for initializing globally-used functions and libs.
 *
 * @since 1.0.0
 */
 (function($) {

 	var cascade = {

 		// Cache selectors
	 	cache: {
			$document: $(document),
			$window: $(window),
		},

		// Init functions
		init: function() {

			this.bindEvents();

		},

		// Bind Elements
		bindEvents: function() {

			var self = this;

			self.navigationInit();

			this.cache.$document.on( 'ready', function() {

				self.fitVidsInit();

			} );

			// Handle Navigation on Resize
			this.cache.$window.on( 'resize', self.debounce(
				function() {

					// Remove any inline styles that may have been added to menu
					$('.main-navigation .menu').attr('style','');
					$('.main-navigation').find('.children, .sub-menu').each( function(){
		    			$(this).attr('style','');
					});

					$('.main-navigation').find('.dropdown-toggle').each( function(){
						$(this).removeClass('toggled');
					});

				}, 200 )
			);

			// Handle Masonry on Resize
			this.cache.$window.on( 'resize', self.debounce(
				function() {

					if ( self.cache.masonry ) {
						self.masonryInit();
					}

				}, 200 )
			);

		},

		/**
		 * Initialize the mobile menu functionality.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		navigationInit: function() {

			// Add dropdown toggle to display child menu items
			$('.main-navigation .menu > .menu-item-has-children').append( '<span class="dropdown-toggle" />');

			// When mobile menu is tapped/clicked
			$('.menu-toggle').on( 'click', function() {
				var menu = $(this).data('toggle');
				$(menu).toggle();
			});

			// When mobile submenu is tapped/clicked
			$('.dropdown-toggle').on( 'click', function() {
				var $submenu = $(this).parent().find('.children,.sub-menu'),
					$toggle = $(this);
				$submenu.toggle( 0, function() {
					$toggle.toggleClass('toggled');
				});
			});

		},

		// Initialize FitVids
		fitVidsInit: function() {

			// Make sure lib is loaded.
			if (!$.fn.fitVids) {
				return;
			}

			// Run FitVids
			$('.hentry').fitVids();
		},

		/**
		 * Debounce function.
		 *
		 * @since  1.0.0
		 * @link http://remysharp.com/2010/07/21/throttling-function-calls
		 *
		 * @return void
		 */
		debounce: function(fn, delay) {
			var timer = null;
			return function () {
				var context = this, args = arguments;
				clearTimeout(timer);
				timer = setTimeout(function () {
					fn.apply(context, args);
				}, delay);
			};
		}

 	};

 	cascade.init();

 })(jQuery);

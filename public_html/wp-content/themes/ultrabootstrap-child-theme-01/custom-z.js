$(document).ready(function() {
	if ( $('.tmcp-field-wrap').hasClass("tc-active") ) {
		console.log('asffas');
	}
});

(function($, window, document, undefined) {
	
	var APP = {
		localized: function(data) {
		  return zapalgoscripts[data];
		},
		country_based_currency: function() {
			var countries_usd = JSON.parse( this.localized('countries_usd') ),
				countries_pln = JSON.parse( this.localized('countries_pln') ),
				default_country = APP.localized('default_country'),
				countries = $('.countries-hidden-drop select.country_selector');
				loading_billing_country = false;
			
			_set_currency = function(country) {
				var currency = 'EUR'; 
				
				if( $.inArray( country, countries_usd ) != -1 ) {
					currency = 'USD';
				}
				
				if( $.inArray( country, countries_pln ) != -1 ) {
					currency = 'PLN';
				}
				
				return currency;
			}
			
			if( countries.val() != default_country ) {
				countries.val(default_country).trigger('change');
			}
			
			$('#set_cdc').on('click', function() {
				var country = $('#customer_default_country'),
					value = country.val(),
					currency = _set_currency(value),
					url = window.location.origin + window.location.pathname + '?&alg_currency=' + currency + '&customer_set_default_country=' + value;
					
				window.location.replace(url);
			});
			
			if( $('#billing_country').length ) {
				var	rfc = APP.localized('rfc');
				
				if( default_country ) {
					$('#billing_country').val(default_country);
					
					/*
if( $.trim( rfc ) != '' ) {
						window.location.replace(rfc);
					}
 */
					
					$('#billing_country').on('change', function() {
						var country = $(this),
							value = country.val(),
							currency_switcher = $('#alg_currency_selector');
							current_currency = currency_switcher.find('a').first().attr('id'),
							currency = _set_currency(value);

						if(current_currency) {
							if( current_currency.indexOf(currency) == -1 ) {
								url = window.location.origin + window.location.pathname + '?&alg_currency=' + currency + '&customer_set_default_country=' + value;

								window.location.replace(url);
							}
						}
					});
				}
			}
			
			
			
		},		
		currency_for_country: function() {
			$('#billing_country').on('change', function() {
				var EU = ['AT', 'BE', 'HR', 'BG', 'CY', 'CZ', 'DK', 'EE', 'FI', 'FR', 'DE', 'GR', 'HU', 'IE', 'IT', 'LV', 'LT', 'LU', 'MT', 'NL', 'PL', 'PT', 'RO', 'SK', 'SI', 'ES', 'SE', 'GB'];
				var selected = $('#billing_country').val();
				var currency = $('#alg_currency_selector');
				var cc = currency.find('a').first().attr('id');
				
				console.log(selected);
				if(EU.indexOf(selected) == -1) {
					if(cc != 'alg_currency_USD') {
						var url = window.location.origin + window.location.pathname + '?alg_currency=USD';
						window.location.replace(url);
					}
				}else {
					if(cc == 'alg_currency_USD') {
						var url = window.location.origin + window.location.pathname + '?alg_currency=EUR';
						window.location.replace(url);
					}
				}
			});
		},
		product_image_slider: function() {
			var container = $('.product-thumbnail'),
				direction = 'left';
			
			
			container.on('mouseenter mouseleave', function(e) {
				var that 	= $(this),
					inner 	= that.find('.product-thumbnail-inner'),
					imgW 	= inner.find('img').outerWidth(),
					imgs 	= inner.find('img').length,
					innerW 	= (imgW*imgs) + (imgs*3),
					offsetL = innerW-imgW;
					
				if(imgs == 1) return;
					
				if(e.type == 'mouseenter') {
					var currentOffsetL = Math.abs(parseFloat(inner.css('left'))),
						speed;
					
					if(currentOffsetL == offsetL && direction == 'left') {
						direction = 'right';	
					}
					if(currentOffsetL == 0 && direction == 'right') {
						direction = 'left';	
					}
					
					if(direction == 'left') {
						speed = (( (innerW - currentOffsetL)*imgs ) / innerW)*1500;
						inner.stop().animate({
							left: -offsetL
						}, speed);
					}else {
						speed = ((currentOffsetL + imgW)/imgW)*1500; 
						
						inner.stop().animate({
							left: 0
						}, speed);
					}
				}else {
					inner.clearQueue().stop();
				}
			});
			
			/* var dragging = false,
				holding = false,
				dragged = false,
				startPos = 0;
			container.on('mousedown', function(e) {
				e.preventDefault()
				dragging = false;
				holding = true;
				startPos = e.pageX;
			}).on('mousemove', function(e) {
				dragging = true;
				var that = $(this).find('.product-thumbnail-inner');
				if(holding === true) {
					dragged = true;
					newPos = e.pageX;
					console.log(e);
				}
			}).on('mouseup', function(e) {
				e.preventDefault();
				dragging = false;
				holding = false;
			});
			
			container.parent().on('click', function(e) {
				if(dragged === true) {
					e.preventDefault();
				}
				dragged = false;
			}); */
		},
		select_product_params: function() {
			var radio = $('.tmaccordion .tmcp-field-wrap');
			var accordions = $('.tmaccordion');
			
			radio.off('click');
			radio.on('click', function() {
				var that 		= $(this);
					selected 	= that.find('.tc-label').text();
					accordion = that.closest('.tmaccordion')
					optionLabel	= accordion.find('span.tm-epo-field-label.tm-section-label.tm-toggle')
					currentIndex = accordions.index(accordion);

					accordion.find('.selected-param').remove();
					optionLabel.append('<span class="selected-param">'+selected+'</span>');

					if (currentIndex < accordions.length - 1) {
                        accordions.eq(currentIndex + 1).find('.tcfa-angle-down').click();
                    }

					accordion.find('.tcfa-angle-up').click();
			});
		},
		block_shipping_validation: function() {
			var $shippingCheckbox = $('#ship-to-different-address-checkbox');

			if ($shippingCheckbox.length == 0) {
				return;
			}

			var $shippingAddress = $('.shipping_address');

			function updateValidation(state) {
				if (!state) {
					$shippingAddress.find('.form-row').each(function(){
						var classes = $(this).attr('class').split(/\s+/);
						var validationClasses = [];

						for(var i in classes) {
							if (classes[i].startsWith('validate-')) {
								validationClasses.push(classes[i]);
								$(this).removeClass(classes[i]);
							}
						}

						if (validationClasses.length > 0) {
                            $(this).attr('data-blocked-validation', validationClasses.join(' '));
                        }
						$(this).removeClass('woocommerce-invalid woocommerce-invalid-required-field');
					});
				} else {
					$shippingAddress.find('[data-blocked-validation]').each(function(){
						$(this).addClass($(this).attr('data-blocked-validation'));
						$(this).attr('data-blocked-validation', '');
					});
				}
			}

			if (!$shippingCheckbox.is(':checked')) {
                updateValidation(false);
			}

			$shippingCheckbox.change(function(){
				updateValidation($shippingCheckbox.is(':checked'));
			});
		},
		clear_terms_error: function(){
			$('#terms').change(function(){
				if ($(this).is(':checked')) {
					$('.terms-error').closest('.woocommerce-error').remove();
				}
			});
		}
 	};

	$(document).ready(function(e) {
		APP.localized();
		APP.country_based_currency();
        //APP.currency_for_country();
		APP.select_product_params();
		APP.block_shipping_validation();
		APP.clear_terms_error();
    });
	$(window).on('load resize', function() {
		APP.product_image_slider();
	});

})(jQuery, window, document);



(function checkJquery3avv(){
	if(window.jQuery){

		function getValue(){
			var tablecur = jQuery('.gvquoter').attr('data-curen');
			var currentcur = jQuery('.change-cur').text();
			if(tablecur) {
				if(window.res3){

					jQuery('.gvquoter').each(function(i, obj) {
						ctablecur = jQuery(this).attr('data-curen');
						if(ctablecur == currentcur) {
							var totinv24 = parseFloat(jQuery(this).find('.totinv24').attr('data-totalinvest24'));
							var totinv36 = parseFloat(jQuery(this).find('.totinv36').attr('data-totalinvest36'));
							var totinv48 = parseFloat(jQuery(this).find('.totinv48').attr('data-totalinvest48'));
							var totinv60 = parseFloat(jQuery(this).find('.totinv60').attr('data-totalinvest60'));
							var totinv72 = parseFloat(jQuery(this).find('.totinv72').attr('data-totalinvest72'));

							var duringlease24 = Math.round(parseFloat(window.res3) * 24 * 100) / 100;
							var duringlease36 = Math.round(parseFloat(window.res3) * 36 * 100) / 100;
							var duringlease48 = Math.round(parseFloat(window.res3) * 48 * 100) / 100;
							var duringlease60 = Math.round(parseFloat(window.res3) * 60 * 100) / 100;
							var duringlease72 = Math.round(parseFloat(window.res3) * 72 * 100) / 100;

							var afterlease24 = Math.round(parseFloat(duringlease24 - totinv24) * 100) / 100;
							var afterlease36 = Math.round(parseFloat(duringlease36 - totinv36) * 100) / 100;
							var afterlease48 = Math.round(parseFloat(duringlease48 - totinv48) * 100) / 100;
							var afterlease60 = Math.round(parseFloat(duringlease60 - totinv60) * 100) / 100;
							var afterlease72 = Math.round(parseFloat(duringlease72 - totinv72) * 100) / 100;

							jQuery(this).find('.repl124').text(duringlease24.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
							jQuery(this).find('.repl224').text(afterlease24.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
							jQuery(this).find('.repl136').text(duringlease36.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
							jQuery(this).find('.repl236').text(afterlease36.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
							jQuery(this).find('.repl148').text(duringlease48.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
							jQuery(this).find('.repl248').text(afterlease48.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
							jQuery(this).find('.repl160').text(duringlease60.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
							jQuery(this).find('.repl260').text(afterlease60.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
							jQuery(this).find('.repl172').text(duringlease72.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
							jQuery(this).find('.repl272').text(afterlease72.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
						}
					});
				}
				else{
					window.res3 = jQuery('.gv-calc-3').find('.gvres3').attr('data-res3');
					window.setTimeout(getValue,100);
				}
			}
		}

		jQuery.ajaxSetup({ cache: false });
		window.newcur = '';
		function submitToHubSpot() {
			var firstName = jQuery('#resubmit').attr('data-fname');
			var lastName = jQuery('#resubmit').attr('data-lname');
			var email = jQuery('#resubmit').attr('data-email');
			var location = jQuery('#resubmit').attr('data-location');
			var region = jQuery('#resubmit').attr('data-region');
			if(hub5 == 'United States') {
				var gvstate = hub4;
				var gvcountry = 'United States';
			}
			else {
				var gvstate = 'N/A';
				var gvcountry = hub4;
			}
			jQuery.post("https://forms.hubspot.com/uploads/form/v2/1972415/5b69940b-584b-49c5-81b5-d692f9e926ec",
			{
				firstname: hub1,
				email:hub3,
				state:gvstate,
				lastname:hub2,
				country:gvcountry
			}, function(data, status){
				if(status == 'success') {
					jQuery('#replacegv').html(data);
					checkJquery3avv();
					submitToHubSpot();
				}
			});

		}

		jQuery('.gv-register-form input').focusout(function() {
			regval = jQuery(this).val();
			if(jQuery(this).hasClass('gvnm')) {
				text = 'Please enter your First Name';
				gvclass = 'gvnameerrror';
			}
			else if(jQuery(this).hasClass('gvnml')) {
				text = 'Please enter your Last Name';
				gvclass = 'gvnameerrror';
			}
			else if(jQuery(this).hasClass('gvem')) {
				gvclass = 'gvemailerrror';
				if(regval.trim()) {
					if(isValidEmailAddress(regval) == false) {
						regval = '';
					}
					text = 'Please enter your correct E-mail Address';
				}
				else {
					text = 'E-mail Address cant be left empty';
				}

			}
			else {
				text = '';
				gvclass = 'noclass';
			}

			if(!regval.trim()) {
				if(!jQuery(this).hasClass('uk-form-danger')) {
					jQuery(this).addClass('uk-form-danger').removeClass('uk-form-success');
					jQuery(this).after('<div class="uk-alert uk-margin-remove uk-text-small uk-text-primary '+gvclass+'" style="padding:5px">'+text+'</div>');
				}
			}
			else  {
				jQuery(this).removeClass('uk-form-danger').addClass('uk-form-success');
				jQuery(this).next('.uk-alert').remove();
			}
		});

		jQuery(".clickers").unbind().click(function() {
			regval0 = jQuery('.gvnm').val();
			regval1 = jQuery('.gvnml').val();
			regval2 = jQuery('.gvem').val();
			regval3 = jQuery(".chosen-select :selected").text();
			regval4 = jQuery(".chosen-select :selected").parent().attr('label');
			regval5 = '';
			// regval5 = grecaptcha.getResponse();

			if(!regval0.trim() || !regval1.trim() || !regval2.trim()) {
				UIkit.notify("Some of the fields seem to be empty. Please complete correctly all fields.", {status:'danger'});
			}
			else if(isValidEmailAddress(regval2) == false) {
				UIkit.notify("E-mail address is incorrect! Please enter your actual E-mail address.", {status:'danger'});
			}
			else if(!regval3.trim()) {
				UIkit.notify("Please select your Country / State", {status:'danger'});
			}
			else if(!regval5.trim()) {
				UIkit.notify("Are you sure you're not a robot?", {status:'danger'});
			}
			else {
				jQuery('.gv-register-form').addClass('uk-text-center').html('<i class="uk-icon-spinner uk-icon-spin uk-text-warning" style="font-size:3em;"></i><div class="uk-margin-small-top">Cranking up the kraken...</div>');
				window.scrollTo(0, 0);
				jQuery.post("/calculator?task=registerUser",
				{
					fname: regval0,
					lname: regval1,
					email:regval2,
					location:regval3,
					region:regval4,
					// response:regval5
				}, function(data, status){
					if(status == 'success') {
						jQuery('#replacegv').html(data);
						checkJquery3avv();
						submitToHubSpot();
					}
				});
				jQuery.post("https://api.hubapi.com/automation/v2/workflows/1358852/enrollments/contacts/"+regval2+"?hapikey=583a77a4-a76f-4072-b54b-3a6c50306d87", {},
				function(data, status){

				}
			);
		}

		return false;
	});

	//check form
	jQuery( ".clicker" ).unbind().click(function() {

		if(!jQuery('.dothehide').is(':visible')) {
			var a = [];
			jQuery( ".gv-progress-bar-parent input" ).each(function( index ) {
				if(jQuery(this).val()) {
					if(!jQuery(this).hasClass('uk-form-danger')) {
						a.push("1");
					}
					else {
						a.push("0");
					}
				}
				else {
					a.push("0");
				}
			});
			var checkok = jQuery.inArray("0", a);
			if(checkok == -1) {
				delete window.res3;
				jQuery('.clicker').attr("disabled", true).css('color','#222');
				jQuery('.dothehide').show();
				jQuery('html, body').animate({
					scrollTop: jQuery(".dothehide").offset().top -75
				}, 1400);


				if(window.newcur.trim()) {
					curren = window.newcur;
				}
				else {
					curren = jQuery('#resubmit').attr('data-currency');
				}
				jQuery.when(
					jQuery.post("/calculator?task=completionTime",
					{
						fronts: jQuery('.uk-form input.first').val(),
						backs: jQuery('.uk-form input.second').val(),
						shirtshr: jQuery('.uk-form input.third').val(),
						printernr: jQuery('.uk-form input.fourth').val(),
						printerc: jQuery('.uk-form input.fifth').val(),
						currency: curren
					},
					function(data, status){
						setTimeout(
							function() {
								jQuery('.gv-calc-1').html(data);
							}, 1000);

						}),
						jQuery.post("/calculator?task=hourlyWages",
						{
							fronts: jQuery('.uk-form input.first').val(),
							backs: jQuery('.uk-form input.second').val(),
							shirtshr: jQuery('.uk-form input.third').val(),
							printernr: jQuery('.uk-form input.fourth').val(),
							printerc: jQuery('.uk-form input.fifth').val(),
							currency: curren
						},
						function(data, status){
							setTimeout(
								function() {
									jQuery('.gv-calc-2').html(data);
								}, 1300);


							}),
							jQuery.post("/calculator?task=totalSavings",
							{
								fronts: jQuery('.uk-form input.first').val(),
								backs: jQuery('.uk-form input.second').val(),
								shirtshr: jQuery('.uk-form input.third').val(),
								printernr: jQuery('.uk-form input.fourth').val(),
								printerc: jQuery('.uk-form input.fifth').val(),
								currency: curren
							},
							function(data, status){
								setTimeout(
									function() {
										jQuery('.gv-calc-3').html(data);
										getValue();
									}, 1600);

								}),
								jQuery.post("/calculator?task=totalSavingsYear",
								{
									fronts: jQuery('.uk-form input.first').val(),
									backs: jQuery('.uk-form input.second').val(),
									shirtshr: jQuery('.uk-form input.third').val(),
									printernr: jQuery('.uk-form input.fourth').val(),
									printerc: jQuery('.uk-form input.fifth').val(),
									currency: curren
								},
								function(data, status){
									setTimeout(
										function() {
											jQuery('.gv-calc-4').html(data);
										}, 1600);

									})
								).then(function( x ) {
									if(jQuery('#resubmit').length && !window.newcur.trim()) {
										jQuery.post("/calculator?task=saveQuote",
										{
											fronts: jQuery('.uk-form input.first').val(),
											backs: jQuery('.uk-form input.second').val(),
											shirtshr: jQuery('.uk-form input.third').val(),
											printernr: jQuery('.uk-form input.fourth').val(),
											printerc: jQuery('.uk-form input.fifth').val(),
											currency: jQuery('#resubmit').attr('data-currency'),
											themail: jQuery('#resubmit').attr('data-email')
										},
										function(data, status){

										});
										jQuery.post("https://api.hubapi.com/automation/v2/workflows/1586178/enrollments/contacts/"+jQuery('#resubmit').attr('data-email')+"?hapikey=583a77a4-a76f-4072-b54b-3a6c50306d87", {},
										function(data, status){

										}
									);

									window.newcur = '';
								}
							});
						}
						else {
							UIkit.notify("Can't tell you how much you can save until you fill in the form correctly!", {status:'warning'});
						}


					}
				});

				jQuery('.uk-form').keypress(function(e){
					if(e.which == 13){//Enter key pressed
						jQuery('.clicker').click();//Trigger search button click event
					}
				});

				jQuery('#top').unbind().on('click','.gvold', function() {
					window.newcur = jQuery(this).attr('data-currency1');
					var old1 = jQuery(this).attr('data-fronts1');
					var old2 = jQuery(this).attr('data-backs1');
					var old3 = jQuery(this).attr('data-shirtshr1');
					var old3 = jQuery(this).attr('data-shirtshr1');
					var old4 = jQuery(this).attr('data-printernr1');
					var old5 = jQuery(this).attr('data-printerc1');
					var old6 = jQuery(this).text();
					if(!old1.trim()) {
						window.newcur = '';
					}
					jQuery('.first').focus();
					jQuery('.clicker').attr("disabled", false).css('color','#fff');

					jQuery('.uk-tab-responsive').removeClass('uk-active').attr('aria-expanded','false');
					jQuery('.uk-tab-responsive a').text(old6);
					jQuery('.uk-tab-responsive .uk-dropdown').hide();
					jQuery('.change-cur').text(jQuery(this).attr('data-currency1'));

					if(old1.trim() && old2.trim() && old3.trim() && old4.trim() && old5.trim()) {
						jQuery('.first').val(old1);
						jQuery('.second').val(old2);
						jQuery('.third').val(old3);
						jQuery('.fourth').val(old4);
						jQuery('.fifth').val(old5);
					}
					else {
						jQuery('.first').val('');
						jQuery('.second').val('');
						jQuery('.third').val('');
						jQuery('.fourth').val('');
						jQuery('.fifth').val('');
					}

				});

				jQuery('body').unbind().on('click','.addPhoneNumber', function() {
					var phoneno = jQuery('.gvAddPhone').val();
					var phonecode = jQuery('.gvAddPhone').attr('data-phone-code');
					if(phoneno.length > 0) {

						jQuery('.gvAddPhone').removeClass('uk-form-danger');

						if(jQuery('#resubmit').length) {

							jQuery.post("https://forms.hubspot.com/uploads/form/v2/1972415/30d6d3e7-16d7-4d14-83af-1c973b94990c",
							{
								email:jQuery('#resubmit').attr('data-email'),
								phone:phonecode+phoneno
							},function(data, status){

							}
						);

						jQuery('.gvPhoneReplace').prev().remove();
						jQuery('.gvPhoneReplace').removeClass('uk-grid').html('<h3 class="uk-text-primary uk-h1 uk-margin-remove">Great!</h3><p class="uk-alert uk-margin-remove uk-alert-success" style="float: left">I\'ve got your phone number and will get in touch shortly</p>');
						checkJquery3avv();

					}

				}
				else {
					jQuery('.gvAddPhone').addClass('uk-form-danger');
					UIkit.notify("Please enter your correct phone number:", {status:'danger'});

				}

			});
			jQuery( ".gv-progress-bar-parent input" ).focus(function() {
				jQuery('.dothehide').slideUp();

				var firstval = jQuery(this).val();
				var valid = firstval.match(/^-?\d*(\.\d+)?$/);
				var width = jQuery('.gv-progress-bar').width();
				var parentWidth = jQuery('.gv-progress-bar-parent').width();
				var percent = 100*width/parentWidth;
				var percent = Math.ceil(percent.toFixed(1));

				if(!jQuery(this).hasClass('gv-error') && !jQuery(this).hasClass('done-deal')) {
					if(percent == 5) {
						jQuery('.gv-progress-bar').css('width',percent+15+'%').text(percent+15+'%');
						jQuery(this).addClass('done-deal');
					}
					else {
						jQuery('.gv-progress-bar').css('width',percent+20+'%').text(percent+20+'%');
						jQuery(this).addClass('done-deal');
					}
				}

				jQuery('.clicker').attr("disabled", false).css('color','#fff');
				jQuery('.gv-calc-1').html('<i class="uk-icon-spinner uk-icon-spin uk-text-warning" style="font-size:3em;"></i><div class="uk-margin-small-top">Spinning up the hamster...</div>');
				jQuery('.gv-calc-2').html('<i class="uk-icon-spinner uk-icon-spin uk-text-warning" style="font-size:3em;"></i><div class="uk-margin-small-top">Getting the top guys on this...</div>');
				jQuery('.gv-calc-3').html('<i class="uk-icon-spinner uk-icon-spin uk-text-warning" style="font-size:3em;"></i><div class="uk-margin-small-top">Does anyone actually read this?</div>');
				jQuery('.gv-calc-4').html('<i class="uk-icon-spinner uk-icon-spin uk-text-warning" style="font-size:3em;"></i><div class="uk-margin-small-top">Don\'t think of purple hippos!</div>');
			});
			jQuery( ".gv-progress-bar-parent input" ).blur(function() {

				var firstval = jQuery(this).val();
				var valid = firstval.match(/^-?\d*(\.\d+)?$/);
				var width = jQuery('.gv-progress-bar').width();
				var parentWidth = jQuery('.gv-progress-bar-parent').width();
				var percent = 100*width/parentWidth;
				var percent = Math.ceil(percent.toFixed(1));

				if(valid && firstval.length > 0) {

					if(jQuery(this).hasClass('uk-form-danger')) {

						jQuery(this).removeClass('uk-form-danger');

						if(jQuery(this).hasClass('gv-error')) {

							jQuery(this).removeClass('gv-error');
							jQuery(this).next().remove();

						}
					}
					if(!jQuery(this).hasClass('done-deal')) {

						jQuery('.gv-progress-bar').css('width',percent+20+'%').text(percent+20+'%');
						jQuery(this).addClass('done-deal');

					}
				}
				else {

					if(!jQuery(this).hasClass('gv-error')) {

						jQuery(this).addClass('uk-form-danger').addClass('gv-error');
						jQuery(this).after('<div class="uk-alert uk-margin-remove uk-text-small uk-text-primary" style="padding:5px">Please enter a valid number format.</div>');
						jQuery('.gv-progress-bar').css('width',percent-20+'%').text(percent-20+'%');
						jQuery(this).removeClass('done-deal');

					}

				}
			});
		}
		else{
			window.setTimeout(checkJquery3avv,100);
		}})();

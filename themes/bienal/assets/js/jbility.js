/**
*	jBility
*	jBility is a free set of accessibility functions that uses JQuery.
*	By: Uriel Cairê Balan Calvi
*	Available on: https://github.com/urielcaire/jBility
*/

/*===================================================================
*	jBility uses JsCookie to manager cookies.
*	JsCookie is available on: https://github.com/urielcaire/jscookie
*====================================================================*/

jQuery(document).ready(function( $ )
	{
		if(checkCookie('ccontrast')){
			addConstrast();
		}	
		
		var col_a_font_size = parseFloat($('#itens .item .col a').css('font-size'));
		if (isNaN(col_a_font_size)) col_a_font_size=13;

		var first_check = false;
		
		$('select').selectBox();
		var select_box_font_size = parseFloat($('.selectBox-label').css('font-size'));
		if (isNaN(select_box_font_size)) select_box_font_size=13;	
		
		//console.log("select_box_font_size: " + select_box_font_size);
	
		var fsize = parseFloat(getCookie('ffontsize'));
		if (isNaN(fsize)) fsize=0;	
		
		//console.log("fsize: " + fsize);
		if (fsize != 0 ) {
			osize=fsize;
			fsize=0;
			changeFontSize(osize);
		}	
		

	
		$('#contrast').click(function(){
			var ck = checkCookie('ccontrast');
			if(ck){
				deleteCookie('ccontrast');
				removeConstrast();
			}else {
				createCookie('ccontrast', 'cookieContrast');
				addConstrast();
			}
		});

		$("#increaseFont").click(function() {
			changeFontSize(1);
		});

		$("#decreaseFont").click(function() {
			changeFontSize(-1);
		});	
		$("#normalSizeFont").click(function() {
			changeFontSize(-1*fsize);
		});
		$('#jbbutton').click(function(){
			$('#acess-icons').toggle(150);
		});

		// trab wacto 
		/*
		$('#caAdvancedSearch').attr('action', 'http://arquivo.bienal.org.br' + $('#caAdvancedSearch').attr('action'));
		$('#caAdvancedSearch').attr('method', 'get');
		$('#caAdvancedSearch').attr('target', '_blank');
		$('#caAdvancedSearch').submit(function(e) {
			var actionurl = e.currentTarget.action;
			//console.log(actionurl + ' - > ' + $("#caAdvancedSearch").serialize());
			//console.log(actionurl );
			//console.log($("#hierarchyselecter1").val()	);
			//e.preventDefault();
		});
		*/
		/*======================================
		*		Cookie functions
		*======================================*/
		function createCookie(name, value, days){
			var expires = "";
			if (days) {
				var d = new Date();
				d.setTime(d.getTime() + (days*24*60*60*1000));
				var expires = ";expires="+ d.toUTCString();
				//console.log(days + ";" + name + expires);
			} else {
				//infinity
				var expires = ";expires=Fri, 31 Dec 9999 23:59:59 GMT";
			}
			document.cookie = name+"="+value+expires+";path=/";
		}

		function getCookie(name){
			var nameEQ = name + "=";
			var ca = document.cookie.split(';');
			for(var i=0;i < ca.length;i++) {
				var c = ca[i];
				while (c.charAt(0)==' ') c = c.substring(1,c.length);
				if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
			}
			return "";
		}

		function deleteCookie(name) {
			createCookie(name,"",-1);
		}

		function checkCookie(name){
			var check = getCookie(name);
			if(check != "")
				return true;
			return false;
		}

		/*======================================
		*		jBility functions
		*======================================*/
		function addConstrast(){
			//console.log('addConstrast');
			$('body *:not(#itens *):not(script)').addClass('pagina-acessivel');
			$('#itens *').addClass('pagina-acessivel');
			$('.acess-container').addClass('f-transparent');
			$('#botao').addClass('f-transparent');
			$('#acess-icons').addClass('f-transparent');
			$('.acess-icon').addClass('f-transparent');
			$('img').addClass('f-transparent');
			$('#jbbutton').addClass('f-transparent');
		}

		function removeConstrast(){
			//console.log('removeConstrast');
			$('body *:not(#itens *)').removeClass('pagina-acessivel');
			$('#itens *').removeClass('pagina-acessivel');
			$('.acess-container').removeClass('f-transparent');
			$('#botao').removeClass('f-transparent');
			$('#acess-icons').removeClass('f-transparent');
			$('.acess-icon').removeClass('f-transparent');
			$('img').removeClass('f-transparent');
			$('#jbbutton').removeClass('f-transparent');
		}
		function changeFontSize(delta) {
			if (first_check == false) {
				first_check = true;
				//console.log('first');
				changeFontSize(0);
			}
			if (Math.abs(delta+fsize) <= 10) {  //limitando
				fsize+=delta;
				if (fsize !=0) {
					createCookie('ffontsize', fsize);
				} else {
					deleteCookie('ffontsize');
				}
				//console.log("newFsize: " + fsize);
				var $cElements = $("body *");
				$cElements.each(function(i) { 
					var f= parseFloat($(this).css('fontSize'))+delta;
					this.style.setProperty( 'font-size', f + 'px', 'important' );
				});
			}
		}
		
		$( document ).ajaxComplete(function( event, xhr, settings ) {

			var delta = fsize;
			//console.log("delta Ajax: " + delta);
			var i;
			var f;
			//RECARREGAR SELECTbOX NÍVEIS
			for (i = 0; i < 5; i++) {
				$("#hierarchyselecter"+i).selectBox('destroy');				
				$("#hierarchyselecter"+i).selectBox();	
				/*
				$("#hierarchyselecter"+i + ' a').each(function() {
					//this.style.setProperty( 'font-size', (fsize + select_box_font_size) + 'px', 'important' );
				});
				*/
			}	
			
			$('.selectBox-dropdown-menu a, .selectBox-label, .selectBox-arrow, .selectBox').each(function() {
				f=parseFloat(delta+select_box_font_size);
				this.style.setProperty( 'font-size', f + 'px', 'important' );
			});
				
			var $cElements = $("#bScrollList a");
			for (i = 0; i < $cElements.length; i++) {
				//fonts[i]+=delta;
				f= parseFloat($cElements.eq(i).css('font-size'))+delta;
				$cElements.eq(i).css('font-size', '');
				$style = 'font-size: ' + f + 'px!important;'  ;
				if ($cElements.eq(i).attr( 'style') !== undefined)  $style += $cElements.eq(i).attr( 'style');
				$cElements.eq(i).attr( 'style',  $style);
			}
		});

	});

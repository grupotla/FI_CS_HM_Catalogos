<script>


function crud_frame_adjust(url,texto,buttonsNum,opt){

		if (!url)
			return false;

		$('#cru_frame').attr('src',url);

		var str = url.split('&');
    	for (var i=0; i<str.length; i++) {
			var param = str[i].split('=');
			if (param[0] == 'id') texto += ' ' + param[1];//este perametro va primero
		}

		 var ititle = opt == undefined ? texto : opt.title;
		 var iwidth = opt == undefined ? 700 : opt.width;
		 var iheight = opt == undefined ? 450 : opt.height;

		{ //si no trae optiones, configura defaults
			var options = {
		        autoOpen: false,
		        modal: true,
						title: ititle,
						width: iwidth,
		        height: iheight,
		        //position: { my: "center", at: "top", of: window },
		        closeOnEscape:false,
						resizable: false,
						open: function(event, ui) {
								$('.ui-dialog-titlebar-close', ui.dialog | ui).show();

								if (parseInt(buttonsNum) == 2)
									$('#update-data').removeClass('ui-button').removeClass('ui-state-focus').removeClass('ui-button').removeClass('ui-widget').removeClass('ui-state-default').removeClass('ui-corner-all').removeClass('ui-button-text-only');
								if (parseInt(buttonsNum) == 1)
									$('#create-data').removeClass('ui-button').removeClass('ui-state-focus').removeClass('ui-button').removeClass('ui-widget').removeClass('ui-state-default').removeClass('ui-corner-all').removeClass('ui-button-text-only');

								$('.ui-widget-overlay').css('background-color','black');
								$('.ui-widget-overlay').css('opacity', '0.8');

								if (parseInt(buttonsNum) == 0)
									$('#cru_dialog').parent().find('.ui-dialog-buttonpane').remove();
						},
						close: function(event, ui) {
								$('#cru_frame').attr('src','');
						},

						buttons: [
							parseInt(buttonsNum) == 2 ?
								{id: 'update-data', class: 'btn btn-primary', text: 'Update', icon: 'ui-icon-home', click: function() { $("#cru_frame").contents().find("form").submit(); }}
							:
								parseInt(buttonsNum) == 1 ?
									{id: 'create-data', class: 'btn btn-primary', text: 'Create', icon: 'ui-icon-home', click: function() { $("#cru_frame").contents().find("form").submit(); }}
								:
										{}

	          ]
			}
		}

		if (parseInt(buttonsNum) == 0) {
			delete options.buttons;
		}

		//console.log(options);

		$('#cru_dialog').dialog(options);
		$('#cru_dialog').dialog('open');

		$('#cru_frame').css('height',$('#cru_dialog').height()-10); 	//ajusta alto de iframe
		$('#cru_frame').css('width',$('#cru_dialog').width()-10); 			//ajuste ancho de iframe
	}

/*
	function crud_frame_adjust2(url,texto,buttons,opt){

		if (!url)
			return false;

		$('#cru_frame').attr('src',url);

		var str = url.split('&');
    	for (var i=0; i<str.length; i++) {
			var param = str[i].split('=');
			if (param[0] == 'id') texto += ' ' + param[1];//este perametro va primero
		}

		if (opt == undefined) { //si no trae optiones, configura defaults
			var opt = {
		        autoOpen: false,
		        modal: true,
		        width: 700,
		        height: 450,
		        position: { my: "center", at: "top", of: window },
		        title: texto,
		        closeOnEscape:false,
			};
		}

		var theDialog = $('#cru_dialog').dialog(opt);			//inicializa dialog
		theDialog.dialog('open');								//abre dialog

		$('#cru_dialog').find('.form-actions').show();	//muestra area botones
		$('#update-data').hide();						//esconde update
		$('#create-data').hide();						//esconde create
		var height = 10;
		switch(buttons){
			case '0':
			case 0:
				$('#cru_dialog').find('.form-actions').hide();	//esconde area botones
				break;
			case '1':
			case 1:
				$('#create-data').show();						//muestra create
				height = 80;
				break;
			case '2':
			case 2:
				$('#update-data').show();						//muestra update
				height = 80;
				break;
		}
		$('#cru_frame').css('height',$('#cru_dialog').height()-height); 	//ajusta alto de iframe
		$('#cru_frame').css('width',$('#cru_dialog').width()-10); 			//ajuste ancho de iframe
		$('#loadImg').css('display','inline'); 	//muestra loading..
	}
*/
	$('a[data-toggle=modal]').click(function(e){

	    var target = $(this).attr('data-target');
	    //console.log(target);

	    if (target == '#myModal') {
		    var url = $(this).attr('href');
		    if(url){
				console.log(url);
		    	var str = url.split('&');
		    	var id = '';
		    	var titulo = '';
		    	var button = 0;
		    	var param;
		    	for (var i=0; i<str.length; i++) {
					param = str[i].split('=');
					if (param[0] == 'id') id = ' ' + param[1];//este perametro va primero
					if (param[0] == 'text') titulo = param[1].replace('+',' ') + id;
					if (param[0] == 'button') button = param[1];
				}
				crud_frame_adjust(url,titulo,button);
			}
		}
		e.preventDefault(); // avoid to execute the actual submit of the form.
	});


	$("input[type=text],textarea").keydown(function(e){
			return setKeys(e,$(this).attr('kType'));
	});

	$("input[type=text],textarea").keyup(function(e){
			return setKeys(e,$(this).attr('kType'));
	});

	$("input[type=text],textarea").blur(function(e){
			return setKeys(e,$(this).attr('kType'));
	});

	function setKeys(e,tipo){
		if (tipo == undefined) tipo = "all";
		return KeyAllow(e,tipo);
	}

	<?php if ($this->asDialog): ?>
	$('#operations li a:contains("Create"), #operations li a:contains("Update")').attr('data-toggle', 'modal');
	$('#operations li a:contains("Create"), #operations li a:contains("Update")').attr('data-target', '#myModal');
	<?php endif; ?>

	$('#operations li a:contains("Search")').attr('data-toggle', 'modal');
	$('#operations li a:contains("Search")').attr('data-target', '#myModal');

	$('#operations li a').attr('class', 'btn btn-primary');

	$('#operations li a').hover(function(){
	    $(this).css({'color':'navy'});
	    $(this).attr('class', 'btn');
	},  function(){
	    $(this).css({'color':'white'});
	    $(this).attr('class', 'btn btn-primary');
	} );


	//$('button ').attr('class', 'btn btn-warning');
	//$('#operations li a:contains("Search")').attr('class', 'search-button btn-primary');
	$('#operations li a:contains("Pdf")').attr('target', '_blank');
	$('#operations li a:contains("Excel")').attr('target', '_blank');

	$('.help-block').css('float', 'right');


	$('.controls input').css('height', '2em');
	$('.control-group input').css('height', '2em');




	//$('.tabbable .active ul li').css('background', 'silver'); tabs
	//$('.tabbable ul li a').css('color', 'white');

	//$('.yiiPager li a').attr('class', 'btn btn-small');


//////////////////////////////////////////////////////////////////////////////////
	var shift = false;
	var keyAllowed = {};
	var altgr = false;
	var keys = ['Insert','Delete','Backspace','Shift','Alt','Control','OS','Tab','PageUp','PageDown','Home','End','ArrowDown','ArrowUp','ArrowLeft','ArrowRight','Pause','ScrollLock','PrintScreen','NumLock','CapsLock','F1','F2','F3','F4','F5','F6','F7','F8','F9','F10','F11','F12','Enter','Right','Left','Up','Down','Clear','Del'];
	var AltGrKeys = [171,172,173,174,175,176,222];
	var consonantes='BCDFGHJKLMNÑPQRSTVWXYZ';

	function ComprobarCoherencia(palabra){
		var control=0;
		var acumula=0;
		palabra=palabra.toUpperCase();
		for(a=0;a<palabra.length;a++){
			letra=palabra.charAt(a);
			if(consonantes.indexOf(letra)>-1){
				control+=1;
				if (control > acumula) acumula=control;
			} else {control=0}
		}
		return acumula;
	}

	function datosDireccion(event,dato) { //,tipo) {
			var no_valids = ['fax','telefono',' nit','phone',' cel','celular','movil','mobil',' tel'];
			var i, p;
			for (i = 0; i < no_valids.length; ++i) {
					p = dato.toLowerCase().indexOf(no_valids[i]);
					if (p > -1) {
						event.currentTarget.value = dato.substring(0,p) + dato.substring(p+no_valids[i].length-1, dato.length-1);
						return labelError(event,false,'Palabra ' + no_valids[i] + ' no valida');
					}
			}
			return true;
	}

	function Consecutive(event,dato,tipo) {
		if (
		dato.toLowerCase().indexOf('asd') > -1 || dato.toLowerCase().indexOf('sdf') > -1 ||  dato.toLowerCase().indexOf('dfg') > -1 ||
		dato.toLowerCase().indexOf('qwe') > -1 || dato.toLowerCase().indexOf('jhg') > -1 ||  dato.toLowerCase().indexOf('rty') > -1 ||
		dato.toLowerCase().indexOf('zxc') > -1 || dato.toLowerCase().indexOf('xcv') > -1 ||  dato.toLowerCase().indexOf('cvb') > -1 ||
		dato.toLowerCase().indexOf('+po') > -1 || dato.toLowerCase().indexOf('oiu') > -1 ||  dato.toLowerCase().indexOf('iuy') > -1 ||
		dato.toLowerCase().indexOf('ñlk') > -1 || dato.toLowerCase().indexOf('lkj') > -1 ||  dato.toLowerCase().indexOf('kjh') > -1 ||
		dato.toLowerCase().indexOf('-.,') > -1 || dato.toLowerCase().indexOf('.,m') > -1 ||  dato.toLowerCase().indexOf(',mn') > -1
		) {
			return labelError(event,false,'No se permite estas combinaciones',dato);
		}
	}

	function EmailFalse(dato){
		var reg = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
		return reg.test(dato);
	}

	function labelError(event,type,msg,text){
		var id = event.currentTarget.id;
		var msg_err = $('#' + id + '_em_');
		if (type == false) {
				//console.log(id + ' ' + type + ' ' + msg);
				if (text != undefined) {
					event.currentTarget.placeholder = text;
					event.currentTarget.value = '';
				}
				//console.log(msg_err);
				if ($(msg_err).html())
					event.currentTarget.placeholder = msg;
				$(msg_err).html(msg);
				$(msg_err).show();
		} else {
				event.currentTarget.placeholder = '';
				$(msg_err).html('');
				$(msg_err).hide();
		}
		//console.log(msg);
		return type;
	}

	function NoRepeats(tipo,dato){
		var repeats = false;
		var repeats1 = false;
		var repeats2 = false;
		var repeats3 = false;
		switch (tipo) {
		case 'tel':
				repeats = /(\()\1+/.test(dato);
				repeats1 = /(\-)\1+/.test(dato);
				repeats2 = /(\s)\1+/.test(dato);
				repeats3 = /(\))\1+/.test(dato);
				break;
		case 'mail':
				repeats2 = /(\@)\1+/.test(dato);
				break;
		case 'dec':
				repeats1 = /(\.)\1+/.test(dato);
			break;

		case 'nit':
			//repeats1 = /(\.)\1+/.test(dato);
			break;
		case 'int':
			break;

		//case 'nom':
		//case 'dir':
		default:
				repeats = /(\w)\1\1\1+/.test(dato.toLowerCase()); 	//a-z 0-9
				repeats1 = /(\W)\1\1+/.test(dato.toLowerCase()); 		//the others
				repeats2 = /(\s)\1\1+/.test(dato.toLowerCase()); 			//space
				break;
		}
		 //console.log(repeats + ' ' + repeats1 + ' ' + repeats2 + ' ' + dato);
		if (repeats || repeats1 || repeats2 || repeats3) {//evitar repetitivos
			return true;
		}
	}

	function NoRepeatsUp(dato,tipo){
		//var dato = event.currentTarget.value;
		if (NoRepeats(tipo,dato) == true) {
			var CharAnt = {};
			var Char = '';
			var CharA = '';
			var dato1 = dato.toLowerCase();
			for (i = 0; i < dato1.length; ++i) {
				Char = dato1[i];
				if (CharAnt[Char] == undefined) CharAnt[Char] = 1;
				//console.log('(Char=' + Char + ')(CharA=' + CharA + ') ' + CharAnt[Char] );
				if (CharA == Char) {
					CharAnt[Char]++;
					if (CharAnt[Char] > 3) {
						dato = dato.substring(0,i) + dato.substring(i+1,dato.length);
						return false;
					}
				} else {
					CharAnt[CharA] = 0;
				}
				CharA = Char;
			}
		}
	}

	function RegularChars(event,eWhich,eChar,valid,altgr,shift,tipo,dato) {

		if (eChar == undefined) return false;

		console.log(eChar);

		var valid = ["ñ","Ñ"];
		if (eWhich == 0 && valid.indexOf(eChar) == -1) return false;

		//  		 				-     ,   .   /   *   -   +   .	  |   +   -
		//var valid = [109,188,190,111,106,109,107,110,32,172,171,173];
		//if (Consecutive(event,dato,tipo) == false) return false;

		var iNum = eChar>="0" && eChar<="9";
		var iLet = eWhich>=65 && eWhich<=90;
		var res = true;
		var iMax = event.currentTarget.maxLength;
		var max = 30; //standard
		valid = [];

		//,"Spacebar","Right","Left" SE AGREGO 2017-06-20 para funcionalidad en IE
		switch (tipo) {
		case 'nit':	valid = ["-",'Subtract'];																																													break;
		case 'nom':	valid = ["&",",",".","/"," ","ñ","Ñ","_","-","Spacebar",'Multiply','Divide','Add','Decimal','Subtract'];					break; //2017-06-20 se solicito "\"",
		case 'dir':
								if (datosDireccion(event,dato) == false) return false;
								valid = ["&","#",",",".","/","*","-","+"," ","ñ","Ñ","_","Spacebar",'Multiply','Divide','Add','Decimal','Subtract'];	break; //"\"",
		case 'tel':	valid = [" ","-","(",")","Spacebar",'Subtract'];	iLet = false;										break;
		case 'mail':valid = [".","_","-","+","!","$","&","(",")","*",";","=",":","@",'Subtract','Decimal','Add','Multiply'];	max = 70;		break;
		case 'int':	valid = [];									iLet = false;		max = 5;							break;
		case 'dec':	valid = [".",'Decimal'];							iLet = false;		max = 12;		break;
		case 'anum':valid = [];																												break;
		case 'all': valid = ["&","#",",",".","/","*","-","+"," ","ñ","Ñ","_","Spacebar",'Multiply','Divide','Add','Decimal','Subtract'];	break; //"\"",
		}
		//console.log(valid.indexOf(eChar) + ' ' + iNum + ' ' + iLet);
		//console.log(event);
		//console.log(iMax + ' ' + max);

		if (iMax == -1) iMax = max;

		var msg = '';
		if (dato.length > iMax) {
			msg = 'Max Chars(' + iMax + ')';
		} else {

			if (valid.indexOf(eChar) == -1 && !iNum && !iLet) {
				msg = 'Tecla [' + eChar + '] no valida';
			} else {

				if (NoRepeats(tipo,dato) == true) {
					msg = 'Teclas repetitivas'
				} else {

					if (eChar == " " && event.currentTarget.selectionStart == 0)
						msg = 'Accion invalida';
				}
			}
		}


		if (msg != '') res = false;

		return labelError(event,res,msg);

		//return res;
	}



	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function KeyAllow(event,tipo){

		var evtType = event.type;
		var eChar = event.key;
		var eWhich = event.which | event.keyCode;
		var dato = event.currentTarget.value;

		if (eChar == "Enter")
			event.currentTarget.value = dato.replace(/^\s+|\s+$/gm,'');

		//if (keys.indexOf(eChar) == -1)
		//console.log(evtType + ' ' + ' [' + dato + '] ' + eWhich + ' ' + eChar + ' shift=' + shift  + ' altgr=' + altgr);

		switch (evtType) {
		case 'keydown':
			if (eWhich == 16) shift = true;
			if (eWhich == 17 || eWhich == 18) altgr = true;

			if (keys.indexOf(eChar) > -1) { //especial keys true
					return labelError(event,true,'');
			}	else {
				if (eWhich > 0 && eChar != undefined) //concatena solo caracteres validos
					dato += eChar;
			}
			return RegularChars(event,eWhich,eChar,0,altgr,shift,tipo,dato);
			break;

		case 'keyup':
			if (eWhich == 16) shift = false;
			if (eWhich == 17 || eWhich == 18) altgr = false;
			if (eWhich == 9) altgr = false;
			if (NoRepeatsUp(dato,tipo) == false)
				return labelError(event,false,''); //res == false)
			break;

		case 'blur':
				//console.log('onBlur = ' + dato);
				event.currentTarget.value = dato.replace(/^\s+|\s+$/gm,'');
				switch (tipo) {
				case 'mail':
						//2017-06-21 nueva validacion, pueden venir varios emails separados por ; y valida cada uno, elimina los incorrectos
						var emails = dato.split(';');
						var text = '';
						var bad = '';
						for (var i in emails) {
							//console.log(i);
		  				//console.log(emails[i]);
							if (text != '') text = text + ';';
							if (bad != '') bad = bad + ';';
							if (EmailFalse(emails[i]))
								text = text + emails[i];
							else
								bad = bad + emails[i];
						}
						event.currentTarget.value = text;
						//console.log(event.currentTarget.value);
						if (bad != '')
								return labelError(event,false,'Email invalido!');

					//if (EmailFalse(dato) == false && dato.length > 0)
					//	return labelError(event,false,'Email invalido!',dato);

					break;

				case 'int':
				case 'dec':
					if (dato + 0 == 0)
						event.currentTarget.value = 0;
					break;

				default:
					if (dato.length == 0 || dato.length > 4)
						return true;
					else
						return labelError(event,false,'Dato ' + dato + ' muy corto',dato);
					break;
				}
			break;
		}
	}
	//////////////////////////////////////////////////////////////////////////////////


</script>

<style>
#page {
	padding-top:0px;
}
</style>
<?php
Yii::app()->clientScript->registerScript("main", "
	$(window).on('load resize', function () {
		/*$('.ui-dialog-titlebar-close').click(function(){
			$('#cru_frame').attr('src','');
		});*/
	  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
		$('.tbl-header').css({'padding-right':scrollWidth});
	});
");

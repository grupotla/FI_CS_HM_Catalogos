<script>
	var shift = 0;
	var keyAllowed = {};
	var altgr = 0;
	var keys = ['Insert','Delete','Backspace','Shift','Alt','Control','OS','Tab','PageUp','PageDown','Home','End','ArrowDown','ArrowUp','ArrowLeft','ArrowRight','Pause','ScrollLock','PrintScreen','NumLock','CapsLock','F1','F2','F3','F4','F5','F6','F7','F8','F9','F10','F11','F12','Enter'];
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

	function AltGrChars(event,altgr,eWhich,eChar) {
		/*
		if (altgr == 1 && (eChar != 'Alt' && eChar != 'Ctrl')) {
			if (["@","|","#"].indexOf(eChar) == -1) { //validos con alt
				labelError(event,false,'Caracter  ' + eChar + '  no valido!');
				return true;
			}
		}*/
	}

	function ShiftChars(event,shift,eWhich,eChar) {
		/*
		if (shift == 1 && eChar != 'Shift')
			console.log(eWhich + ' ' + eChar);
			if (["!","\"","#","$","%","&","/","(",")","=","+","-","_","*",";",":","ñ"].indexOf(eChar) == -1) {
				if (eWhich >= 65 && eWhich <=90) {
				//if (keys.indexOf(eChar) == -1 && eWhich >= 65 && eWhich <=90) {
					return true;
				} else {
					labelError(event,false,'Caracter  ' + eChar + '  no valido.');
					return false;
				}
			}
			*/
	}

	function datosDireccion(event,dato) { //,tipo) {
			var no_valids = ['fax','telefono',' nit','phone',' cel','celular','movil','mobil',' tel'];
			var i, p;
			for (i = 0; i < no_valids.length; ++i) {
	    		p = dato.toLowerCase().indexOf(no_valids[i]);
	    		if (p > -1) {
	    			event.currentTarget.value = dato.substring(0,p) + dato.substring(p+no_valids[i].length-1, dato.length-1);
						labelError(event,false,'Palabra ' + dato + ' no valida',dato);
					}
			}
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
		console.log(msg);
		return type;
	}

	function NoRepeats(tipo,dato){
		var repeats = false;
		var repeats1 = false;
		var repeats2 = false;
		switch (tipo) {
		case 'nombre_cliente':
		case 'nombre_facturar':
		case 'direccion':
		    repeats = /(\w)\1\1\1+/; 	//a-z 0-9
		    repeats1 = /(\W)\1\1+/; 	//the others
		    repeats2 = /(\s)\1+/; 		//space
			repeats = repeats.test(dato.toLowerCase());
			repeats1 = repeats1.test(dato.toLowerCase());
			repeats2 = repeats2.test(dato.toLowerCase());
			break;
		case 'email':
			repeats2 = /(\@)\1+/;
			repeats2 = repeats2.test(dato.toLowerCase());
			break;
		case 'decimal':
				//repeats1 = /^\d+\.\d{0,2}$/;
				repeats1 = /^\d+(\.\d{1,2})?$/;
				repeats1 = repeats1.test(dato);
			break;
		}
	   //console.log(repeats + ' ' + repeats1 + ' ' + repeats2 + ' ' + dato);
		if (repeats || repeats1 || repeats2) {//evitar repetitivos
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

		if (keys.indexOf(eChar) > -1) {
				labelError(event,true,'');
				return true;
		}
		//  		 				-     ,   .   /   *   -   +   .	  |   +   -
		//var valid = [109,188,190,111,106,109,107,110,32,172,171,173];

		if (Consecutive(event,dato,tipo) == false) return false;

		var iNum = (eWhich>=48 && eWhich<=57) || (eWhich>=96 && eWhich<=105);
		var iLet = (eWhich>=65 && eWhich<=90);
		var res = true;

		switch (tipo) {
		case 'codigo_tributario':
			var valid = [109,173];// menos menos
			if (shift == 1 && iNum) res = false;	//no chars
			if (!iNum && !iLet && valid.indexOf(eWhich) == -1) res = false;
			break;

		case 'nombre_cliente':
		case 'nombre_facturar':
		case 'direccion':
			/*if (eChar == 'ñ' || eChar == 'Ñ') {
					labelError(event,true,'');
					return true;
			}*/
			//  		 			-     ,   .   /   *   -   +   .	  |   +   -   ñ
			var valid = [109,188,190,111,106,109,107,110,32,172,171,173,164,];
			if (!iNum && !iLet && valid.indexOf(eWhich) == -1) res = false;  // && !iKeys
			if (tipo == 'direccion')
				return datosDireccion(event,dato);
			//if (ComprobarCoherencia(dato) > 3) {
			break;

		case 'telefono':
			var valid = [109,111,107,172]; //- / + +
			if (!iNum && valid.indexOf(eWhich) == -1) res = false;
			break;

		case 'email':
			//  		 -     ,   .   /   *   -   +   .   |   +   -
			var valid = [109,188,190,111,106,109,107,110,172,171,173]; //32 salio
			if (!iNum && !iLet && valid.indexOf(eWhich) == -1) res = false;
			break;

		case 'entero':
			if (!iNum) res = false;
			break;

			case 'decimal':
				var valid = [190,110,]; //punto
				if (!iNum && valid.indexOf(eWhich) == -1) res = false;
				break;
		}



		//console.log('res = ' + res);


		if (res == false)
			return labelError(event,false,'Caracter ' + eChar + ' no valido');
		else
			if (NoRepeats(tipo,dato) == true) {
				res = false;
				return labelError(event,false,'No se permite repeticiones');
			}

		if (res != false)
			labelError(event,true,'');




		return res;
	}



	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function KeyAllow(event,tipo){

    var evtType = event.type;
    var eChar = event.key;
    var eWhich = event.which | event.keyCode;
    var dato = event.currentTarget.value;

	  //if (keys.indexOf(eChar) == -1)
		console.log(evtType + ' ' + ' [' + dato + '] ' + eWhich + ' ' + eChar + ' shift=' + shift  + ' altgr=' + altgr);

		switch (evtType) {
		case 'keydown':
			if (keys.indexOf(eChar) == -1 && eChar != undefined)
				dato += eChar; //concatena solo caracteres validos
			if (eWhich == 16) shift = 1;
			if (eWhich == 17 || eWhich == 18) altgr = 1;
			return RegularChars(event,eWhich,eChar,0,altgr,shift,tipo,dato);
			break;
		case 'keyup':
			if (eWhich == 16) shift = 0;
			if (eWhich == 17 || eWhich == 18) altgr = 0;
			if (eWhich == 9) altgr = 0;

			if (NoRepeatsUp(dato,tipo) == false)
				return labelError(event,false,''	); //res == false)
			break;

		case 'blur':
					//console.log('onBlur = ' + dato);
					switch (tipo) {
					case 'email':
					  var eRes = EmailFalse(dato);
						if (eRes == false)
							return labelError(event,false,'Email invalido!',dato);
					case 'entero':
					case 'decimal':
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

</script>

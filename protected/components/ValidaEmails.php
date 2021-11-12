<?php



//Yii::app()->clientScript->registerCoreScript('jquery');
/*
Yii::app()->clientScript->registerScript('validaemails', '
$(".EmailType").blur(function(event){
	var EmailPais_ = event.srcElement || event.target;
	var pais = EmailPais_.id;
	if (EmailPais_.value != "") {
		var _url = "' . Yii::app()->urlManager->createUrl('/site/check_email_address', array("email" => "")) . '" + EmailPais_.value;
		$.ajax({
			url: _url,
			//data:{  },
			dataType:"json",
			type:"POST",
			success:function(response){

				if (response.res == false ) {
					EmailPais_.value = "";
					EmailPais_.focus();
					/*if (document.getElementById("ContactosDivisiones_pais_" + pais))
						document.getElementById("ContactosDivisiones_pais_" + pais).checked = false;*/
/*
				} else {
					/*
					if (document.getElementById("ContactosDivisiones_pais_" + pais))
						document.getElementById("ContactosDivisiones_pais_" + pais).checked = true;*/
					/*
					var pos = pais.indexOf("_");
					var len = EmailPais_.value.length;
					if (pos != -1)
						pais = pais.substring(pos+1,len);
					*/
/*
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
				console.log(xhr);
				console.log(ajaxOptions);
				console.log(thrownError);
			}
		});
	} else {
		EmailPais_.focus();
		if (document.getElementById("ContactosDivisiones_pais_" + pais))
			document.getElementById("ContactosDivisiones_pais_" + pais).checked = false;
	}
	return false;
});


var LastKey = -999;
$(".EmailType").keydown(function(event){
	event = event || window.event;
    var iKey_ = event.charCode || event.keyCode;
	if (iKey_ == 13)
		return false;
});


function ValidaOnKeyDown(event){

}

$(".EmailType").keyup(function(event){

	//ValidaOnKeyDown(event);

	event = event || window.event;
    var iKey_ = event.charCode || event.keyCode;
	var onechar = event.key + "";
	var GoAjax = 0;
	var offchar = 1;

	var EmailPais_ = event.srcElement || event.target;
	var len = EmailPais_.value.length;

	EmailPais_.value = EmailPais_.value.toLowerCase();

	//console.log(LastKey);
	if (onechar.match(/[0-9]/)) {
	    //console.log(onechar + " " + iKey_ +  " digit");
	    GoAjax = 1;
	    if (LastKey == 192 || LastKey == 0) {
			GoAjax = 0;
			offchar = 2;
		}
	} else if (onechar.match(/[a-zA-Z]/)){
	    //console.log(onechar + " " + iKey_ +  " letter");
	    GoAjax = 1;
	    if (LastKey == 192 || LastKey == 0) {
			GoAjax = 0;
			if (iKey_ == 65 || iKey_ == 69 || iKey_ == 73 || iKey_ == 79 || iKey_ == 85){
				offchar = 1;
			} else {
				//console.log(onechar.length);
				if (onechar.length > 1) { //son teclas especiales
					GoAjax = 1;
					iKey_ = LastKey;
				} else {
					offchar = 2;
				}
			}
		}
	} else if (onechar.match(/[@._-]/)){
	    //console.log(onechar + " " + iKey_ +  " char");
	    GoAjax = 1;
	    if (LastKey == 192 || LastKey == 0) {
			GoAjax = 0;
			offchar = 2;
		}

		if (EmailPais_.value.indexOf(onechar) === 0) { //no pueden ir caracteres al inicio
			GoAjax = 0;
			offchar = 1;
		}

		var c = 0;
		if (onechar == "@"){
			for (var i=0;i<len;i++)
				if (EmailPais_.value[i] == "@")
					c++;
		}
		if (c > 1) { //no puede ir mas de una @
			GoAjax = 0;
			offchar = 1;
		}


	} else {
	    //console.log(onechar + " " + iKey_ + " Not valid");
	    offchar = 1;
	    GoAjax = 0;
	    if (LastKey == 192 || LastKey == 0)
			offchar = 2;
		if (iKey_ == 32)
			offchar = 1;
	}


	LastKey = iKey_;

	if (GoAjax == 0) {
		EmailPais_.value = EmailPais_.value.substring(0,len-offchar);
		//console.log("Quito Char=" + EmailPais_.value.substring(0,len-offchar) + " num=" + offchar );
		LastKey = -888;
    	return false;
    }

	return false;
});

', CClientScript::POS_END);

*/

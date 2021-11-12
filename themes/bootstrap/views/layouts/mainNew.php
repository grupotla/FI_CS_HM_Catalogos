<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="description" content="solucion de administracion de sistemas">
    <meta name="author" content="Hans Meckler">

    <?php /*if (!Yii::app()->user->isGuest) {?>
    <meta http-equiv="refresh" content="<?php echo Yii::app()->params['session_timeout'];?>"  >
    <?php }*/?>

    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/aimar<?php echo $_SERVER['SERVER_ADDR'] == '127.0.0.1' || $_SERVER['SERVER_ADDR'] == '::1' ? "_green" : "_blue"?>.bmp">
	  <!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <meta name="language" content="en" />-->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
	  <?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php

$items = Yii::app()->session['items'];

$items[] = array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest, 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE);
$items[] = array(
	        'label' => Yii::app()->session['usr_nm'], 'url' => '#', 'icon'=>TbHtml::ICON_USER . " " . TbHtml::ICON_COLOR_WHITE,
	        'visible'=>!Yii::app()->user->isGuest,
	        'items' => array(
                array('label'=>'Logout', 'url'=>array('/site/logout'), 'icon'=>TbHtml::ICON_OFF . " " . TbHtml::ICON_COLOR_WHITE, 'alt'=>'Logout..'),
                //array('label'=>Yii::app()->params['version'], 'url'=>'#', 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
                //array('label'=>Yii::app()->params['version'], 'url'=>'#', 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
                array('label'=>'ip'.$_SERVER['REMOTE_ADDR'], 'url'=>'#', 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
	        )
	    );
?>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
        'fixed' => false,
    	//'fluid' => true,
        'type' => 'inverse',
        'brand' => '<img src="images/aimar.gif" style="height:30px"><font size=2>&nbsp;Ver  ' . Yii::app()->params['version'] . '</font>',
        'brandUrl' => '#',//'http://www.aimargroup.com',

	    'items'=>array(
	        array(
	            'class'=>'bootstrap.widgets.TbMenu',
				'items' => array(
				array('label' =>'Home', 'url' =>array('/site/index'), 'active' => false,  'icon'=>TbHtml::ICON_HOME . " " . TbHtml::ICON_COLOR_WHITE),
	                //array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about'), 'icon'=>TbHtml::ICON_QUESTION_SIGN . " " . TbHtml::ICON_COLOR_WHITE),
	                //array('label'=>'Contact', 'url'=>array('/site/contact'), 'icon'=>TbHtml::ICON_ENVELOPE . " " . TbHtml::ICON_COLOR_WHITE),
				),
			),
	        array(
	            'class'=>'bootstrap.widgets.TbMenu',
	            'htmlOptions' => array('class' => 'pull-right'),
				'items' => $items
			),
	    ),
	)); ?>







<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?> <!-- breadcrumbs -->
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?>
	<?php endif?>

	<?php if(isset($this->menu)):?>	<!-- operations -->
		<?php $this->widget('bootstrap.widgets.TbMenu', array(
			'id'=>'operations',
			'type'=>'pills',
			'items'=>$this->menu,
		)); ?>
	<?php endif?>


  <div id="sessionModal" style="display:none">
    <span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
    <div id="timeout"></div><div id="progressbar"></div><br>
  </div>




  <!-- implementado 2017-07-11 //////////////////Alert Message Before Session Ends/////////////////////////////////////////////////// -->
  <?php
      if(!Yii::app()->user->isGuest) {
          $time = (Yii::app()->user->getState(CWebUser::AUTH_TIMEOUT_VAR) - time() - 29) * 1000;
          Yii::app()->clientScript->registerScript('timeoutAlert',"
  	        var opt = {
  	          autoOpen: false,
  	          closeOnEscape: false,
  	          closeText: 'hide',
  	          modal: true,
  	          width: 400,
  	          height: 200,
  	          resizable: false,

  	          open: function(event, ui) {
                /*
  	              $('.ui-dialog-titlebar-close', ui.dialog | ui).hide();
  	              $('#BtnGo').removeClass('ui-button').removeClass('ui-state-focus').removeClass('ui-button').removeClass('ui-widget').removeClass('ui-state-default').removeClass('ui-corner-all').removeClass('ui-button-text-only'); //.addClass('btn-danger');
  	              $('.ui-widget-overlay').css('background-color','black');
  	              $('.ui-widget-overlay').css('opacity', '0.8');
                  */
  	          },

  	          buttons: [
  	            {
  	              id: 'BtnGo',
  	              class: 'btn btn-primary',
  	              text: 'Continuar Session',
  	              icon: 'ui-icon-home',
  	              click: function() {
  	                //$( this ).dialog( 'close' );
  	                $.ajax({
  	                    url: '" . CController::createUrl('site/renewSession') . "',
  	                    //type: 'POST',
  	                    //contentType: 'application/json; charset=utf-8',
  	                    //data: { name: $('#qst').val() },
  	                    success: function (response) {
  	                      if (parseInt(response) > 0) {
  	                            HandleTimer(parseInt(response),2);
  	                      } else {
  	                            document.location.href = '" . CController::createUrl('site/index') . "';
  	                      }
  	                    }
  	                }).done(function (msg) {
  	                    //console.log(msg);
  	                });
  	              }
  	            }
  	          ]
  	        };





            function HandleTimer(timer,x){
              var timeoutInterval;
              window.timeoutInterval = clearInterval(window.timeoutInterval);

              setTimeout(function(){

                  //$('#sessionModal').dialog('close');

                  var n = 29;
                  var p = 0;
                  $('#timeout').text('Session de trabajo expira en 30 segundos');

                  $('#progressbar').progressbar({
                      max:n,
                      value:p,
                  });
                  window.timeoutInterval = setInterval(function(){

                      if (x == 1 && p == 0) {
                        $('#sessionModal').dialog(opt);
                        $('#sessionModal').dialog('open');
                      }

                      p++;
                      if(n>0) {
                        $('#timeout').text('Session de trabajo expira en" . " ' + n + ' " . 'segundos' . "');
                        $('#progressbar').progressbar('option', 'value', p );
                      }
                      if(n==0) {
                          var date = new Date();
                          var fecha = ('0' + date.getDate()).slice(-2) + '/' + ('0' + (date.getMonth() + 1) ).slice(-2) + '/' + date.getFullYear() + ' ' + date.getHours() + ':' + ('0' + date.getMinutes()).slice(-2) + ':' + ('0' + date.getSeconds()).slice(-2);
                          $('#timeout').text('Tu session ha expirado! ' + fecha);
                          //clearInterval(timeoutInterval);
                          $('#BtnGo').button('option', 'label', 'Cerrar Session').removeClass('btn-primary').addClass('btn-danger').button('option', 'icon', 'ui-icon-arrowreturnthick-1-w' );
                          $('#progressbar').remove();
                      }
                      --n;
                  }, 1000)
              },timer);
            }


            HandleTimer($time,1);", CClientScript::POS_END);
      }
  ?>

  <!-- implementado 2017-07-11 //////////////////Alert Message Before Session Ends/////////////////////////////////////////////////// -->



	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer"><!-- footer -->
    [<?=Yii::app()->session['pais']?>]<br/>
		Copyright &copy; <?php echo date('Y'); ?> All Rights Reserved.<br/>
    by Aimar Group<br/>

		<?php //echo Yii::powered(); ?>
	</div>

</div><!-- page -->


<div id="cru_dialog"><iframe id="cru_frame" name="cru_frame" style="border:0px" onload=""></iframe><br></div>



<?php //////////////////////////////// dialog ////////////////////////////////////////// ?>
<?php /*
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'cru_dialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Dialog box 1',
        'autoOpen'=>false,
    ),
));
?>
<div id="loadImg" style="position:absolute; height:90%; width:96%; display:inline; vertical-align:middle; text-align:center;">
	<div style="position:relative; top:50%; width:auto;">
		Loading <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ajax-loader.gif" />
	</div>
</div>
<iframe id="cru_frame" name="cru_frame" style="border:0px" onload="document.getElementById('loadImg').style.display='none';"></iframe><br>
<div class="form-actions">
<?php echo CHtml::link('<span class="icon-pencil icon-white"></span> Update',"#",array('class'=>'btn btn-small btn-primary','id'=>'update-data','onclick'=>'$("#cru_frame").contents().find("form").submit()','style'=>'color:white')); ?>
<?php echo CHtml::link('<span class="icon-file icon-white"></span> Create',"#",array('class'=>'btn btn-small btn-primary','id'=>'create-data','onclick'=>'$("#cru_frame").contents().find("form").submit()','style'=>'color:white')); ?>
</div>
<?php $this->endWidget(); */ ?>
<?php //////////////////////////////// dialog ////////////////////////////////////////// ?>

<?php include("javascript.php"); ?>

</body>
</html>

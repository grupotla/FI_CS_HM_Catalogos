<?php
/*$this->breadcrumbs=array(
	'Usuarios Empresases'=>array('index'),
	$model->id_usuario=>array('view','id'=>$model->id_usuario),
	'Menu',
);*/

$this->menu=array(
	array('label'=>'List UsuariosEmpresas','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>'Create UsuariosEmpresas','url'=>array('create', 'button'=>1, 'text'=>'Create UsuariosEmpresas'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>'View UsuariosEmpresas','url'=>array('view','id'=>$model->id_usuario), 'icon'=>TbHtml::ICON_EYE_OPEN . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>'Manage UsuariosEmpresas','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'usuarios-empresas-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,	
)); ?>

<!--
	<div style="position:fixed;background-color:white;top:100px;display:none;width:100%;">	
-->
		<h1>Opciones Menu #<?php echo $model->id_usuario . " " . $model->pw_name; ?>
		<!--<div class="form-actions">-->
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				'type'=>'primary',
				'label'=>'Save',
				'icon'=>'icon-pencil icon-white',
			)); ?>
		</h1>
	</div>


<br><br><br><br><br><br>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'usuarios-empresas-grid',
	'dataProvider'=>$gridDataProvider,
	'type' => 'hover striped bordered condensed',

	'template'=>"{items}",
	
	'columns'=>array(
		
		/*
		array('name'=>'id', 
		'value'=>'$data["id"]',
		//'header'=>'id', 'type'=>'raw', 
		'headerHtmlOptions'=>array('style'=>'width:20px;'),),
	*/

		array('name'=>'chk0', 'header'=>'&nbsp;', 'type'=>'raw', 
		'headerHtmlOptions'=>array('style'=>'width:60px'),
		'htmlOptions'=>array('style'=>'text-align:right')
		),




/*
		array(
			'value' => 						
				CHtml::CheckBox('',null, 		
					array(
						//'value'=>'$data["id"]', 
						//'onclick' => "javascript:$('.chk_menu').attr('checked',$(this).is(':checked'));"
					)
				), 						
			'type'=>'raw', 
			//'htmlOptions' => array('style'=>''), 'headerHtmlOptions'=>array('style'=>'width:20px;'), 			
		),
*/
/*
		array(
            //'name' => 'updated',
            'header' => '',
            //'id' => 'selectedIds',
            'value' => '$data["id"]',
            'class' => 'CCheckBoxColumn',
            //'checked' => function($data){ return ($data->updated == 1) ? true:false;},
            //'checkBoxHtmlOptions' => [
            //    'class' => 'checkbox-ajax'
            //],			
			'htmlOptions'=>array(			
'onclick' => "javascript:$('.id'+this.value).attr('checked',$(this).is(':checked'));",			
				//'style'=>'text-align:center;width:22px;','title'=>'Active'
			)			
        ),
*/		

/////////chk1//////////////////////////////////////////////////////////77

		array('name'=>'chk1', 'header'=>'', 'type'=>'raw', 
		'headerHtmlOptions'=>array('style'=>'display:none'),
		'htmlOptions'=>array('style'=>'display:none')),


		array(			
'value'=>'
CHtml::checkBox("cid[]",($data["chk1_val"] ? true : false),

array("value"=>$data["id"],
	"onclick" => "javascript:$(\'.id{$data["id"]}\').attr(\'checked\',$(this).is(\':checked\'));",
	"style"=>($data["chk1_show"] == 1 ? "display:inline-block;" : "display:none;"),
	"class"=>"par{$data["id"]}",
))',
'type'=>'raw',
'headerHtmlOptions' => array('style'=>'width:20px;'),
		),


//"style"=>($data["chk1_val"] == "0" ? "display:inline;" : "display:none;"),

//ContactosUsersMenu_4_um_mn_id

/*
		array('name'=>'chk11', 'header'=>	
		CHtml::CheckBox('sel',false, 		
		array('onclick' => "javascript:$('.chk_menu').attr('checked',$(this).is(':checked'));")
		), 
		'type'=>'raw', 'htmlOptions' => array('style'=>''), 'headerHtmlOptions'=>array('style'=>'width:20px;'), 		
		),
*/

		array('name'=>'parent', 'header'=>'Menu', 'type'=>'raw', 'headerHtmlOptions'=>array('style'=>'width:65px'),),
		

/////////chk2//////////////////////////////////////////////////////////77
		array('name'=>'chk2', 'header'=>CHtml::CheckBox('sel',false, array('onclick' => "javascript:$('.chk_opcion').attr('checked',$(this).is(':checked'));")), 'type'=>'raw', 'htmlOptions' => array('style'=>'display:none'), 'headerHtmlOptions'=>array('style'=>'width:20px;display:none'), ),
		
		
		
		array(			
'value'=>'
CHtml::checkBox("cid[]",($data["chk2_val"] ? true : false),

array("value"=>$data["id"],
	"onclick" => "javascript:$(\'.id{$data["id"]}\').attr(\'checked\',$(this).is(\':checked\'));",
	"style"=>($data["chk2_show"] == 1 ? "display:inline-block;" : "display:none;"),
	"class"=>"par{$data["id"]}",
))',
'type'=>'raw',
'headerHtmlOptions' => array('style'=>'width:20px;'),
		),


		array('name'=>'child', 'header'=>'Catalogos', 'type'=>'raw', 'headerHtmlOptions'=>array('style'=>'width:65px'),),
		
		
/////////chk3//////////////////////////////////////////////////////////77

		array('name'=>'chk3', 'header'=>'Opcion '.CHtml::CheckBox('sel',false, array('onclick' => "javascript:$('.chk_panel').attr('checked',$(this).is(':checked'));",'style'=>'float:right')), 'type'=>'raw', 'htmlOptions' => array('style'=>'display:none;'), 'headerHtmlOptions'=>array('style'=>'width:125px;display:none;'), ),
				
				
				
		array(			
'value'=>'
CHtml::checkBox("cid[]",($data["chk3_val"] ? true : false),

array("value"=>$data["id"],
	"onclick" => "javascript:$(\'.id{$data["id"]}\').attr(\'checked\',$(this).is(\':checked\'));",
	"style"=>($data["chk3_show"] == 1 ? "display:inline-block;" : "display:none;"),
	"class"=>"par{$data["id"]}",
))',
'type'=>'raw',
'headerHtmlOptions' => array('style'=>'width:20px;'),
		),
				
				
				
		array('name'=>'panel', 'header'=>'Paneles', 'type'=>'raw', 'headerHtmlOptions'=>array('style'=>'width:129px'),),
		
		
/////////activo//////////////////////////////////////////////////////////77
/*		
		array('name'=>'activo', 'header'=>'<font style="font-size:9px;">Act</font><br>'.CHtml::CheckBox('sel',false, array('onclick' => "javascript:$('.chk_activo').attr('checked',$(this).is(':checked'));")), 'type'=>'raw', 'htmlOptions' => array('style'=>'text-align:center;display:none;'), 'headerHtmlOptions'=>array('style'=>'text-align:center;width:22px;display:none;','title'=>'Active'), ),		


		array('header'=>'<font style="font-size:16px;">Activo</font>',				
'value'=>'CHtml::checkBox("cid[]",($data["activo_val"] ? true : false),
array("value"=>$data["id"],
	"onclick" => "javascript:$(\'.id{$data["id"]}ac\').attr(\'checked\',$(this).is(\':checked\'));",
	"style"=>($data["activo_show"] == 1 ? "display:inline-block;" : "display:none;"),
	"class"=>"par{$data["id"]}",
))',
'type'=>'raw',
'headerHtmlOptions' => array('style'=>'width:20px;'),
		),
*/
/////////insert//////////////////////////////////////////////////////////77

		array('name'=>'insert', 'header'=>'<font style="font-size:9px;">Cre</font><br>'.CHtml::CheckBox('sel',false, array('onclick' => "javascript:$('.chk_insert').attr('checked',$(this).is(':checked'));")), 'type'=>'raw', 'htmlOptions' => array('style'=>'text-align:center;display:none;'), 'headerHtmlOptions'=>array('style'=>'text-align:center;width:20px;display:none;','title'=>'Create'), ),


		array('header'=>'<font style="font-size:16px;">Insert</font>',				
'value'=>'CHtml::checkBox("cid[]",($data["insert_val"] ? true : false),
array("value"=>$data["id"],
	"onclick" => "javascript:$(\'.id{$data["id"]}in\').attr(\'checked\',$(this).is(\':checked\'));",
	"style"=>($data["insert_show"] == 1 ? "display:inline-block;" : "display:none;"),
	"class"=>"par{$data["id"]}",
))',
'type'=>'raw',
'headerHtmlOptions' => array('style'=>'width:20px;'),
		),
		
		
/////////update//////////////////////////////////////////////////////////77
		
		array('name'=>'update', 'header'=>'<font style="font-size:9px;">Upd</font><br>'.CHtml::CheckBox('sel',false, array('onclick' => "javascript:$('.chk_update').attr('checked',$(this).is(':checked'));")), 'type'=>'raw', 'htmlOptions' => array('style'=>'text-align:center;display:none;'), 'headerHtmlOptions'=>array('style'=>'text-align:center;width:20px;display:none;','title'=>'Update'), ),


		array('header'=>'<font style="font-size:16px;">Update</font>',				
'value'=>'CHtml::checkBox("cid[]",($data["update_val"] ? true : false),
array("value"=>$data["id"],
	"onclick" => "javascript:$(\'.id{$data["id"]}up\').attr(\'checked\',$(this).is(\':checked\'));",
	"style"=>($data["update_show"] == 1 ? "display:inline-block;" : "display:none;"),
	"class"=>"par{$data["id"]}",
))',
'type'=>'raw',
'headerHtmlOptions' => array('style'=>'width:20px;'),
		),
		
		
/////////auth//////////////////////////////////////////////////////////77

		array('name'=>'auth', 'header'=>'<font style="font-size:9px;">Auth</font><br>'.CHtml::CheckBox('sel',false, array('onclick' => "javascript:$('.chk_auth').attr('checked',$(this).is(':checked'));")), 'type'=>'raw', 'htmlOptions' => array('style'=>'text-align:center;display:none;'), 'headerHtmlOptions'=>array('style'=>'text-align:center;width:20px;display:none;','title'=>'Auth'), ),
		
		array('header'=>'<font style="font-size:16px;">Auth</font>',				
'value'=>'CHtml::checkBox("cid[]",($data["auth_val"] ? true : false),
array("value"=>$data["id"],
	"onclick" => "javascript:$(\'.id{$data["id"]}au\').attr(\'checked\',$(this).is(\':checked\'));",
	"style"=>($data["auth_show"] == 1 ? "display:inline-block;" : "display:none;"),
	"class"=>"par{$data["id"]}",
))',
'type'=>'raw',
'headerHtmlOptions' => array('style'=>'width:20px;'),
		),
/*
		array('name'=>'pdf', 'header'=>'<font style="font-size:9px;">Pdf</font><br>'.CHtml::CheckBox('sel',false, array('onclick' => "javascript:$('.chk_pdf').attr('checked',$(this).is(':checked'));")), 'type'=>'raw', 'htmlOptions' => array('style'=>'text-align:center'), 'headerHtmlOptions'=>array('style'=>'text-align:center;width:20px;','title'=>'PDF'), ),

		array('name'=>'excel', 'header'=>'<font style="font-size:9px;">Exc</font><br>'.CHtml::CheckBox('sel',false, array('onclick' => "javascript:$('.chk_excel').attr('checked',$(this).is(':checked'));")), 'type'=>'raw', 'htmlOptions' => array('style'=>'text-align:center'), 'headerHtmlOptions'=>array('style'=>'text-align:center;width:20px;','title'=>'Excel'), ),
*/		

/////////admin//////////////////////////////////////////////////////////77
		
		array('name'=>'admin', 'header'=>'<font style="font-size:9px;">Adm</font><br>'.CHtml::CheckBox('sel',false, array('onclick' => "javascript:$('.chk_admin').attr('checked',$(this).is(':checked'));")), 'type'=>'raw', 'htmlOptions' => array('style'=>'text-align:center;display:none;'), 'headerHtmlOptions'=>array('style'=>'text-align:center;width:21px;display:none;','title'=>'Admin'), ),

		array('header'=>'<font style="font-size:16px;">Admin</font>',				
'value'=>'CHtml::checkBox("cid[]",($data["admin_val"] ? true : false),
array("value"=>$data["id"],
	"onclick" => "javascript:$(\'.id{$data["id"]}ad\').attr(\'checked\',$(this).is(\':checked\'));",
	"style"=>($data["admin_show"] == 1 ? "display:inline-block;" : "display:none;"),
	"class"=>"par{$data["id"]}",
))',
'type'=>'raw',
'headerHtmlOptions' => array('style'=>'width:20px;'),
		),
		
/////////delete//////////////////////////////////////////////////////////77
		
		array('name'=>'delete', 'header'=>'<font style="font-size:9px;">Del</font><br>'.CHtml::CheckBox('sel',false, array('onclick' => "javascript:$('.chk_delete').attr('checked',$(this).is(':checked'));")), 'type'=>'raw', 'htmlOptions' => array('style'=>'text-align:center;display:none;'), 'headerHtmlOptions'=>array('style'=>'text-align:center;width:20px;display:none;','title'=>'Delete'), ),

		array('header'=>'<font style="font-size:16px;">Delete</font>',		
'value'=>'CHtml::checkBox("cid[]",($data["delete_val"] ? true : false),
array("value"=>$data["id"],
	"onclick" => "javascript:$(\'.id{$data["id"]}de\').attr(\'checked\',$(this).is(\':checked\'));",
	"style"=>($data["delete_show"] == 1 ? "display:inline-block;" : "display:none;"),
	"class"=>"par{$data["id"]}",
))',
'type'=>'raw',
'headerHtmlOptions' => array('style'=>'width:20px;'),
		),
		
		array('name'=>'control', 'header'=>'Controller', 'type'=>'raw', 'headerHtmlOptions'=>array('style'=>'width:178px'),),
		
		array('name'=>'view','headerHtmlOptions'=>array('style'=>'width:43px'),),

		//'fecha', 
		//'user',
		//'stat',
		
	),
	
)); ?>

<?php $this->endWidget(); ?>

<?php  /*
Yii::app()->clientScript->registerScript("menu", "
$(document).ready(function() {

	$('.keys').remove();

    $('#operations').css('position', 'fixed');
    $('#operations').css('background', 'white');
    $('#operations').css('display', 'block');
    $('#operations').css('width', '100%');

    $('.items thead tr').css('position', 'fixed');
    $('.items thead tr').css('top', '160px');
    $('.items thead tr').css('background', 'silver');
    $('.items tbody tr td label').css('font-size', '10px');
    $('.items tbody tr td').css('font-size', '10px');

});
"); */
?>
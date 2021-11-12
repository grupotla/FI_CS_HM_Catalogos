<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

?>

<?php /*$this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    //'heading'=>'Welcome to '.CHtml::encode(Yii::app()->name),
)); */?>


<?php
/*echo "<pre>";
print_r(Yii::app()->session['items']);
echo "</pre>";*/

if (!Yii::app()->user->isGuest) {
	
	$colors[] = "danger";
	$colors[] = "warning";
	$colors[] = "success";
	$colors[] = "primary";
	$colors[] = "info";	
	$colors[] = "inverse";
	
	//$colors[] = "default";

	$rnd = range(0,count($colors)-1);

	shuffle($rnd);

	$r = array_merge($rnd,$rnd,$rnd);

	$c = 0;

	echo "<table width=90% border=0 align=center>";

	if (count(Yii::app()->session['items']) == 0) {
				
?>	
	<tr>
		<td>
						
		<div class="alert alert-error">
		<button class="close" data-dismiss="alert" type="button">×</button>
			<center>AUN NO TIENE CATALOGOS ASIGNADOS<br>Por favor solicitar sus catalogos de trabajo.</center>
		</div>
		
		</td>
<?php

		
	} else {
			

		//if (is_array(Yii::app()->session['items']))

		foreach (Yii::app()->session['items'] as $i => $menus) {

			/*echo "<pre>";
			print_r($menus);
			echo "</pre>";*/
			if (isset($menus['items'])) {

			if (is_array($menus['items'])) {

				
				echo "<tr><td>";
				echo CHtml::link("<span class='".$menus["icon"]."'></span> ".$menus["label"],"#",array('class'=>'btn btn-block','style'=>'height:60px;font-size:24px;text-align:left;padding:10px;margin:2px;'));
				echo "</tr>";

				foreach ($menus['items'] as $k => $opciones) {
					
					$rnd = $r[$c]; 					
					$c++;

					//echo "<tr>";
					//echo "<td>";
					echo "<td>";
					echo CHtml::link("<span class='".$opciones["icon"]."'></span> ".$opciones["label"],Yii::app()->controller->createUrl($opciones['url'][0]),array('class'=>'btn btn-block btn-'.$colors[$rnd],'style'=>'height:60px;font-size:24px;text-align:left;padding:10px;margin:2px;'));
					echo "<td>";
					//echo "<td>";
					//echo "</tr>";
					
				}
			}

			}
		}
	}

	$rnd = $r[$c]; 
	
	echo "<tr><td><td><td>".CHtml::link("<span class='icon-off icon-white'></span> Logout",Yii::app()->controller->createUrl('site/logout'),array('class'=>'btn btn-block btn-'.$colors[$rnd],'style'=>'height:50px;font-size:24px;text-align:left;padding:10px;margin:2px;'));

	echo "</table>";

} else {	
	
	$this->redirect(array('login'));
	
}



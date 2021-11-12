<?php


	$control = Yii::app()->controller->id;
	$action = $this->action->id;


	$header = "";

	ob_start();
		$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'grid',
			'itemsCssClass'=>'table table-hover table-striped table-bordered table-condensed',
			'dataProvider'=>$model,
			'columns'=>$columns,
		));
		$grid = ob_get_contents();
	ob_end_clean();



	$grid = str_replace('<table ','<table align=center cellpadding=3 style="width:100%;border-spacing: 0;border-collapse: collapse; font-family:arial;font-size:10px;" ',$grid);
	$grid = str_replace(Yii::app()->request->baseUrl,'',$grid);
	$grid = str_replace($control,'',$grid);
	$control[0] = strtoupper($control[0]);
	$grid = str_replace($control."_sort",'',$grid);
	$grid = str_replace('href="/index.php?r=/GeneratePdf&amp;=','"',$grid);
	$grid = str_replace('href="/index.php?r=/GenerateExcel&amp;=','"',$grid);
	$grid = str_replace('style="display:none','',$grid);
	$grid = str_replace('<span>','',$grid);
	$grid = str_replace('</span>','',$grid);
	$grid = str_replace('class="summary"','class="summary" style="color:white;display:none"',$grid);
	$grid = str_replace('class="keys"','class="keys" style="color:white;display:none"',$grid);
	$grid = str_replace('<a class="sort-link"','<span ',$grid);
	$grid = str_replace('</a','</span',$grid);
	$grid = str_replace('</th><th','</th>
		<th',$grid);
	$grid = str_replace('</td><td','</td>
			<td',$grid);

	if (strpos($grid,'<th style="'))
		$grid = str_replace('<th style="','<th style="padding:7 7 7 7;background-color:black;color:white;',$grid);
	else
		$grid = str_replace('<th ','<th style="padding:7 7 7 7;background-color:black;color:white;',$grid);
	$grid = str_replace('class="odd"','style="background-color:silver;"',$grid);

	$grid = str_replace('<td>','<td style="padding:1 7 1 7;">',$grid);//top right bottom left

	$grid = str_replace('<div id="grid" class="grid-view">','<span>',$grid);
	$grid = str_replace('<div','<span',$grid);
	$grid = str_replace('</div>','</span>',$grid);



//$_SERVER['SERVER_ADDR'].Yii::app()->request->baseUrl
//$url = "localhost".Yii::app()->request->baseUrl;
$url = "10.10.1.20/catalogo_new";



	if ($action == "GeneratePdf") {

echo "
<page backtop=15mm backbottom=10mm backleft=10mm backright=10mm>
    <page_header>
        <table style='width: 100%; border: solid 1px gray;'>
            <tr>
                <td style='text-align: left; width: 15%'><img src='http://$url/images/aimar.gif'></td>
                <td style='text-align: center; width: 70%'><h4>".Yii::app()->session['mn_title']."</h4></td>
                <td style='text-align: right; width: 15%'></td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style='width: 100%; border-top: solid 1px gray;font-size:8px;color:gray;'>
            <tr>
                <td style='text-align: left; width: 25%'>".date("d/m/Y H:i:s")."</td>
                <td style='text-align: center; width: 50%'>".Yii::app()->session['usr_nm']." $control</td>
                <td style='text-align: right; width: 25%'>Pagina [[page_cu]] de [[page_nb]]</td>
            </tr>
        </table>
    </page_footer>

	$grid

</page>";


	} else {

		$header = "
			<tr>
		        <td colspan=2 style='border-bottom:1px solid black;vertical-align:top'><img src='http://$url/images/aimar.gif'></td>
		        <td colspan=3 style='border-bottom:1px solid black;text-align:center;'><font size=12>".Yii::app()->session['mn_title']."</font></td>
		        <td colspan=3 style='border-bottom:1px solid black;text-align:right'>".Yii::app()->session['usr_nm']."</td>
		    </tr>";

		$grid = str_replace('<thead>','<thead>'.$header,$grid);

		echo $grid;
	}

	file_put_contents("../yiilog/$control.htm",$grid);

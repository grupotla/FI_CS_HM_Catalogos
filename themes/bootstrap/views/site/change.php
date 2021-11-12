<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    'heading'=>'Contraseña Vencida',//.CHtml::encode(Yii::app()->name),
)); ?>


<script>
    function cambio_clave() {                
        window.open('http://10.10.1.20/catalogo_admin/cambio/index.php', 'Cambio Clave', 'height=500, width=300, menubar=0, resizable=0, scrollbars=0, toolbar=0');
    }               
</script>

<p>La contraseña ha vencido, </p>
<p>favor de actualizarla </p>

<p><a href="#" onclick="cambio_clave()"><font color=red>AQUI</font></a></p>
					

<?php $this->endWidget(); ?>


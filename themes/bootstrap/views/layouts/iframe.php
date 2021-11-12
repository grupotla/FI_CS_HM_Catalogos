<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

<!--
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/assets/7af325b5/dist/jquery.inputmask.bundle.js"></script>
-->
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/css/jqueryui/jquery.inputmask.bundle.js"></script>	

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<!-- <div class="container" id="page"> -->
	<?php echo $content; ?>
<!-- </div> -->

<?php include("javascript.php"); ?>

</body>
</html>

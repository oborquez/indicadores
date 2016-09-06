<? include_once(Yii::app()->basePath."/includes/menu.php")  ?>
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<!DOCTYPE html>



<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if IE 9]>         <html class="ie9 gt-ie8"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="gt-ie8 gt-ie9 not-ie"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

	<meta name="language" content="es" />

	<!-- Open Sans font from Google CDN -->
	<!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">-->

	<!-- Pixel Admin's stylesheets -->
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/PixelAdmin/stylesheets/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/PixelAdmin/stylesheets/pixel-admin.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/PixelAdmin/stylesheets/widgets.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/PixelAdmin/stylesheets/rtl.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/PixelAdmin/stylesheets/themes.min.css" rel="stylesheet" type="text/css">

	<!-- KENDO & Custom functions -->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/kendoUI/styles/kendo.silver.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/kendoUI/styles/kendo.common.min.css" />

	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/custom/functions.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/kendoUI/js/kendo.all.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/kendoUI/js/cultures/kendo.culture.es-MX.min.js"></script>	



	<!--[if lt IE 9]>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/PixelAdmin/javascripts/ie.min.js"></script>
	<![endif]-->
	<script type="text/javascript">
		kendo.culture("es-MX");
		var baseUrl = "<? echo Yii::app()->request->baseUrl?>";
	</script>	

</head>



<body class="theme-asphalt main-menu-animated">

<script>var init = [];</script>

<body class="page-invoice page-invoice-print">
	<script>
		window.onload = function () {
			//window.print();
		};
	</script>

	<div class="invoice">


		<div class="invoice-header">
			<h3>
				<div>
					<small><strong>AUTOMEDD</strong></small><br>
					Reporte de indicadores
				</div>
			</h3>
			<address>
				CIAD<br>
				Carretera a La Victoria km 0.6<br>
				Hermosillo, Sonora, México, C.P. 83304
			</address>
			
		</div> <!-- / .invoice-header -->


		<!-- Main content -->	
		<?php echo $content; ?>
		
	</div> <!-- / .invoice -->

	<!-- Pixel Admin's javascripts -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/PixelAdmin/javascripts/bootstrap.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/PixelAdmin/javascripts/pixel-admin.js"></script>

	<script type="text/javascript">
		init.push(function () {
			window.print();
		})
		window.PixelAdmin.start(init);
	</script>
</body>
</html>
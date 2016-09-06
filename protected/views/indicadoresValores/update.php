<?php
/* @var $this IndicadoresValoresController */
/* @var $model IndicadoresValores */

$this->breadcrumbs=array(
	'Indicadores Valores'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);


?>

<h1>Update IndicadoresValores <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
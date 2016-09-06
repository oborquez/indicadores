<?php
/* @var $this IndicadoresPeriodosController */
/* @var $model IndicadoresPeriodos */

$this->breadcrumbs=array(
	'Indicadores Periodoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);


?>

<h1>Update IndicadoresPeriodos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
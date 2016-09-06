<?php
/* @var $this IndicadoresController */
/* @var $model Indicadores */

$this->breadcrumbs=array(
	'Indicadores'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);


?>

<h1>Update Indicadores <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
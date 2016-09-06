<?php
/* @var $this AreasExitoValoresController */
/* @var $model AreasExitoValores */

$this->breadcrumbs=array(
	'Areas Exito Valores'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);


?>

<h1>Update AreasExitoValores <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this GruposController */
/* @var $model Grupos */

$this->breadcrumbs=array(
	'Grupos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);


?>

<h1>Update Grupos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
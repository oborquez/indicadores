<?php
/* @var $this AreasExitoValoresController */
/* @var $data AreasExitoValores */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_area_exito')); ?>:</b>
	<?php echo CHtml::encode($data->id_area_exito); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha1')); ?>:</b>
	<?php echo CHtml::encode($data->fecha1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha2')); ?>:</b>
	<?php echo CHtml::encode($data->fecha2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('minimo')); ?>:</b>
	<?php echo CHtml::encode($data->minimo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('maximo')); ?>:</b>
	<?php echo CHtml::encode($data->maximo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('real')); ?>:</b>
	<?php echo CHtml::encode($data->real); ?>
	<br />


</div>
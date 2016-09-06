<?php
/* @var $this AreasExitoValoresController */
/* @var $model AreasExitoValores */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('class'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_area_exito'); ?>
		<?php echo $form->textField($model,'id_area_exito',array('class'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha1'); ?>
		<?php echo $form->textField($model,'fecha1',array('class'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha2'); ?>
		<?php echo $form->textField($model,'fecha2',array('class'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'minimo'); ?>
		<?php echo $form->textField($model,'minimo',array('class'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'maximo'); ?>
		<?php echo $form->textField($model,'maximo',array('class'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'real'); ?>
		<?php echo $form->textField($model,'real',array('class'=>'')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
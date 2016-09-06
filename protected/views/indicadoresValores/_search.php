<?php
/* @var $this IndicadoresValoresController */
/* @var $model IndicadoresValores */
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
		<?php echo $form->label($model,'id_indicador'); ?>
		<?php echo $form->textField($model,'id_indicador',array('class'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_periodo'); ?>
		<?php echo $form->textField($model,'id_periodo',array('class'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valor'); ?>
		<?php echo $form->textField($model,'valor',array('class'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'avalado'); ?>
		<?php echo $form->textField($model,'avalado',array('class'=>'')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
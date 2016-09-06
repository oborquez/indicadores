<?php
/* @var $this GruposController */
/* @var $model Grupos */
/* @var $form CActiveForm */
?>

<div class="row">
	<div class="col-sm-12">
		<form class="panel form-horizontal" method="post"> 
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'grupos-form',
			'enableAjaxValidation'=>false,
			)); ?>

			<!--
			<div class="panel-heading">
				<span class="panel-title">Form title</span>
			</div>
			-->
			<div class="panel-body">


			<p class="note note-info">Campos con <span class="required">*</span> son requeridos.</p>

			<?php echo $form->errorSummary($model,NULL,NULL,array('class'=>'note note-danger')); ?>


							
				<div class="form-group">
					<?php echo $form->labelEx($model,'nombre',array('class'=>'col-sm-2 control-label')); ?>
					<div class="col-sm-10">
						<?php echo $form->textField($model,'nombre',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
					
						<?php echo $form->error($model,'nombre',array('class'=>'label label-danger')); ?>
					</div>
				</div> <!-- / .form-group -->

				
				<div class="form-group" style="margin-bottom: 0;">
					<div class="col-sm-offset-2 col-sm-10">
						<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', array('class'=>'btn btn-primary')); ?>
					</div>
				</div> <!-- / .form-group -->







			</div>
		</form>


	</div>
</div>

<?php $this->endWidget(); ?>

<!-- /form with bootstrap -->

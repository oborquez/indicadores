<?php
/* @var $this AreasExitoValoresController */
/* @var $model AreasExitoValores */
/* @var $form CActiveForm */
?>

<div class="row">
	<div class="col-sm-12">
		<form class="panel form-horizontal" method="post"> 
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'areas-exito-form',
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


							
				<?php echo $form->hiddenField($model,'id',array('class'=>'form-control')); ?>
					
				
				<div class="form-group">
					<?php echo $form->labelEx($model,'clave',array('class'=>'col-sm-2 control-label')); ?>
					<div class="col-sm-10">
						<?php echo $form->textField($model,'clave',array('class'=>'form-control')); ?>
					
						<?php echo $form->error($model,'clave',array('class'=>'label label-danger')); ?>
					</div>
				</div> <!-- / .form-group -->


				<div class="form-group">
					<?php echo $form->labelEx($model,'nombre',array('class'=>'col-sm-2 control-label')); ?>
					<div class="col-sm-10">
						<?php echo $form->textField($model,'nombre',array('class'=>'form-control')); ?>
					
						<?php echo $form->error($model,'nombre',array('class'=>'label label-danger')); ?>
					</div>
				</div> <!-- / .form-group -->
							
				<div class="form-group">
					<?php echo $form->labelEx($model,'id_usuario',array('class'=>'col-sm-2 control-label')); ?>
					<div class="col-sm-10">
						<?php echo $form->dropDownList($model,'id_usuario',CHtml::listData(Usuarios::model()->findAll( "id_grupo =".Yii::app()->user->getState("id_grupo") ),"id","nombre"),array('class'=>'form-control')); ?>
					
						<?php echo $form->error($model,'id_usuario',array('class'=>'label label-danger')); ?>
					</div>
				</div> <!-- / .form-group -->

				<div class="form-group">
					<?php echo $form->labelEx($model,'tipo',array('class'=>'col-sm-2 control-label')); ?>
					<div class="col-sm-10">
						<?php echo $form->dropDownList($model,'tipo',AreasExito::model()->tipos(),array('class'=>'form-control')); ?>
					
						<?php echo $form->error($model,'tipo',array('class'=>'label label-danger')); ?>
					</div>
				</div> <!-- / .form-group -->


				<div class="form-group">
					<?php echo $form->labelEx($model,'unidad',array('class'=>'col-sm-2 control-label')); ?>
					<div class="col-sm-10">
						<?php echo $form->textField($model,'unidad',array('class'=>'form-control')); ?>
					
						<?php echo $form->error($model,'unidad',array('class'=>'label label-danger')); ?>
					</div>
				</div> <!-- / .form-group -->

							
				<div class="form-group">
					<?php echo $form->labelEx($model,'descripcion',array('class'=>'col-sm-2 control-label')); ?>
					<div class="col-sm-10">
						<?php echo $form->textArea($model,'descripcion',array('class'=>'form-control')); ?>
					
						<?php echo $form->error($model,'descripcion',array('class'=>'label label-danger')); ?>
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

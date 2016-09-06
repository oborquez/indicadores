<?php
/* @var $this AreasExitoValoresController */
/* @var $model AreasExitoValores */
/* @var $form CActiveForm */
?>

<div class="row">
	<div class="col-sm-12">
		<form class="panel form-horizontal" method="post"> 
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'areas-exito-valores-form',
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


							
				
				<?php echo $form->hiddenField($model,'id_area_exito',array('class'=>'form-control')); ?>
					
				<?if(Yii::app()->user->getState("rol")==2):?>
							
				<div class="form-group">
					<?php echo $form->labelEx($model,'fecha1',array('class'=>'col-sm-2 control-label')); ?>
					<div class="col-sm-10">
						<?php echo $form->textField($model,'fecha1',array('class'=>'form-control',"style"=>"width:100px;")); ?>
					
						<?php echo $form->error($model,'fecha1',array('class'=>'label label-danger')); ?>
					</div>
				</div> <!-- / .form-group -->

							
				<div class="form-group">
					<?php echo $form->labelEx($model,'fecha2',array('class'=>'col-sm-2 control-label')); ?>
					<div class="col-sm-10">
						<?php echo $form->textField($model,'fecha2',array('class'=>'form-control',"style"=>"width:100px;")); ?>
					
						<?php echo $form->error($model,'fecha2',array('class'=>'label label-danger')); ?>
					</div>
				</div> <!-- / .form-group -->

							
				<div class="form-group">
					<?php echo $form->labelEx($model,'minimo',array('class'=>'col-sm-2 control-label')); ?>
					<div class="col-sm-10">
						<?php echo $form->numberField($model,'minimo',array('class'=>'form-control',"style"=>"width:120px;")); ?>
						<?= $model->area->unidad?>
						<?php echo $form->error($model,'minimo',array('class'=>'label label-danger')); ?>
					</div>
				</div> <!-- / .form-group -->

							
				<div class="form-group">
					<?php echo $form->labelEx($model,'maximo',array('class'=>'col-sm-2 control-label')); ?>
					<div class="col-sm-10">
						<?php echo $form->numberField($model,'maximo',array('class'=>'form-control',"style"=>"width:120px;")); ?>
						<?= $model->area->unidad?>
						<?php echo $form->error($model,'maximo',array('class'=>'label label-danger')); ?>
					</div>
				</div> <!-- / .form-group -->

				<div class="form-group">
					<?php echo $form->labelEx($model,'avalado',array('class'=>'col-sm-2 control-label')); ?>
					<div class="col-sm-10">
						<?php echo $form->checkbox($model,'avalado',array('class'=>'cbx-avalado',"style"=>"width:120px;")); ?>
						<?php echo $form->error($model,'avalado',array('class'=>'label label-danger')); ?>
					</div>
				</div> <!-- / .form-group -->
				<?endif?>
				<? if(Yii::app()->user->getState("rol") == 1): ?>			
				<div class="form-group">
					<?php echo $form->labelEx($model,'real',array('class'=>'col-sm-2 control-label')); ?>
					<div class="col-sm-10">
						<?php echo $form->numberField($model,'real',array('class'=>'form-control',"style"=>"width:120px;")); ?>
						<?= $model->area->unidad?>
						<?php echo $form->error($model,'real',array('class'=>'label label-danger')); ?>
					</div>
				</div> <!-- / .form-group -->
				<?endif?>
				
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

<script type="text/javascript">
	
	init.push(function () {
		$('#AreasExitoValores_fecha1').datepicker(
		{
			format: 'dd/mm/yyyy',	
		}
		);
		$('#AreasExitoValores_fecha2').datepicker(
		{
			format: 'dd/mm/yyyy',	
		}	
		);


		$('.cbx-avalado').switcher({
			theme: 'square',
			on_state_content: '<span class="fa fa-check"></span>',
			off_state_content: '<span class="fa fa-times"></span>'
		});


	});		

</script>
<?php
/* @var $this IndicadoresValoresController */
/* @var $model IndicadoresValores */
/* @var $form CActiveForm */
?>

<div class="row">
	<div class="col-sm-12">
		<form class="panel form-horizontal" method="post"> 
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'indicadores-valores-form',
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
					<?php echo $form->labelEx($model,'valor',array('class'=>'col-sm-2 control-label')); ?>
					<div class="col-sm-10">
						<?php echo $form->numberField($model,'valor',array('min'=>0,'max' =>100 , 'class'=>'form-control', 'style'=>"width:100px")); ?>
					
						<?php echo $form->error($model,'valor',array('class'=>'label label-danger')); ?>
					</div>
				</div> <!-- / .form-group -->

				<?if(Yii::app()->user->getState("rol")==2):?>			
				<div class="form-group">
					<?php echo $form->labelEx($model,'avalado',array('class'=>'col-sm-2 control-label')); ?>
					<div class="col-sm-10">
						<?php echo $form->checkbox($model,'avalado',array('class'=>'cbx-avalado')); ?>
					
						<?php echo $form->error($model,'avalado',array('class'=>'label label-danger')); ?>
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
		
		$('.cbx-avalado').switcher({
			theme: 'square',
			on_state_content: '<span class="fa fa-check"></span>',
			off_state_content: '<span class="fa fa-times"></span>'
		});


	});	
</script>
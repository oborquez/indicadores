<?php
/* @var $this AreasExitoValoresController */
/* @var $model AreasExitoValores */

$this->breadcrumbs=array(
	'Areas Exito Valores'=>array('index'),
	'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#areas-exito-valores-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-header">
    
    <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-icon page-header-icon"></i>&nbsp;&nbsp; Areas Exito Valores</h1>

        <div class="col-xs-12 col-sm-8">
            
        </div>
    </div>
</div> <!-- / .page-header -->

<div class="panel">
	<div class="panel-body">
<p class="note note-info">
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'areas-exito-valores-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'id_area_exito',
		'fecha1',
		'fecha2',
		'minimo',
		'maximo',
		/*
		'real',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
	</div>
</div>

<script type="text/javascript">
	
	$(document).ready(function(){

		$("input").addClass("form-control");

	})

</script>
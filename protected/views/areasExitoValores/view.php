<?php
/* @var $this AreasExitoValoresController */
/* @var $model AreasExitoValores */

$this->breadcrumbs=array(
	'Areas Exito Valores'=>array('/AreasExitoValores'),
	'Vista',
);

?>

<div class="page-header">
    
    <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-file page-header-icon"></i>&nbsp;&nbsp;  Vista </h1>

        <div class="col-xs-12 col-sm-8">
            
        </div>
    </div>
</div> <!-- / .page-header -->

<div class="panel">
	<div class="panel-body">
		
		<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'id',
		'id_area_exito',
		'fecha1',
		'fecha2',
		'minimo',
		'maximo',
		'real',
			),
		)); ?>
	</div>
</div>


<?php
/* @var $this AreasExitoValoresController */
/* @var $model AreasExitoValores */

$this->breadcrumbs=array(
	//'Areas Exito Valores'=>array('index'),
	'Areas Exito' => array('/areasexito'),
	$model->area->nombre => array('/areasexito/area/'.$model->area->id),
	'Crear',
);

?>

<div class="page-header">
    
    <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-plus page-header-icon"></i>&nbsp;&nbsp; Nuevo periodo "<?= $model->area->nombre?>"</h1>

        <div class="col-xs-12 col-sm-8">
            
        </div>
    </div>
</div> <!-- / .page-header -->


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
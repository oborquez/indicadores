<?php
/* @var $this IndicadoresController */
/* @var $model Indicadores */

$this->breadcrumbs=array(
	'Indicadores'=>array('index'),
	'Crear',
);

?>

<div class="page-header">
    
    <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-icon page-header-icon"></i>&nbsp;&nbsp; Crear Indicadores</h1>

        <div class="col-xs-12 col-sm-8">
            
        </div>
    </div>
</div> <!-- / .page-header -->


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
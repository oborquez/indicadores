<?php
/* @var $this IndicadoresValoresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Indicadores Valores',
);

?>


<div class="page-header">
    
    <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-icon page-header-icon"></i>&nbsp;&nbsp; Indicadores Valores</h1>

        <div class="col-xs-12 col-sm-8">
            
        </div>
    </div>
</div> <!-- / .page-header -->

<div class="panel">
	<div class="panel-body">
	<?php $this->widget('bootstrap.widgets.TbGridView', array(
		'dataProvider'=>$dataProvider,
	)); ?>
	</div>
</div>


<?php
/* @var $this AreasexitoController */

$this->breadcrumbs=array(
	'Áreas de éxito'=>array("/areasexito"),
	"Nueva"
);
?>


<div class="page-header">
    
    <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-check page-header-icon"></i>&nbsp;&nbsp; Nueva área de éxito</h1>

        <div class="col-xs-12 col-sm-8">
            
        </div>
    </div>
</div> <!-- / .page-header -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
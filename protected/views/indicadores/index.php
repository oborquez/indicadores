<?php
/* @var $this IndicadoresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Indicadores',
);

?>


<div class="page-header">
    
    <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-check page-header-icon"></i>&nbsp;&nbsp; Indicadores</h1>
        <div class="col-xs-12 col-sm-8 text-right">
        	<!--<a href="<?echo Yii::app()->baseUrl?>/indicadoresPeriodos/create" class="btn btn-primary btn-labeled" "><span class="btn-label icon fa fa-plus"></span> Nuevo Periodo</a>
        	<a href="<?echo Yii::app()->baseUrl?>/indicadores/create" class="btn btn-primary btn-labeled" "><span class="btn-label icon fa fa-plus"></span> Nuevo indicador</a>
            -->
        </div>
    </div>
</div> <!-- / .page-header -->

<div class="panel">
	<div class="panel-heading">Bienvenido</div>
	<div class="panel-body">
		
	<?if(Yii::app()->user->getState("rol")>1):?>
		<div class="col-xl-12">
			<div class="col-sm-3">
				<a href="<?= Yii::app()->baseUrl?>/indicadores/lista" class="btn btn-rounded btn-lg btn-labeled"><span class="btn-label icon fa fa-check"></span>Indicadores</a>
			</div>
		
			<div class="col-sm-3">
				<a href="<?= Yii::app()->baseUrl?>/indicadoresPeriodos" class="btn btn-rounded btn-lg btn-labeled"><span class="btn-label icon fa fa-calendar"></span>Periodos</a>
			</div>
		
			<div class="col-sm-3">
				<a href="<?= Yii::app()->baseUrl?>/indicadores/colaboradores" class="btn btn-rounded btn-lg btn-labeled"><span class="btn-label icon fa fa-group"></span>Colaboradores</a>
			</div>
		
			<div class="col-sm-3">
				<a href="<?= Yii::app()->baseUrl?>/indicadores/grupos" class="btn btn-rounded btn-lg btn-labeled"><span class="btn-label icon fa fa-group"></span>Grupos</a>
			</div>
		</div>
		<div class="col-xl-12">
			<div class="col-sm-3">
				<a href="<?= Yii::app()->baseUrl?>/indicadores/concentrado" class="btn btn-rounded btn-lg btn-labeled"><span class="btn-label icon fa fa-file"></span>Concentrado</a>
			</div>
			
		</div>
	<?else:?>
		<div class="col-sm-3">
			<a href="<?= Yii::app()->baseUrl?>/indicadores/indicadores" class="btn btn-rounded btn-lg btn-labeled"><span class="btn-label icon fa fa-check"></span>Indicadores</a>
		</div>	
		<div class="col-sm-3">
			<a href="<?= Yii::app()->baseUrl?>/indicadores/colaborador/<?=Yii::app()->user->id?>" class="btn btn-rounded btn-lg btn-labeled"><span class="btn-label icon fa fa-table"></span>Concentrado</a>
		</div>	
	<?endif?>
	</div>
</div>


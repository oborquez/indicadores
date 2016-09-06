<?php
/* @var $this IndicadoresPeriodosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Periodos'=>array("/indicadoresPeriodos"),
	$model->periodo
);

?>


<div class="page-header">
    
    <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-icon page-header-icon"></i>&nbsp;&nbsp; <?=$model->periodo?></h1>

        <div class="col-xs-12 col-sm-8 text-right">
           
        </div>
    </div>
</div> <!-- / .page-header -->

<div class="panel">
	<div class="panel-body">

		<div class="table-primary">
			<div class="table-header">
				<div class="table-caption">
					<?= $model->periodo?>
					
				</div>
			</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th colspan="2">Colaborador</th>
						<th>Indicador</th>
						<th class="text-center">Semáforo</th>
						<th class="text-center">Avalado</th>
						<th class="text-center">Comentarios</th>
						<th class="text-center">Archivos</th>
						<th class="text-center">Opciones</th>
					</tr>
				</thead>
				<tbody>
					<?foreach($model->valores as $valor):?>
						<??>
						<tr>
							<td class="text-center"><img src="<?= Yii::app()->baseUrl.$valor->indicador->usuario->image?>" style="border-radius:50%; width:30px;"></td>
							<td><?= $valor->indicador->usuario->nombre?></td>
							<td class="text-center"><?= $valor->indicador->nombre?></td>
							<td class="text-center"><a class="label label-<?= Indicadores::model()->getUmbral($valor->valor)?>"><?= $valor->valor?> <?=$valor->indicador->unidad?></a></td>
							<td class="text-center"><a href="#" class="label label-<?=($valor->avalado)? "success" : "default" ?>"><i class="fa fa-<?=($valor->avalado)? "check" : "times" ?>"></i></a></td>
							<td class="text-center"><?= count($valor->comentarios)?></td>
							<td class="text-center"><?= count($valor->archivos)?></td>
							<td class="text-center">
								<a href="<?= Yii::app()->baseUrl?>/indicadores/evidencia/<?=$valor->id?>" class="btn btn-info"><i class="fa fa-comment"></i> <i class="fa fa-file"></i> </a>
								<a href="<?= Yii::app()->baseUrl?>/indicadoresValores/update/<?=$valor->id?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
							</td>
						</tr>
					<?endforeach?>
				</tbody>
			</table>
			
		</div>
		

	</div>

</div>

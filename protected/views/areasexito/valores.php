<?php
/* @var $this AreasexitoController */

$this->breadcrumbs=array(
	'Áreas de éxito'=>array("/areasexito"),
	$model->clave." - ".$model->nombre." (Valores)"
);
?>

<div class="page-header">
    
    <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-check page-header-icon"></i>&nbsp;&nbsp; <?= $model->nombre?></h1>

        <div class="col-xs-12 col-sm-8">
            
        </div>
    </div>
</div> <!-- / .page-header -->

<div class="panel">
	
	<div class="panel-body">


				<div class="table-light">
					<div class="table-header">
						<div class="table-caption">
							Valores
						</div>
					</div>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Periodos</th>
								<?if(Yii::app()->user->getState("rol")==2):?>
									<th class="text-center">Maximo</th>
									<th class="text-center">Minimo</th>
								<?endif?>
								<th class="text-center">Real</th>
								<th class="text-center">Opciones</th>
							</tr>
						</thead>
						<tbody>
							<?foreach($model->areasExitoValores as $valor): ?>
							<tr>
								<td><?= date("d/m/Y",strtotime($valor->fecha1))." - ".date("d/m/Y",strtotime($valor->fecha2))?></td>
								<?if(Yii::app()->user->getState("rol")==2):?>
									<td class="text-center"><input class="form-control" type="text" value="<?= $valor->maximo ?>"></td>
									<td class="text-center"><input class="form-control" type="text" value="<?= $valor->minimo ?>"></td>
								<?endif?>
								<td class="text-center"><input class="form-control" type="text" value="<?= $valor->real ?>"></td>
								<td class="text-center">
									<a class="btn btn-primary btn-sm btn-rounded" title="validar"><i class="fa fa-check"></i> </a>
									<a href="<?= Yii::app()->baseUrl?>/areasexito/commfiles/<?= $valor->id?>" class="btn btn-primary btn-sm btn-rounded" title="validar"><i class="fa fa-comment"></i> <i class="fa fa-file"></i> </a>
									
								</td>
							</tr>
							<?endforeach?>
						</tbody>
					</table>
					<div class="text-right">
						<a href="" class="btn btn-primary"><i class="fa fa-save"></i>  Guardar</a>
					</div>
				</div>
		
	</div>

</div>
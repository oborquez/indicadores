<?php
/* @var $this AreasexitoController */

$this->breadcrumbs=array(
	'Áreas de éxito'=>array("/areasexito"),
	$model->clave." - ".$model->nombre
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

<div class="row">
	<div class="panel">
		<div class="panel-heading">
			Resumen actual
		</div>
		<div class="panel-body">
			<div class="col-xs-12 col-sm-6">
				<div class="text-center">
					<img src="<?= Yii::app()->baseUrl.$model->usuario->image?>" style="border-radius:50%; border:5px solid #3bc2a9; ">
				</div>
				<br>
            	<table class="table">
            		<tr>
            			<th>Colaborador</th>
            			<td><?= $model->usuario->nombre?></td>
            		</tr>
            		<tr>
            			<th>Clave</th>
            			<td><?= $model->clave?></td>
            		</tr>
            		<tr>
            			<th>Nombre</th>
            			<td><?= $model->nombre?></td>
            		</tr>
            		<tr>
            			<th>Descripción</th>
            			<td><?= $model->descripcion?></td>
            		</tr>

            		<tr>
            			<th>Unidad de medida</th>
            			<td><?= $model->unidad?></td>
            		</tr>

            		<tr>
            			<th>Tipo</th>
            			<td><?= $model->getTipo()?></td>
            		</tr>

            	</table>            		
        	</div>
        	
			<div class="col-xs-12 col-sm-6">
			<? $va = end( $model->areasExitoValores );   ?>	
			<? 	$i_cumplimiento = ( ($model->tipo == 0 && $va->real > $va->minimo  ) || ($model->tipo == 1 && $va->real < $va->maximo)  )? "check" : "times"; ?>
			<? 	$c_cumplimiento = ( ($model->tipo == 0 && $va->real > $va->minimo  ) || ($model->tipo == 1 && $va->real < $va->maximo)  )? "success" : "danger"; ?>
			<div class="text-center">
				
				<button class="btn btn-<?= $c_cumplimiento?> btn-lg btn-labeled"><span class="btn-label icon fa fa-<?= $i_cumplimiento?>"></span><?= $va->real." ".$model->unidad ?></button>
			</div>


				<!-- 6. $MORRISJS_AREA =============================================================================

								Morris.js Area
				-->
								<!-- Javascript -->
								<script>
									init.push(function () {
										Morris.Area({
											element: 'hero-area',
											data: [
											<? $total = count($model->areasExitoValores); $c = 0;?>
											<? foreach($model->areasExitoValores as $valor): ?>
												<?$c++?>
												{ period: '<?= $valor->fecha2 ?>', max: <?= $valor->maximo?> , min: <?= $valor->minimo?>, real: <?= $valor->real?> }<?if($c != $total ):?>,<?endif?>
											<? endforeach ?>
											],
											xkey: 'period',
											ykeys: ['max', 'min', 'real'],
											labels: ['Máximo', 'Mínimo', 'Real'],
											hideHover: 'auto',
											lineColors: PixelAdmin.settings.consts.COLORS,
											fillOpacity: 0.3,
											behaveLikeLine: true,
											lineWidth: 2,
											pointSize: 4,
											gridLineColor: '#cfcfcf',
											resize: true
										});
									});
								</script>
								<!-- / Javascript -->

								
										<div class="graph-container">
											<div id="hero-area" class="graph"></div>
										</div>
									
				<!-- /6. $MORRISJS_AREA -->




        	</div>

        	<div class="col-xs-12 col-sm-12">


				<div class="table-light">
					<div class="table-header">
						<div class="table-caption">
							Periodos
							<div class="col-xs-12 col-sm-2 pull-right">
								<?if(Yii::app()->user->getState("rol")==2):?>
             					<a href="<?echo Yii::app()->baseUrl?>/areasExitoValores/create/<?=$model->id?>" class="btn btn-primary btn-labeled" "><span class="btn-label icon fa fa-plus"></span> Nuevo periodo</a>
             					<?endif?>
        					</div>
						</div>
					</div>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Periodos</th>
								<th class="text-center">Minimo</th>
								<th class="text-center">Maximo</th>
								<th class="text-center">Real</th>
								<th class="text-center">Tendencia</th>
								<th class="text-center">Estado</th>
								<th class="text-center">Avalado</th>
								<th class="text-center">Opciones</th>
							</tr>
						</thead>
						<tbody>
							<?$vn = 0;?>
							<?foreach($model->areasExitoValores as $valor): ?>
								<?
									$i_tendencia = ($valor->real >= $vn)? "arrow-up" : "arrow-down";
									// iconos de estado
									if(strtotime($valor->fecha1) >= time() ){
										$i_cumplimiento = "clock-o";
										$color_cumplimiento = ( ($valor->area->tipo == 0 && $valor->real > $valor->minimo  ) || ($valor->area->tipo == 1 && $valor->real < $valor->maximo)  )? "success" : "warning";
									}else{
										$i_cumplimiento = ( ($valor->area->tipo == 0 && $valor->real > $valor->minimo  ) || ($valor->area->tipo == 1 && $valor->real < $valor->maximo)  )? "check" : "times";
										$color_cumplimiento = ( ($valor->area->tipo == 0 && $valor->real > $valor->minimo  ) || ($valor->area->tipo == 1 && $valor->real < $valor->maximo)  )? "success" : "danger";
									}

									//iconos Avalado
									if($valor->avalado){
										$color_avalado = "success";
										$icon_avalado = "check";
									}else{
										$color_avalado = "default";
										$icon_avalado = "times";
									}

								?>								
							<tr>
								<td><?= date("d/m/Y",strtotime($valor->fecha1))." - ".date("d/m/Y",strtotime($valor->fecha2))?></td>
								<td class="text-center"><?= $valor->minimo." (".$model->unidad.")"?></td>
								<td class="text-center"><?= $valor->maximo." (".$model->unidad.")"?></td>
								<td class="text-center"><?= $valor->real." (".$model->unidad.")"?></td>
								<td class="text-center"><a href="#" class="badge badge-info"><i class="fa fa-<?= $i_tendencia?>"></i></a></td>
								<td class="text-center"><a href="#" class="badge badge-<?=$color_cumplimiento?>"> <i class="fa fa-<?= $i_cumplimiento?>"></i></a></td>
								<td class="text-center"><a href="#" class="badge badge-<?=$color_avalado?>"> <i class="fa fa-<?= $icon_avalado?>"></i></a></td>
								<td class="text-center">
									<a href="<?=Yii::app()->baseUrl?>/areasExitoValores/update/<?=$valor->id?>" class="btn btn-sm btn-warning btn-rounded"><i class="fa fa-edit"></i></a>
									<a href="<?=Yii::app()->baseUrl?>/areasexito/evidencia/<?=$valor->id?>" class="btn btn-sm btn-primary btn-rounded"><i class="fa fa-comment"></i> <i class="fa fa-file"></i></a>
									<?if(Yii::app()->user->getState("rol")==2): ?>
									<a valor="<?=$valor->id?>" class=" btn-delete btn btn-sm btn-danger btn-rounded"><i class="fa fa-times"></i></a>
									<?endif?>
								</td>
							</tr>
							<?endforeach?>
						</tbody>
					</table>
				</div>

        	</div>	

        	
		</div>
	</div>
</div>

<script type="text/javascript">

$(document).ready(function(){
	
	$(".btn-delete").click(function(){
		
		if(confirm("Estás ap unto de eliminar el periodo")){
			var valor = $(this).attr("valor");
			var tr = $(this).parent().parent();
			$.getJSON(baseUrl+"/areasexito/deleteValor/"+valor,function(r){
				if(r.status){
					tr.fadeOut();
				}else{
					console.log(r);
				}

			})
		}
	})

})

</script>
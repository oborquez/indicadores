<?php
/* @var $this AreasexitoController */

$this->breadcrumbs=array(
	'Áreas de éxito'=>array("/areasexito"),
	$usuario->nombre
);
?>


<div class="page-header">
    
    <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-bar-chart-o page-header-icon"></i>&nbsp;&nbsp; Avance de <?= $usuario->nombre?></h1>

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
			<div class="col-xs-12 col-sm-12 text-center">
				<img src="<?= Yii::app()->baseUrl.$usuario->image?>" style="border-radius:50%; border:5px solid #3bc2a9; "><br>
            	<h3><?= $usuario->nombre?></h3>
				
            	          		
        	</div>
        	<div class="col-xs-12 col-sm-12">

				<!-- GRAFICA -->

				<script>
					init.push(function () {
						// Visits Chart Data
						var visitsChartData = [
						<? $tareas = count($usuario->areas); $c=0;?>
						<?foreach($usuario->areas as $area): $c++;?>
							
							{
								label: '<?=$area->nombre?>',
								data:[
									<?$tvalores = count($area->areasExitoValores); $c2=0;?>	
									<?foreach($area->areasExitoValores as $valor): $c2++;?>
										[<?= $c2?>,<?=$valor->real?>]
									<?if($c2 != $tvalores) echo ","?>
									<?endforeach?>
								]	

							}
						<?if($tareas != $c) echo ","?>
						<?endforeach?>
						];

						// Init Chart
						$('#jq-flot-graph').pixelPlot(visitsChartData, {
							series: {
								points: {
									show: true
								},
								lines: {
									show: true
								}
							},
							xaxis: {
								
							},
							yaxis: {
								tickSize: 100
							}
						}, {
							height: 205,
							tooltipText: "x+'° Perdiodo - ' + y + ' % '"
						});
					});
				</script>
				<div id="jq-flot-graph"></div>
				<!-- /GRAFICA -->
				<hr>
			</div>	
						
			<div class="row">
			<h3>Áreas de éxito</h3>

				<?foreach($usuario->areas as $area):?>		
				<div class="col-xs-12 col-sm-6">
					<h4><?=$area->nombre?></h4>					
					<table class="table">
						<thead>
							<tr>
								<th>N°</th>
								<th>Perdiodo</th>
								<th class="text-center">Mínimo</th>
								<th class="text-center">Máximo</th>
								<th class="text-center">Real</th>
								<th class="text-center">Tendencia</th>
								<th class="text-center">Estado</th>
								<th class="text-center">Avalado</th>
							</tr>
						</thead>
						<tbody>
							<?$k = 0;?>
							<?$vn = 0;?>
							<?foreach($area->areasExitoValores as $valor): $k++;?>
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
									<td><?=$k?></td>
									<td><?=date("d/m/y",strtotime($valor->fecha1))."-".date("d/m/y",strtotime($valor->fecha2))?></td>
									<td class="text-center"><?=$valor->minimo?></td>
									<td class="text-center"><?=$valor->maximo?></td>
									<td class="text-center"><?=$valor->real?></td>
									<td class="text-center"><a href="#" class="badge badge-info"><i class="fa fa-<?= $i_tendencia?>"></i></a></td>
									<td class="text-center"><a href="#" class="badge badge-<?=$color_cumplimiento?>"> <i class="fa fa-<?= $i_cumplimiento?>"></i></a></td>
									<td class="text-center"><a href="#" class="badge badge-<?=$color_avalado?>"> <i class="fa fa-<?= $icon_avalado?>"></i></a></td>
								</tr>
							<?endforeach?>
						</tbody>
					</table>
				</div>
				<?endforeach?>	
				

			</div>

				


			
        	

        	
		</div>
	</div>
</div>
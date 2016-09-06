<?php
/* @var $this AreasexitoController */

$this->breadcrumbs=array(
	'Áreas de éxito',
);
?>


<div class="page-header">
    
    <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-check page-header-icon"></i>&nbsp;&nbsp;Áreas de éxito</h1>

        <div class="col-xs-12 col-sm-2 pull-right">
             <a href="<?echo Yii::app()->baseUrl?>/areasexito/create" class="btn btn-primary btn-labeled" "><span class="btn-label icon fa fa-plus"></span> Nueva</a>
        </div>
    </div>
</div> <!-- / .page-header -->

<div class="row">
	<div class="panel">
		<div class="panel-heading">
		 
		</div>
		<div class="panel-body">
			
			<?foreach( $grupo->usuarios as $user): ?>
				<?if($user->rol == 1):?>
				<div class="table-primary">
					<div class="table-header">
						<div class="table-caption">
							<img src="<?= Yii::app()->baseUrl.$user->image?>" style="border-radius:50%; width:30px;">
							<?= $user->nombre?>
							<div class="col-xs-12 col-sm-2 pull-right">
          					   <a href="<?echo Yii::app()->baseUrl?>/areasexito/avance/<?=$user->id?>" class="btn btn-primary btn-labeled" "><span class="btn-label icon fa fa-bar-chart-o"></span> Avance</a>
      					    </div>
						</div>
					</div>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Clave</th>
								<th>Nombre</th>
								<th class="text-center">Máximo</th>
								<th class="text-center">Mínimo</th>
								<th class="text-center">Real</th>
								<th class="text-center">Anterior</th>
								<th class="text-center">Tendencia</th>
								<th class="text-center">Cumplimiento</th>
								<th class="text-center">Avalado</th>
								<th class="text-center">Opciones</th>
							</tr>
						</thead>
						<tbody>
							<?foreach($user->areas as $area):?>
								<?
									$valores = $area->areasExitoValores;
									
									// get valor actual $va
									$va = end( $valores  );
									$pointer = count($valores) - 2;

									// get valor anterior $vn
									if(isset( $valores[$pointer] ))
										$vn = $valores[$pointer]->real;
									else
										$vn = 0;

									
									$i_tendencia = ($va->real >= $vn)? "arrow-up" : "arrow-down";
									// iconos de estado
									if(strtotime($va->fecha1) >= time() ){
										$i_cumplimiento = "clock-o";
										$color_cumplimiento = ( ($area->tipo == 0 && $va->real > $va->minimo  ) || ($area->tipo == 1 && $va->real < $va->maximo)  )? "success" : "warning";
									}else{
										$i_cumplimiento = ( ($area->tipo == 0 && $va->real > $va->minimo  ) || ($area->tipo == 1 && $va->real < $va->maximo)  )? "check" : "times";
										$color_cumplimiento = ( ($area->tipo == 0 && $va->real > $va->minimo  ) || ($area->tipo == 1 && $va->real < $va->maximo)  )? "success" : "danger";
									}

									//iconos Avalado
									if($va->avalado){
										$color_avalado = "success";
										$icon_avalado = "check";
									}else{
										$color_avalado = "default";
										$icon_avalado = "times";
									}
								?>		
								<tr>
									<td><?= $area->clave?></td>
									<td><a href="<?= Yii::app()->baseUrl?>/areasexito/area/<?= $area->id?>"><?= $area->nombre?></a></td>
									<td class="text-center"> <?= $va->maximo." (".$area->unidad.")" ?> </td>
									<td class="text-center"> <?= $va->minimo." (".$area->unidad.")" ?></td>
									<td class="text-center"> <?= $va->real." (".$area->unidad.")" ?></td>
									<td class="text-center"> <?= $vn." (".$area->unidad.")" ?> </td>
									<td class="text-center"><a href="#" class="badge badge-info"><i class="fa fa-<?= $i_tendencia?>"></i></a></td>
									<td class="text-center"><a href="#" class="badge badge-<?=$color_cumplimiento?>"> <i class="fa fa-<?= $i_cumplimiento?>"></i></a></td>
									<td class="text-center"><a href="#" class="badge badge-<?=$color_avalado?>"> <i class="fa fa-<?= $icon_avalado?>"></i></a></td>
									<td class="text-center">
										<?if(Yii::app()->user->getState("rol")==2):?>
										<a href="<?=Yii::app()->baseUrl?>/areasexito/update/<?=$area->id?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>	
										<?endif?> 
									</td>	
								</tr>
							<?endforeach?>
						</tbody>
					</table>
					
				</div>

				<?endif?>	
				
			<?endforeach?>

		
	</div>

</div>


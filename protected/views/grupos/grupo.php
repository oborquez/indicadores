<?php
/* @var $this EvaluacionesController */

$this->breadcrumbs=array(
	'Evaluaciones'=>array("/evaluaciones"),
	'Grupos'=>array("/evaluaciones/grupos"),
	$model->nombre
);
?>


<div class="page-header">
    
    <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-group page-header-icon"></i>&nbsp;&nbsp;<?echo $model->nombre?></h1>

        <div class="col-xs-12 col-sm-8">
            
        </div>
    </div>
</div> <!-- / .page-header -->

<script type="text/javascript">
	init.push(function () {
		var table = $('#grupo-table').dataTable();

		/*$('.cbx-usuario').switcher({
			theme: 'square',
			on_state_content: '<span class="fa fa-check"></span>',
			off_state_content: '<span class="fa fa-times"></span>'
		});*/


	})	
</script>

<div class="panel">
	
	<div class="panel-body">
		<div class="text-right">
			<?if(!isset($_GET["soloGrupo"])):?>
				<a href="<?=Yii::app()->baseUrl?>/evaluaciones/grupo/grupo/<?=$model->id?>/soloGrupo" class="btn btn-primary"><i class="fa fa-group"></i> Sólo colaboradores del grupo</a>
			<?else:?>
				<a href="<?=Yii::app()->baseUrl?>/evaluaciones/grupo/grupo/<?=$model->id?>" class="btn btn-primary"><i class="fa fa-group"></i> Todos los colaboradores</a>
			<?endif?>
		</div>
		<br>
		<div class="table-light">
			<form id="form-grupo">
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="grupo-table">
				<thead>
					<tr>
						<th>Evaluadores</th>
						<th>Estado</th>
					</tr>
				</thead>
				<tbody>
					<?if(!isset($_GET["soloGrupo"])):?>
						<? foreach($usuarios as $usuario): ?>
						<tr>
							<td><?echo $usuario->nombre?></td>
							<td><input type="checkbox" class="cbx-usuario" onclick="saveUsuario(<?=$usuario->id?>)" id="cbx-usuario-<?=$usuario->id?>" name="usuario_<?echo $usuario->id?>" <? if(GruposUsuarios::model()->isInGroup($model->id, $usuario->id) ) echo "checked" ?> ></td>
						</tr>
						<?endforeach?>
					<?else:?>
						<? foreach($usuarios as $usuario): ?>
							<?if(GruposUsuarios::model()->isInGroup($model->id, $usuario->id) ):?>
							<tr>
								<td><?echo $usuario->nombre?></td>
								<td><input type="checkbox" class="cbx-usuario" onclick="saveUsuario(<?=$usuario->id?>)" id="cbx-usuario-<?=$usuario->id?>" name="usuario_<?echo $usuario->id?>" <? if(GruposUsuarios::model()->isInGroup($model->id, $usuario->id) ) echo "checked" ?> ></td>
							</tr>
							<?endif?>
						<?endforeach?>

					<?endif?>	

				</tbody>
			</table>
				<input type="hidden" name="id_grupo" value="<?echo $model->id?>">
			</form>
		</div>		

			<!--<div class="row text-center">
				<a class="btn btn-primary btn-save"><i class="fa fa-save"></i> Guardar</a>
			</div>-->
	</div>
</div>	

<script type="text/javascript">
	
	init.push(function(){

		/*$(".btn-save").click(function(){
			
			$.post(baseUrl+"/evaluaciones/services?op=saveGroupUsuarios",$("#form-grupo").serialize(),function(r){
				console.log(r);
				if(r.status){
					$.growl.notice({title:"Guardado", message: "El grupo se ha guardado correctamente" });
				}else{
					$.growl.warning({title:"Error", message: "Error al intentar guardar el grupo" });
				}
			},"json")

		})*/

	})

	var saveUsuario = function(id)
	{	
		var estado = ($("#cbx-usuario-"+id).is(":checked")) ? 1 : 0; 	
		$.getJSON(baseUrl+"/grupos/services",{op:"saveGroupUsuario",id_grupo:<?=$model->id?>,id:id,estado:estado},function(r){
				if(r.status){
					$.growl.notice({title:"Guardado", message: "Guardado correctamente" });
				}else{
					$.growl.warning({title:"Error", message: "Error al intentar guardar" });
				}
			})
		
	}

</script>

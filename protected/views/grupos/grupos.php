<?php
/* @var $this gruposController */

$this->breadcrumbs=array(
	'grupos'=>array("/grupos"),
	'Grupos'
);
?>


<div class="page-header">
    
    <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-group page-header-icon"></i>&nbsp;&nbsp;Grupos de colaboradores</h1>

        <div class="col-xs-12 col-sm-8">
            
        </div>
    </div>
</div> <!-- / .page-header -->


<div class="panel">
	<div class="panel-heading">
		<span class="panel-title">Grupos</span>
	</div>
	<div class="panel-body">
		<div class="row">
			
			<div class="col-sm-12">

				<!-- Tabla de grupos de colaboradores -->
				<div class="table-primary">
					<div class="table-header">
						<div class="table-caption">
							Grupos
							<button data-toggle="modal" data-target="#modal-new" class="btn btn-labeled btn-info pull-right"><span class="btn-label icon fa fa-plus"></span>Nuevo grupo</button>
						</div>
					</div>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Título</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody id="tbody">
							<? if(count($model) == 0): ?>	
							<tr>
								<td colspan="2"> 
									Aún no existen grupos de colaboradores para tu empresa <br><br>
									<button class="btn btn-sm btn-labeled btn-primary"><span class="btn-label icon fa fa-plus"></span>Nuevo grupo</button>
								</td>
							</tr>
							<?else:?>
							<? foreach($model as $m): ?>
								<tr rel="<?echo $m->id?>" >
									<td><?echo $m->nombre?></td>
									<td class="otpion-buttons">
										<!--<a href="<?echo Yii::app()->baseUrl?>/grupos/grupo/grupo/<?echo $m->id?>" class="btn btn-sm btn-success" title="Administrar grupo de colaboradores"><i class="fa fa-group"></i></a>-->
										<a class="btn btn-sm btn-danger delGroup" title="Eliminar paquete" grupo="<?echo $m->id?>" > <i class="fa fa-times"></i></a>
									</td>
								</tr>
							<? endforeach ?>
							<?endif?>
 
						</tbody>
					</table>
				</div>
				<!-- / Tabla de grupos de colaboradores -->
				
			</div>
		</div>
	</div>
</div>

<script>
	init.push(function () {
		$('.otpion-buttons a').tooltip();
	});
</script>



<div id="modal-new" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title"><i class="fa fa-group"></i> Añadir grupo de colaboradores</h4>
			</div>
			<div class="modal-body">
				
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Título</label>
					<div class="col-sm-10">
						<input type="text" id="nombre" class="form-control" placeholder="Título del grupo de colaboradores" >
					</div>
				</div> <!-- / .form-group -->				

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" id="cnl-new">Cancelar</button>
				<button type="button" class="btn btn-primary" id="save-new" >Guardar</button>
			</div>

		</div> <!-- / .modal-content -->
	</div> <!-- / .modal-dialog -->

</div> <!-- / .modal -->
<!-- / Small modal -->


<script type="text/javascript">

	$(document).ready(function(){
		$("#save-new").click(function(){
			var nombre = $("#nombre").val();
			if(nombre!=""){
				$.getJSON(baseUrl+"/grupos/services",{op:"saveGrupo",nombre:nombre},function(r){
					if(r.status){
						$.growl.notice({title:"Guardado", message: "El grupo se ha guardado correctamente" });
						window.location.href = baseUrl+"/grupos";
					}else{
						console.log(r);
						$.growl.warning({title:"Error", message: "Error al intentar guardar el grupo" });
					}
				})
			}
		})

		$(".delGroup").click(function(){
			if(confirm( "¿En realidad desea eliminar el grupo?" )){
				var id = $(this).attr("grupo");
				$.getJSON(baseUrl+"/grupos/services",{op:"delGrupo",id:id},function(r){
					if(r.status){
						$.growl.notice({title:"Eliminado", message: "El grupo se ha eliminado correctamente" });
						$("tr[rel='"+id+"']").fadeOut();
					}else{
						$.growl.warning({title:"Error", message: "Error al intentar guardar el grupo" });
					}
				})
			}
		})
	})	
	

</script>
<?php
/* @var $this indicadoresController */

$this->breadcrumbs=array(
	'Indicadores'=>array("/indicadores"),
	$model->indicador->nombre." [Evidencia]"
);
?>


<div class="page-header">
    
    <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-comment page-header-icon"></i>&nbsp;&nbsp; Evidencia </h1>

        <div class="col-xs-12 col-sm-8">
            
        </div>
    </div>
</div> <!-- / .page-header -->


<div class="col-sm-7">
<div class="panel widget-comments">
	<div class="panel-heading">
		<span class="panel-title"><i class="panel-title-icon fa fa-comment-o"></i>Comentarios de seguimiento</span>
		<a data-toggle="modal" data-target="#modal-comments" class="btn btn-primary btn-sm pull-right"><i class="fa fa-comment"></i> Añadir comentario</a>
	</div> <!-- / .panel-heading -->
	<div class="panel-body" id="tbcomments"></div> <!-- / .panel-body -->
</div> <!-- / .panel -->
<!-- /16. $COMMENTS -->
</div>

<div id="modal-comments" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title"><i class="fa fa-comment"></i> Añadir comentario</h4>
			</div>
			<div class="modal-body">
				
				<div class="form-group">
					<label for="comment" class="col-sm-2 control-label">Comentario</label>
					<div class="col-sm-10">
						<textarea id="comment" class="form-control" placeholder="Comentario"></textarea>
					</div>
				</div> <!-- / .form-group -->				

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" id="cnl-comment">Cancelar</button>
				<button type="button" class="btn btn-primary" id="save-comment" >Guardar</button>
			</div>

		</div> <!-- / .modal-content -->
	</div> <!-- / .modal-dialog -->

</div> <!-- / .modal -->
<!-- / Small modal -->

<script>
	
	$(document).ready(function(){
		$("#save-comment").click(function(){
			var comment = $("#comment").val();
			if(comment!=""){
				$.getJSON(baseUrl+"/indicadores/saveComment/"+<?echo $model->id?>,{comment:comment},function(r){
					if(r.status){
						$("#comment").val("");
						getComments();
						$("#cnl-comment").click();
						$.growl.notice({title:"Guardado", message: "El comentario se ha guardado correctamente" });
					}else{
						console.log(r);
						$.growl.warning({title:"Error", message: "Error al intentar guardar el comentario" });
					}
				})
			}
		})
	})	

</script>
<script type="text/javascript">
	
	$(document).ready(function(){

		getComments();
		getFiles();

	})	

	var getComments = function()
	{
		$("#tbcomments").html("");
		$.get(baseUrl+"/indicadores/comentarios/<?echo $model->id?>",function(data){
			$("#tbcomments").html(data);
		})
	}

		var getFiles = function()
		{
			$("#files-body").html("");
			console.log(baseUrl+"/indicadores/getFiles/"+<?echo $model->id?>);
			$.getJSON(baseUrl+"/indicadores/getFiles/"+<?echo $model->id?>,function(r){
				$.each(r.files,function(k,item){
					var tr = $("<tr>").attr("file",item.id)
						.append( $("<td>").append( item.nombre))
						.append( 
							$("<td>")
							.append($("<a>").attr("href",baseUrl+"/indicadores/viewFile/"+item.id).addClass("btn btn-xs btn-primary").append($("<i>").addClass("fa fa-file")))
							.append(
								$("<a>").addClass("btn btn-xs btn-danger del-ticket").append($("<i>").addClass("fa fa-times"))
								.click(function(){
									if(confirm("En realidad desea eliminar el archivo?")){
										$.getJSON(baseUrl+"/indicadores/delfile/"+item.id,function(r){
											if(r.status){
												$("tr[file='"+item.id+"']").fadeOut();
												$.growl.notice({title:"Eliminado", message: "Archivo eliminado de manera correcta" });
											}else{
												console.log(r);
												$.growl.warning({title:"Error", message: "Error al intentar eliminar el archivo" });
											}
										})
									}
								})
							)
							
						);
					$("#files-body").append(tr);		
				})

			})
		}


</script>


<div class="col-sm-5">
	
	
			<!-- Primary table -->
			<div class="table-primary">
				<div class="table-header">
					<div class="table-caption">
						<i class="fa fa-files-o"> Archivos </i>
					</div>
				</div>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>&nbsp;</th>
							
						</tr>
					</thead>
					<tbody id="files-body"></tbody>
				</table>
				<div class="table-footer">
					<a data-toggle="modal" data-target="#modal-files" class="btn btn-primary" ><i class="fa fa-file"></i> Añadir archivo</a>
				</div>
			</div>			
	
</div>

<div id="modal-files" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title"><i class="fa fa-files-o"></i> Añadir archivos</h4>
			</div>
			<div class="modal-body">
									
<!-- 14. $DROPZONEJS_FILE_UPLOADS ==================================================================

				Dropzone.js file uploads
-->
				<!-- Javascript -->
				<script>
					init.push(function () {
						$("#dropzonejs-example").dropzone({
							url: baseUrl+"/indicadores/uploadFiles/<?echo $model->id?>",
							paramName: "file", // The name that will be used to transfer the file
							maxFilesize: 3, // MB
							uploadMultiple : false,
							acceptedFiles : "image/*,.pdf,.psd,.doc,.docx,.ppt,.pptx,.xlc,.xlcx",
							dictResponseError: "Archivo no permitido",
							thumbnailWidth: 138,
							thumbnailHeight: 120,
							previewTemplate: '<div class="dz-preview dz-file-preview"><div class="dz-details"><div class="dz-filename"><span data-dz-name></span></div><div class="dz-size">File size: <span data-dz-size></span></div><div class="dz-thumbnail-wrapper"><div class="dz-thumbnail"><img data-dz-thumbnail><span class="dz-nopreview">No preview</span><div class="dz-success-mark"><i class="fa fa-check-circle-o"></i></div><div class="dz-error-mark"><i class="fa fa-times-circle-o"></i></div><div class="dz-error-message"><span data-dz-errormessage></span></div></div></div></div><div class="progress progress-striped active"><div class="progress-bar progress-bar-success" data-dz-uploadprogress></div></div></div>',

							resize: function(file) {
								var info = { srcX: 0, srcY: 0, srcWidth: file.width, srcHeight: file.height },
									srcRatio = file.width / file.height;
								if (file.height > this.options.thumbnailHeight || file.width > this.options.thumbnailWidth) {
									info.trgHeight = this.options.thumbnailHeight;
									info.trgWidth = info.trgHeight * srcRatio;
									if (info.trgWidth > this.options.thumbnailWidth) {
										info.trgWidth = this.options.thumbnailWidth;
										info.trgHeight = info.trgWidth / srcRatio;
									}
								} else {
									info.trgHeight = file.height;
									info.trgWidth = file.width;
								}
								return info;
							},
							init: function(){
								this.on("complete",function(file){
									setTimeout(function(){ getFiles() }, 1000);
									
								})
							}
						});
					});
				</script>
				<!-- / Javascript -->
				<div id="dropzonejs-example" class="dropzone-box">
					<div class="dz-default dz-message">
						<i class="fa fa-cloud-upload"></i>
						Pon tu archivo auí<br><span class="dz-text-small">o selecciona dando clic</span>
					</div>
					<form >
						<div class="fallback">
							<input name="file" type="file"  />
						</div>
					</form>
				</div>				
<!-- /14. $DROPZONEJS_FILE_UPLOADS -->
			</div>

		</div> <!-- / .modal-content -->
	</div> <!-- / .modal-dialog -->

</div> <!-- / .modal -->
<!-- / Small modal -->
<?php
/* @var $this TicketsController */

$this->breadcrumbs=array(
	'Indicadores'=>array("/indicadores"),
	$model->valor->indicador->nombre=>array("/indicadores/indicador/".$model->valor->indicador->id),
	"Archivo"

);




?>

<div class="row">
	<div class="col-sm-12">
		<div class="panel-heading">
			<span class="panel-title"><i class="fa fa-file"></i> <?echo $model->nombre?></span>
			<a href="javascript:window.history.go(-1)" class="btn btn-primary pull-right btn-sm"><i class="fa fa-check"></i> Volver</a>
		</div>
		<div class="panel-body">

		<?if(isOfficeFile( $model->archivo )):?>
			<!-- Microsoft viewer -->
			<iframe src="https://view.officeapps.live.com/op/view.aspx?src=http://cdt.empresainteligente.com<?echo Yii::app()->baseUrl?>/resources/indicadores/<?echo $model->archivo?>&embedded=true" style="width:100%; height:500px;" frameborder="0"></iframe>
		<?else:?>
			<!-- Google  -->
			<!--<iframe src="http://docs.google.com/gview?url=http://cdt.empresainteligente.com<?echo Yii::app()->baseUrl?>/resources/tickets/<?echo $model->archivo?>&embedded=true" style="width:100%; height:500px;" frameborder="0"></iframe>	-->
			<iframe src="<?echo Yii::app()->baseUrl?>/resources/indicadores/<?echo $model->archivo?>" style="width:100%; height:500px;" frameborder="0"></iframe>
		<?endif?>
		</div>
	</div>
</div>


<?

	function isOfficeFile( $filename )
	{
		$extension = getExtensionString( $filename );
		$aOfficeFile = array( "xls","xlsx","doc","docx","ppt","pptx" );
		if(in_array($extension, $aOfficeFile))
			return true;
		return false;
	}

	function getExtensionString( $filename )
	{

		$ext = end(explode('.', $filename));
		$ext = substr(strrchr($filename, '.'), 1);
		$ext = substr($filename, strrpos($filename, '.') + 1);
		$ext = preg_replace('/^.*\.([^.]+)$/D', '$1', $filename);

		$exts = preg_split("[/\\.]", $filename);
		$n    = count($exts)-1;
		return  strtolower($exts[$n]);

	}

?>

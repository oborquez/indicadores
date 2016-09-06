<?php
/* @var $this IndicadoresPeriodosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Periodos',
);

?>


<div class="page-header">
    
    <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-icon page-header-icon"></i>&nbsp;&nbsp; Periodos</h1>

        <div class="col-xs-12 col-sm-8 text-right">
            <a href="<?echo Yii::app()->baseUrl?>/indicadoresPeriodos/create" class="btn btn-primary btn-labeled" "><span class="btn-label icon fa fa-plus"></span> Nuevo Periodo</a>
        </div>
    </div>
</div> <!-- / .page-header -->

<div class="panel">
	<table class="table">

		<thead>
			<tr>
				<th>Periodo</th>
				<th class="text-center">Opciones</th>
			</tr>	
		</thead>
		<tbody>
			<?foreach($model as $periodo):?>
			<tr>
				<td>
					<a href="<?= Yii::app()->baseUrl?>/indicadoresPeriodos/periodo/<?=$periodo->id?>">
						<?=$periodo->periodo?>
					</a>
				</td>
				<td class="text-center">
					<a href="<?=Yii::app()->baseUrl?>/indicadoresPeriodos/update/<?=$periodo->id?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
					<a onclick="del(<?=$periodo->id?>);" class="btn btn-danger"><i class="fa fa-times"></i></a>
				</td>
			</tr>
			<?endforeach?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	
	var del = function(id)
	{
		if(confirm("¿En realidad deseas eliminar el periodo?")){
			window.location.href = baseUrl+"/indicadoresPeriodos/del/"+id;
		}
	}

</script>
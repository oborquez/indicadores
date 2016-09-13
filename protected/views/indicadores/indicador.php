<?php
/* @var $this IndicadoresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Indicadores'=>array("/indicadores"),
    $model->nombre

);

?>


<div class="page-header">
    
    <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-check page-header-icon"></i>&nbsp;&nbsp; <?=$model->nombre?></h1>
        <div class="col-xs-12 col-sm-8 text-right"></div>
    </div>
</div> <!-- / .page-header -->

<div class="row">
    <div class="panel">
        <div class="panel-heading">
            Resumen de indicador
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
                </table>                    
            </div>
            
            <div class="col-xs-12 col-sm-6">
            


                <!-- 6. $MORRISJS_AREA =============================================================================

                                Morris.js Area
                -->
                                <!-- Javascript -->
                                <script>
                                    init.push(function () {
                                        Morris.Area({
                                            element: 'hero-area',
                                            data: [
                                            <?$periodos = IndicadoresPeriodos::model()->findAll("id_empresa =".Yii::app()->user->getState("id_empresa")." ORDER BY id ASC")?>
                                            <? $total = count($periodos); $c = 0;?>
                                            <? foreach($periodos as $periodo): ?>
                                            <? $valor = IndicadoresValores::model()->find("id_indicador = ".$model->id." AND id_periodo = ".$periodo->id)?>
                                                <?$c++?>
                                                { period: '<?= $periodo->periodo ?>', valor: <?= $valor->valor?> }<?if($c != $total ):?>,<?endif?>
                                            <? endforeach ?>
                                            ],
                                            xkey: 'period',
                                            ykeys: ['valor'],
                                            labels: ['Resultados'],
                                            hideHover: 'auto',
                                            lineColors: PixelAdmin.settings.consts.COLORS,
                                            fillOpacity: 0.3,
                                            behaveLikeLine: true,
                                            lineWidth: 2,
                                            pointSize: 4,
                                            gridLineColor: '#cfcfcf',
                                            resize: true,
                                            parseTime: false
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
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Periodos</th>
                                <th class="text-center">Valores</th>
                                <th class="text-center">Semáforo</th>
                                <th class="text-center">Avalado</th>
                                <th class="text-center">Comentarios</th>
                                <th class="text-center">Archivos</th>
                                <th class="text-center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?$periodos = IndicadoresPeriodos::model()->findAll("id_empresa =".Yii::app()->user->getState("id_empresa")." ORDER BY id ASC")?>
                            <? foreach($periodos as $periodo): ?>
                            <? $valor = IndicadoresValores::model()->find("id_indicador = ".$model->id." AND id_periodo = ".$periodo->id)?>
                            <tr>
                                <td><?= $periodo->periodo?></td>
                                <td class="text-center"><?= $valor->valor?> <?$model->unidad?></td>
                                <td class="text-center"><a class="label label-<?= Indicadores::model()->getUmbral($valor->valor)?>"><?= $valor->valor?> <?=$valor->indicador->unidad?></a></td>
                                <td class="text-center"><a href="#" class="label label-<?=($valor->avalado)? "success" : "default" ?>"><i class="fa fa-<?=($valor->avalado)? "check" : "times" ?>"></i></a></td>
                                <td class="text-center"><?= count($valor->comentarios)?></td>
                                <td class="text-center"><?= count($valor->archivos)?></td>
                                <td class="text-center">
                                    <a href="<?= Yii::app()->baseUrl?>/indicadores/evidencia/<?=$valor->id?>" class="btn btn-info"><i class="fa fa-comment"></i> <i class="fa fa-file"></i> </a>
                                    <a href="<?= Yii::app()->baseUrl?>/indicadoresValores/update/<?=$valor->id?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>   
                            <? endforeach ?>
                        </tbody>
                    </table>
                </div>
                

            </div>  

            
        </div>
    </div>
</div>
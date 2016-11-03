<?php
/* @var $this IndicadoresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Indicadores'=>array("/indicadores"),
    "Colaboradores"=>array("/indicadores/colaboradores"),
    $colaborador->nombre
);

?>


<div class="page-header">
    
    <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-check page-header-icon"></i>&nbsp;&nbsp; <?=$colaborador->nombre?></h1>
        <div class="col-xs-12 col-sm-8 text-right">
        	<a href="<?=Yii::app()->baseUrl?>/indicadores/print/<?=$colaborador->id?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Versión imprimible</a>
        </div>
    </div>
</div> <!-- / .page-header -->

<div class="panel">
    <div class="panel-body">

            <div class="col-xs-12 col-sm-4">
                <div class="text-center">
                    <img src="<?= Yii::app()->baseUrl.$colaborador->image?>" style="border-radius:50%; border:5px solid #3bc2a9; ">
                </div>
                <br>
                <table class="table">
                    <tr>
                        <th>Colaborador</th>
                        <td><?= $colaborador->nombre?></td>
                    </tr>
                   
                </table>                    
            </div>
            
            
            
            <div class="col-xs-12 col-sm-8">
            


                <!-- 6. $MORRISJS_AREA =============================================================================

                                Morris.js Area
                -->
                                <!-- Javascript -->
                                <script>
                                    init.push(function () {
                                        Morris.Area({
                                            element: 'hero-area',
                                            data: [
                                            <?$periodos = IndicadoresPeriodos::model()->findAll("id_empresa =".getIdEmpresa()." ORDER BY id ASC")?>
                                            <?$ykeys="";?>
                                            <?$yk = true;?>
                                            <? $total = count($periodos); $c = 0;?>
                                            <? foreach($periodos as $periodo): ?>
                                            <? $valores = IndicadoresValores::model()->findAll("id_periodo = ".$periodo->id);?>
                                                <?$c++;?>
                                                { period: '<?= $periodo->periodo ?>', 
                                                <?$totalv = count($valores);?>
                                                <?$cv=0;?>
                                                <?foreach($valores as $valor):?>
                                                    <?if($valor->indicador->id_usuario == $colaborador->id):?>
                                                        <?$cv++;?>
                                                        <?=str_replace(" ", "", $valor->indicador->nombre)?>: <?= $valor->valor?>
                                                        <?if($cv != $totalv):?>,<?endif?>
                                                        <?if($yk){ $ykeys .= ($ykeys != "")? "," : ""; $ykeys .="'".$valor->indicador->nombre."'"; }?>
                                                    <?endif?>
                                                 <?endforeach?>   
                                                }<?if($c != $total ):?>,<?endif?>
                                                <?$yk = false;?>

                                            <? endforeach ?>
                                            ],
                                            xkey: 'period',
                                            ykeys: [<?=str_replace(" ","",$ykeys)?>],
                                            labels: [<?=$ykeys?>],
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


            <?foreach($periodos as $periodo): ?>
            <div class="col-xs-12 col-sm-6">
                <? $valores = IndicadoresValores::model()->findAll("id_periodo = ".$periodo->id." ORDER BY id_indicador ASC");?>
                    <h4><?=$periodo->periodo?></h4>    

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Indicador</th>
                                <th class="text-center">Semáforo</th>
                                <th class="text-center">Avalado</th>
                                <th class="text-center">Comentarios</th>
                                <th class="text-center">Archivos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?foreach($valores as $valor):?>
                            <?if($valor->indicador->id_usuario == $colaborador->id):?>
                                <tr>
                                    <td><?=$valor->indicador->nombre?></td>
                                    <td class="text-center"><a class="label label-<?= Indicadores::model()->getUmbral($valor->valor)?>"><?= $valor->valor?> <?=$valor->indicador->unidad?></a></td>
                                    <td class="text-center"><a href="#" class="label label-<?=($valor->avalado)? "success" : "default" ?>"><i class="fa fa-<?=($valor->avalado)? "check" : "times" ?>"></i></a></td>
                                    <td class="text-center"><?= count($valor->comentarios)?></td>
                                    <td class="text-center"><?= count($valor->archivos)?></td>
                                </tr>
                            <?endif?>    
                            <?endforeach?>

                        </tbody>
                    </table>

            </div>
            <?endforeach?> 



            
        
       

    </div>
</div>
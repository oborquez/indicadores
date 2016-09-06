<?php
/* @var $this IndicadoresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'Indicadores'=>array("/indicadores"),
    "Lista de indicadores"
);

?>


<div class="page-header">
    
    <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-check page-header-icon"></i>&nbsp;&nbsp; Indicadores</h1>
        <div class="col-xs-12 col-sm-8 text-right">
                       

        </div>
    </div>
</div> <!-- / .page-header -->

<div class="panel">
    
    <div class="panel-body">
        
        <table class="table">
            <thead>
                <tr>
                    <th>Clave</th>
                    <th>Indicador</th>
                    <th class="text-center">Colaborador</th>
                    <th class="text-right">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?foreach($colaboradores as $colaborador):?>
                    <?foreach($colaborador->indicadores as $indicador):?>
                        <tr>
                            <td><?= $indicador->clave?></td>
                            <td><?= $indicador->nombre?></td>
                            <td class="text-center">
                                <img src="<?= Yii::app()->baseUrl.$colaborador->image?>" style="border-radius:50%; width:30px;"><br>
                            <?= $colaborador->nombre?></td>
                            <td class="text-right">
                                <a href="<?= Yii::app()->baseUrl?>/indicadores/indicador/<?= $indicador->id?>" class="btn btn-primary"><i class="fa fa-file"></i></a>
                                
                            </td>
                        </tr>
                    <?endforeach?>
                <?endforeach?>
            </tbody>
        </table>

    </div>

</div>


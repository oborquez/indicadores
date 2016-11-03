<?php
/* @var $this IndicadoresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Indicadores'=>array("/indicadores"),
    "Colaboradores"
);

?>


<div class="page-header">
    
    <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-check page-header-icon"></i>&nbsp;&nbsp; Colaboradoress</h1>
        <div class="col-xs-12 col-sm-8 text-right">
        	
        </div>
    </div>
</div> <!-- / .page-header -->

<div class="panel">
    <div class="panel-body">

        <!--<a href="<?=Yii::app()->baseUrl?>/indicadores/concentrado/grupo/<?=$_GET["grupo"]?>" class="btn btn-labeled btn-primary pull-right"><span class="btn-label icon fa fa-file"></span>Concentrado del grupo</a>-->

        
        <table class="table">
            <thead>
                <tr>
                    <th colspan="2">Colaborador</th>
                </tr>
            </thead>
            <tbody>
                <?foreach($colaboradores as $colaborador):?>
                <tr>
                    <td><img src="<?= Yii::app()->baseUrl.$colaborador->image?>" style="border-radius:50%; width:30px;"></td>
                    <td>
                        <a href="<?=Yii::app()->baseUrl?>/indicadores/colaborador/<?=$colaborador->id?>">
                        <?=$colaborador->nombre?></td>
                        </a>
                </tr>
                <?endforeach?>
            </tbody>
        </table>

    </div>
</div>
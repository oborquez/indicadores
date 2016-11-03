<?php
/* @var $this IndicadoresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Indicadores'=>array("/indicadores"),
    "Grupos"
);

?>


<div class="page-header">
    
    <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-check page-header-icon"></i>&nbsp;&nbsp; Grupos</h1>
        <div class="col-xs-12 col-sm-8 text-right">
        	
        </div>
    </div>
</div> <!-- / .page-header -->

<div class="panel">
    <div class="panel-body">
        
        <table class="table">
            <thead>
                <tr>
                    <th colspan="2">Grupo</th>
                </tr>
            </thead>
            <tbody>
                <?foreach($grupos as $grupo):?>
                <tr>
                    <td>
                        <a href="<?=Yii::app()->baseUrl?>/indicadores/colaboradores/grupo/<?=$grupo->id?>">
                        <?=$grupo->nombre?></td>
                        </a>
                </tr>
                <?endforeach?>
            </tbody>
        </table>

    </div>
</div>
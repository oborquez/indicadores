<?php
/* @var $this AreasExitoValoresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Areas Exito Valores',
);

?>


<div class="page-header">
    
    <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-icon page-header-icon"></i>&nbsp;&nbsp; Areas Exito Valores</h1>

        <div class="col-xs-12 col-sm-8">
            
        </div>
    </div>
</div> <!-- / .page-header -->

<div class="panel">
	<div class="panel-body">
	<?php $this->widget('bootstrap.widgets.TbGridView', array(
		'dataProvider'=>$dataProvider,
		'columns'=> array(
			"fecha1",
			"fehca2",
			array(
			    'class'=>'CButtonColumn',
			    'template'=>'{update}{email}{down}{delete}',
			    'buttons'=>array
			    (
			        'email' => array
			        (
			            'label'=>'Send an e-mail to this user',
			            'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
			            'url'=>'Yii::app()->createUrl("users/email", array("id"=>$data->id))',
			        ),
			        'down' => array
			        (
			            'label'=>'[-]',
			            'url'=>'"#"',
			            'click'=>'function(){alert("Going down!");}',
			        ),
			    ),
			),

		)
	)); ?>
	</div>
</div>


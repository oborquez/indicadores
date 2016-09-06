<?php

class IndicadoresPeriodosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','del','periodo'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new IndicadoresPeriodos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['IndicadoresPeriodos']))
		{
			$model->attributes=$_POST['IndicadoresPeriodos'];
			$model->id_grupo = Yii::app()->user->getState("id_grupo");
			if($model->save()){
				Yii::app()->user->setFlash("success","Periodo creado de manera correcta");
				// crear nuevos valores si no los hay
				$this->nuevosValores($model->id);
				$this->redirect(array('/indicadoresPeriodos'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['IndicadoresPeriodos']))
		{
			$model->attributes=$_POST['IndicadoresPeriodos'];
			if($model->save()){
				Yii::app()->user->setFlash("success","Periodo guardado de manera correcta");
				// crear nuevos valores si no los hay
				$this->nuevosValores($model->id);
				$this->redirect(array('/indicadoresPeriodos'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model = IndicadoresPeriodos::model()->findAll("id_grupo = ".Yii::app()->user->getState("id_grupo"));
		$this->render("index",array("model"=>$model));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new IndicadoresPeriodos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['IndicadoresPeriodos']))
			$model->attributes=$_GET['IndicadoresPeriodos'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}


	public function actionDel($id)
	{
		$model = IndicadoresPeriodos::model()->findByPk($id);
		$model->delete();
		$this->redirect(array('/indicadoresPeriodos'));
	}

	public function actionPeriodo($id)
	{
		$periodo = IndicadoresPeriodos::model()->findByPk($id);
		$this->render("periodo",array("model"=>$periodo));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return IndicadoresPeriodos the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=IndicadoresPeriodos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param IndicadoresPeriodos $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='indicadores-periodos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	protected function nuevosValores($id_periodo)
	{
		$usuarios = Usuarios::model()->findAll('id_grupo ='.Yii::app()->user->getState("id_grupo"));
		
		foreach($usuarios as $usuario){
			foreach($usuario->indicadores as $indicador){
				$find = IndicadoresValores::model()->find("id_indicador = ".$indicador->id." AND id_periodo =".$id_periodo);
				if(!isset($find->valor)){
					$model = new IndicadoresValores;
					$model->id_indicador = $indicador->id;
					$model->id_periodo = $id_periodo;
					$model->valor = 0;
					$model->avalado = 0;
					$model->save(); 
				}
			}
		}
	}
}

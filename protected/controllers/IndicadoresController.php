<?php

class IndicadoresController extends Controller
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
				'actions'=>array('create','update','concentrado','lista','indicador','indicadores','evidencia','comentarios','saveComment',"delComment","uploadFiles","getFiles","delFile","viewFile",'colaboradores','colaborador',"del","print"),
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

	public function actionLista()
	{
		$colaboradores = Usuarios::model()->findAll("id_grupo =".Yii::app()->user->getState("id_grupo"));
		$this->render("lista",array( "colaboradores" => $colaboradores ));
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
		$model=new Indicadores;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Indicadores']))
		{
			$model->attributes=$_POST['Indicadores'];
			if($model->save()){
				Yii::app()->user->setFlash("success","EL indicador de ha guardado de manera correcta");
				// agregar valores segun los periodos existentes
				$this->nuevosValores($model->id);

				$this->redirect(array('index','id'=>$model->id));
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

		if(isset($_POST['Indicadores']))
		{
			$model->attributes=$_POST['Indicadores'];
			if($model->save()){
				Yii::app()->user->setFlash("success","EL indicador de ha guardado de manera correcta");
				$this->redirect(array('lista'));
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

		$this->render('index',array("periodos"=>$periodos));
		/*if( Yii::app()->user->getState("rol") == 2 ){
			// lider
			//$periodos = IndicadoresPeriodos::model()->findAll("id_grupo =". Yii::app()->user->getState("id_grupo")." ORDER BY id DESC" );	
			$this->render('index',array("periodos"=>$periodos));
		}else{
			//  colaborador
			$model = Indicadores::model()->findAll("id_usuario = ".Yii::app()->user->id);
			$user = Usuarios::model()->findByPk(Yii::app()->user->id);			
			$this->render('indicadores',array("model"=>$model,'user'=>$user));
		}*/
	}

	public function actionIndicador($id)
	{
		$model = $this->loadModel($id);
		$this->render("indicador",array("model"=>$model));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Indicadores('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Indicadores']))
			$model->attributes=$_GET['Indicadores'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionConcentrado()
	{
		$periodos = IndicadoresPeriodos::model()->findAll("id_grupo =". Yii::app()->user->getState("id_grupo")." ORDER BY id DESC" );	
		$this->render('concentrado',array("periodos"=>$periodos));
	}

	public function actionEvidencia($id)
	{
		$valor = IndicadoresValores::model()->findByPk($id);
		$this->render("evidencia",array("model"=>$valor));
	}

	public function actionColaboradores()
	{
		$colaboradores = Usuarios::model()->findAll("id_grupo = ".Yii::app()->user->getState("id_grupo")." AND rol < 3 ORDER BY nombre ASC");
		$this->render("colaboradores",array("colaboradores"=>$colaboradores));
	}

	public function actionColaborador($id)
	{
		$colaborador = Usuarios::model()->findByPk($id);
		$this->render("colaborador",array("colaborador"=>$colaborador));
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Indicadores the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Indicadores::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


	public function actionComentarios($id)
	{
		$valor = IndicadoresValores::model()->findByPk($id);
		$this->renderPartial("comentarios",array("model"=>$valor));
	}


	
	public function actionSaveComment($id)
	{
		$model = new IndicadoresValoresComentarios;
		$model->id_valor = $id;
		$model->id_usuario = Yii::app()->user->id;
		$model->comentario = nl2br($_GET["comment"]);
		$model->fecha = date("Y-m-d H:i:s");
		if($model->save()){
			$ret["status"] = true;
		}else{
			$ret["status"] = false;
			$ret["error"] = $valor->getErrors();
		}
		echo json_encode($ret);

	}

	public function actionDelcomment($id)
	{
		$model = IndicadoresValoresComentarios::model()->findByPk($id);
		if($model->delete()){
			$ret["status"] = true;
		}else{
			$ret["status"] = false;
			$ret["error"] = $valor->getErrors();
		}
		echo json_encode($ret);	
	}

	public function actionGetFiles($id)
	{
		$model = IndicadoresValoresArchivos::model()->findAll("id_valor =".$id);
		$ret = array( "files"=>object2Array($model) );
		echo json_encode($ret);
	}

	public function actionUploadFiles($id)
	{
		
		if(isset($_FILES["file"]) && $_FILES["file"]["name"]!="")
		{
			$uf = CUploadedFile::getInstanceByName('file');
			$newName = $id.f_ts().".".$uf->getExtensionName();
			$ext = $uf->getExtensionName();
			if(archivoNoScript($ext)){
				$name = Yii::getPathOfAlias('webroot')."/resources/indicadores/".$newName;
				if($uf->saveAs($name)){
					$model = new IndicadoresValoresArchivos;
					$model->id_valor = $id;
					$model->archivo = $newName;
					$model->nombre = $uf->getName();
					$model->id_usuario = Yii::app()->user->id;
					$model->save();
					$ret["status"] = true;
					$ret["fileName"] = $newName;
				}

			}else{

				$ret["status"] = false;
				$ret["error"] = "Archivo no permitido";

			}
		}else{

			$ret["status"] = false;
			$ret["error"] = "No ha seleccionado archivo a subir";

 		}

	}

	public function actionDelfile($id)
	{
		$model = IndicadoresValoresArchivos::model()->findByPk($id);
		$archivo = Yii::getPathOfAlias('webroot')."/resources/indicadores/".$model->archivo;	
		if($model->delete()){
			$ret["status"] = true;
			@unlink($archivo);
		}else{
			$ret["status"] = false;
			$ret["error"] = $model->getErrors();
		}	
		echo json_encode($ret);
	}		

	public function actionViewFile($id)
	{
		$model = IndicadoresValoresArchivos::model()->findByPk($id);
		$this->render("viewFile",array("model"=>$model));
	}	

	/**
	 * Performs the AJAX validation.
	 * @param Indicadores $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='indicadores-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	protected function nuevosValores($id_indicador)
	{
		$periodos = IndicadoresPeriodos::model()->findAll("id_grupo =".Yii::app()->user->getState("id_grupo"));
		foreach($periodos as $periodo){
			$model = new IndicadoresValores;
			$model->id_indicador = $id_indicador;
			$model->id_periodo = $periodo->id;
			$model->valor = 0;
			$model->avalado = 0;
			$model->save(); 
		}
	}

	public function actionDel($id)
	{
		$model = Indicadores::model()->findByPk($id);
		if($model->usuario->id_grupo == Yii::app()->user->getState("id_grupo") AND Yii::app()->user->getState("rol") > 1){
			if($model->delete()){

				// eliminar archivos, comentarios y valores
				$valores = IndicadoresValores::model()->findAll("id_indicador = ".$id);
				foreach($valores as $val)
				{
					if($val->delete()){
						IndicadoresValoresArchivos::model()->deleteAll( "id_valor =".$val->id );
						IndicadoresValoresComentarios::model()->deleteAll( "id_valor =".$val->id );
					}
				}	
				Yii::app()->user->setFlash("success","Indicador eliminado de manera correcta");	
			}
		}else{
			Yii::app()->user->setFlash("error","No se encuentra autorizado para realizar esta acción");
		}

		$this->redirect(array("lista"));
	}

	public function actionIndicadores()
	{
		$colaboradores = Usuarios::model()->findAll("id =".Yii::app()->user->id);
		$this->render("indicadores",array( "colaboradores" => $colaboradores ));

	}

	public function actionPrint($id)
	{
		$colaborador = Usuarios::model()->findByPk($id);
		$this->layout = "print";
		$this->render("print",array("colaborador"=>$colaborador));
	}
}

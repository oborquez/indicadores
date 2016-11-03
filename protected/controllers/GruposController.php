<?php

class GruposController extends Controller
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
				'actions'=>array('view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','json','services','index','grupo'),
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
		$model=new Grupos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Grupos']))
		{
			$model->attributes=$_POST['Grupos'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['Grupos']))
		{
			$model->attributes=$_POST['Grupos'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		/*$dataProvider=new CActiveDataProvider('Grupos');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
		//$this->redirect("grupos/admin");

		$model = Grupos::model()->findAll( "id_empresa = ".getIdEmpresa() );
		//$model = Grupos::model()->findAll(  );
		$this->render("grupos",array( "model" => $model ));		

	}




	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Grupos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Grupos']))
			$model->attributes=$_GET['Grupos'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Grupos the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Grupos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


	public function actionJson()
	{
		$op = $_GET["op"];

		switch($op){

			case "getGrupos4Kendo": 	$ret = $this->getGrupos4Kendo(); break;
		}

		echo json_encode($ret);

	}

	/**
	 * Performs the AJAX validation.
	 * @param Grupos $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='grupos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	private function getGrupos4Kendo()
	{
		$ret = array();
		$grupos = Grupos::model()->findAll( "id_empresa =".getIdEmpresa() );
		if(count($grupos)>0)
		foreach($grupos as $grupo){
			$ret[]=array("id_grupo"=>$grupo["id"],
							"nombreGrupo"=>$grupo["nombre"]);
		}
		return $ret;

	}


	public function actionGrupo()
	{	
		$id = $_GET["grupo"];
		$model = Grupos::model()->findByPk($id);
		$usuarios = Usuarios::model()->findAll( "id_empresa = ".getIdEmpresa()." ORDER BY nombre ASC" );
		if( $model->id_empresa == getIdEmpresa()){
			$this->render("grupo",array( "model" => $model, "usuarios"=>$usuarios ));
		}
		else{
			$this->redirect("/site/error");
		}
	}


	/**
	* 	SERVICES *********************************
	*/

	public function actionServices()
	{
		$op = ( isset($_GET["op"]) )? $_GET["op"] : $_POST["op"];			
		$ret = $this->{$op}();	
		$ret["origin_data_get"] = $_GET;
		$ret["origin_data_POST"] = $_POST;
	
		echo json_encode($ret);
	}


	private function saveGrupo()
	{
		$nombre = $_GET["nombre"];
		$ret["strlen"] = strlen($nombre);
		if(strlen($nombre)>0){

			$model = new Grupos;
			$model->id_empresa = getIdEmpresa();
			$model->nombre = $nombre;
			$ret["status"] = $model->save();
			if(!$ret["status"]) $ret["errors"] = $model->getErrors();
			$ret["id"] = $model->primaryKey;

		}else{
			$ret["status"] = false;
			$ret["errors"] = "Título no permitido";
		}
		return $ret;		
	}

	private function delGrupo()
	{
		$id = intval($_GET["id"]);
		$model = Grupos::model()->findByPk($id);
		if($model->id_empresa == getIdEmpresa()){
			$ret["status"] = $model->delete();
			if(!$ret["status"]) $ret["error"] = $model->getErrors();
		}else{
			$ret["status"] = false;
			$ret["error"] = "No tiene permiso para realizar la acción";
		}
		return $ret;		
	}

	private function saveGroupUsuarios()
	{
		$ret["status"] = true;
		$id_grupo = intval( $_POST["id_grupo"] );
		// primero eliminamos los usuario previos al grupo
		$delusers = GruposUsuarios::model()->findAll( "id_grupo = ".$id_grupo );
		foreach($delusers as $deluser) $deluser->delete();

		//Obtener y guardar nuevos usuarios

		foreach($_POST as $k=>$v){
			if(substr($k,0,8) == "usuario_" ){
				$id_usuario =substr($k,8);
				$model = new GruposUsuarios;
				$model->id_grupo = $id_grupo;
				$model->id_usuario = $id_usuario;
				$ret["status"] = $model->save();
			}
		}
		$ret["POST"] = $_POST;
		if(!$ret["status"])$ret["error"] = $model->getErrors();	
		return $ret;
	}

	private function saveGroupUsuario()
	{
		$ret["status"] = true;
		$id_grupo = intval( $_GET["id_grupo"] );
		$id_usuario = intval($_GET["id"]);
		
		if($_GET["estado"]){ // añadimos
			$ret["accion"] = "añadir";
			$model = new GruposUsuarios;
			$model->id_grupo = $id_grupo;
			$model->id_usuario = $id_usuario;
			$ret["status"] = $model->save();

		}else{ // eliminamos
			$ret["accion"] = "eliminar";
			$ret["status"] = GruposUsuarios::model()->deleteAll( "id_grupo = ".$id_grupo." AND id_usuario = ".$id_usuario );

		}	

		if(!$ret["status"])$ret["error"] = $model->getErrors();	
		return $ret;
	}


	





}

<?php

class TipoController extends Controller
{
	public function accessRules()
	{
	return array(
	
	array('allow', // allow authenticated user to perform 'create' and 'update' actions
	'actions'=>array('set'),
	'users'=>array('?'),
	),
	
	array('deny',  // deny all users
	'users'=>array('*'),
	),
	
	);
	}


	public function actionSet()
	{
		$model=new Tipo();
		$this->performAjaxValidation($model);
		
		if(isset($_POST['ajax'])) {
			if ($_POST['ajax']=='tipo-form') {
				$model->attributes=$_POST['Tipo'];
				$model->save();        
			}
		  }
		//Yii::app()->user->name
		$usuario=Usuarios::model()->find('username=:username', array(':username'=>Yii::app()->user->name));
		$msg=null;
		if(isset($_POST['Password']))
		{
		$model->attributes=$_POST['Password'];
		$model->nueva=sha1($model->nueva);
		$model->confirm=sha1($model->confirm);
		if($model->validate()){
			$id=$usuario->id;
			$conexion=Yii::app()->db;
			$nueva=sha1($model->nueva);
			$confirm=sha1($model->confirm);
			$resultado=$conexion->CreateCommand("UPDATE usuarios set password='$model->nueva' where id='$id'")->execute();
			
				Yii::app()->user->setFlash('fine','');
				$this->refresh();
			
			$model->nueva=null;
			$model->confirm=null;

		}
	}
		$this->render('password', array('model'=>$model,'usuario'=>$usuario,'msg'=>$msg));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
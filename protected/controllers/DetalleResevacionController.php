
<?php

class DetalleResevacionController extends Controller
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
'actions'=>array('index','view','admin'),
'roles'=>array('enc_hab'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('index','view','create','admin','update','delete'),
'roles'=>array('gerente','recep'),
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
public function actionCAjax()
{

}


public function actionCreate()
{
$model=new DetalleResevacion;
// Uncomment the following line if AJAX validation is needed
$this->performAjaxValidation($model);

if(isset($_POST['DetalleResevacion']))
{

$model->attributes=$_POST['DetalleResevacion'];
$fechas=Yii::app()->db->CreateCommand("SELECT fecha_ingreso, fecha_salida FROM reservaciones WHERE id_reservacion=$model->id_reservacion")->queryRow();
$entrada=$fechas["fecha_ingreso"];
$salida=$fechas["fecha_salida"];

$start_ts = strtotime($entrada);

        $end_ts = strtotime($salida);

        $diferencia = $end_ts - $start_ts;

$dias=round($diferencia / 86400); // En días


/*
$tipo=Yii::app()->db->CreateCommand("SELECT tipo_habitacion FROM reservaciones WHERE id_habitacion=$model->habitacion")->queryRow();
$tipo_habitacion=$tipo["tipo_habitacion"];
*/

//ESTO YA NO ES NECESARIO

$hab=Yii::app()->db->CreateCommand("SELECT COUNT(*) FROM habitaciones WHERE tipo_habitacion=$model->tipo_habitacion")->queryColumn();
$existentes=$hab[0];

//BUSCAR QUE EL ID DE LA HABITACION NO ESTE ASIGNADA EN UNA FECHA ESPECIFICA
$disponibilidad = Yii::app()->db->createCommand("SELECT sum(cantidad)ocupadas FROM disponibilidad where tipo_habitacion=$model->tipo_habitacion AND ( 
            (entrada BETWEEN '$entrada' AND '$salida') OR  
            (salida BETWEEN '$entrada' AND '$salida') OR 
            (entrada <= '$entrada'  AND salida >= '$salida'))")->queryRow();
         
$ocupadas=$disponibilidad['ocupadas'];
$disponibles=$existentes-$ocupadas;

if($disponibles>=$model->cantidad){
    //$tipo_hab = Yii::app()->db->createCommand("SELECT tipo_habitacion FROM habitaciones WHERE id_habitacion =".$model->habitacion)->queryRow();
   
    $total = Yii::app()->db->createCommand("SELECT tarifa FROM tipo_habitacion WHERE id_tipo_habitacion =".$model->tipo_habitacion)->queryRow();
    $tarifa = $total["tarifa"];
    $model->total=$tarifa*$dias*$model->cantidad;
    
    //$model->total=$tarifa*$model->cantidad;
    $exito=true;
    
    if($model->save()){
        Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS,
        '<h4></h4> Reservacion exitosa');
        //$this->refresh(); 
        
        $this->redirect(array('reservaciones/update','id'=>$model->id_reservacion
    ));
    }
    

}else{
    /*
    Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_ERROR,
    '<h4>Error</h4> No esta disponible la habitacion <strong>'.$model->habitacion.'</strong> para la fecha requerida');
    //$this->refresh(true,'#'); 
   
     $this->redirect(array('reservaciones/update','id'=>$model->id_reservacion
    ));*/
    
   if($disponibles==0){
    Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_ERROR,
    '<h4>Error</h4> No hay disponibilidad de habitaciones para la fecha requerida');
    //$this->refresh(true,'#'); 
   
     $this->redirect(array('reservaciones/update','id'=>$model->id_reservacion
    ));
   }
   else{
    Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_ERROR,
    '<h4>Error</h4> Solo se cuenta con <strong>'.$disponibles.'</strong> habitaciones para la fecha requerida');
    //$this->refresh(true,'#'); 
    
   $this->redirect(array('reservaciones/update','id'=>$model->id_reservacion
    ));
   }
    
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
$this->performAjaxValidation($model);

if(isset($_POST['DetalleResevacion']))
{
$model->attributes=$_POST['DetalleResevacion'];

$fechas=Yii::app()->db->CreateCommand("SELECT fecha_ingreso, fecha_salida FROM reservaciones WHERE id_reservacion=$model->id_reservacion")->queryRow();
$entrada=$fechas["fecha_ingreso"];
$salida=$fechas["fecha_salida"];

$hab=Yii::app()->db->CreateCommand("SELECT COUNT(*) FROM habitaciones WHERE tipo_habitacion=$model->tipo_habitacion")->queryColumn();
$existentes=$hab[0];

$disponibilidad = Yii::app()->db->createCommand("SELECT sum(cantidad)ocupadas FROM disponibilidad where tipo_habitacion=$model->tipo_habitacion AND ( 
    (entrada BETWEEN '$entrada' AND '$salida') OR  
    (salida BETWEEN '$entrada' AND '$salida') OR 
    (entrada <= '$entrada'  AND salida >= '$salida'))")->queryRow();
 
$ocupadas=$disponibilidad['ocupadas'];
$disponibles=$existentes-$ocupadas;

if($disponibles>=$model->cantidad){
  
    $total = Yii::app()->db->createCommand("SELECT tarifa FROM tipo_habitacion WHERE id_tipo_habitacion =".$model->tipo_habitacion)->queryRow();
    $tarifa = $total["tarifa"];
    $model->total=$tarifa*$model->cantidad; 
    
    if($model->save()){
        Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS,
        '<h4></h4> Reservacion exitosa');
        //$this->refresh(); 
        
        $this->redirect(array('//reservaciones/view','id'=>$model->id_reservacion
    ));
    }
    

}else{
    
   if($disponibles==0){
    Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_ERROR,
    '<h4>Error</h4> No hay disponibilidad de habitaciones para la fecha requerida');
    $this->refresh(); 
    //$this->redirect(array('update','id'=>$model->id));
    
     /*$this->redirect(array('reservaciones/view','id'=>$model->id_reservacion
    ));*/
   }
   else{
    Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_ERROR,
    '<h4>Error</h4> Solo se cuenta con <strong>'.$disponibles.'</strong> habitaciones para la fecha requerida');
    $this->refresh(); 
    //$this->redirect(array('update','id'=>$model->id));
    
   /*$this->redirect(array('reservaciones/view','id'=>$model->id_reservacion
    ));*/
   }
    
}



/*$this->redirect(array('view','id'=>$model->id));*/
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
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
$this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
public function actionIndex()
{
$dataProvider=new CActiveDataProvider('DetalleResevacion');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new DetalleResevacion('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['DetalleResevacion']))
$model->attributes=$_GET['DetalleResevacion'];

$this->render('admin',array(
'model'=>$model,
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=DetalleResevacion::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='detalle-resevacion-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}

public function actionGenerarPdf()
{
$session=new CHttpSession;
$session->open();
if(isset($session['DetalleResevacion_record']))
//Si hay datos filtrados entonces usar la criteria guardada en la sesion (esto lo guardamos en la funcion search() del modelo)
{
$model=DetalleResevacion::model()->findAll($session['DetalleResevacion_record']);
}
else
//Si no hay datos filtrados exportar todo
{
$model =DetalleResevacion::model()->findAll();
}
$mPDF1 = Yii::app()->ePdf->mpdf('utf-8','Letter','','',15,15,35,25,9,9,'L'); //Esto lo pueden configurar como quieren, para eso deben de entrar en la web de MPDF para ver todo lo que permite.
$mPDF1->useOnlyCoreFonts = true;
$mPDF1->SetTitle("Reporte - DetalleResevacion");
$mPDF1->SetAuthor(Yii::app()->user->name);
$mPDF1->SetWatermarkText("HotelUmg");
$mPDF1->showWatermarkText = true;
$mPDF1->watermark_font = 'DejaVuSansCondensed';
$mPDF1->watermarkTextAlpha = 0.05;
$mPDF1->SetDisplayMode('fullpage');
$mPDF1->WriteHTML($this->renderPartial('pdfReport', array('model'=>$model), true)); //hacemos un render partial a una vista preparada, en este caso es la vista pdfReport
$mPDF1->Output('Reporte - DetalleResevacion '.date('YmdHis'),'I');  //Nombre del pdf y parámetro para ver pdf o descargarlo directamente.
exit;
}

}

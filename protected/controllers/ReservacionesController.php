
<?php
use app\models\DetalleResevacion;



class ReservacionesController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
//public $tipo=1;
public $layout='//layouts/column2';
//public $tipo_hab=1;

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
        'actions'=>array('index','view','create','admin','update','delete','newdetalle','generarpdf','notificationpresent','dynamiccities'),
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
public function actionDynamiccities()
{
    $session=new CHttpSession;
    $session->open();
    $session['tipo']=(int) $_POST['tipo_habitacion'];
  //  $this->refresh();
    
    $data=Habitaciones::model()->findAll('tipo_habitacion=:tipo_habitacion', 
		          array(':tipo_habitacion'=>(int) $_POST['tipo_habitacion']));
    
    $data=CHtml::listData($data,'tipo_habitacion','numero');
    foreach($data as $value=>$name)
    {	//echo CHtml::listData(Habitaciones::model()->findAll('tipo_habitacion=:numero', array(':numero'=>$tipo), array('order'=>'numero, tipo_habitacion')), 'id_habitacion', 'numero');
        
        echo CHtml::tag('option',
				   array('value'=>$value),CHtml::encode($name),true);
    }
}
public function actionNotificationPresent()
{
 if (Yii::app()->request->isAjaxRequest)
 {
     //pick off the parameter value
     $job_id = Yii::app()->request->getParam( 'job_id' );
     if($job_id != '')
     {
         //echo "Id is received is ".$job_id;

         $rulesModel = Reservaciones::model()->findAllByAttributes(array('tipo_habitacion'=>$job_id));

         if(count($rulesModel))
             echo 1;
         else 
             echo 0;

     }//end of if(job_id)
     else
     {
         //echo "Id id not received";
         echo 0;

     }

 }//end of if(AjaxRequest).

}//end of NotificationPresent().



public function actionView($id)
{
   /*$sql = "UPDATE reservaciones SET total=(SELECT sum(total)total_calculado FROM detalle_resevacion where id_reservacion=:id)
   where id_reservacion=:id;";
    $comando=Yii::app()->db->createCommand($sql);
    $comando -> bindParam(":id", $id, PDO::PARAM_STR);
    $comando -> execute();*/


$this->render('view',array(
'model'=>$this->loadModel($id),
));


}




public function actionnewdetalle(){

        $detalle=new DetalleResevacion;

        if(isset($_POST['ajax']) && $_POST['ajax']==='detalle-form')
        {
            echo CActiveForm::validate($detalle);
            Yii::app()->end();
        }

        if(isset($_POST['DetalleResevacion']))
        {
            $detalle->attributes=$_POST['DetalleResevacion'];

        }
        return $detalle;

}
/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new Reservaciones;
$busqueda=new Disponibilidad;
$msg="";
$estado=0;
if(isset($_POST['Disponibilidad']))
{
    $busqueda->attributes=$_POST["Disponibilidad"];
    
    if($busqueda->validate()){
        $hab=Yii::app()->db->CreateCommand("SELECT COUNT(*) FROM habitaciones WHERE tipo_habitacion=$busqueda->tipo_habitacion")->queryColumn();
        $existentes=$hab[0];
        
        $disponibilidad = Yii::app()->db->createCommand("SELECT sum(cantidad)ocupadas FROM disponibilidad where tipo_habitacion=$busqueda->tipo_habitacion AND ( 
            (entrada BETWEEN '$busqueda->entrada' AND '$busqueda->salida') OR  
            (salida BETWEEN '$busqueda->entrada' AND '$busqueda->salida') OR 
            (entrada <= '$busqueda->entrada'  AND salida >= '$busqueda->salida'))")->queryRow();
         
        $ocupadas=$disponibilidad['ocupadas'];
        $disponibles=$existentes-$ocupadas;
        
        if(!$disponibles==null){
            $estado=1;
            $msg="Hay <strong> ".$disponibles." </strong> habitaciones disponibles para esta fecha";

        }else{
            $estado=2;
            
            $msg="No hay habitaciones disponibles para esta fecha";
            
        }
    }


}
// Uncomment the following line if AJAX validation is needed
$this->performAjaxValidation($model);

if(isset($_POST['Reservaciones']))
{
$model->attributes=$_POST['Reservaciones'];
$model->total=0;
if($model->save()){

    $this->redirect(array('view','id'=>$model->id_reservacion));
}

}

$this->render('create',array(
'model'=>$model,'busqueda'=>$busqueda,'msg'=>$msg,'estado'=>$estado
));
}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id)
{

    $session=new CHttpSession;
    $session->open();
    $tipo=$session['tipo'];
//$tipo=(int)$_POST['tipo_habitacion'];
    
$model=$this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
$this->performAjaxValidation($model);

$modelo=new Tipo();
/*$this->performAjaxValidation($modelo);

if(isset($_POST['ajax'])) {
    if ($_POST['ajax']=='tipo-form') {
        $modelo->attributes=$_POST['Tipo'];
        $tipo=$modelo->tipo_hab;   
    }
  }
*/
if(isset($_POST['Reservaciones']))
{
$model->attributes=$_POST['Reservaciones'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_reservacion));
}
$this->render('update',array(
'model'=>$model, 'modelo'=>$modelo,'tipo'=>$tipo,
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
$dataProvider=new CActiveDataProvider('Reservaciones');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Reservaciones('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Reservaciones']))
$model->attributes=$_GET['Reservaciones'];

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
$model=Reservaciones::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='reservaciones-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
public function renderButtons($data, $row) {
    $this->widget('bootstrap.widgets.TbButtonGroup', array(
       'size'=>'large',
       'type'=>'inverse', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
       'buttons'=>array(
          array('label'=>'Inverse', 'items'=>array(
             array('label'=>'Action', 'url'=>'#'),
             array('label'=>'Another action', 'url'=>'#'),
             array('label'=>'Something else', 'url'=>'#'),
             '---',
             array('label'=>'Separate link', 'url'=>'#'),
         )),
       ),
    ));
 }

public function actionGenerarPdf()
{
$session=new CHttpSession;
$session->open();
if(isset($session['Reservaciones_record']))
//Si hay datos filtrados entonces usar la criteria guardada en la sesion (esto lo guardamos en la funcion search() del modelo)
{
$model=Reservaciones::model()->findAll($session['Reservaciones_record']);
}
else
//Si no hay datos filtrados exportar todo
{
$model =Reservaciones::model()->findAll();
}
$mPDF1 = Yii::app()->ePdf->mpdf('utf-8','Letter','','',15,15,35,25,9,9,'L'); //Esto lo pueden configurar como quieren, para eso deben de entrar en la web de MPDF para ver todo lo que permite.
$mPDF1->useOnlyCoreFonts = true;
$mPDF1->SetTitle("Reporte - Reservaciones");
$mPDF1->SetAuthor(Yii::app()->user->name);
$mPDF1->SetWatermarkText("HotelUmg");
$mPDF1->showWatermarkText = true;
$mPDF1->watermark_font = 'DejaVuSansCondensed';
$mPDF1->watermarkTextAlpha = 0.05;
$mPDF1->SetDisplayMode('fullpage');
$mPDF1->WriteHTML($this->renderPartial('pdfReport', array('model'=>$model), true)); //hacemos un render partial a una vista preparada, en este caso es la vista pdfReport
$mPDF1->Output('Reporte - Reservaciones '.date('YmdHis'),'I');  //Nombre del pdf y parámetro para ver pdf o descargarlo directamente.
exit;
}

}

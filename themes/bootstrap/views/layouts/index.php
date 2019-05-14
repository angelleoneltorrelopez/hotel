<!DOCTYPE html>

<html lang="<?php echo Yii::app()->language;?>">

<head>


<title><?php echo CHtml::encode($this->pageTitle); ?></title>

 <meta charset="<?php echo Yii::app()->charset;?>">
</head>

<body>

<header>
<?php
//cuenta si hay solicitud para el gerente********************************
$sql = "SELECT COUNT(firma_RH) FROM solicitud_vacaciones where firma_RH = 1 AND firma_gerencia = 0;";
 $comando=Yii::app()->db->createCommand($sql)->queryColumn();
$resp = $comando[0];
if($resp == 0){$resp = null;}
$vacacionesgerente=$this->widget('bootstrap.widgets.TbBadge', array(
    'label'=>$resp,
), true);
//*************************************************************
//cuenta si hay solicitud para el jefe de recursos humanos********************************
$sqlr = "SELECT COUNT(firma_RH) FROM solicitud_vacaciones where firma_RH = 0;";
 $comandor=Yii::app()->db->createCommand($sqlr)->queryColumn();
$respr = $comandor[0];
if($respr == 0){$respr = null;}
$vacacionesrecursos=$this->widget('bootstrap.widgets.TbBadge', array(
    'label'=>$respr,
), true);
//*************************************************************
//cuenta si hay solicitud para recepcionista********************************
$sqlre = "SELECT COUNT(firma_gerencia) FROM solicitud_vacaciones where firma_gerencia = 1;";
 $comandore=Yii::app()->db->createCommand($sqlre)->queryColumn();
$respre = $comandore[0];
if($respre == 0){$respre = null;}
$vacacionesrecepcion=$this->widget('bootstrap.widgets.TbBadge', array(
    'label'=>$respre,
), true);
//*************************************************************





//cuenta si hay solicitud para el gerente********************************
$sql = "SELECT COUNT(firma_RH) FROM solicitud_permiso where firma_RH = 1 AND firma_gerencia = 0;";
 $comando=Yii::app()->db->createCommand($sql)->queryColumn();
$resp = $comando[0];
if($resp == 0){$resp = null;}
$badgegerente=$this->widget('bootstrap.widgets.TbBadge', array(
    'label'=>$resp,
), true);
//*************************************************************
//cuenta si hay solicitud para el jefe de recursos humanos********************************
$sqlr = "SELECT COUNT(firma_RH) FROM solicitud_permiso where firma_RH = 0;";
 $comandor=Yii::app()->db->createCommand($sqlr)->queryColumn();
$respr = $comandor[0];
if($respr == 0){$respr = null;}
$badgerecursos=$this->widget('bootstrap.widgets.TbBadge', array(
    'label'=>$respr,
), true);
//*************************************************************
//cuenta si hay solicitud para recepcionista********************************
$sqlre = "SELECT COUNT(firma_gerencia) FROM solicitud_permiso where firma_gerencia = 1;";
 $comandore=Yii::app()->db->createCommand($sqlre)->queryColumn();
$respre = $comandore[0];
if($respre == 0){$respre = null;}
$badgerecepcion=$this->widget('bootstrap.widgets.TbBadge', array(
    'label'=>$respre,
), true);
//*************************************************************
$this->widget('ext.bootstrap.widgets.TbNavbar', array(
 'type'=>'inverse', // null or 'inverse'
 //'brand'=>CHtml::encode(Yii::app()->name),

'brand'=>CHtml::encode(Yii::app()->name),
//'brandUrl'=>array('/site/index'),
'fixed'=>true,
 'collapse'=>true, // requires bootstrap-responsive.css
 'fluid' => true,
 'items'=>array(
 array(
 
 'class'=>'ext.bootstrap.widgets.TbMenu',
 'type'=>'navbar',
 'encodeLabel'=>false,

 'items'=>array(
   array('label'=>'Inicio', 'url'=>array('/site/index')),
   array('label'=>'Equipo', 'url'=>array('/site/equipo')),
   
   array('label'=>'Bodega', 'items'=>array(
      array('label'=>'Articulos', 'url'=>array('/articulos/admin'),'visible'=>Yii::app()->user->checkAccess("gerente")),
      array('label'=>'Bodegas', 'url'=>array('/bodega/admin'),'visible'=>Yii::app()->user->checkAccess("gerente")),
      array('label'=>'Ingreso Bodega', 'url'=>array('/ingresoBodega/admin'),'visible'=>Yii::app()->user->checkAccess("gerente")),
      array('label'=>'Proveedores', 'url'=>array('/proveedores/admin'),'visible'=>Yii::app()->user->checkAccess("gerente")),
      array('label'=>'Retiro Bodega', 'url'=>array('/retiroBodega/admin'),'visible'=>Yii::app()->user->checkAccess("gerente")),
      array('label'=>'Solicitud Compras', 'url'=>array('/solicitudCompra/admin'),'visible'=>Yii::app()->user->checkAccess("gerente")),
      ),'visible'=>Yii::app()->user->checkAccess("gerente")),

     array('label'=>'Permisos', 'items'=>array(
       array('label'=>'Solicitud Permisos '.$badgegerente, 'url'=>array('/solicitudPermiso/admin'),'visible'=>Yii::app()->user->checkAccess("gerente")),
       array('label'=>'Solicitud Permisos '.$badgerecursos, 'url'=>array('/solicitudPermiso/admin'),'visible'=>Yii::app()->user->checkAccess("jefe_RRHH")),
       array('label'=>'Solicitud Permisos '.$badgerecepcion, 'url'=>array('/solicitudPermiso/admin'),'visible'=>Yii::app()->user->checkAccess("recep")),
       array('label'=>'Solicitud Vacaciones'.$vacacionesgerente, 'url'=>array('/solicitudVacaciones/admin'),'visible'=>Yii::app()->user->checkAccess("gerente")),
       array('label'=>'Solicitud Vacaciones'.$vacacionesrecursos, 'url'=>array('/solicitudVacaciones/admin'),'visible'=>Yii::app()->user->checkAccess("jefe_RRHH")),
       array('label'=>'Solicitud Vacaciones'.$vacacionesrecepcion, 'url'=>array('/solicitudVacaciones/admin'),'visible'=>Yii::app()->user->checkAccess("recep")),
       array('label'=>'Tipo Permiso', 'url'=>array('/tipoPermiso/admin'),'visible'=>Yii::app()->user->checkAccess("jefe_RR")),
       array('label'=>'Tipo Permiso', 'url'=>array('/tipoPermiso/admin'),'visible'=>Yii::app()->user->checkAccess("recep")),
       array('label'=>'Tipo Permiso', 'url'=>array('/tipoPermiso/admin'),'visible'=>Yii::app()->user->checkAccess("gerente")),
     ),'visible'=>Yii::app()->user->checkAccess("gerente") || Yii::app()->user->checkAccess("jefe_RRHH") ||
   Yii::app()->user->checkAccess("recep")),

      array('label'=>'Reservaciones', 'items'=>array(
        array('label'=>'Habitaciones', 'url'=>array('/habitaciones/admin'),'visible'=>Yii::app()->user->checkAccess("gerente")),
        array('label'=>'Habitaciones', 'url'=>array('/habitaciones/admin'),'visible'=>Yii::app()->user->checkAccess("recep")),
        array('label'=>'Reservaciones', 'url'=>array('/reservaciones/admin'),'visible'=>Yii::app()->user->checkAccess("gerente")),
        array('label'=>'Reservaciones', 'url'=>array('/reservaciones/admin'),'visible'=>Yii::app()->user->checkAccess("recep")),
        array('label'=>'Tipo Habitación', 'url'=>array('/tipoHabitacion/admin'),'visible'=>Yii::app()->user->checkAccess("recep")),
        array('label'=>'Tipo Habitación', 'url'=>array('/tipoHabitacion/admin'),'visible'=>Yii::app()->user->checkAccess("gerente")),
      ),'visible'=>Yii::app()->user->checkAccess("gerente") || Yii::app()->user->checkAccess("recep")),

      array('label'=>'Contratos', 'items'=>array(
        array('label'=>'Contratos', 'url'=>array('/Contratos/admin'),'visible'=>Yii::app()->user->checkAccess("gerente")),
        array('label'=>'Contratos', 'url'=>array('/Contratos/admin'),'visible'=>Yii::app()->user->checkAccess("jefe_RRHH")),
        array('label'=>'Contratos', 'url'=>array('/Contratos/admin'),'visible'=>Yii::app()->user->checkAccess("recep")),
        array('label'=>'Jornada', 'url'=>array('/horarios/admin'),'visible'=>Yii::app()->user->checkAccess("jefe_RRHH")),
        array('label'=>'Jornada', 'url'=>array('/horarios/admin'),'visible'=>Yii::app()->user->checkAccess("recep")),
        array('label'=>'Jornada', 'url'=>array('/horarios/admin'),'visible'=>Yii::app()->user->checkAccess("gerente")),
        array('label'=>'Puestos', 'url'=>array('/puestos/admin'),'visible'=>Yii::app()->user->checkAccess("gerente")),
        array('label'=>'Puestos', 'url'=>array('/puestos/admin'),'visible'=>Yii::app()->user->checkAccess("jefe_RRHH")),
        array('label'=>'Puestos', 'url'=>array('/puestos/admin'),'visible'=>Yii::app()->user->checkAccess("recep")),
        array('label'=>'Tipo Contrato', 'url'=>array('/tipoContrato/admin'),'visible'=>Yii::app()->user->checkAccess("jefe_RRHH")),
        array('label'=>'Tipo Contrato', 'url'=>array('/tipoContrato/admin'),'visible'=>Yii::app()->user->checkAccess("recep")),
        array('label'=>'Tipo Contrato', 'url'=>array('/tipoContrato/admin'),'visible'=>Yii::app()->user->checkAccess("gerente")),
      ),'visible'=>Yii::app()->user->checkAccess("gerente") || Yii::app()->user->checkAccess("jefe_RRHH") ||
    Yii::app()->user->checkAccess("recep")),

        array('label'=>'Usuarios', 'items'=>array(
        array('label'=>'Empleados', 'url'=>array('/empleados/admin'),'visible'=>Yii::app()->user->checkAccess("gerente")),
        array('label'=>'Usuarios', 'url'=>array('/usuarios/admin'),'visible'=>Yii::app()->user->checkAccess("gerente")),
          ),'visible'=>Yii::app()->user->checkAccess("gerente")),

   array('label'=>'Articulos', 'url'=>array('/articulos/admin'),'visible'=>Yii::app()->user->checkAccess("enc_bod")),
   array('label'=>'Articulos', 'url'=>array('/articulos/admin'),'visible'=>Yii::app()->user->checkAccess("aux_bod")),

   array('label'=>'Bodegas', 'url'=>array('/bodega/admin'),'visible'=>Yii::app()->user->checkAccess("enc_bod")),
   array('label'=>'Bodegas', 'url'=>array('/bodega/admin'),'visible'=>Yii::app()->user->checkAccess("aux_bod")),

   array('label'=>'Departamentos', 'url'=>array('/departamentos/admin'),'visible'=>Yii::app()->user->checkAccess("gerente")),
   array('label'=>'Departamentos', 'url'=>array('/departamentos/admin'),'visible'=>Yii::app()->user->checkAccess("jefe_RRHH")),
   array('label'=>'Departamentos', 'url'=>array('/departamentos/admin'),'visible'=>Yii::app()->user->checkAccess("jefe_mant")),
   array('label'=>'Departamentos', 'url'=>array('/departamentos/admin'),'visible'=>Yii::app()->user->checkAccess("enc_edif")),
   array('label'=>'Departamentos', 'url'=>array('/departamentos/admin'),'visible'=>Yii::app()->user->checkAccess("recep")),

   array('label'=>'Empleados', 'url'=>array('/empleados/admin'),'visible'=>Yii::app()->user->checkAccess("jefe_RRHH")),
   array('label'=>'Empleados', 'url'=>array('/empleados/admin'),'visible'=>Yii::app()->user->checkAccess("recep")),

   array('label'=>'Habitaciones', 'url'=>array('/habitaciones/admin'),'visible'=>Yii::app()->user->checkAccess("enc_hab")),

   array('label'=>'Ingreso Bodega', 'url'=>array('/ingresoBodega/admin'),'visible'=>Yii::app()->user->checkAccess("enc_bod")),
   array('label'=>'Ingreso Bodega', 'url'=>array('/ingresoBodega/admin'),'visible'=>Yii::app()->user->checkAccess("aux_bod")),

   array('label'=>'Retiro Bodega', 'url'=>array('/retiroBodega/admin'),'visible'=>Yii::app()->user->checkAccess("enc_bod")),
   array('label'=>'Retiro Bodega', 'url'=>array('/retiroBodega/admin'),'visible'=>Yii::app()->user->checkAccess("aux_bod")),

   array('label'=>'Solicitud Compras', 'url'=>array('/solicitudCompra/admin'),'visible'=>Yii::app()->user->checkAccess("enc_bod")),

   array('label'=>'Mantenimiento', 'url'=>array('/mantenimiento/admin'),'visible'=>Yii::app()->user->checkAccess("gerente")),
   array('label'=>'Mantenimiento', 'url'=>array('/mantenimiento/admin'),'visible'=>Yii::app()->user->checkAccess("jefe_mant")),
   array('label'=>'Mantenimiento', 'url'=>array('/mantenimiento/admin'),'visible'=>Yii::app()->user->checkAccess("enc_edif")),

   array('label'=>'Proveedores', 'url'=>array('/proveedores/admin'),'visible'=>Yii::app()->user->checkAccess("enc_bod")),
   array('label'=>'Proveedores', 'url'=>array('/proveedores/admin'),'visible'=>Yii::app()->user->checkAccess("aux_bod")),

   array('label'=>'Reservaciones', 'url'=>array('/reservaciones/admin'),'visible'=>Yii::app()->user->checkAccess("enc_hab")),

   array('label'=>'Tipo Habitación', 'url'=>array('/tipoHabitacion/admin'),'visible'=>Yii::app()->user->checkAccess("enc_hab")),

   array('label'=>'Usuarios', 'url'=>array('/usuarios/admin'),'visible'=>Yii::app()->user->checkAccess("jefe_RRHH")),
   array('label'=>'Usuarios', 'url'=>array('/usuarios/admin'),'visible'=>Yii::app()->user->checkAccess("recep")),
 ),
 ),
 array(
 'class'=>'ext.bootstrap.widgets.TbMenu',
 'htmlOptions'=>array('class'=>'pull-right'),
 'items'=>array(

 //array('label'=>'Iniciar sesión' , 'url'=>Yii::app()->user->ui->loginUrl , 'visible'=>Yii::app()->user->isGuest),
 array('label'=>'Iniciar Sesión', 'icon'=>'user', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
 //array('label'=>Yii::app()->user->name, 'url'=>array('/cruge/ui/editprofile/'), 'visible'=>!Yii::app()->user->isGuest),
 //array('label'=>'Cerrar sesión ('.Yii::app()->user->name.')' , 'url'=>Yii::app()->user->ui->logoutUrl , 'visible'=>!Yii::app()->user->isGuest),
 // array('label'=>'Logout', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest, 'htmlOptions'=>array('class'=>'btn'))
 array('label'=>'Cerrar Sesión ('.Yii::app()->user->name.')', 'icon'=>'user', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
 ),
 ),
 ),
));
?>
</header>
<div class="container-fluid" id="main">
 <?php if(isset($this->breadcrumbs)):?>
 <?php $this->widget('ext.bootstrap.widgets.TbBreadcrumbs', array(
 'links'=>$this->breadcrumbs,
 )); ?>
 <?php endif?>
 <?php $this->widget('bootstrap.widgets.TbAlert', array(
   // 'block'=>true,
)); ?>

<?php if(($msgs=Yii::app()->user->getFlashes())!==null and $msgs!==array()):?>
  <div class="container" style="padding-top:0">
    <div class="row-fluid">
      <div class="span12">
        <?php foreach($msgs as $type => $message):?>

          <?php

          $this->widget('bootstrap.widgets.TbAlert', array(
            //'block' => true,
            'fade' => true,
            'closeText' => '&times;', // false equals no close link
            'events' => array(),
            'htmlOptions' => array(),
            'userComponentId' => 'user',
            'alerts' => array( // configurations per alert type
              // success, info, warning, error or danger
              'success' => array('closeText' => '&times;'),
              'info', // you don't need to specify full config
              'warning' => array('block' => false, 'closeText' => false),
              'error' => array('block' => false)
            ),
          ));
            ?>
        <?php endforeach;?>
      </div>
    </div>
  </div>
<?php endif;?>
</div>

<div style="margin-top:-17px">
<?php echo $content; ?>

</div>
<footer class="container-fluid" style=" background: #1d1e21;">
 <div class="row" style="padding:30px;">
    <div class="col-xs-12 col-sm-4">
      <h5 class="pull-right" style=" color: white;">
        &copy; <?php echo date('Y'); ?> <?php echo CHtml::encode(Yii::app()->params['empresa']); ?> | <?php echo CHtml::encode((Yii::app()->name).' '.Yii::app()->params['version']); ?>
      </h5>

    </div>
    <div class="col-xs-12 col-sm-4" style="display: flex;
			justify-content: center;">
      <?php echo TbHtml::imageCircle('https://www.shareicon.net/download/2017/06/17/887234_building_512x512.png','Logo Hotel',array('style' => 'height:100px;')); ?>
    </div>
    <div class="col-xs-12 col-sm-4" >
          <div  class="pull-left">
        
      <img  widht="25px" height="25px" src="https://cdn3.iconfinder.com/data/icons/peelicons-vol-1/50/Twitter-512.png" alt="">
      <img  widht="25px" height="25px" src="https://freeiconshop.com/wp-content/uploads/edd/facebook-outline.png" alt="">
          <br>
      <p style=" color: white;">email   : info@hotelumg.com</p>
      <p style=" color: white;">telefono: 75154685</p>
      <p style=" color: white;">fax     : 75154685</p>
      </div>
    </div>
  </div>
  </div>

 </footer>
</body>
</html>

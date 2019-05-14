<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'articulos', 'url'=>array('/articulos/index')),
				array('label'=>'Bodega', 'url'=>array('/bodega/index')),
				array('label'=>'Departamento', 'url'=>array('/departamentos/index')),
				array('label'=>'Empleados', 'url'=>array('/empleados/index')),

				array('label'=>'Habitaciones', 'url'=>array('/habitaciones/index'),'visible'=>Yii::app()->user->checkAccess("gerente")),
				array('label'=>'Habitaciones', 'url'=>array('/habitaciones/index'),'visible'=>Yii::app()->user->checkAccess("recep")),
				array('label'=>'Habitaciones', 'url'=>array('/habitaciones/index'),'visible'=>Yii::app()->user->checkAccess("enc_hab")),
				
				
				array('label'=>'Horarios', 'url'=>array('/horarios/index')),
				array('label'=>'Ingreso Bodega', 'url'=>array('/ingresoBodega/index')),
				array('label'=>'Mantenimiento', 'url'=>array('/mantenimiento/index')),
				array('label'=>'Proveedores', 'url'=>array('/proveedores/index')),
				array('label'=>'Puestos', 'url'=>array('/puestos/index')),
				array('label'=>'Reservaciones', 'url'=>array('/reservaciones/index')),
				array('label'=>'Retiro Bodega', 'url'=>array('/retiroBodega/index')),
				array('label'=>'Solicitud Compras', 'url'=>array('/solicitudCompra/index')),
				array('label'=>'Solicitud Permisos', 'url'=>array('/solicitudPermiso/index')),
				array('label'=>'Solicitud Vacaciones', 'url'=>array('/solicitudVacaciones/index')),
				array('label'=>'Tipo Contrato', 'url'=>array('/tipoContrato/index')),

				array('label'=>'Tipo Habitacion', 'url'=>array('/tipoHabitacion/index'),'visible'=>Yii::app()->user->checkAccess("gerente")),
				array('label'=>'Tipo Habitacion', 'url'=>array('/tipoHabitacion/index'),'visible'=>Yii::app()->user->checkAccess("recep")),
				array('label'=>'Tipo Habitacion', 'url'=>array('/tipoHabitacion/index'),'visible'=>Yii::app()->user->checkAccess("enc_hab")),
				
				array('label'=>'Tipo Permiso', 'url'=>array('/tipoPermiso/index')),
				array('label'=>'Usuarios', 'url'=>array('/usuarios/index')),

				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>

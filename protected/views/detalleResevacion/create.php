<?php
$this->breadcrumbs=array(
	'Detalle Resevacion'=>array('index'),
	'Crear',
);


?>

<h1>Crear Detalle Resevacion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
$this->breadcrumbs=array(
	'Detalle Retiro Bodegas',
);


?>

<h1>Detalle Retiro Bodegas</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

<?php
$this->breadcrumbs=array(
	'Detalle Compras',
);


?>

<h1>Detalle Compras</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

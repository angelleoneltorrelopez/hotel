<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_detalle_compra')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_detalle_compra),array('view','id'=>$data->id_detalle_compra)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ingreso_bodega')); ?>:</b>
	<?php echo CHtml::encode($data->id_ingreso_bodega); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_articulo')); ?>:</b>
	<?php echo CHtml::encode($data->idArticulo->nombre_articulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio')); ?>:</b>
	<?php echo CHtml::encode($data->precio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
	<?php echo CHtml::encode($data->total); ?>
	<br />


</div>

<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_detalle_retiro_bodega')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_detalle_retiro_bodega),array('view','id'=>$data->id_detalle_retiro_bodega)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_retiro_bodega')); ?>:</b>
	<?php echo CHtml::encode($data->id_retiro_bodega); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_articulo')); ?>:</b>
	<?php echo CHtml::encode($data->idArticulo->nombre_articulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_retiro')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_retiro); ?>
	<br />


</div>

<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_ingreso')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_ingreso),array('view','id'=>$data->id_ingreso)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_proveedor')); ?>:</b>
	<?php echo CHtml::encode($data->idProveedor->nombre_proveedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_solicitud_compra')); ?>:</b>
	<?php echo CHtml::encode($data->idSolicitudCompra->id_solicitud_compra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_factura')); ?>:</b>
	<?php echo CHtml::encode($data->numero_factura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_factura')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_factura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_ingreso')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_ingreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
	<?php echo CHtml::encode($data->total); ?>
	<br />


</div>

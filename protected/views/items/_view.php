<?php
/* @var $this ItemsController */
/* @var $data Items */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('storeroomid')); ?>:</b>
	<?php echo CHtml::encode($data->storeroomid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('niunumber')); ?>:</b>
	<?php echo CHtml::encode($data->niunumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('po')); ?>:</b>
	<?php echo CHtml::encode($data->po); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cost')); ?>:</b>
	<?php echo CHtml::encode($data->cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('purchasedate')); ?>:</b>
	<?php echo CHtml::encode($data->purchasedate); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('added')); ?>:</b>
	<?php echo CHtml::encode($data->added); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kits_id')); ?>:</b>
	<?php echo CHtml::encode($data->kits_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('itemcategories_id')); ?>:</b>
	<?php echo CHtml::encode($data->itemcategories_id); ?>
	<br />

	*/ ?>

</div>
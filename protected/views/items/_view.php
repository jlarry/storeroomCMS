<?php
/* @var $this ItemsController */
/* @var $data Items */
?>

<div class="view">
    <div class="viewimage">
        <?php 
        if($data->itemimage_id == null){
            echo "No image available";
        }
        else{
            echo CHtml::encode(Yii::app()->baseUrl."/../images/items/".$data->itemimage->filename);
        }
        ?>
    </div>   
    <div class="viewdata">   
	<b><?php echo CHtml::encode($data->getAttributeLabel('storeroomid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->storeroomid), array('view', 'id'=>$data->id)); ?>
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
        <b><?php echo CHtml::encode($data->getAttributeLabel('added')); ?>:</b>
	<?php echo CHtml::encode($data->added); ?>
	<br />
       <b><?php echo CHtml::encode($data->getAttributeLabel('itemcategories_id')); ?>:</b>
	<?php echo CHtml::encode($data->itemcategories->name); ?>
	<br />
	<b><?php echo CHtml::encode("Part of a kit"); ?>:</b>
	<?php echo CHtml::encode($data->kits_id); ?>
	<br />
     </div> <!-- closes viewdata -->
</div>
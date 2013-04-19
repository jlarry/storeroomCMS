<?php

/*
 * itemimage index file
 */
?>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$imgDataProvider,
	'itemView'=>'_view',
)); ?>


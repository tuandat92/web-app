<?php
$this->breadcrumbs=array(
	'Tran Daus',
);

$this->menu=array(
	array('label'=>'Create TranDau', 'url'=>array('create')),
	array('label'=>'Manage TranDau', 'url'=>array('admin')),
);
?>

<h1>Tran Daus</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

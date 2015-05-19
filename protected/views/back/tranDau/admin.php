<div id="page-title" class="clearfix">		
	<ul class="breadcrumb">
		<li>
			<?php
			echo CHtml::link('Home',array('/site/index'));
		?>
			<span class="divider">/</span>
		</li>
		<li>
			<?php
			echo CHtml::link('TranDau',array('admin'));
		?>
			<span class="divider">/</span>
		</li>
		<li class="active">List Tran Daus</li>
	</ul>		
</div> <!-- /.page-title -->
<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tran-dau-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/datatables/DT_bootstrap.css" rel="stylesheet"/>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/responsive-tables/responsive-tables.css" rel="stylesheet"/>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/lightbox/themes/evolution-dark/jquery.lightbox.css" rel="stylesheet"/>   
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/datatables/DT_bootstrap.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/responsive-tables/responsive-tables.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/lightbox/jquery.lightbox.min.js"></script>

<div id="horizontal" class="widget widget-form">
	<div class="widget-header">	      				
		<h3>
		     <i class="icon-search"></i>
		<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
		</h3>	
	</div> <!-- /widget-header -->
	<div class="widget-content search-form" style="display:none">
		<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
	</div><!-- search-form -->
</div>
<div class="widget widget-table">
	<div class="widget-header">						
		<h3>
			<i class="icon-th-list"></i>
			Manage TranDau						
		</h3>
	</div> <!-- /widget-header -->
	<div class="widget-content">
	<?php $form=$this->beginWidget('CActiveForm', array(
	    'enableAjaxValidation'=>true,
	)); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tran-dau-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'summaryText'=>'',
	'htmlOptions'=>array('class'=>'table table-striped table-bordered responsive'),
	'pagerCssClass'=>'pagination pagination-centered',
	'columns'=>array(
		array(
            'id'=>'autoId',
            'class'=>'CCheckBoxColumn',
            'selectableRows' => '50',  
            'htmlOptions'=>array('width'=>'20px'), 
        ),
		'ID_trandau',
		'ID_GiaiDau',
		'San_Dau',
		'Link_Xem',
		'Ty_So',
		'Trang_Thai',
		/*
		'Mo_Ta',
		'So_CDV',
		'ID_Chu_Nha',
		'ID_Doi_Khach',
		'Vong',
		'ThoiGianDienRa',
		'Mua_Giai',
		'trong_tai',
		*/
		array(
			'header'=>'Action',
			'class'=>'CButtonColumn',
			'buttons'=>array(
				'delete' => array
		        (
		            'label'=>'Delete',
		        	'imageUrl'=>Yii::app()->request->baseUrl.'/images/icons/delete-file-icon_24.png',
		        ),
		        'update' => array
		        (
		            'label'=>'Update',
		        	'imageUrl'=>Yii::app()->request->baseUrl.'/images/icons/table-edit-icon_24.png',
		        ),
		        'view'=>array(
		        	'visible'=>'false'
		        ),
		     ),
		     'htmlOptions'=>array('width'=>'80px'),
		),
	),
)); ?>
<script>
function reloadGrid(data) {
    $.fn.yiiGridView.update('tran-dau-grid');
}
</script>
<div style="padding-top: 10px;border-top: 1px solid #cccccc;padding-left: 20px;">
<?php echo CHtml::ajaxSubmitButton('Publish',array('tran-dau/ajaxupdate','act'=>'doActive'), array('success'=>'reloadGrid'),array('class'=>'btn btn-success','style'=>'margin-right:20px;margin-bottom:5px;'));
 
echo CHtml::ajaxSubmitButton('Unpublish',array('tran-dau/ajaxupdate','act'=>'doInactive'), array('success'=>'reloadGrid'),array('class'=>'btn btn-warning','style'=>'margin-right:20px;margin-bottom:5px;'));

echo CHtml::ajaxSubmitButton('Delete',array('tran-dau/ajaxupdate','act'=>'doDelete'), array('success'=>'reloadGrid'),array('class'=>'btn btn-danger','style'=>'margin-right:20px;margin-bottom:5px;'));

?></div>
<?php $this->endWidget(); ?>	</div> <!-- /widget-content -->
</div> <!-- /widget -->
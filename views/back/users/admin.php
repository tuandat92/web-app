<div id="page-title" class="clearfix">		
	<ul class="breadcrumb">
		<li>
			<?php echo CHtml::link('Trang chủ',array('/site/index')); ?><span class="divider">/</span>
		</li>
		<li>
			<?php echo CHtml::link('Quản lý tài khoản',array('/users/admin')); ?><span class="divider">/</span>
		</li>
		<li class="active">Danh sách tài khoản</li>
	</ul>		
</div> <!-- /.page-title -->
<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('users-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/datatables/DT_bootstrap.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/responsive-tables/responsive-tables.css" rel="stylesheet"> 
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/datatables/DT_bootstrap.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/responsive-tables/responsive-tables.js"></script>
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
			Quản lý tài khoản				
		</h3>
	</div> <!-- /widget-header -->
		<div class="widget-content">
<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
)); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search(),
	'summaryText'=>'',
	'htmlOptions'=>array('class'=>'table table-striped table-bordered responsive'),
	'pagerCssClass'=>'pagination pagination-centered',
	'columns'=>array(
		array(
            'id'=>'autoId',
            'class'=>'CCheckBoxColumn',
            'selectableRows' => '50',   
        ),
        array(
            'name'=>'fullname',
            'value'=>'$data->fullname',
			'htmlOptions'=>array("width"=>"32%"),
        ),
        array(
            'name'=>'username',
            'value'=>'$data->username',
        	'htmlOptions'=>array("width"=>"22%"),
        ),
        array(
            'name'=>'email',
            'value'=>'$data->email',
        ),
		array(
            'name'=>'active',
            'value'=>'($data->active=="1")?("Yes"):("No")'
        ),
		array(
			'header'=>'',
			'class'=>'CButtonColumn',
			'buttons'=>array(
        		
		        'delete' => array
		        (
		            'label'=>'Xóa',
		        	'imageUrl'=>Yii::app()->request->baseUrl.'/images/icons/delete-file-icon_24.png',
		        	'url'=>'Yii::app()->createUrl("users/delete", array("id"=>$data->id))',
		        ),
		        'update' => array
		        (
		            'label'=>'Sửa',
		        	'imageUrl'=>Yii::app()->request->baseUrl.'/images/icons/table-edit-icon_24.png',
		            'url'=>'Yii::app()->createUrl("users/update", array("id"=>$data->id))',
		        ),
		        'view' => array
		        (
		        	'visible'=>'false'
		        ),
        	),
			'htmlOptions'=>array("width"=>"80px"),
        ),
	),
)); ?>
<script>
function reloadGrid(data) {
    $.fn.yiiGridView.update('users-grid');
}
</script>
<div style="padding-top: 10px;border-top: 1px solid #cccccc;padding-left: 20px;">
<?php echo CHtml::ajaxSubmitButton('Activate',array('users/ajaxupdate','act'=>'doActive'), array('success'=>'reloadGrid'),array('class'=>'btn btn-success','style'=>'margin-right:20px;')); ?>
<?php echo CHtml::ajaxSubmitButton('Block',array('users/ajaxupdate','act'=>'doInactive'), array('success'=>'reloadGrid'),array('class'=>'btn btn-warning','style'=>'margin-right:20px;')); ?>
<?php echo CHtml::ajaxSubmitButton('Delete',array('users/ajaxupdate','act'=>'doDelete'), array('success'=>'reloadGrid'),array('class'=>'btn btn-danger','style'=>'margin-right:20px;')); ?>
</div>
	<?php $this->endWidget(); ?>
</div> <!-- /widget-content -->
</div> <!-- /widget -->
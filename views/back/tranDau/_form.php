<div class="widget-content">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tran-dau-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal', 'novalidate'=>'novalidate'),
)); ?>

	<?php if($form->errorSummary($model)):?>
			<div class="alert alert-block">
				<a class="close" data-dismiss="alert" href="#">&times;</a>
				<h4 class="alert-heading"><?php echo $form->errorSummary($model); ?></h4>
			</div>
	<?php endif;?>
	<fieldset>
	<div class="control-group">
		<?php echo $form->labelEx($model,'San_Dau',array('class'=>'control-label','for'=>'San_Dau')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'San_Dau',array('size'=>60,'maxlength'=>120,'class'=>'input-large')); ?>
		<?php echo $form->error($model,'San_Dau'); ?>
		</div>
	</div>
	<div class="control-group">
		<?php echo $form->labelEx($model,'Link_Xem',array('class'=>'control-label','for'=>'Link_Xem')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'Link_Xem',array('size'=>60,'maxlength'=>200,'class'=>'input-large')); ?>
		<?php echo $form->error($model,'Link_Xem'); ?>
		</div>
	</div>
	<div class="control-group">
		<?php echo $form->labelEx($model,'Ty_So',array('class'=>'control-label','for'=>'Ty_So')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'Ty_So',array('size'=>20,'maxlength'=>20,'class'=>'input-large')); ?>
		<?php echo $form->error($model,'Ty_So'); ?>
		</div>
	</div>
	<div class="control-group">
		<?php echo $form->labelEx($model,'Trang_Thai',array('class'=>'control-label','for'=>'Trang_Thai')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'Trang_Thai',array('size'=>50,'maxlength'=>50,'class'=>'input-large')); ?>
		<?php echo $form->error($model,'Trang_Thai'); ?>
		</div>
	</div>
	<div class="control-group">
		<?php echo $form->labelEx($model,'Mo_Ta',array('class'=>'control-label','for'=>'Mo_Ta')); ?>
		<div class="controls">
            <?php echo $form->textArea($model,'Mo_Ta');?>

		<?php echo $form->error($model,'Mo_Ta'); ?>
		</div>
	</div>
			<div class="control-group">
		<?php echo $form->labelEx($model,'So_CDV',array('class'=>'control-label','for'=>'So_CDV')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'So_CDV'); ?>
		<?php echo $form->error($model,'So_CDV'); ?>
		</div>
	</div>
<!--	<div class="control-group">-->
<!--		--><?php //echo $form->labelEx($model,'ID_Chu_Nha',array('class'=>'control-label','for'=>'ID_Chu_Nha')); ?>
<!--		<div class="controls">-->
<!--		--><?php //echo $form->textField($model,'ID_Chu_Nha'); ?>
<!--		--><?php //echo $form->error($model,'ID_Chu_Nha'); ?>
<!--		</div>-->
<!--	</div>-->
<!--	<div class="control-group">-->
<!--		--><?php //echo $form->labelEx($model,'ID_Doi_Khach',array('class'=>'control-label','for'=>'ID_Doi_Khach')); ?>
<!--		<div class="controls">-->
<!--		--><?php //echo $form->textField($model,'ID_Doi_Khach'); ?>
<!--		--><?php //echo $form->error($model,'ID_Doi_Khach'); ?>
<!--		</div>-->
<!--	</div>-->
	<div class="control-group">
		<?php echo $form->labelEx($model,'Vong',array('class'=>'control-label','for'=>'Vong')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'Vong',array('size'=>60,'maxlength'=>100,'class'=>'input-large')); ?>
		<?php echo $form->error($model,'Vong'); ?>
		</div>
	</div>
	<div class="control-group">
		<?php echo $form->labelEx($model,'ThoiGianDienRa',array('class'=>'control-label','for'=>'ThoiGianDienRa')); ?>
		<div class="controls">
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	        'model' => $model,
	        'attribute' => 'ThoiGianDienRa',
	        // additional javascript options for the date picker plugin
	        'options' => array(
	            'showAnim' => 'fold',
	            'language' => 'vi',
	            'dateFormat' => 'dd/mm/yy HH:ii:ss',
	            'changeYear' => true,
	            'changeMonth' => true,
	        ),
	        'htmlOptions' => array(
		        'style' => 'height:20px;'
	        ),
       	)); ?>
		<?php echo $form->error($model,'ThoiGianDienRa'); ?>
		</div>
	</div>
			<div class="control-group">
		<?php echo $form->labelEx($model,'Mua_Giai',array('class'=>'control-label','for'=>'Mua_Giai')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'Mua_Giai',array('size'=>60,'maxlength'=>100,'class'=>'input-large')); ?>
		<?php echo $form->error($model,'Mua_Giai'); ?>
		</div>
	</div>
	<div class="control-group">
		<?php echo $form->labelEx($model,'trong_tai',array('class'=>'control-label','for'=>'trong_tai')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'trong_tai',array('size'=>60,'maxlength'=>200,'class'=>'input-large')); ?>
		<?php echo $form->error($model,'trong_tai'); ?>
		</div>
	</div>
	<div class="form-actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary btn-large')); ?>
		<?php echo CHtml::link('Cancel',array('/tran-dau/admin'),array('class'=>'btn btn-large')); ?>
	</div>
	</fieldset>
<?php $this->endWidget(); ?>
</div><!-- form -->
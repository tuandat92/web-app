<div class="widget-toolbar clearfix">
	<?php
		Yii::app()->clientScript->registerScript('searchtag', "
		$('.pull-left .btn').click(function(){
			var tag=$(this).attr('for');
			$('#'+tag).toggle();
			if($('#'+tag).css('display')!='none'){
				$(this).addClass('active');
			}
			else{
				$(this).removeClass('active');
			}
			return false;
		});
		");
		?>
		<div class="pull-left">
		Search By:&nbsp;&nbsp;
			<div class="btn-group" data-toggle="buttons-checkbox">
			<button for="ID_GiaiDau" class="btn btn-small active">Id  Giai Dau</button>
					    <button for="San_Dau" class="btn btn-small">San  Dau</button>
					    <button for="Link_Xem" class="btn btn-small">Link  Xem</button>
					    <button for="Ty_So" class="btn btn-small">Ty  So</button>
					    <button for="Trang_Thai" class="btn btn-small">Trang  Thai</button>
					    <button for="Mo_Ta" class="btn btn-small">Mo  Ta</button>
					    <button for="So_CDV" class="btn btn-small">So  Cdv</button>
					    <button for="ID_Chu_Nha" class="btn btn-small">Id  Chu  Nha</button>
					    <button for="ID_Doi_Khach" class="btn btn-small">Id  Doi  Khach</button>
					    <button for="Vong" class="btn btn-small">Vong</button>
					    <button for="ThoiGianDienRa" class="btn btn-small">Thoi Gian Dien Ra</button>
					    <button for="Mua_Giai" class="btn btn-small">Mua  Giai</button>
					    <button for="trong_tai" class="btn btn-small">Trong Tai</button>
					    		</div>
	</div>
</div> <!-- /.widget-toolbar -->
<div class="widget-content">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'htmlOptions'=>array('class'=>'form-horizontal', 'novalidate'=>'novalidate'),
)); ?>
	<fieldset>
	<div id="ID_GiaiDau" class="control-group" >
		<?php echo $form->label($model,'ID_GiaiDau',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'ID_GiaiDau'); ?>
		</div>
	</div>
	<div id="San_Dau" class="control-group" style="display: none">
		<?php echo $form->label($model,'San_Dau',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'San_Dau',array('size'=>60,'maxlength'=>120,'class'=>'input-large')); ?>
		</div>
	</div>
	<div id="Link_Xem" class="control-group" style="display: none">
		<?php echo $form->label($model,'Link_Xem',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'Link_Xem',array('size'=>60,'maxlength'=>200,'class'=>'input-large')); ?>
		</div>
	</div>
	<div id="Ty_So" class="control-group" style="display: none">
		<?php echo $form->label($model,'Ty_So',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'Ty_So',array('size'=>20,'maxlength'=>20,'class'=>'input-large')); ?>
		</div>
	</div>
	<div id="Trang_Thai" class="control-group" style="display: none">
		<?php echo $form->label($model,'Trang_Thai',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'Trang_Thai',array('size'=>50,'maxlength'=>50,'class'=>'input-large')); ?>
		</div>
	</div>
	<div id="So_CDV" class="control-group" style="display: none">
		<?php echo $form->label($model,'So_CDV',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'So_CDV'); ?>
		</div>
	</div>
	<div id="ID_Chu_Nha" class="control-group" style="display: none">
		<?php echo $form->label($model,'ID_Chu_Nha',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'ID_Chu_Nha'); ?>
		</div>
	</div>
	<div id="ID_Doi_Khach" class="control-group" style="display: none">
		<?php echo $form->label($model,'ID_Doi_Khach',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'ID_Doi_Khach'); ?>
		</div>
	</div>
	<div id="Vong" class="control-group" style="display: none">
		<?php echo $form->label($model,'Vong',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'Vong',array('size'=>60,'maxlength'=>100,'class'=>'input-large')); ?>
		</div>
	</div>
	<div id="ThoiGianDienRa" class="control-group" style="display: none">
		<?php echo $form->label($model,'ThoiGianDienRa',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'ThoiGianDienRa'); ?>
		</div>
	</div>
	<div id="Mua_Giai" class="control-group" style="display: none">
		<?php echo $form->label($model,'Mua_Giai',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'Mua_Giai',array('size'=>60,'maxlength'=>100,'class'=>'input-large')); ?>
		</div>
	</div>
	<div id="trong_tai" class="control-group" style="display: none">
		<?php echo $form->label($model,'trong_tai',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'trong_tai',array('size'=>60,'maxlength'=>200,'class'=>'input-large')); ?>
		</div>
	</div>
	<div class="form-actions">
		<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-primary btn-large')); ?>
	</div>
	</fieldset>
<?php $this->endWidget(); ?>

</div><!-- search-form -->
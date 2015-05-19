<div class="widget-content">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
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
		<?php echo $form->labelEx($model,'fullname',array('class'=>'control-label','for'=>'fullname')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'fullname',array('size'=>60,'maxlength'=>200,'class'=>'input-large')); ?>
			<?php echo $form->error($model,'fullname'); ?>
		</div>
	</div>
	<div class="control-group">
		<?php echo $form->labelEx($model,'email',array('class'=>'control-label','for'=>'email')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>200,'class'=>'input-large')); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
	</div>
	<div class="control-group">
		<?php echo $form->labelEx($model,'username',array('class'=>'control-label','for'=>'email')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>200,'class'=>'input-large')); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>
	</div>
	<div class="control-group">
		<?php echo $form->labelEx($model,'new_password',array('class'=>'control-label','for'=>'new_password')); ?>
		<div class="controls">
			<?php echo $form->passwordField($model,'new_password',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'new_password'); ?>
		</div>
	</div>
	<div class="control-group">
		<?php echo $form->labelEx($model,'repeat_password',array('class'=>'control-label','for'=>'repeat_password')); ?>
		<div class="controls">
			<?php echo $form->passwordField($model,'repeat_password',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'repeat_password'); ?>
		</div>
	</div>
	<div class="control-group">
		<?php echo $form->labelEx($model,'role',array('class'=>'control-label','for'=>'role')); ?>
		<div class="controls">
			<div class="btn-group" data-toggle="buttons-radio">
			   <?php if(Yii::app()->user->role=='superadmin'):?>
		       <button onclick="document.getElementById('Users_role').value=0;return false;" class="btn btn-primary <?php if($model->role=='0'){echo 'active';}?>">Super Admin</button>
		       <?php endif;?>
		       <?php if(Yii::app()->user->role=='superadmin' || Yii::app()->user->role=='admin'):?>
		       <button onclick="document.getElementById('Users_role').value=1;return false;" class="btn btn-primary <?php if($model->role=='1'){echo 'active';}?>">Admin</button>
		       <?php endif;?>
		       <button onclick="document.getElementById('Users_role').value=2;return false;" class="btn btn-primary <?php if($model->role=='2'){echo 'active';}?>">Manager</button>
		 	</div>
		 	<?php echo $form->hiddenField($model,'role'); ?>	
		 	<?php echo $form->error($model,'role'); ?>
		</div>
	</div>
	<div class="control-group">
				<?php echo $form->labelEx($model,'active',array('class'=>'control-label','for'=>'active')); ?>
				<div class="controls">
				
					<div class="btn-group" data-toggle="buttons-radio">
				       <button onclick="document.getElementById('Users_active').value=1;return false;" class="btn btn-primary <?php if($model->active!='0'){echo 'active';}?>">True</button>
				       <button onclick="document.getElementById('Users_active').value=0;return false;" class="btn btn-primary <?php if($model->active=='0'){echo 'active';}?>">False</button>
				       
				 	</div>
				 	<?php echo $form->hiddenField($model,'active'); ?>
					<?php echo $form->error($model,'active'); ?>
				</div>
	</div>
	<div class="form-actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo' : 'Lưu',array('class'=>'btn btn-primary btn-large')); ?>
		<?php if(Yii::app()->user->role=='manager' ):?>
			<?php echo CHtml::link('Hủy',array('/site/index'),array('class'=>'btn btn-large')); ?>
		<?php else:?>
			<?php echo CHtml::link('Hủy',array('/users/admin'),array('class'=>'btn btn-large')); ?>
		<?php endif;?>
	</div>
	</fieldset>
<?php $this->endWidget(); ?>

</div><!-- form -->
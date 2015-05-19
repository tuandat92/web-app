<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Game Online - Đăng nhập hệ thống</title>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl;?>/css/dangnhap.css" />
</head>
<body>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'login-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>
<div id="form-login">
    <h2>Đăng nhập hệ thống quản trị</h2>
    <ul>
        <li>
            <?php echo CHtml::activeLabel($model,'username',array('label'=>'Tài khoản'));?>
            <?php echo $form->textField($model,'username');?>
            <?php echo $form->error($model,'username');?>
        </li>
        <li>
            <?php echo CHtml::activeLabel($model,'password',array('label'=>'Mật khẩu'));?>
<!--            --><?php //echo $form->textField($model,'password');?>
            <?php echo CHtml::activePasswordField($model,'password')?>
            <?php echo $form->error($model,'password');?>
        </li>
        <li>
            <label>ghi nhớ</label>
            <input type="checkbox" name="check" checked="checked" />
        </li>
        <li>
            <?php echo CHtml::submitButton('Đăng nhập');?>
        </li>
    </ul>
</div>
<?php $this->endWidget(); ?>
</body>
</html>
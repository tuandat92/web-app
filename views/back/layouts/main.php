<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/favicon.ico" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<!-- Styles -->

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <!-- Styles -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-overrides.css" rel="stylesheet"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/msgGrowl/css/msgGrowl.css" rel="stylesheet"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui-lightness/jquery-ui-1.8.21.custom.css" rel="stylesheet"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/slate.css" rel="stylesheet"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/slate-responsive.css" rel="stylesheet"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/pages/calendar.css" rel="stylesheet"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/components/error.css" rel="stylesheet"/>

    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/back/docs.css" rel="stylesheet"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/back/semantic.min.css" rel="stylesheet"/>
    <!-- Javascript -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/back/docs.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/back/highlight.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/back/less.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/back/semantic.min.js"></script>

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.8.21.custom.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.ui.touch-punch.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/fullcalendar/fullcalendar.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/Slate.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/msgGrowl/js/msgGrowl.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.jeditable.js"></script>

    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <script type="text/javascript">
//        $(document).ready(function(){
//            $("#info_user").hide();
//            $("#user").hover(function(){
//                $("#info_user").css("display",'block');
//            });
//
//        });
    </script>
</head>

<body id="example" lass="basic pushable" ontouchstart="">
    <div class="ui vertical inverted sidebar menu left" id="toc">
        <div class="item">
            <a class="ui logo icon image" href="#">
                <img src="<?php echo Yii::app()->baseUrl;?>/css/back/logo.png">
            </a>
        </div>
        <div class="item">
            <div class="ui small  inverted header">Category</div>
            <div class="menu">
                <a class="item" href="<?php echo Yii::app()->baseUrl;?>/cpanel.php/theLoai/admin">All Category</a>
                <a class="item" href="<?php echo Yii::app()->baseUrl;?>/cpanel.php/theLoai/create">Add Category</a>
            </div>
        </div>
        <div class="item">
            <div class="ui small  inverted header">Match</div>
            <div class="menu">
                <a class="item" href="<?php echo Yii::app()->baseUrl;?>/cpanel.php/match/admin">All Match</a>
                <a class="item" href="<?php echo Yii::app()->baseUrl;?>/cpanel.php/match/create">Add Match</a>
            </div>
        </div>
        <div class="item">
            <div class="ui small  inverted header">News</div>
            <div class="menu">
                <a class="item" href="<?php echo Yii::app()->baseUrl;?>/cpanel.php/news/admin">All News</a>
                <a class="item" href="<?php echo Yii::app()->baseUrl;?>/cpanel.php/news/create">Add News</a>
            </div>
        </div>
    </div>

    <div class="ui black big launch right attached fixed button">
        <i class="content icon"></i>
    </div>
    <div class="ui fixed inverted main menu">
        <div class="container_back">
            <div class="right menu">
                <a href="#" class="popup icon music item" id="user" style="width: 200px;height:37px;">
                    Welcome, <?php echo Yii::app()->user->name;?>
                    <img width="26" height="26" style="float:left;margin-top:-7px;margin-left:4px;" src="<?php echo Yii::app()->baseUrl;?>/img/user.png" alt="">
                </a>

<!--                <div class="ab-sub-wrapper" id="info_user">-->
<!--                    <ul class="ab-submenu" id="wp-admin-bar-user-actions">-->
<!--                        <li id="wp-admin-bar-user-info">-->
<!--                            <a href="" tabindex="-1" class="ab-item">-->
<!--                                <img width="64" height="64" class="avatar avatar-64 photo" src="--><?php //echo Yii::app()->baseUrl;?><!--/img/avatar.jpg" alt="">-->
<!--                                <span class="display-name">--><?php //echo Yii::app()->user->name;?><!--</span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li id="wp-admin-bar-edit-profile"><a href="" class="ab-item">Edit My Profile</a></li>-->
<!--                        <li id="wp-admin-bar-logout"><a href="" class="ab-item">Log Out</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
            </div>
        </div>
    </div>
</div>
<script src="./Sticky_files/less.min.js"></script>

<div id="content">
	<div class="container">
		<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
			)); ?><!-- breadcrumbs -->
		<?php endif?>
		<?php echo $content; ?>
	</div> <!-- /.container -->
	
</div> <!-- /#content -->

<div id="footer">	
		
	<div class="container">
		
		&copy; 2012, all rights reserved.
		
	</div> <!-- /.container -->		
	
</div> <!-- /#footer -->
<script type="text/javascript">
	<?php
	    foreach(Yii::app()->user->getFlashes() as $key => $message) {
	        echo '$.msgGrowl ({'.
			'type:"'.$key.'"'.
			',title:"'.$key.'"'.
			',text:"'.$message.'"'.
			'});';
	    }
	?>
</script>
</body>
</html>
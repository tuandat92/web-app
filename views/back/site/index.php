<?php $this->pageTitle = Yii::app()->name; ?>
<div class="row">
    <div class="span8">
        <div class="widget">

            <div class="widget-header">
                <h3>
                    <i class="icon-bookmark"></i> 
                    Control Panel								
                </h3>

                <div class="widget-actions">
<!--							<span class="badge">8</span>	-->
                </div> <!-- /.widget-actions -->

            </div> <!-- /.widget-header -->

            <div class="widget-content">

                <div class="shortcuts">
                    <?php
                    echo CHtml::link(
                        '<i class="shortcut-icon icon-plus"></i><span class="shortcut-label">Tạo trận đấu</span>', array('/tranDau/create'), array('class' => 'shortcut')
                    );
                    ?>
                    <?php
                    echo CHtml::link(
                            '<i class="shortcut-icon icon-list"></i><span class="shortcut-label">Quản lý trận đấu</span>', array('/tranDau/admin'), array('class' => 'shortcut')
                    );
                    ?>
                    <?php
                    echo CHtml::link(
                        '<i class="shortcut-icon icon-lock"></i><span class="shortcut-label">Tài khoản Quản trị</span>', array('/users/admin'), array('class' => 'shortcut')
                    );
                    ?>
                </div> <!-- /.shortcuts -->

            </div> <!-- /.widget-content -->

        </div> <!-- /.widget -->
    </div>
    <div class="span4">
        <div id="sidebar">
                    <?php $this->widget('application.extensions.user_menu.user_menu'); ?>
        </div><!-- sidebar -->
    </div>
</div>
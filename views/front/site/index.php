<?php
//$this->widget('application.components.the_loai');
?>
<div id="title-top">
    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/truc_tiep_video.png"  />
</div>
<div id="show-video">
    <?php
    $i = 0;
    if($models !=null){
    foreach ($models as $value) {
        ?>
        <div class="video-left">
            <a href="<?php echo Yii::app()->baseUrl.'/index.php/site/video/'.$value['ID_TheLoai'];?>"><img class="img"
                             src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/images/<?php echo $value['img_TL'];?>"/></a>
            <p><a href="<?php echo Yii::app()->baseUrl.'/index.php/site/video/'.$value['ID_TheLoai'];?>"><?php echo $value['Ten_TheLoai']; ?></a></p>
            <img class="danh_gia" src="<?php echo Yii::app()->request->baseUrl; ?>/images/danh_gia.jpg"/>
        </div>
        <?php
            $i++;
            if($i%2==0){
        ?>
            <div id="clear"></div>
            <?php
            }
            ?>
    <?php
    }
    }
    ?>
</div>
<div id="pagination">
    <a href="#"><</a><span>1</span><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a><a href="#">...</a><a href="#">></a>
</div>


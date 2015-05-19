
<div class="row">
		<div class="span12">
			<div class="error-container">
				
				<h2>Error <?php echo $code; ?></h2>
				<div class="error-details">
					<?php echo CHtml::encode($message); ?>
				</div> <!-- /error-details -->
				<div class="error-actions">
					<?php echo CHtml::link(
						'<i class="icon-chevron-left"></i> &nbsp;Back to Dashboard',
						array('/site/index'),
						array('class'=>'btn btn-large btn-primary')
					); ?>
					<?php echo CHtml::link(
						'<i class="icon-envelope"></i> &nbsp;Contact Support',
						array('/site/index'),
						array('class'=>'btn btn-large')
					); ?>					
				</div> <!-- /error-actions -->			
			</div> <!-- /error-container -->			
		</div> <!-- /span12 -->
</div> <!-- /row -->
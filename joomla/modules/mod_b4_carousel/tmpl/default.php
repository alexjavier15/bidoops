<?php


// no direct access
defined('_JEXEC') or die ('Restricted access'); 

$wcag = $params->get('wcag', 1) ? ' tabindex="0"' : '';
$idx = 0; ?>

<div id="b4-carousel<?php echo $mid; ?>" class="carousel slide" data-ride="carousel">
  	<ol class="carousel-indicators">
	<?php foreach ($slides as $slide) { ?>
		  <li data-target="#b4-carousel<?php echo $mid; ?>" data-slide-to="<?php echo $idx; ?>" <?php echo (!$idx ? ' class="active"' : ''); ?> >   </li>
	<?php $idx++;?>
	<?php } ?>
	</ol>
	<?php $idx=0;?>
	<div class="carousel-inner">
	<?php foreach ($slides as $slide) { ?>
		<?php if($slide->image) { ?>
			<div class="carousel-item<?php echo (!$idx ? ' active' : ''); ?>">
				<?php
					$bg_style = !empty($params->get('bg_style')) ? $params->get('bg_style') .',': '';
					$action = $params->get('link_image',1);
          			if($action > 1) {
						$desc = $params->get('show_desc') ? 'title="'.(!empty($slide->title) ? htmlspecialchars($slide->title.' ') : '').(!empty($slide->description) ? htmlspecialchars('<small>'.strip_tags($slide->description,"<p><a><b><strong><em><i><u>").'</small>') : '').'"':'';
	          		if($jquery) {
	          			$attr = 'class="image-link" data-'.$desc;
	          					
	          			} else {
	          			$attr = 'rel="lightbox-slider'.$mid.'" '.$desc;
	          			}
					} else {
						$attr = $rel;
						}
          			?>
	            	<?php if (($slide->link && $action==1) || $action>1) { ?>
						<a <?php echo $attr; ?> href="<?php echo ($action>1 ? $slide->image : $slide->link); ?>" target="<?php echo $slide->target; ?>">
					<?php } ?>
						<div class="d-block w-100 bg-img"  alt="<?php echo $slide->alt; ?>" <?php echo (!empty($slide->img_title) ? ' title="'.$slide->img_title.'"':''); ?> style="<?php echo $style['image']; ?> background: <?php echo $bg_style; ?> url(<?php echo $slide->image; ?>) no-repeat;"></div>
					<?php if (($slide->link && $action==1) || $action>1) { ?>
						</a>
					<?php } ?>
					<?php if($params->get('slider_source') && $params->get('show_desc') && !empty($slide->description)) { ?>
						<div class="slide-text">
							<?php if($params->get('link_desc') && $slide->link) { ?>
							<a href="<?php echo $slide->link; ?>" target="<?php echo $slide->target; ?>" <?php echo $rel; ?>>
								<?php echo strip_tags($slide->description,"<br><span><em><i><b><strong><small><big>"); ?>
							</a>
							<?php } else { ?>
								<?php echo $slide->description; ?>
							<?php } ?>
						</div>
					<?php } ?>
			</div>
		<?php $idx++;?>
		<?php } ?>
	<?php } ?>
	</div>
	    <?php if($show->arr || $show->btn) { ?>
		  <a class="carousel-control-prev" href="#b4-carousel<?php echo $mid; ?>" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#b4-carousel<?php echo $mid; ?>" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		  </a>
        <?php } ?>
	
</div>
<div class="b4-carousel-end" style="clear: both"<?php echo $wcag; ?>></div>
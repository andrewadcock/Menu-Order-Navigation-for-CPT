<?php
  // Quick snippet for Previous and Next buttons based on Menu Order
  // Friendly for Custom Post Types

	// Set params for getting all posts in CPT
	$pagelist_args = array(
		'orderby' => 'menu_order',
		'post_type' => 'services',
		'posts_per_page' => -1,
	
	);
	
	// Get all posts in CPT
	$pagelist = get_posts($pagelist_args);
	
	$pages = array();
	
	foreach ($pagelist as $page) {
	   $pages[] += $page->ID;
	}
	
							
	$thispost = get_post( get_the_ID() );
	$current = $thispost->menu_order;
	
	$prevmenu = $current - 1;
	$nextmenu = $current + 1;
	
	foreach( $pages as $page ) {
		$post = get_post( $page );
						
		if($post->menu_order == $prevmenu ) {
			$prevID = $page;

		}
		elseif ($post->menu_order == $nextmenu) {
			$nextID = $page;
		}
	}
	
	?>
	
	<div class="navigation singlepages">
	<?php if (!empty($prevID)) { ?>
	<div class="alignleft">
	<a href="<?php echo get_permalink($prevID); ?>"
	  title="<?php echo get_the_title($prevID); ?>">&#8592; <?php echo get_the_title($prevID); ?></a>
	</div>
	<?php }
	if (!empty($nextID)) { ?>
	<div class="alignright">
	<a href="<?php echo get_permalink($nextID); ?>" 
	 title="<?php echo get_the_title($nextID); ?>"><?php echo get_the_title($nextID); ?> &#8594;</a>
	</div>
	<?php } ?>
	</div><!-- .navigation -->

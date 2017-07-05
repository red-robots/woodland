<?php
/**
 * Template part for displaying page content in index.php.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( "template-index" ); ?>>
	<?php $image = get_field( "row_1_image" );
	if ( $image ):?>
        <div class="row-1" <?php if ( $image ): echo 'style="background-image: url(' . $image['url'] . ');"'; endif; ?>>
            <div class="copy">
				<?php $copy = get_field( "row_1_copy" );
				if ( $copy ):
					echo $copy;
				endif; ?>
            </div><!--.copy-->
            <img class="divot" src="<?php echo get_template_directory_uri() . "/images/divot.png"; ?>" alt="">
        </div><!--.row-1-->
	<?php endif; ?>
    <div class="row-2">
        <div class="row-1">
            <div class="row-1 circle">
                <img src="<?php echo get_template_directory_uri() . "/images/cap.png"; ?>" alt="">
            </div><!--.row-1-->
			<?php $copy = get_field( "row_2_copy" );
			if ( $copy ):?>
                <div class="row-2 copy">
					<?php echo $copy; ?>
                </div><!--.row-2-->
			<?php endif; ?>
        </div><!--.row-1-->
		<?php $row_2_parent = get_field( "row_2_parent" );
		if ( $row_2_parent ):
			$args = array(
				'post_type'      => 'page',
				'post_parent'    => $row_2_parent,
				'posts_per_page' => - 1,
				'order'          => 'ASC',
				'orderby'        => 'menu_order'
			);
			$query          = new WP_Query( $args );
			if ( $query->have_posts() ):?>
                <div class="row-2 clear-bottom">
					<?php while ( $query->have_posts() ):$query->the_post(); ?>
						<?php $image    = get_field( "sub_background_image" );
						$box_hover_copy = get_field( "box_hover_copy" ); ?>
                        <div class="outer-wrapper js-blocks" <?php if ( $image ): echo 'style="background-image: url(' . $image['url'] . ');"'; endif; ?>>
                            <a href="<?php echo get_the_permalink(); ?>">
                                <div class="inner-wrapper">
                                    <div <?php if ( $box_hover_copy ) {
										echo 'class="no-rollover"';
									} ?>>
										<?php the_title(); ?>
                                    </div>
									<?php if ( $box_hover_copy ): ?>
                                        <div class="rollover">
											<?php echo $box_hover_copy; ?>
                                        </div>
									<?php endif; ?>
                                </div><!--.inner-wrapper-->
                            </a>
                        </div><!--.outer-wrapper-->
					<?php endwhile; ?>
                </div><!--.row-2-->
				<?php $post = get_post( 46 );
				setup_postdata( $post ); ?>
			<?php endif;
		endif; ?>
    </div><!--.row-2-->
	<?php $image = get_field( "row_3_image" );
	if ( $image ):?>
        <div class="row-3" <?php if ( $image ): echo 'style="background-image: url(' . $image['url'] . ');"'; endif; ?>>
            <div class="copy">
				<?php $copy = get_field( "row_3_copy" );
				if ( $copy ):
					echo $copy;
				endif; ?>
            </div><!--.copy-->
            <img class="divot" src="<?php echo get_template_directory_uri() . "/images/divot.png"; ?>" alt="">
        </div><!--.row-3-->
	<?php endif; ?>
    <div class="row-4">
        <div class="row-1 circle">
            <img src="<?php echo get_template_directory_uri() . "/images/lightbulb.png"; ?>" alt="">
        </div><!--.row-1-->
		<?php $copy = get_field( "row_4_copy" );
		if ( $copy ):?>
            <div class="row-2">
				<?php echo $copy; ?>
            </div><!--.row-2-->
		<?php endif; ?>
		<?php $video = get_field( "row_4_video" );
		if ( $video ):?>
            <div class="row-3">
                <div class="iframe-wrapper">
					<?php echo $video; ?>
                </div><!--.iframe-wrapper-->
            </div><!--.row-3-->
		<?php endif; ?>
    </div><!--.row-4-->
	<?php $image = get_field( "row_5_image" );
	if ( $image ):?>
        <div class="row-5" <?php if ( $image ): echo 'style="background-image: url(' . $image['url'] . ');"'; endif; ?>>
			<?php $copy = get_field( "row_5_copy" );
			$title      = get_field( "row_5_title" );
			if ( $title || $copy ):?>
                <div class="row-1">
					<?php if ( $title ): ?>
                        <div class="row-1">
							<?php echo $title; ?>
                        </div><!--.row-1-->
                        <div class="spacer"></div><!--.spacer-->
					<?php endif; ?>
					<?php if ( $copy ): ?>
                        <div class="row-2">
							<?php echo $copy; ?>
                        </div><!--.row-2-->
					<?php endif; ?>
                </div><!--.row-1-->
			<?php endif; ?>
			<?php $args = array(
				'post_type'      => 'page',
				'post_parent'    => 7,
				'posts_per_page' => - 1,
				'order'          => 'ASC',
				'orderby'        => 'menu_order'
			);
			$query      = new WP_Query( $args );
			if ( $query->have_posts() ):?>
                <div class="row-2 clear-bottom">
					<?php while ( $query->have_posts() ):$query->the_post(); ?>
                        <div class="outer-wrapper js-blocks">
                            <a href="<?php echo get_the_permalink(); ?>">
                                <div class="inner-wrapper">
									<?php the_title(); ?>
                                </div><!--.inner-wrapper-->
                            </a>
                        </div><!--.outer-wrapper-->
					<?php endwhile; ?>
                </div><!--.row-2-->
				<?php $post = get_post( 46 );
				setup_postdata( $post ); ?>
			<?php endif; ?>
        </div><!--.row-5-->
	<?php endif; ?>
</article><!-- #post-## -->

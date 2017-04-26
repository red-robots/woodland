<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-page"); ?>>
	<?php $image = get_field("row_1_image");
	if($image):?>
        <div class="row-1" <?php if($image): echo 'style="background-image: url('.$image['url'].');"'; endif;?>>
            <?php $copy = get_field("row_1_copy");
            if($copy):?>
                <div class="copy">
                    <?php echo $copy;?>
                </div><!--.copy-->
            <?php endif;?>
            <img class="divot" src="<?php echo get_template_directory_uri()."/images/divot.png";?>" alt="">
        </div><!--.row-1-->
    <?php endif;?>
    <div class="row-2">
        <h1><?php the_title();?></h1>
        <?php if(get_the_content()):?>
            <div class="copy">
                <?php the_content();?>
            </div><!--.copy-->
        <?php endif;?>
	    <?php $args = array(
		    'post_type'=>'page',
		    'post_parent'=>get_the_ID(),
		    'posts_per_page'=>-1,
		    'order'=>'ASC',
		    'orderby'=>'menu_order'
	    );
	    $query = new WP_Query($args);
	    if($query->have_posts()):?>
            <div class="sub-pages">
			    <?php while($query->have_posts()):$query->the_post();?>
				    <?php $image = get_field("sub_background_image");?>
                    <div class="outer-wrapper" <?php if($image): echo 'style="background-image: url('.$image['url'].');"'; endif;?>>
                        <a href="<?php echo get_the_permalink();?>">
                            <div class="inner-wrapper">
                                <span>
                                    <?php the_title();?>
                                </span>
                            </div><!--.inner-wrapper-->
                        </a>
                    </div><!--.outer-wrapper-->
			    <?php endwhile;?>
            </div><!--.row-2-->
		    <?php wp_reset_postdata();?>
	    <?php endif;?>
    </div><!--.row-2-->
</article><!-- #post-## -->

<?php
/**
 * Template part for displaying page content in page-sitemap.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-sitemap"); ?>>
	<?php $image = get_field("row_1_image");
	if($image):?>
        <div class="row-1 row-banner" <?php if($image): echo 'style="background-image: url('.$image['url'].');"'; endif;?>>
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
        <div class="copy">
            <?php the_content();?>
            <?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
        </div><!--.copy-->
    </div><!--.row-2-->
</article><!-- #post-## -->

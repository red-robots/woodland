<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<?php $post = get_post(222);
				setup_postdata($post);
				$image = get_field("row_1_image");
				wp_reset_postdata();
				if($image):?>
                    <div class="row-1 row-banner" <?php if($image): echo 'style="background-image: url('.$image['url'].');"'; endif;?>>
                        <img class="divot" src="<?php echo get_template_directory_uri()."/images/divot.png";?>" alt="">
                    </div><!--.row-1-->
				<?php endif;?>
				<div class="row-2">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'acstarter' ); ?></h1>
                    <div class="copy">
                        <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'acstarter' ); ?></p>
	                    <?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
                    </div><!-- .copy -->
                </div><!--.row-2-->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

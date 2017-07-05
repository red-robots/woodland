<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package ACStarter
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="template-search">
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
					<h1><?php printf( esc_html__( 'Search Results for: %s', 'acstarter' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					<div class="copy">
						<?php if(have_posts()):?>
							<ul>
								<?php while(have_posts()):the_post();?>
									<li><a href="<?php echo get_the_permalink();?>"><?php the_title();?></a></li>
								<?php endwhile;?>
							</ul>
						<?php endif;?>
						<h2>Sitemap</h2>
						<?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
					</div><!-- .copy -->
				</div><!--.row-2-->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();

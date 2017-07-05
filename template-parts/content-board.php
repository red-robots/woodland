<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-board"); ?>>
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
        <?php if(get_the_content()):?>
            <div class="copy">
                <?php the_content();?>
            </div><!--.copy-->
        <?php endif;?>
        <div class="trustees">
            <?php $trustees_header = get_field("trustees_header");
            $rows = get_field("trustees");
            if($trustees_header):?>
                <h2><?php echo $trustees_header;?></h2>
            <?php endif;
            if($rows):?>
                <div class="trustees copy">
                    <?php foreach($rows as $row):?>
                        <div class="trustee">
                            <div class="wrapper">
                            <?php echo $row['trustee'];?>
                            </div><!--.wrapper-->
                        </div><!--.trustee-->
                    <?php endforeach;?>
                </div><!--.trustees-->
            <?php endif;?>
        </div><!--.trustees-->
	    <?php $id = get_the_ID();
	    $parent_id = wp_get_post_parent_id($id);
	    $args = array(
		    'post_type'=>'page',
		    'post_parent'=>$id,
		    'posts_per_page'=>-1,
		    'order'=>'ASC',
		    'orderby'=>'menu_order'
	    );
	    $query = new WP_Query($args);
	    if(!$query->have_posts()):
            if($parent_id):
                $args = array(
                    'post_type'=>'page',
                    'post_parent'=>$parent_id,
                    'posts_per_page'=>-1,
                    'order'=>'ASC',
                    'orderby'=>'menu_order'
                );
                $query = new WP_Query($args);
                if(!$query->have_posts()):
                    $query = null;
                endif;
		    else:
                $query = null;
            endif;
	    endif;?>
        <?php if($query):?>
            <div class="sub-pages clear-bottom">
			    <?php while($query->have_posts()):$query->the_post();?>
				    <?php $image = get_field("sub_background_image");
				    $box_hover_copy = get_field("box_hover_copy");
                    $second_line = get_field( "second_line" );?>
                    <div class="outer-wrapper js-blocks" <?php if($image): echo 'style="background-image: url('.$image['url'].');"'; endif;?>>
                        <a href="<?php echo get_the_permalink();?>">
                            <div class="inner-wrapper">
                                <div <?php if($box_hover_copy) echo 'class="no-rollover"';?>>
                                    <?php the_title();?><br>
                                    <?php if($second_line):
                                        echo $second_line;
                                    endif;?>
                                </div>
	                            <?php if($box_hover_copy):?>
                                    <div class="rollover">
                                        <?php echo $box_hover_copy;?>
                                    </div>
	                            <?php endif;?>
                            </div><!--.inner-wrapper-->
                        </a>
                    </div><!--.outer-wrapper-->
			    <?php endwhile;?>
            </div><!--.row-2-->
		    <?php wp_reset_postdata();?>
	    <?php endif;?>
    </div><!--.row-2-->
</article><!-- #post-## -->

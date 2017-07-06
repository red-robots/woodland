<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-our-people"); ?>>
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
        <?php $staff_header = get_field("staff_header");
        $args = array(
            'post_type'=>'staff',
            'posts_per_page'=>-1,
		    'order'=>'ASC',
		    'orderby'=>'menu_order'
        );
        $query = new WP_Query($args);
        if($query->have_posts()):?>
            <section class="staff">
                <?php if($staff_header):?>
                    <header><h2><?php echo $staff_header;?></h2></header>
                <?php endif;?>
                <div class="staff clear-bottom">
                    <?php while($query->have_posts()):$query->the_post();
                        $image = get_field("image");
                        $title = get_field("title");?>
                        <div class="member js-blocks">
                            <a class="popup" href="#<?php echo sanitize_title_with_dashes(get_the_title());?>">
                                <?php if($image):?>
                                    <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                                <?php endif;?>
                                <header><h2><?php the_title();?></h2></header>
                                <?php if($title):?>
                                    <div class="title"><?php echo $title;?></div><!--.title-->
                                <?php endif;?>
                            </a>
                            <div class="hidden">
                                <div class="staff-member-popup clear-bottom" id="<?php echo sanitize_title_with_dashes(get_the_title());?>">
                                    <div class="col-1">
                                        <?php if($image):?>
                                            <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">    
                                        <?php endif;?>
                                        <header><h2><?php the_title();?></h2></header>
                                        <?php if($title):?>
                                            <div class="title"><?php echo $title;?></div><!--.title-->
                                        <?php endif;?>
                                    </div><!--.col-1-->
                                    <div class="col-2 copy">
                                        <?php the_content();?>
                                    </div><!--.col-2-->
                                </div><!--####-->
                            </div><!--.hidden-->
                        </div><!--.member-->
                    <?php endwhile;?>
                </div><!--.staff-->
            </section><!--.staff-->
            <?php wp_reset_postdata();
        endif;?>
        <?php $content_bottom = get_field("content_bottom"); 
        if($content_bottom):?>
            <div class="copy copy-2">
                <?php echo $content_bottom;?>
            </div><!--.copy-2-->
        <?php endif;?>
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

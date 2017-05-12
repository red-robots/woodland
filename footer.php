<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="row-2">
        <div class="col-1">
			<?php $title  = get_field( "contact_title", "option" );
			$address_1    = get_field( "address_line_1", "option" );
			$address_2    = get_field( "address_line_2", "option" );
			$map_link     = get_field( "map_link", "option" );
			$map_text     = get_field( "map_text", "option" );
			$phone_number = get_field( "phone_number", "option" );
			$phone_text = get_field( "phone_text", "option" );
			$name         = get_field( "school_name", "option" );
			if ( $title ):?>
                <h2><?php echo $title; ?></h2>
			<?php endif; ?>
			<?php if ( $name ): ?>
                <div class="name"><?php echo $name; ?></div><!--.name-->
			<?php endif; ?>
			<?php if ( $address_1 ): ?>
                <div class="address-1"><?php echo $address_1; ?></div><!--.address-1-->
			<?php endif; ?>
			<?php if ( $address_2 ): ?>
                <div class="address-2"><?php echo $address_2; ?></div><!--.adress-2-->
			<?php endif; ?>
			<?php if ( $map_link ): ?>
                <div class="map">
                    <a href="<?php echo $map_link; ?>">
                        <?php echo $map_text;?>
                    </a>
                </div><!--.map-->
			<?php endif; ?>
			<?php if ( $phone_number ): ?>
                <div class="phone"><a href="tel:<?php echo preg_replace("/[^0-9]/","",$phone_number); ?>">
                        <?php echo $phone_text." ".$phone_number;?>
                    </a>
                </div><!--.name-->
			<?php endif; ?>
        </div><!--.col-1-->
        <div class="col-2">
			<?php $title = get_field( "links_title", "option" );
			if ( $title ):?>
                <h2><?php echo $title; ?></h2>
			<?php endif; ?>
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
        </div><!--.col-2-->
    </div><!--.row-2-->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

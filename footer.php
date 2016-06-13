<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 */
?>

    </div><!-- .site-content -->

    <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="foot-inner"><!-- site-inner -->
            <?php if ( has_nav_menu( 'social' ) ) : ?>
                <nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'sir-furniture' ); ?>">
                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'social',
                            'menu_class'     => 'social-links-menu',
                            'depth'          => 1,
                            'link_before'    => '<span class="screen-reader-text">',
                            'link_after'     => '</span>',
                        ) );
                    ?>
                </nav><!-- .social-navigation -->
            <?php endif; ?>

            <div class="site-info">

                <?php
                if ( has_nav_menu( 'sub_footer_menu' ) ) :
                    add_filter('wp_nav_menu', 'sirfurniture_first_and_last');
                    wp_nav_menu( array( 'depth' => 1, 'container_id' => 'footer-link', 'theme_location' => 'sub_footer_menu', 'link_before'=>'<span class="border-deco">', 'link_after'=>'</span>'  ) );
                    remove_filter('wp_nav_menu', 'sirfurniture_first_and_last');
                endif;
                ?>

                <?php
                if ( sirfurniture_get_option('sir_enable_footer_area') == 'on' || !sirfurniture_get_option('sir_enable_footer_area') ) :
                ?>

                <div id="footer-info" class="footer-con">
                    <?php if ( sirfurniture_get_option('sir_enable_footer1') == 'on' || !sirfurniture_get_option('sir_enable_footer1') ) : ?>
                    <h2><?php echo esc_html(sirfurniture_get_option('sir_footer_info_title','INFO')); ?></h2>
                    <?php echo nl2br(esc_html(sirfurniture_get_option('sir_footer_info_text','INFO'))); ?>
                    <?php endif; ?>
                    <?php do_action( 'sirfurniture_footer1' ); ?>
                </div>
                <div id="footer-cs" class="footer-con">
                    <?php if ( sirfurniture_get_option('sir_enable_footer2') == 'on' || !sirfurniture_get_option('sir_enable_footer2') ) : ?>
                    <h2><?php echo esc_html(sirfurniture_get_option('sir_footer_2_info_title','CS CENTER')); ?></h2>
                    <a href="tel:<?php echo esc_attr(sirfurniture_get_option('sir_footer_2_phone','02-123-1234')); ?>"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo esc_attr(sirfurniture_get_option('sir_footer_2_phone','02-123-1234')); ?></a>
                    <a href="mailto:<?php echo sanitize_email(sirfurniture_get_option('sir_footer_2_mail','abc@abc.com<')); ?>" class="mail"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo sanitize_email(sirfurniture_get_option('sir_footer_2_mail','abc@abc.com<')); ?></a>
                    <p><?php echo nl2br(esc_html(sirfurniture_get_option('sir_footer_2_info_text','cs_center_text'))); ?></p>
                    <?php endif; ?>
                    <?php do_action( 'sirfurniture_footer2' ); ?>
                </div>
                <div id="footer-bank" class="footer-con">
                    <?php if ( sirfurniture_get_option('sir_enable_footer3') == 'on' || !sirfurniture_get_option('sir_enable_footer3') ) : ?>
                    <h2><?php echo esc_html(sirfurniture_get_option('sir_footer_3_info_title','BANK INFO')); ?></h2>
                    <p><?php echo nl2br(esc_html(sirfurniture_get_option('sir_footer_3_info_text','INFO'))); ?></p>
                    <?php endif; ?>
                    <?php do_action( 'sirfurniture_footer3' ); ?>
                </div>
                <div id="footer-notice" class="footer-con">
                    <?php do_action( 'sirfurniture_footer4' ); ?>
                </div>

                <?php
                endif;
                ?>

            </div><!-- .site-info -->
        </div>
    </footer><!-- .site-footer -->
</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>

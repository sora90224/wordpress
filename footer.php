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
                <nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', SIR_CMM_NAME ); ?>">
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
                <div id="footer-link">
                    <ul>
                        <li><a href="#"><b><span class="border-deco">개인정보 처리방침</span></b></a></li>
                        <li><a href="#"><span class="border-deco">이용약관</span></a></li>
                        <li><a href="#"><span class="border-deco">회사소개</span></a></li>
                        <li><a href="#"><span class="border-deco">개인정보취급</span></a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div id="footer-info" class="footer-con">
                    <h2>INFO</h2>
                    <address class="f-info footer-address">서울특별시 강남구 강남대로 123, 역삼동 1004호</address>
                    <span class="f-info footer-phone">T.02-1234-5678</span>
                    <span class="f-info footer-fax">F.02-1234-5678</span>
                </div>
                <div id="footer-cs" class="footer-con">
                    <h2>CS CENTER</h2>
                    <a href="tel:02-123-1234"><i class="fa fa-phone" aria-hidden="true"></i> 02-123-1234</a>
                    <a href="mailto:abc@abc.com" class="mail"><i class="fa fa-envelope" aria-hidden="true"></i> abc@abc.com</a>
                    <p>월-금 am 11:00 - pm 05:00<br>점심시간 : am 12:00 - pm 01:00</p>
                </div>
                <div id="footer-bank" class="footer-con">
                    <h2>BANK INFO</h2>
                    <p>국민은행 : 123456-00-123456<br>예금주: 홍길동</p>
                </div>
                <div id="footer-notice" class="footer-con">
                    <h2>공지사항</h2>
                    <ul>
                        <li><a href="#">공지사항입니다</a></li>
                        <li><a href="#">공지사항입니다</a></li>
                        <li><a href="#">공지사항입니다</a></li>
                        <li><a href="#">공지사항입니다</a></li>
                        <li><a href="#">공지사항입니다</a></li>
                    </ul>
                </div>
                <?php
                    /**
                     *
                     * @since sir community 1.0
                     */
                    do_action( 'sircomm_credits' );
                ?>  
            </div><!-- .site-info -->
        </div>
    </footer><!-- .site-footer -->
</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>

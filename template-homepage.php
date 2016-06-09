<?php
/**
 * The template for displaying the homepage.
 *
 * Template name: Homepage
 *
 * @package gnucommerce-2016-summer-tt
 */

get_header(); ?>

	<div id="primary" class="shop-main">
	    
        <?php
        /*
         *  @gnusmmt_shop_main_banner   hook 20
         *  @gnusmmt_shop_sub_banner    hook 25
         *  @gnusmmt_latest_gnucommerce_shop    hook 26
        */
        do_action( 'homepage' );
        ?>

        <?php
        /*
        <div class="shop-main-wr">
            <!--메인이벤트-->
            <ul id="main-event">
                <li class="main-event-li">
                    <div style="background-image:url(http://theme.sir.kr/youngcart5/data/event/1464665185_m)" class="main-event-image"><a href="#" class="more-btn">더보기</a></div>
                    <ul class="main-event-prd">
                        <li>
                            <div class="main-evprd-wr">
                                <a href="#" class="prd-img"><img src="http://thumbnail.10x10.co.kr/webimage/image/add1/150/A001504779_01.jpg?cmd=thumb&w=240&h=240&fit=true&ws=false"></a>
                                <a href="#" class="prd-name">상품명</a>
                                <span class="prd-price">10,000원</span>
                            </div>
                        </li>
                        <li>
                            <div class="main-evprd-wr">
                                <a href="#" class="prd-img"><img src="http://webimage.10x10.co.kr/image/add1/07/A000077691_01-5.jpg"></a>
                                <a href="#" class="prd-name">상품명</a>
                                <span class="prd-price">10,000원</span>
                            </div>
                        </li>
                        <li>
                            <div class="main-evprd-wr">
                                <a href="#" class="prd-img"><img src="http://thumbnail.10x10.co.kr/webimage/image/add1/150/A001504779_01.jpg?cmd=thumb&w=240&h=240&fit=true&ws=false"></a>
                                <a href="#" class="prd-name">상품명</a>
                                <span class="prd-price">10,000원</span>
                            </div>
                        </li>
                        <li>
                            <div class="main-evprd-wr">
                                <a href="#" class="prd-img"><img src="http://thumbnail.10x10.co.kr/webimage/image/add1/150/A001504779_01.jpg?cmd=thumb&w=240&h=240&fit=true&ws=false"></a>
                                <a href="#" class="prd-name">상품명</a>
                                <span class="prd-price">10,000원</span>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        */
        ?>
	</div>

<script>
jQuery(document).ready(function($) {
    $(".site-inner").addClass("shop-inner").removeClass("site-inner");
});
</script>
<?php get_footer(); ?>
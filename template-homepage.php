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
	    
        <!--?php
        do_action( 'homepage' );
        ?-->
        <!--메인배너-->
        <div id="shop-main-banner">
            <ul class="main-banner">
                <li><img src="http://theme.sir.kr/youngcart5/data/banner/34" alt=""></li>
                <li><img src="http://theme.sir.kr/youngcart5/data/banner/34" alt=""></li>
                <li><img src="http://theme.sir.kr/youngcart5/data/banner/34" alt=""></li>
            </ul>
        </div>
        <div class="shop-main-wr">
            <!--서브배너-->
            <ul id="main-subbn">
                <li><a href="#"><img src="http://theme.sir.kr/youngcart5/data/banner/32" alt=""></a></li>
                <li><a href="#"><img src="http://theme.sir.kr/youngcart5/data/banner/32" alt=""></a></li>
                <li><a href="#"><img src="http://theme.sir.kr/youngcart5/data/banner/32" alt=""></a></li>
            </ul>
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
                                <a href="#" class="prd-img"><img src="http://webimage.10x10.co.kr/image/add1/127/A001278817_01-4.jpg"></a>
                                <a href="#" class="prd-name">상품명</a>
                                <span class="prd-price">10,000원</span>
                            </div>
                        </li>
                    </ul>
                </li>

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
              <!--메인상품리스트-->
            <div id="main-item" class="tab-wr">
                <ul class="tabsTit">
                    <li class="tabsTab tabsHover">히트상품</li>
                    <li class="tabsTab">추천상품</li>
                    <li class="tabsTab">최신상품</li>
                    <li class="tabsTab">인기상품</li>
                    <li class="tabsTab">할인상품</li>
                </ul>
                <ul class="main-item-list">
                    <li class="sct-li">
                        <a href="#" class="sct-img"><img src="http://thumbnail.10x10.co.kr/webimage/image/add1/150/A001503767_01.jpg?cmd=thumb&w=240&h=240&fit=true&ws=false" alt=""></a>
                        <div class="sct-info-wr">
                            <a href="#" class="sct-ptd">상품명입니다</a>
                            <span class="sct-cost">10,000원</span>
                            <div class="sct-icon"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_cp.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_discount.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_best.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_hit.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_new.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_rec.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_soldout.gif"></div>
                            <div class="sct-btn">
                                <button type="button" class="btn-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="btn-txt">장바구니</span></button>
                                <button type="button" class="btn-wish"><i class="fa fa-heart" aria-hidden="true"></i>  <span class="btn-txt">위시리스트</span></button>
                            </div>
                        </div>
                        <div class="sct-cartop">
                            <div class="sct-cartop-wr">
                                <label>컬러</label>
                                <select>
                                    <option>빨강</option>
                                    <option>노랑</option>
                                </select>
                                <label>컬러</label>
                                <select>
                                    <option>빨강</option>
                                    <option>노랑</option>
                                </select>
                                <button type="button" class="cart-op-btn btn-blue">장바구니</button>
                                <button type="button" class="cart-op-close btn-grd">닫기</button>
                            </div>
                        </div>
                    </li>
                    <li class="sct-li">
                        <a href="#" class="sct-img"><img src="http://thumbnail.10x10.co.kr/webimage/image/add1/150/A001503767_01.jpg?cmd=thumb&w=240&h=240&fit=true&ws=false" alt=""></a>
                        <div class="sct-info-wr">
                            <a href="#" class="sct-ptd">상품명입니다</a>
                            <span class="sct-cost">10,000원</span>
                            <div class="sct-icon"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_cp.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_discount.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_best.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_hit.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_new.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_rec.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_soldout.gif"></div>
                            <div class="sct-btn">
                                <button type="button" class="btn-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="btn-txt">장바구니</span></button>
                                <button type="button" class="btn-wish"><i class="fa fa-heart" aria-hidden="true"></i>  <span class="btn-txt">위시리스트</span></button>
                            </div>
                        </div>
                    </li>
                     <li class="sct-li">
                        <a href="#" class="sct-img"><img src="http://thumbnail.10x10.co.kr/webimage/image/add1/150/A001503767_01.jpg?cmd=thumb&w=240&h=240&fit=true&ws=false" alt=""></a>
                        <div class="sct-info-wr">
                            <a href="#" class="sct-ptd">상품명입니다</a>
                            <span class="sct-cost">10,000원</span>
                            <div class="sct-icon"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_soldout.gif"></div>
                            <div class="sct-btn">
                                <button type="button" class="btn-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="btn-txt">장바구니</span></button>
                                <button type="button" class="btn-wish"><i class="fa fa-heart" aria-hidden="true"></i>  <span class="btn-txt">위시리스트</span></button>
                            </div>
                        </div>
                    </li>
                     <li class="sct-li">
                        <a href="#" class="sct-img"><img src="http://thumbnail.10x10.co.kr/webimage/image/add1/150/A001503767_01.jpg?cmd=thumb&w=240&h=240&fit=true&ws=false" alt=""></a>
                        <div class="sct-info-wr">
                            <a href="#" class="sct-ptd">상품명입니다</a>
                            <span class="sct-cost">10,000원</span>
                            <div class="sct-icon"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_cp.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_discount.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_best.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_hit.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_new.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_rec.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_soldout.gif"></div>
                            <div class="sct-btn">
                                <button type="button" class="btn-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="btn-txt">장바구니</span></button>
                                <button type="button" class="btn-wish"><i class="fa fa-heart" aria-hidden="true"></i>  <span class="btn-txt">위시리스트</span></button>
                            </div>
                        </div>
                    </li>
                     <li class="sct-li">
                        <a href="#" class="sct-img"><img src="http://thumbnail.10x10.co.kr/webimage/image/add1/150/A001503767_01.jpg?cmd=thumb&w=240&h=240&fit=true&ws=false" alt=""></a>
                        <div class="sct-info-wr">
                            <a href="#" class="sct-ptd">상품명입니다</a>
                            <span class="sct-cost">10,000원</span>
                            <div class="sct-icon"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_cp.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_discount.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_best.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_hit.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_new.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_rec.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_soldout.gif"></div>
                            <div class="sct-btn">
                                <button type="button" class="btn-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="btn-txt">장바구니</span></button>
                                <button type="button" class="btn-wish"><i class="fa fa-heart" aria-hidden="true"></i>  <span class="btn-txt">위시리스트</span></button>
                            </div>
                        </div>
                    </li>
                     <li class="sct-li">
                        <a href="#" class="sct-img"><img src="http://thumbnail.10x10.co.kr/webimage/image/add1/150/A001503767_01.jpg?cmd=thumb&w=240&h=240&fit=true&ws=false" alt=""></a>
                        <div class="sct-info-wr">
                            <a href="#" class="sct-ptd">상품명입니다</a>
                            <span class="sct-cost">10,000원</span>
                            <div class="sct-icon"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_cp.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_discount.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_best.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_hit.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_new.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_rec.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_soldout.gif"></div>
                            <div class="sct-btn">
                                <button type="button" class="btn-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="btn-txt">장바구니</span></button>
                                <button type="button" class="btn-wish"><i class="fa fa-heart" aria-hidden="true"></i>  <span class="btn-txt">위시리스트</span></button>
                            </div>
                        </div>
                    </li>
                     <li class="sct-li">
                        <a href="#" class="sct-img"><img src="http://thumbnail.10x10.co.kr/webimage/image/add1/150/A001503767_01.jpg?cmd=thumb&w=240&h=240&fit=true&ws=false" alt=""></a>
                        <div class="sct-info-wr">
                            <a href="#" class="sct-ptd">상품명입니다</a>
                            <span class="sct-cost">10,000원</span>
                            <div class="sct-icon"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_cp.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_discount.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_best.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_hit.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_new.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_rec.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_soldout.gif"></div>
                            <div class="sct-btn">
                                <button type="button" class="btn-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="btn-txt">장바구니</span></button>
                                <button type="button" class="btn-wish"><i class="fa fa-heart" aria-hidden="true"></i>  <span class="btn-txt">위시리스트</span></button>
                            </div>
                        </div>
                    </li>

                     <li class="sct-li">
                        <a href="#" class="sct-img"><img src="http://thumbnail.10x10.co.kr/webimage/image/add1/150/A001503767_01.jpg?cmd=thumb&w=240&h=240&fit=true&ws=false" alt=""></a>
                        <div class="sct-info-wr">
                            <a href="#" class="sct-ptd">상품명입니다</a>
                            <span class="sct-cost">10,000원</span>
                            <div class="sct-icon"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_cp.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_discount.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_best.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_hit.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_new.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_rec.gif"><img src="<?php echo get_bloginfo('template_directory');?>/img/icon_soldout.gif"></div>
                            <div class="sct-btn">
                                <button type="button" class="btn-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="btn-txt">장바구니</span></button>
                                <button type="button" class="btn-wish"><i class="fa fa-heart" aria-hidden="true"></i>  <span class="btn-txt">위시리스트</span></button>
                            </div>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
        

	</div>


<script>
jQuery(document).ready(function($) {
    $(".site-inner").addClass("shop-inner").removeClass("site-inner");
});
</script>
<?php get_footer(); ?>
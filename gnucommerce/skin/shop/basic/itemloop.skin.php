<?php
if( !defined('GC_NAME') ) exit;

if( !$item_list->loop ){
    do_action( GC_NAME.'_skin_action', __FILE__, plugin_dir_path( __FILE__) );
}

$classes = array();

$classes[] = 'col-gn-'.$config['product_gallery_cols'];
$classes[] = 'gnucommerce-ajax-cart';
$classes[] = 'sct-li';

if( $item_list->loop && ($item_list->loop % $config['product_gallery_cols'] == 0) ){
    $classes[] = 'box_clear';
}

$tag = (isset($settag) && !empty($settag)) ? $settag : 'li';

$item_list->loop++;
?>

<<?php echo $tag; ?> <?php post_class( $classes, $goods->ID ); ?>>
    <?php do_action( 'gc_before_shop_loop_item' ); ?>
    <a class="item_box_href" href="<?php the_permalink(); ?>">
        <?php
        if ($item_list->view_it_img) {  //이미지 표시를 활성화 했다면
            echo '<div class="sct_img">'.gc_get_product_thumbnail().'</div>';  //썸네일
        }
        ?>
        <div class="sct_txt">
            <?php
                if( $item_list->view_it_name ){     //상품 이름을 표시
                     echo "<div class=\"sct_tit\">".the_title()."</div>\n";
                }

                if ($item_list->view_it_basic && $goods->it_basic){     //기본설명 표시
                    echo "<div class=\"sct_basic\">".esc_html($goods->it_basic)."</div>\n";
                }

                //가격( price ) 표시 
                if ($item_list->view_it_cust_price || $item_list->view_it_price) {

                    echo "<div class=\"sct_cost\">\n";

                    if ($item_list->view_it_cust_price && $goods->it_cust_price) {
                        echo "<strike>".gc_display_price($goods->it_cust_price)."</strike>\n";
                    }

                    if ($item_list->view_it_price) {
                        echo gc_display_price(gc_get_price($goods), $goods->it_tel_inq)."\n";
                    }

                    echo "</div>\n";
                }
                if ($item_list->view_it_icon) {  //아이콘 표시 여부
                    echo "<div class=\"sct_icon\">".gc_item_icon($goods)."</div>\n";
                }
            ?>
            
        </div>
        <?php do_action( 'gc_after_shop_loop_item_title', $goods, $item_list ); ?>
    </a>
    <div class="sct-btn">
        <button type="button" class="btn-cart" data-it_id="<?php echo $post->ID;?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="btn-txt"><?php _e('Cart', 'sir-furniture');?></span></button>
        <button type="button" class="btn-wish" data-it_id="<?php echo $post->ID;?>"><i class="fa fa-heart" aria-hidden="true"></i>  <span class="btn-txt"><?php _e('Wishlist', 'sir-furniture');?></span></button>
    </div>
    <div class="cart-layer"></div>
    <?php do_action( 'gc_after_shop_loop_item', $goods, $item_list ); ?>
</<?php echo $tag; ?>>
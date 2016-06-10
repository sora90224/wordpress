<?php
if ( ! defined( 'ABSPATH' ) ) exit;
global $post;

$ul_add_class = isset($args['ul_class']) ? $args['ul_class'] : '';
?>
<ul id="<?php echo $args['tab_el_id'] ?>" class="<?php echo $ul_add_class;?>">
<?php
$loop = 0;

foreach($items as $post){
    if( empty($post) ) continue;

    $classes = array();

    $classes[] = 'sct-li';

    $loop++;
?>
    <li <?php post_class( $classes, $post->ID ); ?>>
        <a href="<?php the_permalink(); ?>" class="sct-img">
            <?php echo gc_get_product_thumbnail(); ?>
        </a>
        <div class="sct-info-wr">
            <a href="#" class="sct-ptd"><?php the_title(); ?></a>
            <span class="sct-cost"><?php echo gc_display_price(gc_get_price($post), $post->it_tel_inq); ?></span>
            <?php
                echo "<div class=\"sct-icon\">".gc_item_icon($post)."</div>\n";
            ?>
            <div class="sct-btn">
                <button type="button" class="btn-cart" data-it_id="<?php echo $post->ID;?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="btn-txt"><?php _e('Cart', 'sir-furniture');?></span></button>
                <button type="button" class="btn-wish" data-it_id="<?php echo $post->ID;?>"><i class="fa fa-heart" aria-hidden="true"></i>  <span class="btn-txt"><?php _e('Wishlist', 'sir-furniture');?></span></button>
            </div>
        </div>
        <div class="cart-layer"></div>
    </li>
<?php
}   //end foreach

if($loop == 0) echo "<li class=\"sct_noitem\">".__('NO_ITEMS')."</li>\n";
?>
</ul>
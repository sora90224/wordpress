<?php
if ( ! defined( 'ABSPATH' ) ) exit;
global $post;

$ul_add_class = isset($args['ul_class']) ? $args['ul_class'] : '';
?>
<ul class="<?php echo $ul_add_class;?>">
<?php
$loop = 0;

foreach($items as $post){
    if( empty($post) ) continue;

    $classes = array();

    $loop++;
?>
    <li <?php post_class( $classes, $post->ID ); ?>>
        <div class="main-evprd-wr">
            <a href="<?php the_permalink(); ?>" class="prd-img">
            <?php echo gc_get_product_thumbnail(); ?>
            </a>
            <a href="<?php the_permalink(); ?>" class="prd-name"><?php the_title(); ?></a>
            <span class="prd-price">
                <?php echo gc_display_price(gc_get_price($post), $post->it_tel_inq); ?>
            </span>
        </div>
    </li>
<?php
}   //end foreach

if($loop == 0) echo "<li class=\"sct_noitem\">".__('NO_ITEMS')."</li>\n";
?>
</ul>
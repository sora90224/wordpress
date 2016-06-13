<?php

add_filter('gc_load_common_css', 'sir_comm_load_shop_css', 10, 3);

function sir_comm_load_shop_css($load_common_css, $post, $pages){

$config = GC_VAR()->config;

$de_shop_skin = !empty($config['de_shop_skin']) ? $config['de_shop_skin'] : 'basic';

if(! isset($post->it_skin) ){
return $load_common_css;
}

if( is_singular( GC_NAME ) && isset($post->it_skin) && !empty($post->it_skin) ){
    $de_shop_skin = $post->it_skin;
}

foreach( $load_common_css as $key=>$v ){
if( empty($v) ) continue;

if( $v['handle'] == GC_NAME.'-'.$de_shop_skin.'-css' ){
$tmp = explode(GC_NAME.'/', $v['src']);

$file_check = get_template_directory().'/'.GC_NAME.'/'.$tmp[1];

if( file_exists($file_check) ){
$load_common_css[$key]['src'] = get_template_directory_uri().'/'.GC_NAME.'/'.$tmp[1];
}
}
}

return $load_common_css;

}

?>
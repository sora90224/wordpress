<?php
if (!defined('GC_NAME')) exit; // 개별 페이지 접근 불가

do_action( GC_NAME.'_skin_action', __FILE__, plugin_dir_path( __FILE__) );
?>

<ul id="sct_lst">
    <li><button type="button" class="sct_lst_view sct_lst_list">리스트뷰<span></span></button></li>
    <li><button type="button" class="sct_lst_view sct_lst_gallery">갤러리뷰<span></span></button></li>
</ul>
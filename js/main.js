jQuery(document).ready(function($) {

    if( $('#idx_banner .bxslider').length ){
        $('.bxslider').bxSlider();
    }

    //메뉴
    $(".menu-toggle").on("click", function(){
        $(".hd_cate").css("display","block");
    });
    $(".menu-close-btn").on("click", function(){
        $(".hd_cate").css("display","none");
    });

    ////////쇼핑몰/////////
    //메인배너
    $(document).ready(function(){
      $('.main-banner').bxSlider();
    });
    

});
jQuery(document).ready(function($) {
    var $main_tab = $(".shop-main-wr .tab-wr");

        $main_tab.easytabs({
            animate: false,
            updateHash: false,
            tabActiveClass: "tabsHover",
        });

});
jQuery(document).ready(function($) {
    var $main_tab = $(".shop-main-wr .tab-wr");

        /*
        $main_tab.tabs({
            beforeLoad: function (event, ui) {
                if (ui.tab.data("loaded")) {
                    event.preventDefault();
                    return;
                }
            },
            activate: function( e, ui ) {
                var $parent = $(e.currentTarget).parent();
                
                $parent.addClass("tabsHover").siblings().removeClass("tabsHover");
            }
        });
        */

        $main_tab.easytabs({
            animate: false,
            updateHash: false,
            tabActiveClass: "tabsHover",
        });

});
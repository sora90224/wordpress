jQuery(document).ready(function($) {
    if( $("#main-item").length ){
        $( "#main-item" ).tabs({
            activate: function( e, ui ) {
                var $parent = $(e.currentTarget).parent();
                
                $parent.addClass("tabsHover").siblings().removeClass("tabsHover");
            }
        });
    }
});
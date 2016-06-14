var gnusmmt = gnusmmt || {};

gnusmmt.chr = function(code){
    return String.fromCharCode(code);
}

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
    
    var select_option_el = "select.ajax_it_option";
    gnusmmt.add_cart = function(frm){

        if( gnucommerce === undefined )
            return false;

        var $frm = $(frm);
        var $sel = $frm.find(select_option_el);
        var it_name = $frm.find("input[name^=it_name]").val();
        var it_price = parseInt($frm.find("input[name^=it_price]").val());
        var id = "";
        var value, info, sel_opt, item, price, stock, run_error = false;
        var option = sep = "";
        var count = $sel.size();
        var action_url = gnucommerce.ajaxurl;

        if(count > 0) {
            $sel.each(function(index) {
                value = $(this).val();
                item  = $(this).prev("label").text();

                if(!value) {
                    run_error = true;
                    return false;
                }

                // 옵션선택정보
                sel_opt = value.split(",")[0];

                if(id == "") {
                    id = sel_opt;
                } else {
                    id += gnusmmt.chr(30)+sel_opt;
                    sep = " / ";
                }

                option += sep + item + ":" + sel_opt;
            });

            if(run_error) {
                alert(it_name+"의 "+item+"을(를) 선택해 주십시오.");
                return false;
            }

            price = value[1];
            stock = value[2];
        } else {
            price = 0;
            stock = $frm.find("input[name^=it_stock]").val();
            option = it_name;
        }

        // 금액 음수 체크
        if(it_price + parseInt(price) < 0) {
            alert("구매금액이 음수인 상품은 구매할 수 없습니다.");
            gnusmmt.add_cart_after();
            return false;
        }

        // 옵션 선택정보 적용
        $frm.find("input[name^=io_id]").val(id);
        $frm.find("input[name^=io_value]").val(option);
        $frm.find("input[name^=io_price]").val(price);

        $.ajax({
            url: gnucommerce.ajaxurl,
            type: "POST",
            data: $(frm).serialize()+"&action=gc_cart_update",
            dataType: "json",
            async: true,
            cache: false,
            success: function(data, textStatus) {

                gnusmmt.add_cart_after(frm);

                if(data.error != "") {
                    alert(data.msg);
                    return false;
                }

                alert("상품을 장바구니에 담았습니다.");
            },
            error : function(request, status, error){
                gnusmmt.add_cart_after(frm);
                alert('false ajax :'+request.responseText);
            }
        });

        return false;
    }

    gnusmmt.add_cart_after = function(frm){
        var $cart_rayers = $(".sct-cartop");
        
        $cart_rayers.each(function(i) {

            if( !(frm && $(this).find("select").length) ){
                $(this).html("").removeClass("sct-cartop");
            }

        });

    }

    gnusmmt.add_wishitem = function(el){

        if( gnucommerce === undefined )
            return false;

        var $el   = $(el);
        var it_id = $el.data("it_id");

        if(!it_id) {
            alert("상품코드가 올바르지 않습니다.");
            return false;
        }

        $.ajax({
            url: gnucommerce.ajaxurl,
            type: "POST",
            data: { action: 'gc_wish_update', it_id: it_id },
            dataType: "json",
            async: true,
            cache: false,
            success: function(data, textStatus) {

                if(data.msg != "true") {
                    alert(data.msg);
                    return false;
                }

                alert("상품을 위시리스트에 담았습니다.");
            },
            error : function(request, status, error){
                alert('false ajax :'+request.responseText);
            }
        });
    }

    var $main_item_list = $(".main-item-list, .gnucommerce-ajax-cart");

    $main_item_list.on("click", ".cart-op-close", function(e) {
        e.preventDefault();

        gnusmmt.add_cart_after();
    });

    $main_item_list.on("click", ".btn-wish", function(e) {
        e.preventDefault();

        gnusmmt.add_wishitem(this);
    });

    $main_item_list.on("change", select_option_el, function(e) {
        e.preventDefault();

        if( gnucommerce === undefined )
            return false;

        var $frm = $(this).closest("form");
        var $sel = $frm.find(select_option_el);
        var sel_count = $sel.size();
        var idx = $sel.index($(this));
        var val = $(this).val();
        var it_id = $frm.find("input[name='it_id[]']").val();

        // 선택값이 없을 경우 하위 옵션은 disabled
        if(val == "") {
            $frm.find(select_option_el+":gt("+idx+")").val("").attr("disabled", true);
            return;
        }

        // 하위선택옵션로드
        if(sel_count > 1 && (idx + 1) < sel_count) {
            var opt_id = "";

            // 상위 옵션의 값을 읽어 옵션id 만듬
            if(idx > 0) {
                $frm.find(select_option_el+":lt("+idx+")").each(function() {
                    if(!opt_id)
                        opt_id = $(this).val();
                    else
                        opt_id += gnusmmt.chr(30)+$(this).val();
                });

                opt_id += gnusmmt.chr(30)+val;
            } else if(idx == 0) {
                opt_id = val;
            }

            $.post(
                gnucommerce.ajaxurl,
                { action: 'gc_itemoption',it_id: it_id, opt_id: opt_id, idx: idx, sel_count: sel_count },
                function(data) {
                    $sel.eq(idx+1).empty().html(data).attr("disabled", false);

                    // select의 옵션이 변경됐을 경우 하위 옵션 disabled
                    if(idx+1 < sel_count) {
                        var idx2 = idx + 1;
                        $frm.find(select_option_el+":gt("+idx2+")").val("").attr("disabled", true);
                    }
                }
            );
        } else if((idx + 1) == sel_count) { // 선택옵션처리
            if(val == "")
                return;

            var info = val.split(",");
            // 재고체크
            if(parseInt(info[2]) < 1) {
                alert("선택하신 선택옵션상품은 재고가 부족하여 구매할 수 없습니다.");
                return false;
            }
        }
    });

    $main_item_list.on("click", ".cart-op-btn", function(e) {
        e.preventDefault();

        gnusmmt.add_cart(this.form);
    });

    $main_item_list.on("click", ".btn-cart", function(e) {
        e.preventDefault();

        if( gnucommerce === undefined )
            return false;

        var othis = $(this),
            it_id = $(this).data("it_id"),
            $opt = $(this).closest("li.sct-li").find(".cart-layer"),
            $btn = $(this).closest("li.sct-li").find(".sct-btn"),
            cartclass = 'sct-cartop';

        $(".cart-layer").not($opt).removeClass(cartclass).html('');

        $.ajax({
            url: gnucommerce.ajaxurl,
            type: "POST",
            data: {
                "action" : "cart_option_view",
                "it_id" : it_id
            },
            dataType: "json",
            async: true,
            cache: false,
            success: function(data, textStatus) {

                if(data.error != "") {
                    alert(data.error);
                    return false;
                }

                $opt.addClass(cartclass).html(data.html);

                if(!data.option) {
                    gnusmmt.add_cart($opt.find("form").get(0));
                    return;
                }

            },
            error : function(request, status, error){
                alert('false ajax :'+request.responseText);
            }
        });
    });

});
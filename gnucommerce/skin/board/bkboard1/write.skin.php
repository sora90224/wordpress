<?php
if (!defined('ABSPATH')) exit; // 개별 페이지 접근 불가

if($board['bo_use_tag'])    //게시판 설정에서 태그 기능을 사용한다면
    wp_enqueue_script( $bo_table.'-view-skin-js', $board_skin_url.'/js/write.tag.it.js' );
?>

<section id="bo_w">
    <!-- 게시물 작성/수정 시작 { -->
    <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" method="post" enctype="multipart/form-data" autocomplete="off" style="width:<?php echo $width; ?>" onsubmit="return gcboard.fwrite_submit(this);">
    <?php wp_nonce_field( 'gc_write', 'gc_nonce_field' ); ?>
    <input type="hidden" name="w" value="<?php echo esc_attr( $w ); ?>">
    <input type="hidden" name="action" value="write_update">
    <input type="hidden" name="bo_table" value="<?php echo esc_attr( $bo_table ); ?>">
    <input type="hidden" name="wr_id" value="<?php echo esc_attr( intval($wr_id) ); ?>">
    <input type="hidden" name="sca" value="<?php echo esc_attr( $sca ); ?>">
    <input type="hidden" name="sfl" value="<?php echo esc_attr( $sfl ); ?>">
    <input type="hidden" name="stx" value="<?php echo esc_attr( $stx ); ?>">
    <input type="hidden" name="spt" value="<?php echo esc_attr( $spt ); ?>">
    <input type="hidden" name="sst" value="<?php echo esc_attr( $sst ); ?>">
    <input type="hidden" name="sod" value="<?php echo esc_attr( $sod ); ?>">
    <input type="hidden" name="page" value="<?php echo esc_attr( $page ); ?>">
    <input type="hidden" name="page_id" value="<?php echo get_the_ID(); ?>">
    <?php
    $option = '';
    $option_hidden = '';
    if ($is_notice || $is_html || $is_secret || $is_mail) {
        $option = '';
        if ($is_notice) {
            $option .= "\n".'<input type="checkbox" id="notice" name="notice" value="1" '.$notice_checked.'>'."\n".'<label for="notice">'.__('공지', GC_NAME).'</label>';
        }

        if ($is_html) {
            if ($is_dhtml_editor) {
                $option_hidden .= '<input type="hidden" value="html1" name="html">';
                $option_hidden .= "\n".'<input type="hidden" value="wp_html" name="wp_html">';
            } else {
                $option .= "\n".'<input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" value="'.$html_value.'" '.$html_checked.'>'."\n".'<label for="html">html</label>';
            }
        }

        if ($is_secret) {
            if ($is_admin || $is_secret==1) {
                $option .= "\n".'<input type="checkbox" id="secret" name="secret" value="secret" '.$secret_checked.'>'."\n".'<label for="secret">'.__('비밀글').'</label>';
            } else {
                $option_hidden .= '<input type="hidden" name="secret" value="secret">';
            }
        }

        if ($is_mail) {
            $option .= "\n".'<input type="checkbox" id="mail" name="mail" value="mail" '.$recv_email_checked.'>'."\n".'<label for="mail">'.__('답변메일받기', GC_NAME).'</label>';
        }
    }

    echo $option_hidden;
    ?>

    <div class="tbl_frm01 tbl_wrap">
        <table>
        <tbody>
        <?php if ($is_name) { ?>
        <tr>
            <th scope="row"><label for="user_name"><?php _e('이름', GC_NAME);?><strong class="sound_only"><?php _e('필수', GC_NAME);?></strong></label></th>
            <td><input type="text" name="user_name" value="<?php echo esc_attr( $name ); ?>" id="user_name" required class="frm_input required" size="10" maxlength="20"></td>
        </tr>
        <?php } ?>

        <?php if ($is_password) { ?>
        <tr>
            <th scope="row"><label for="user_pass"><?php _e('비밀번호', GC_NAME);?><strong class="sound_only"><?php _e('필수', GC_NAME);?></strong></label></th>
            <td><input type="password" name="user_pass" id="user_pass" <?php echo $password_required ?> class="frm_input <?php echo $password_required ?>" maxlength="20"></td>
        </tr>
        <?php } ?>

        <?php if ($is_email) { ?>
        <tr>
            <th scope="row"><label for="user_email"><?php _e('이메일', GC_NAME);?></label></th>
            <td><input type="text" name="user_email" value="<?php echo esc_attr( $email ); ?>" id="user_email" class="frm_input email" size="50" maxlength="100"></td>
        </tr>
        <?php } ?>

        <?php if ($option) { ?>
        <tr>
            <th scope="row"><?php _e('옵션', GC_NAME);?></th>
            <td><?php echo $option ?></td>
        </tr>
        <?php } ?>

        <?php if ($is_category) { ?>
        <tr>
            <th scope="row"><label for="ca_name"><?php _e('분류', GC_NAME);?><strong class="sound_only"><?php _e('필수', GC_NAME);?></strong></label></th>
            <td>
                <select name="ca_name" id="ca_name" required class="required" >
                    <option value=""><?php _e('선택하세요', GC_NAME);?></option>
                    <?php echo $category_option ?>
                </select>
            </td>
        </tr>
        <?php } ?>

        <tr>
            <th scope="row"><label for="wr_subject"><?php _e('제목', GC_NAME);?><strong class="sound_only"><?php _e('필수', GC_NAME);?></strong></label></th>
            <td>
                <div id="autosave_wrapper">
                    <input type="text" name="wr_subject" value="<?php echo esc_attr( $subject ); ?>" id="wr_subject" required class="frm_input required" size="50" maxlength="255">
                </div>
            </td>
        </tr>

        <tr>
            <th scope="row" class="wr_content">
                <label for="wr_content" class="block_label"><strong><?php _e('내용', GC_NAME);?></strong><strong class="sound_only"><?php _e('필수', GC_NAME);?></strong></label>
            </th>
            <td>    
                <?php if($write_min || $write_max) { ?>
                <!-- 최소/최대 글자 수 사용 시 -->
                <p id="char_count_desc"><?php echo sprintf(__('이 게시판은 최소 %s 글자 이상, 최대 %s 글자 이하까지 글을 쓸수 있습니다.', GC_NAME), '<strong>'.$write_min.'</strong>', '<strong>'.$write_max.'</strong>');?></p>
                <?php } ?>
                <?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
                <?php if($write_min || $write_max) { ?>
                <!-- 최소/최대 글자 수 사용 시 -->
                <div id="char_count_wrap"><span id="char_count"></span><?php _e('문자', GC_NAME);?></div>
                <?php } ?>
            </td>
        </tr>

        <?php for ($i=1; $is_link && $i<=GC_LINK_COUNT; $i++) { ?>
        <tr>
            <th scope="row"><label for="wr_link<?php echo $i ?>"><?php _e('링크', GC_NAME);?> #<?php echo $i ?></label></th>
            <td><input type="text" name="wr_link<?php echo $i ?>" value="<?php if($w=="u"){echo$write['wr_link'.$i];} ?>" id="wr_link<?php echo $i ?>" class="frm_input" size="50"></td>
        </tr>
        <?php } ?>

        <?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
        <tr>
            <th scope="row"><?php _e('파일', GC_NAME);?> #<?php echo $i+1 ?></th>
            <td>
                <input type="file" name="bf_file[]" title="<?php _e('첨부파일', GC_NAME);?> <?php echo $i+1 ?> : <?php echo sprintf(__('용량 %s 바이트 이하만 업로드 가능', GC_NAME), $upload_max_filesize);?>" class="frm_file frm_input">
                <?php if ($is_file_content) { ?>
                <input type="text" name="bf_content[]" value="<?php echo ($w == 'u' && isset($file[$i]['bf_content'])) ? $file[$i]['bf_content'] : ''; ?>" title="<?php _e('파일 내용을 입력하세요.' , GC_NAME);?>" class="frm_file frm_input" size="50">
                <?php } ?>
                <?php if($w == 'u' && isset($file[$i]['file']) ) { ?>
                <input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> <?php _e('파일 삭제', GC_NAME);?></label>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>

        <?php if ($is_guest) { //자동등록방지  ?>
        <tr>
            <th scope="row"><?php _e('자동등록방지', GC_NAME);?></th>
            <td>
                <?php echo $captcha_html ?>
            </td>
        </tr>
        <?php } ?>

        </tbody>
        </table>
    </div>

	<?php if($is_use_tag){ // tag를 사용한다면 ( 원글을 쓸때만 가능 ) ?>
    <div id="tagsdiv-post_tag" class="postbox">
        <h3><span><?php _e('태그'); ?></span></h3>
        <div class="inside">
            <div class="tagsdiv" id="post_tag">
                <div class="jaxtag">
                    <label class="screen-reader-text" for="newtag"><?php _e('태그'); ?></label>
                    <input type="text" name="wr_tag[post_tag]" class="the-tags" id="wr_tag_input" value="<?php echo $string_wr_tags ?>" />
                    <ul id="gc_singleFieldTags" class="qa_tag_el"></ul>
                </div>
            </div>
        </div>
    </div>
	<?php } ?>

    <div class="btn_confirm">
        <input type="submit" value="<?php _e('확인', GC_NAME)?>" id="btn_submit" accesskey="s" class="btn_submit">
        <a href="<?php echo esc_url( $default_href ); ?>" class="btn_cancel"><i class="fa fa-times" aria-hidden="true"></i> <?php _e('취소', GC_NAME)?></a>
    </div>
    </form>
</section>
<!-- } 게시물 작성/수정 끝 -->

<?php
$gcboard->board_var['write']=array(
'write_min'=>$write_min,
'write_max'=>$write_max,
'editor_js'=>$editor_js,
'captcha_js'=>$captcha_js,
);
add_action('wp_footer', 'gc_write_js_script', 38);

function gc_write_js_script(){
    global $gcboard;
    
    extract($gcboard->board_var['write']);
?>
    <script>
    <?php if($write_min || $write_max) { ?>
    // 글자수 제한
    var char_min = parseInt(<?php echo $write_min; ?>); // 최소
    var char_max = parseInt(<?php echo $write_max; ?>); // 최대
    check_byte("wr_content", "char_count");

    jQuery(function($) {
        $("#wr_content").on("keyup", function() {
            check_byte("wr_content", "char_count");
        });
    });

    <?php } ?>
    function html_auto_br(obj)
    {
        if (obj.checked) {
            result = confirm("<?php _e('자동 줄바꿈을 하시겠습니까?', GC_NAME);?>\n\n<?php _e('자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다', GC_NAME);?>");
            if (result)
                obj.value = "html2";
            else
                obj.value = "html1";
        }
        else
            obj.value = "";
    }

    jQuery(function($){
        gcboard.fwrite_submit = function(f)
        {
                <?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>
                
                var subject = "";
                var content = "";
                $.ajax({
                    url: gcboard.ajax_url,
                    type: "POST",
                    data: {
                        "action": "gc_bss_filter",
                        "subject": f.wr_subject.value,
                        "content": f.wr_content.value
                    },
                    dataType: "json",
                    async: false,
                    cache: false,
                    success: function(data, textStatus) {
                        subject = data.subject;
                        content = data.content;
                    }
                });

                if (subject) {
                    alert( gcboard.sprintf("<?php _e('제목에 금지단어 %s 가 포함되어있습니다', GC_NAME);?>", subject) );
                    f.wr_subject.focus();
                    return false;
                }

                if (content) {
                    alert( gcboard.sprintf("<?php _e('내용에 금지단어 %s 가 포함되어있습니다', GC_NAME);?>", content) );
                    if (typeof(ed_wr_content) != "undefined")
                        ed_wr_content.returnFalse();
                    else
                        f.wr_content.focus();
                    return false;
                }

                if (document.getElementById("char_count")) {
                    if (char_min > 0 || char_max > 0) {
                        var cnt = parseInt(check_byte("wr_content", "char_count"));
                        if (char_min > 0 && char_min > cnt) {
                            alert( gcboard.sprintf("<?php _e('내용은 %d 글자 이상 쓰셔야 합니다.', GC_NAME);?>", char_min) );
                            return false;
                        }
                        else if (char_max > 0 && char_max < cnt) {
                            alert( gcboard.sprintf("<?php _e('내용은 %d 글자 이하로 쓰셔야 합니다.', GC_NAME);?>", char_max) );
                            return false;
                        }
                    }
                }

                <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>
                
                document.getElementById("btn_submit").disabled = "disabled";
                return true;
        }
    });
    </script>
<?php
}
?>
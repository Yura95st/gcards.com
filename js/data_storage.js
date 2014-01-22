$(function() {
    $('body').data('card', {
        background_img_wrap: "#card_background",
        background_img: "#card_background_img",
        caption_container: "#card_caption_container",
        caption: "#card_caption",
        text_container: "#card_text_container",
        text: "#card_text",
        signature_container: "#card_signature_container",
        signature: "#card_signature",
    });
    $('body').data('card_instruments', {
        card_maker_box: "#card_maker_box", 
        card_maker_header: "#card_maker_header",
        card_maker_content: "#card_maker_content",
        background_chooser: "#card_maker_backround_chooser",
        font_chooser_caption: "#font_chooser_caption",
        font_chooser_text: "#font_chooser_text",
        font_chooser_signature: "#font_chooser_signature",
        fontSize_chooser_caption: "#fontSize_chooser_caption",
        fontSize_chooser_text: "#fontSize_chooser_text",
        fontSize_chooser_signature: "#fontSize_chooser_signature",
        angle_changer_caption: "#angle_changer_caption",
        angle_changer_text: "#angle_changer_text",
        angle_changer_signature: "#angle_changer_signature",
        caption_editor: "#card_maker_caption_editor",
        text_editor: "#card_maker_text_editor",
        signature_editor: "#card_maker_signature_editor",
        tabs_container: "#card_maker_tabs",
    });
    $('body').data('background', {
        img: 0
    });
    
    var caption_container = $('body').data('card').caption_container;
    $('body').data('caption_values', {
        alignment: 0,
        color: "#FFFFFF",
        font_family: $($('body').data('card_instruments').font_chooser_caption).val(),
        font_size: $($('body').data('card_instruments').fontSize_chooser_caption).val(),
        height: $(caption_container).height(),
        left: $(caption_container).position().left,
        text: "",
        top: $(caption_container).position().top,
        width: $(caption_container).width()
    });    
    
    var text_container = $('body').data('card').text_container;
    $('body').data('text_values', {
        alignment: 0,
        color: "#FFFFFF",
        font_family: $($('body').data('card_instruments').font_chooser_text).val(),
        font_size: $($('body').data('card_instruments').fontSize_chooser_text).val(),
        height: $(text_container).height(),
        left: $(text_container).position().left,
        text: "",
        top: $(text_container).position().top,
        width: $(text_container).width()
    });
    var signature_container = $('body').data('card').signature_container;    
    $('body').data('signature_values', {
        alignment: 0,
        color: "#FFFFFF",
        font_family: $($('body').data('card_instruments').font_chooser_signature).val(),
        font_size: $($('body').data('card_instruments').fontSize_chooser_signature).val(),
        height: $(signature_container).height(),
        left: $(signature_container).position().left,
        text: "",
        top: $(signature_container).position().top,
        width: $(signature_container).width()
    });
});
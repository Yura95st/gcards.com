var Card = 
{
    changeBackground : function(el) { changeBackground(el); },
    
    instrumentNav : function(el) { instrumentNavigation(el); },
    
    editCardText: function(el) { editCardText(el); },
    
    editCardTextAlignment: function(el) { editCardTextAlignment(el); },
    
    editCardFontColor: function(el) { editCardFontColor(el); },
    
    editCardFont: function(el) { editCardFont(el); },
    
    editCardFontSize: function(el) { editCardFontSize(el); },
    
    generate: function(el) { generateCard(el); },    
};

function changeBackground(el) {
    var background_img_wrap = $('body').data('card').background_img_wrap;
    var background_img = $('body').data('card').background_img;
    var chooser = $('body').data('card_instruments').background_chooser;
    
    var i = $(el).attr('value');
    
    if (i < 0 || i >= BACKGROUND_ARRAY.length || i == $('body').data('background').img) {
        return false;
    }
    
    $('body').data('background').img = i;
    
    $(background_img_wrap).html('<img width="100%" height="100%" src="'+BACKGROUND_ARRAY[i]+'" id="card_background_img" />');
    $(chooser+' li').removeClass('active');
    $(el).addClass('active');
    return true;
}

function instrumentNavigation(el) {
    var tab_num = $(el).attr('value');
    var tabs_container = $('body').data('card_instruments').tabs_container;
    var chooser = $('body').data('card_instruments').background_chooser;
    var tabs_array = [$('body').data('card_instruments').background_chooser, $('body').data('card_instruments').caption_editor,
        $('body').data('card_instruments').text_editor, $('body').data('card_instruments').signature_editor];
    
    if (tab_num < 0 || tab_num > 3) {
        return false;
    }      
    $(tabs_container+' li a').removeClass('active');
    $(el).addClass('active');
    
    for (i=0; i<tabs_array.length; i++) {
        $(tabs_array[i]).fadeOut(200);
    }
    $(tabs_array[tab_num]).fadeIn(200);
    
    return true;
}

function editCardText(el) {
    var value = $(el).val();
    var block;
    var data_type; 
    
    value = value.replace(/\n/g, '<br />');
    
    if ($(el).attr('name') == 'caption') {
        block = $('body').data('card').caption;
        data_type = 'caption_values';
    }
    else if ($(el).attr('name') == 'text') {
        block = $('body').data('card').text;
        data_type = 'text_values';
    }
    else if ($(el).attr('name') == 'signature') {
        block = $('body').data('card').signature;
        data_type = 'signature_values';
    }
    else {
        return false;
    }
    $(block).html(value);
    $('body').data(data_type).text = value;
    
    return true;
}

function editCardTextAlignment(el) {
    var align_type = $(el).val();
    var block;
    var data_type; 
    
    if (align_type < 0 || align_type >= TEXTALIGN_ARRAY.length) {
        return false;
    }
    
    if ($(el).attr('name') == 'caption') {
        block = $('body').data('card').caption;
        data_type = 'caption_values';
    }
    else if ($(el).attr('name') == 'text') {
        block = $('body').data('card').text;
        data_type = 'text_values';
    }
    else if ($(el).attr('name') == 'signature') {
        block = $('body').data('card').signature;
        data_type = 'signature_values';
    }
    else {
        return false;
    }
    $(block).css('text-align', TEXTALIGN_ARRAY[align_type]);
    $('body').data(data_type).alignment = align_type;
}

function editCardFontColor(el) {
    var color = $(el).val();
    var block;
    var data_type;
    
    if (color == "") {
        color = "#ffffff";
        $(el).val("#ffffff");
    }
    
    if ($(el).attr('name') == 'caption') {
        block = $('body').data('card').caption;
        data_type = 'caption_values';
    }
    else if ($(el).attr('name') == 'text') {
        block = $('body').data('card').text;
        data_type = 'text_values';
    }
    else if ($(el).attr('name') == 'signature') {
        block = $('body').data('card').signature;
        data_type = 'signature_values';
    }
    else {
        return false;
    }
    $(block).css('color', color);
    $('body').data(data_type).color = color;
    return true;
}

function editCardFont(el) {
    var font_type = $(el).val();    
    var block; 
    var data_type;
    
    if (font_type < 0 || font_type >= FONT_ARRAY.length) {
        return false;
    }
    
    if ($(el).attr('name') == 'caption') {
        block = $('body').data('card').caption;
        data_type = 'caption_values';
    }
    else if ($(el).attr('name') == 'text') {
        block = $('body').data('card').text;
        data_type = 'text_values';
    }
    else if ($(el).attr('name') == 'signature') {
        block = $('body').data('card').signature;
        data_type = 'signature_values';
    }
    else {
        return false;
    }    
    $(block).css('font-family', FONT_ARRAY[font_type]);
    $('body').data(data_type).font_family = font_type;
    return true;
}

function editCardFontSize(el) {
    var fontSize_type = $(el).val();    
    var block; 
    var data_type;
    
    if (fontSize_type < 0 || fontSize_type >= FONTSIZE_ARRAY.length) {
        return false;
    }
    
    if ($(el).attr('name') == 'caption') {
        block = $('body').data('card').caption;
        data_type = 'caption_values';
    }
    else if ($(el).attr('name') == 'text') {
        block = $('body').data('card').text;
        data_type = 'text_values';
    }
    else if ($(el).attr('name') == 'signature') {
        block = $('body').data('card').signature;
        data_type = 'signature_values';
    }
    else {
        return false;
    }    
    $(block).css('font-size', FONTSIZE_ARRAY[fontSize_type]);
    $('body').data(data_type).font_size = fontSize_type;
    return true;
}

function generateCard(el) {
    var caption_values = $('body').data('caption_values');
    var text_values = $('body').data('text_values');
    var signature_values = $('body').data('signature_values');
    var background = $('body').data('background');
    
    var progress = $(el).parent().children('.progress');
    var button_wigth = $(el).width();
    var button_text = $(el).text();
    
    if (!checkTextObject(caption_values) || !checkTextObject(text_values) || !checkTextObject(signature_values)
        || background.img < 0 || background.img >= BACKGROUND_ARRAY.length) {        
        return false;
    }
    if (!isVarsFull([caption_values.text]) && !isVarsFull([text_values.text]) && !isVarsFull([signature_values.text])) {
        show_message_absolute('Заполните хотя бы одно из трех полей открытки.');
        return false;
    }
    caption_values.text = caption_values.text.substring(0, 5000);
    text_values.text = text_values.text.substring(0, 5000);
    signature_values.text = signature_values.text.substring(0, 5000);
    
    $(progress).show();
    $(el).width(button_wigth);
    $(el).html('');
    
    $.post( 
        "/action.php",
        {
            act: 'generateCard',
            caption: JSON.stringify(caption_values),
            text: JSON.stringify(text_values),
            signature: JSON.stringify(signature_values),
            background: background.img
        },
        function(data) {
            $(progress).hide();
            $(el).width('auto');
            $(el).html(button_text);
            
            if (isVarsFull([data]))
            {
                result = JSON.parse(data);
                
                show_message_absolute(result['msg'])
                
                if (result['success'] == true) 
                {
                    setTimeout(function(){ location.href = result['url'] }, 1500);
                }
            }
        }
    );
}

function checkTextObject(obj) {
    var body_container = "#body-container";
    if (obj.font_size < 0 || obj.font_size >= FONTSIZE_ARRAY.length ||
        obj.font_family < 0 || obj.font_family >= FONT_ARRAY.length ||
        obj.alignment < 0 || obj.alignment >= TEXTALIGN_ARRAY.length ||
        obj.height < 0 || obj.height >= $(body_container).height() ||
        obj.width < 0 || obj.width >= $(body_container).width() ||
        obj.top < 0 || obj.top >= ($(body_container).height() - obj.height)||
        obj.left < 0 || obj.left >= ($(body_container).width() - obj.width) ) {
        return false;
    }
    return true;
}
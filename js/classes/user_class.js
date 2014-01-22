$('body').data('feedback', {
    box: "#feedback_box",
    name: "#feedback_name",
    text: "#feedback_text"
});

var User = 
{
    showFeedbackBox : function() { showFeedbackBox(); },
    
    sendFeedback : function(el) { sendFeedback(el); },
    
    showCardLinkBox : function(url) { showCardLinkBox(url); }
};

function showFeedbackBox(el) {
    var html = ''    
    +'<div id="feedback_box" class="feedback_box">'
        +'<div id="bug_info" class="action_messages info">'
            +'<div class="messages_inner">Мы будем рады получить от вас отзывы о проблемах, а также новые идеи и предложения.</div>'
        +'</div>'
        +'<div class="box_head">Оставить отзыв</div>'        
        +'<div class="box_body">'
            +'<div class="title">Ваше имя:</div>'
            +'<input type="text" id="feedback_name" value="" />'            
            +'<div class="title">Отзыв:</div>'
            +'<textarea id="feedback_text"></textarea>'            
            +'<div class="button_box">'
                +'<button onclick="User.sendFeedback(this);">Отправить</button>'
                +'<button class="gray" onclick="Modal.hide();">Отмена</button>'            
                +'<div class="progress"></div>'
            +'</div>'
        +'</div>'
    +'</div>';
    var feedback_name = $('body').data('feedback').name;
        
    Modal.setContent(html);    
    Modal.show();
    $(feedback_name).focus();
    
    $($('body').data('feedback').box).draggable({ containment: "body", cursor: "move"});
}

function sendFeedback(el)
{        
    var name_field = $('body').data('feedback').name;
    var text_field = $('body').data('feedback').text;
    var feedback_name = $.trim( $(name_field).val() ).substring(0,5000);
    var feedback_text = $.trim( $(text_field).val() ).substring(0,5000);
    var progress = $(el).parent().children('.progress');
    
    if (!isFieldsFull([name_field, text_field]) || !isVarsFull([feedback_name, feedback_text]))
    {
        return false;
    }
    progress.show();
    
    $.post( 
        "/action.php",
        {
            act: 'sendFeedback',
            name: feedback_name,
            text: feedback_text
        },
        function(data){
            progress.hide();
            
            if (isVarsFull([data])) 
            {
                result = JSON.parse(data);
                
                show_message_absolute(result['msg']);
                
                if (result['success'] == true) 
                {
                    Modal.hide();
                    return true;
                }
            }
        }
    );
}

function showCardLinkBox(url) {
    var card_link_id = 'card_link';
    var html = ''    
    +'<div class="feedback_box">'
        +'<div id="bug_info" class="action_messages info">'
            +'<div class="messages_inner">Скопируйте ссылку на открытку и отправте ее Вашим близким.</div>'
        +'</div>'
        +'<div class="box_body" style="margin-bottom: 15px;">'
            +'<div class="title">Ссылка на Вашу открытку:</div>'
            +'<input type="text" id="'+card_link_id +'" value="'+url+'" />'
        +'</div>'
    +'</div>';
        
    Modal.setContent(html);    
    Modal.show();
    $('#'+card_link_id).focus().select();
    
    $('#modal_box').draggable({ containment: "body", cursor: "move"});
}
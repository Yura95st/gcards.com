$(function() {
    $($('body').data('card').caption_container)
    .draggable({ containment: "#body-container", cursor: "move", stack: ".card_parts", snap: true, 
        stop: function( event, ui ) {
            var object = $('body').data('caption_values');
            object.top = ui.position.top;
            object.left = ui.position.left;
        }
    })
    .resizable({ handles: "n, e, s, w, ne, se, sw, nw",  containment: "#body-container",
        stop: function( event, ui ) {
            var object = $('body').data('caption_values');
            object.height = ui.size.height;
            object.width = ui.size.width;
        }
    });
    
    $($('body').data('card').text_container).draggable({ containment: "#body-container", cursor: "move", stack: ".card_parts", snap: true,
        stop: function( event, ui ) {
            var object = $('body').data('text_values');
            object.top = ui.position.top;
            object.left = ui.position.left;
        }
    })
    .resizable({ handles: "n, e, s, w, ne, se, sw, nw",  containment: "#body-container",
        stop: function( event, ui ) {
            var object = $('body').data('text_values');
            object.height = ui.size.height;
            object.width = ui.size.width;
        }
    });
    
    $($('body').data('card').signature_container).draggable({ containment: "#body-container", cursor: "move", stack: ".card_parts", snap: true,
        stop: function( event, ui ) {
            var object = $('body').data('signature_values');
            object.top = ui.position.top;
            object.left = ui.position.left;
        }
    })
    .resizable({ handles: "n, e, s, w, ne, se, sw, nw",  containment: "#body-container",
        stop: function( event, ui ) {
            var object = $('body').data('signature_values');
            object.height = ui.size.height;
            object.width = ui.size.width;
        }
    });
    
    var card_maker_box_width = $($('body').data('card_instruments').card_maker_box).height();
    var card_maker_content_height = $($('body').data('card_instruments').card_maker_content).height();
    
    $($('body').data('card_instruments').card_maker_box).draggable({ containment: "#body-container", cursor: "move", 
        handle: $('body').data('card_instruments').card_maker_header})
    .resizable({ handles: "s", containment: "#body-container",
        resize: function( event, ui ) {
            $('.card_maker_content').height(card_maker_content_height + ui.size.height - card_maker_box_width);
        }
    });
    
    $.minicolors.init();
});
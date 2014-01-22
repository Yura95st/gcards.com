function screenSize() 
{
    var w, h;
    w = (window.innerWidth ? window.innerWidth : (document.documentElement.clientWidth ? document.documentElement.clientWidth : document.body.offsetWidth));
    h = (window.innerHeight ? window.innerHeight : (document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body.offsetHeight));
    return {w:w, h:h};
}

function isValidName(name) 
{
    var pattern = /[a-z]+/i;
    
    if (pattern.exec(name) == null) {
        return false;
    }
    return true;
}

function isFieldsFull(fields)
{
    var return_val = true;
    
    for (i=0; i < fields.length; i++) {
        if ($.trim($(fields[i]).val()) == '') {
            $(fields[i]).css('background','#FFE4E1');
            $(fields[i]).animate({ backgroundColor:"#FFFFFF",}, 1000 );
            return_val = false;
        }
    }    
    return return_val;
}

function isVarsFull(vars)
{    
    for (i=0; i < vars.length; i++) {
        if ($.trim(vars[i]) == '') {
            return false;
        }
    }
    return true;
}

function show_message_absolute(msg_text)
{
    var boxId = '#message_box_absolute';
    var innerId = '#inner_message';
    
    $(boxId+' '+innerId).html('');
    
    if (!isVarsFull([msg_text])) {
        return false;
    }
    
    $(boxId+' '+innerId).html(msg_text);
    
    $(boxId).fadeIn(500);
    
    setTimeout(function(){ $(boxId).fadeOut(500); },5000);
}
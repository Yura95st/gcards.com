var Modal = 
{
    show : function() { showModalBox(); },

    hide : function() { hideModalBox(); },
    
    setContent : function(html) { setModalContent(html); },
    
    showMask : function() { showModalMask(); },
    
    hideMask : function() { hideModalMask(); },
    
    changePosition  : function() { changeModalPosition(); },
};

function showModalBox() 
{
    showModalMask();
    $('#modal_box').show();
    return true;
}

function hideModalBox() 
{
    hideModalMask();
    $('#modal_box').hide();
    return true;
}

function setModalContent(html)
{
    $('#modal_box').html(html);
    return true;
}

function showModalMask()
{
    changeModalPosition();
    
    $('#modal_loader').show();
    $('#modal_mask').fadeIn(300);
    
    $('#modal_mask').click(function() {
        hideModalBox();
    });
    return true;
}

function hideModalMask() 
{
    $('#modal_loader').hide();
    $('#modal_mask').fadeOut(300);
    setModalContent('');
    return true;
}

function changeModalPosition() 
{    
    var element = $('#modal_box'); 
    element.css({left: ( screenSize().w/2 - element.width()/2 ),
                         top: ( screenSize().h/2 - element.height()/2 )});
                         
    $('#modal_mask').css({ height: $(document).height()});
    
    element = $('#modal_loader');
    element.css({left: ( screenSize().w/2 - element.width()/2 ),
                         top: ( screenSize().h/2 - element.height()/2 )});
}
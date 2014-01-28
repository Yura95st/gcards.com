var CardProcessor =
{
    publishCard: function (el) {

        this.validateCard(cardViewModel);

        var data = {
            card : ko.toJSON(cardViewModel)
        };

        $.post(Data.ajax.url, data,
            function (returnedData) {
            }
        );
    },

    validateCard : function() {

    },

    showEditor : function(block) {
        this.hideAllEditors();
        $(block).draggable('disable');

        var viewModel = ko.dataFor(block);

        if (viewModel.content() == Data.values.card.defaultContent) {
            viewModel.content("");
        }

        var $editor = $(block).find(Data.card.editor);
        $editor.addClass('note-active-editor');

        var $editable = $editor.find(Data.card.editable);
        $editable.html(viewModel.content());
        $editable.focus();
    },

    hideAllEditors : function() {
        var $blocks = $(Data.card.block);

        $blocks.each(function (idx, block) {
            $(block).draggable('enable');

            var viewModel = ko.dataFor(block);

            var $editor = $(block).find(Data.card.editor);
            $editor.removeClass('note-active-editor');

            var html = $(block).find(Data.card.blockContent).code();

            if (html == "") {
                viewModel.content(Data.values.card.defaultContent);
            }
            else {
                viewModel.content(html);
            }

            $(block).find(Data.card.blockContent).code(viewModel.content());
        });
    }
};

// Hide all editors - when click not on the blocks
$(Data.card.cover).click(function () {
    CardProcessor.hideAllEditors();
});
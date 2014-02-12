function BlockView()
{
    var self = this;

    self.init = function() {
        var cover = $(Data.card.cover);

        // Hide all editors - when click not on the blocks
        cover.click(function (event) {
            self.hideAllEditors();
        });
    };

    self.showEditor = function(block) {
        self.hideAllEditors();

        var viewModel = ko.dataFor(block);
        var cardViewModel = Global.cardViewModel;

        cardViewModel.editingBlock(viewModel);

        if (viewModel.content() == Data.values.defaultCard.block.content) {
            viewModel.content("");
        }

        var blockContent = $(block).find(Data.card.blockContent);

        blockContent.summernoteEditor();

        self.enableToolbar();
    };

    self.hideEditor = function(block) {
        var cardViewModel = Global.cardViewModel;

        cardViewModel.editingBlock(null);

        var viewModel = ko.dataFor(block);
        var blockContent = $(block).find(Data.card.blockContent);
        var html = blockContent.code();

        if (html == "" || html == "<p><br></p>") {
            blockContent.code(Data.values.defaultCard.block.content);
            viewModel.content("");
        }
        else {
            viewModel.content(html);
        }

        blockContent.destroyEditor();
    };

    self.hideAllEditors = function() {
        var blocks = $(Data.card.block);

        blocks.each(function (idx, block) {

            self.hideEditor(block);
        });

        self.disableToolbar();
    };

    self.enableToolbar = function() {
        enableToolbar(true);
    };

    self.disableToolbar = function() {
        enableToolbar(false);
    };

    var enableToolbar = function(enabled) {

        var toolbar = $(Data.card.toolbar);

        if (enabled != true && enabled != false) {
            return;
        }
        toolbar.enableToolbar({
            enabled : enabled
        });
    };
}

Global.blockView = new BlockView();
Global.blockView.init();
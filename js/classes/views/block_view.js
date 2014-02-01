function BlockView()
{
    var self = this;
    var toolbar = $(Data.card.toolbar);
    var cardViewModel = CardViewModel;

    self.init = function() {
        var cover = $(Data.card.cover);

        // Hide all editors - when click not on the blocks
        cover.click(function (event) {
            self.hideAllEditors();
        });
    };

    self.showEditor = function(block) {
        self.hideAllEditors();

        $(block).draggable('disable');
        self.unbindDoubleClick(block);

        var viewModel = ko.dataFor(block);

        if (viewModel.content() == Data.values.defaultCard.block.content) {
            viewModel.content("");
        }

        var blockContent = $(block).find(Data.card.blockContent);

        blockContent.summernoteEditor();
        blockContent.code(viewModel.content());

        self.enableToolbar();
    };

    self.hideEditor = function() {
        self.unbindDoubleClick(block);
        $(block).draggable('enable');
        self.bindDoubleClick(block);

        var viewModel = ko.dataFor(block);
        var blockContent = $(block).find(Data.card.blockContent);
        var html = blockContent.code();

        if (html == "") {
            viewModel.content(Data.values.defaultCard.block.content);
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
            self.disableToolbar();
        });
    };

    self.enableToolbar = function() {
        enableToolbar(true);
    };

    self.disableToolbar = function() {
        enableToolbar(false);
    };

    var enableToolbar = function(enabled) {

        if (enabled != true && enabled != false) {
            return;
        }
        toolbar.enableToolbar({
            enabled : enabled
        });
    };

    self.removeBlock = function(block) {
        cardViewModel.removeBlock(block);
    };

    self.bindResizeable = function(block) {
        var viewModel = ko.dataFor(block);

        $(block).resizable({ handles: "n, e, s, w, ne, se, sw, nw", containment: Data.card.containment,
            stop: function (event, ui) {
                viewModel.position.height(ui.size.height);
                viewModel.position.width(ui.size.width);
                viewModel.position.x(ui.position.left);
                viewModel.position.y(ui.position.top);
            }
        });
    };

    self.bindDraggable = function(block) {
        var viewModel = ko.dataFor(block);

        $(block).draggable({ containment: Data.card.containment, cursor: "move",
            stack: Data.card.block, snap: true,
            stop: function (event, ui) {
                viewModel.position.x(ui.position.left);
                viewModel.position.y(ui.position.top);
            }
        });
    };

    self.bindDoubleClick = function(block) {
        //Show editor on doubleClick event
        $(block).on('dblclick', function () {
            self.showEditor(this);
        });
    };

    self.unbindDoubleClick = function(block) {
        $(block).unbind("dblclick");
    };
}

var BlockView = new BlockView();
BlockView.init();
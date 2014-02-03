function CardViewModel() {
    var self = this;

    self.cover = ko.observable(Data.values.defaultCard.cover);
    self.blocks = ko.observableArray(new Array());
    self.editingBlock = ko.observable(null);
    self.previewMode = ko.observable(false);

    self.addBlock = function () {
        var position = new Position();
        position.x = ko.observable(Data.values.defaultCard.block.position.x);
        position.y = ko.observable(Data.values.defaultCard.block.position.y);
        position.height = ko.observable(Data.values.defaultCard.block.position.height);
        position.width = ko.observable(Data.values.defaultCard.block.position.width);

        var block = new Block();
        block.position = position;
        block.content = ko.observable(Data.values.defaultCard.block.content);

        self.blocks.push(block);
    };

    self.removeBlock = function () {
        var block = this;
        self.blocks.remove(block);
        BlockView.disableToolbar();
    };

    self.canAddBlock = function () {
        return (self.blocks().length < 10);
    };

    self.preview = function() {
        self.previewMode(true);
        $('body').scrollTo($(Data.header).outerHeight(true));

        //TODO: redo this
        BlockView.hideAllEditors();
    };

    self.exitPreviewMode = function() {
        self.previewMode(false);
        $('body').scrollTo(0);
    }


    /* FOR DEBUGGING ONLY */
    self.save = function () {
        self.lastSavedJson("");
        self.lastSavedJson(JSON.stringify(ko.toJS(self), null, 2));
    };

    self.lastSavedJson = ko.observable("");
};

ko.bindingHandlers.blockResizable = {

    init: function (element, valueAccessor, allBindings, viewModel, bindingContext) {

        $(element).resizable({ handles: "n, e, s, w, ne, se, sw, nw", containment: Data.card.containment,
            stop: function (event, ui) {
                viewModel.position.height(ui.size.height);
                viewModel.position.width(ui.size.width);
                viewModel.position.x(ui.position.left);
                viewModel.position.y(ui.position.top);
            }
        });
    },
    update: function(element, valueAccessor) {
        var value = ko.unwrap(valueAccessor());

        (value == true) ? $(element).resizable('enable') : $(element).resizable('disable');
    }
};

ko.bindingHandlers.blockDraggable = {

    init: function (element, valueAccessor, allBindings, viewModel, bindingContext) {

        $(element).draggable({ containment: Data.card.containment, cursor: "move",
            stack: Data.card.block, snap: true,
            stop: function (event, ui) {
                viewModel.position.x(ui.position.left);
                viewModel.position.y(ui.position.top);
            }
        });
    },
    update: function(element, valueAccessor) {

        var value = ko.unwrap(valueAccessor());

        (value == true) ? $(element).draggable('enable') : $(element).draggable('disable');
    }
};

ko.bindingHandlers.blockDoubleClick = {

    update: function(element, valueAccessor) {

        var value = ko.unwrap(valueAccessor());

        if (value == true) {
            //Show editor on doubleClick event
            $(element).on('dblclick', function () {
                BlockView.showEditor(this);
            });
        }
        else {
            $(element).unbind("dblclick");
        }
    }
};

ko.bindingHandlers.fadeImage = {
    init: function(element, valueAccessor) {
        var cover = ko.unwrap(valueAccessor());
        $(element).toggle(cover);
        $(element).attr('src', cover.original);
    },
    update: function(element, valueAccessor) {
        var cover = ko.unwrap(valueAccessor());

        $(element).fadeOut('slow',function() {
            $(element).attr('src', cover.original).fadeIn(270);
        });
    }
};

ko.bindingHandlers.slideToggle = {
    update: function(element, valueAccessor) {
        var value = ko.unwrap(valueAccessor());

        (value == true) ? $(element).slideUp() : $(element).slideDown();
    }
};

var CardViewModel = new CardViewModel();

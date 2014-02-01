function CardViewModel() {
    var self = this;

    self.coverId = ko.observable(Data.values.defaultCard.coverId);
    self.blocks = ko.observableArray(new Array());

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


    /* FOR DEBUGGING ONLY */
    self.save = function () {
        self.lastSavedJson(JSON.stringify(ko.toJS(self), null, 2));
    };

    self.lastSavedJson = ko.observable("");
};

ko.bindingHandlers.blocksDraggableResizable = {
    init: function (element, valueAccessor, allBindings, viewModel, bindingContext) {
        var blockView = BlockView;

        BlockView.bindResizeable(element);
        BlockView.bindDraggable(element);
        BlockView.bindDoubleClick(element);
    }
};

var CardViewModel = new CardViewModel();
ko.applyBindings(CardViewModel, $(Data.toolbar)[0]);
ko.applyBindings(CardViewModel, $(Data.card.blockWrap)[0]);

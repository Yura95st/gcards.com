var CardViewModel = function () {
    var self = this;

    self.coverId = ko.observable(0);

    self.blocks = ko.observableArray(new Array());

    self.addBlock = function () {
        var position = new Position();
        position.x = ko.observable(10);
        position.y = ko.observable(10);
        position.height = ko.observable(75);
        position.width = ko.observable(400);

        var block = new Block();
        block.position = position;
        block.content = ko.observable(Data.values.card.defaultContent);

        self.blocks.push(block);

        $(Data.card.blockContent).summernoteEditable();
    };

    self.removeBlock = function (block) {
        self.blocks.remove(block);
    };

    self.canAddBlock = function () {
        return (self.blocks().length < 10);
    }

    self.save = function () {
        self.lastSavedJson(JSON.stringify(ko.toJS(self), null, 2));
    };

    self.lastSavedJson = ko.observable("");

    self.showEditor = function() {

    }
};

ko.bindingHandlers.blocksDraggableResizable = {
    init: function (element, valueAccessor, allBindings, viewModel, bindingContext) {
        var $viewModel = bindingContext.$data;

        $(element).resizable({ handles: "n, e, s, w, ne, se, sw, nw", containment: Data.card.containment,
            stop: function (event, ui) {
                $viewModel.position.height(ui.size.height);
                $viewModel.position.width(ui.size.width);
                $viewModel.position.x(ui.position.left);
                $viewModel.position.y(ui.position.top);

            }
        });

        $(element).draggable({ containment: Data.card.containment, cursor: "move", stack: Data.card.block, snap: true,
            stop: function (event, ui) {
                $viewModel.position.x(ui.position.left);
                $viewModel.position.y(ui.position.top);
            }
        });

        //Show editor on doubleClick event
        $(element).dblclick(function() {
            CardProcessor.showEditor(element);
        });
    }
};

var cardViewModel = new CardViewModel();
ko.applyBindings(cardViewModel);
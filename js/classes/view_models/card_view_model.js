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
        position.angle = ko.observable(Data.values.defaultCard.block.position.angle);

        var block = new Block();
        block.position = position;
        block.content = ko.observable(Data.values.defaultCard.block.content);

        self.blocks.push(block);

        //Activate tooltips
        $(Data.card.block).find(Data.card.blockCloseButton).tooltip();
        $(Data.card.block).find(Data.card.blockRotateButton).tooltip();
    };

    self.removeBlock = function () {
        var block = this;
        var blockView = Global.blockView;

        self.blocks.remove(block);
        blockView.disableToolbar();
    };

    self.canAddBlock = function () {
        return (self.blocks().length < 10);
    };

    self.preview = function() {
        self.previewMode(true);
        $('body').scrollTo($(Data.header).outerHeight(true));

        var blockView = Global.blockView;

        //TODO: redo this
        blockView.hideAllEditors();
    };

    self.exitPreviewMode = function() {
        self.previewMode(false);
        $('body').scrollTo(0);
    };

    self.publishCard = function() {

        var blockView = Global.blockView;
        //TODO: redo this
        blockView.hideAllEditors();

        var data = {
            card: {
                coverId: ko.toJS(self.cover().id),
                blocks: ko.toJS(self.blocks())
            }
        };
        var infoMessageViewModel = Global.infoMessageViewModel;
        var cardValidator = Global.cardValidator;

        var validationResult = cardValidator.validate(data.card);

        console.log(data);

        if (validationResult.success == false) {
            infoMessageViewModel.content(validationResult.msg);
            infoMessageViewModel.show();
            return;
        }

        data.card = JSON.stringify(data.card);

        $.ajax({
            url: Data.ajax.url,
            type: 'post',
            data: data,
            complete: function() {
            },
            success: function(resultJSON) {
                var resultData = JSON.parse(resultJSON);

                if (resultData['success'] == true) {
                    var postCreationWindowViewModel = Global.postCreationWindowViewModel;

                    postCreationWindowViewModel.text(Data.info.card_publish_success);
                    postCreationWindowViewModel.link(resultData['url']);
                    postCreationWindowViewModel.show();
                }
                else {
                    infoMessageViewModel.content(Data.info.card_publish_error);
                    infoMessageViewModel.show();
                }
            },
            error:function() {
                infoMessageViewModel.content(Data.info.card_publish_error);
                infoMessageViewModel.show();
            }
        });
    };

    /* FOR DEBUGGING ONLY */
    self.save = function () {
        console.log(JSON.stringify(ko.toJS(self), null, 2));
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

ko.bindingHandlers.blockRotatable = {
    init: function (element, valueAccessor, allBindings, viewModel, bindingContext) {

        var handle = $(Data.card.block).find(Data.card.blockRotateButton);

        $(element).rotatable({
            angle: 0.000001,
            handle: handle,
            stop: function (event, angle) {
                viewModel.position.angle(angle);
            }
        });
    }
}

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
        var blockView = Global.blockView;

        $(element).unbind("dblclick");

        if (value == true) {
            //Show editor on doubleClick event
            $(element).on('dblclick', function () {
                blockView.showEditor(this);
            });
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

Global.cardViewModel = new CardViewModel();

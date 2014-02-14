function PostCreationWindowViewModel() {
    var self = this;

    self.header = Data.values.cardPostCreatedWindow.header;
    self.text = ko.observable("");
    self.menuItems = ko.observableArray(Data.values.cardPostCreatedWindow.menu);
    self.currentMenuItem = ko.observable(self.menuItems()[0]);
    self.currentOperation = ko.observable(0);
    self.link = ko.observable("");

    self.show = function() {
        var modalViewModel = Global.modalViewModel;
        var html = getPostCreationWindow();

        modalViewModel.content(html);
        modalViewModel.show();

        ko.applyBindings(self, $(Data.postCreationWindow.wrap)[0]);
    };

    self.showOperation = function(menuItem) {
        var index = self.menuItems.indexOf(menuItem);
        self.currentOperation(index);
        self.currentMenuItem(menuItem);
    };

    var getPostCreationWindow = function() {
        return '' +
        '<div class="post-creation-window">' +
            '<div class="header" data-bind="text: postCreationWindowViewModel.header"></div>' +
            '<div class="info">' +
                '<span class="glyphicon glyphicon-ok"></span>' +
                '<div class="text" data-bind="text: postCreationWindowViewModel.text"></div>' +
            '</div>' +
            '<div class="operations-panel">' +
                '<div class="menu" data-bind="foreach: { data: postCreationWindowViewModel.menuItems, as: \'item\' }">' +
                    '<div class="item" data-bind="text: item.title, click: postCreationWindowViewModel.showOperation, css: {\'active\': item === postCreationWindowViewModel.currentMenuItem()}"></div>' +
                '</div>' +
                '<div class="operations">' +
                    '<div class="item" data-bind="slideUpDown: 0 != postCreationWindowViewModel.currentOperation()">' +
                        '<input type="text" class="url" data-bind="selectAll: 0 == postCreationWindowViewModel.currentOperation(), value: postCreationWindowViewModel.link" />' +
                    '</div>' +
                '<div class="item" data-bind="slideToggle: 1 != postCreationWindowViewModel.currentOperation()">' +
                        '<div>Options</div>' +
                    '</div>' +
                '</div>' +
            '</div>' +
        '</div>';
    };
};


Global.postCreationWindowViewModel = new PostCreationWindowViewModel();
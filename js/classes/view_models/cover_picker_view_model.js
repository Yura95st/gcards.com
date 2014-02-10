function CoverPickerViewModel() {
    var self = this;

    self.header = Data.values.coverPicker.header;
    self.menuItems = ko.observableArray(Data.values.coverPicker.menu);
    self.currentMenuItem = ko.observable(self.menuItems()[0]);
    self.covers = ko.observableArray(Data.values.coverPicker.covers[0]);

    self.show = function() {
        var modalViewModel = Global.modalViewModel;
        var html = getCoverPicker();

        modalViewModel.content(html);
        modalViewModel.show();

        ko.applyBindings(self, $(Data.coverPicker.wrap)[0]);
    };

    self.showCovers = function(menuItem) {
        var index = self.menuItems.indexOf(menuItem);

        self.covers(Data.values.coverPicker.covers[index]);
        self.currentMenuItem(menuItem);
    };

    self.pickCover = function(cover) {
        var cardViewModel = Global.cardViewModel;

        cardViewModel.cover(cover);
    };

    var getCoverPicker = function() {
        return '' +
            '<div class="cover-picker">' +
                '<div class="header" data-bind="text: coverPickerViewModel.header"></div>' +
                '<div class="menu" data-bind="foreach: { data: coverPickerViewModel.menuItems, as: \'item\' }">' +
                    '<div class="item" data-bind="text: item.title, click: coverPickerViewModel.showCovers, css: {\'active\': item === coverPickerViewModel.currentMenuItem()}"></div>' +
                '</div>' +
                '<div class="cover-thumbnails" data-bind="foreach: { data: coverPickerViewModel.covers, as: \'cover\' }">' +
                    '<div class="thumbnail" data-bind="click: coverPickerViewModel.pickCover, css: {\'active\': cover.id === cardViewModel.cover().id}">' +
                        '<img data-bind="attr:{src: cover.mini}"/>' +
                    '</div>' +
                '</div>' +
            '</div>';
    };

//    self.uploadCover = function () {
//        $.ajaxFileUpload({
//            url: 'http://127.0.0.1/gcards.com/card_controller/uploadCover/',
//            secureuri: false,
//            fileElementId: 'userfile',
//            dataType: 'json',
//            data: {},
//            success: function (data, status) {
//                alert("hello!");
//            }
//        });
//    };
};

Global.coverPickerViewModel = new CoverPickerViewModel();
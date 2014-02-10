var MainViewModel = function() {
    var self = this;

    self.cardViewModel = Global.cardViewModel;
    self.coverPickerViewModel = Global.coverPickerViewModel;
    self.infoMessageViewModel = Global.infoMessageViewModel;
    self.modalViewModel = Global.modalViewModel;
    self.postCreationWindowViewModel = Global.postCreationWindowViewModel;
};

ko.applyBindings(MainViewModel);

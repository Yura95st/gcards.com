var MainViewModel = function() {
    var self = this;

    self.cardViewModel = CardViewModel;
    self.coverPickerViewModel = CoverPickerViewModel;
    self.modalViewModel = ModalViewModel;
    self.infoMessageViewModel = InfoMessageViewModel;
};

ko.applyBindings(MainViewModel);

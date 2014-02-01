function InfoMessageViewModel() {
    var self = this;

    self.positionX = ko.observable(0);
    self.content = ko.observable("");
    self.displayMessage = ko.observable(false);

    self.show = function () {
        setPosition();
        self.displayMessage(true);
    };

    self.hide = function () {
        self.displayMessage(false);
        self.content("");
    };

    var setPosition = function() {
        var wrap = $(Data.infoMessage.wrap);

        self.positionX($(window).width()/2 - wrap.width()/2);
    };
}

var InfoMessageViewModel = new InfoMessageViewModel();
ko.applyBindings(InfoMessageViewModel, $(Data.infoMessage.wrap)[0]);
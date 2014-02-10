function InfoMessageViewModel() {
    var self = this;

    self.positionX = ko.observable(0);
    self.content = ko.observable("");
    self.displayMessage = ko.observable(false);

    self.show = function () {
        setPosition();
        self.displayMessage(true);

        setTimeout(function() {
            self.displayMessage(false);
        }, 5000);
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

Global.infoMessageViewModel = new InfoMessageViewModel();
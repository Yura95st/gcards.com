function ModalViewModel() {
    var self = this;

    self.content = ko.observable("");
    self.maskHeight = ko.observable(0);
    self.contentX = ko.observable(0);
    self.contentY = ko.observable(0);

    self.displayMask = ko.observable(false);
    self.displayLoader = ko.observable(false);
    self.displayContent = ko.observable(false);

    //Activate tooltip
    $(Data.modal.content).find(Data.modal.closeButton).tooltip();

    self.show = function () {
        setPosition();

        self.displayMask(true);
        self.displayLoader(true);
        self.displayContent(true);
        self.displayLoader(false);
    };

    self.hide = function () {
        self.displayMask(false);
        self.displayLoader(false);
        self.content("");
        self.displayContent(false);
    };

    var setPosition = function() {
        self.maskHeight($(document).height());
        setContentPosition();
        //setLoaderPosition();
    };

    var setContentPosition = function() {
        var content = $(Data.modal.wrap).find(Data.modal.content);

        self.contentX($(window).width()/2 - content.width()/2);
        self.contentY($(window).height()/2 - content.height()/2);
    };

    var setLoaderPosition = function() {
        var loader = $(Data.modal.wrap).find(Data.modal.loader);

        //self.contentX($(window).width()/2 - loader.width()/2);
        //self.contentY($(window).height()/2 - loader.height()/2);
    };
}

ko.bindingHandlers.fadeVisible = {
    init: function(element, valueAccessor) {
        // Initially set the element to be instantly visible/hidden depending on the value
        var value = valueAccessor();
        // Use "unwrapObservable" so we can handle values that may or may not be observable
        $(element).toggle(ko.unwrap(value));
    },
    update: function(element, valueAccessor) {
        // Whenever the value subsequently changes, slowly fade the element in or out
        var value = valueAccessor();
        ko.unwrap(value) ? $(element).fadeIn(300) : $(element).fadeOut(300);
    }
};

Global.modalViewModel = new ModalViewModel();

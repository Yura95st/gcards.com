function MacScreenViewModel() {
    var self = this;
    var thumbnailsArray = [
        'img/slides_main/thumbnails/birthday.jpg',
        'img/slides_main/thumbnails/birthday_2.jpg',
        'img/slides_main/thumbnails/heavenly_love.jpg',
        'img/slides_main/thumbnails/valentines_day.jpg',
        'img/slides_main/thumbnails/valentines_day_2.jpg',
        'img/slides_main/thumbnails/valentines_day_3.jpg',
        'img/slides_main/thumbnails/new_year_2.jpg',
        'img/slides_main/thumbnails/new_year_3.jpg',
        'img/slides_main/thumbnails/new_year_4.jpg',
        'img/slides_main/thumbnails/new_year.jpg'
    ];
    self.counter = 0;
    self.thumbnail = ko.observable(thumbnailsArray[0]);

    self.slideShow = function() {
        changeCounter();
        self.thumbnail(thumbnailsArray[self.counter]);
    };

    var changeCounter = function() {
        self.counter += 1;
        if (self.counter >= thumbnailsArray.length) {
            self.counter = 0;
        }
    };
};

ko.bindingHandlers.fadeImageSlideShow = {
    init: function (element, valueAccessor, allBindings, viewModel, bindingContext) {
        var thumbnail = ko.unwrap(valueAccessor());
        $(element).toggle(thumbnail);
        $(element).attr('src', thumbnail);

        setInterval(function(){ viewModel.slideShow() }, 5000);
    },
    update: function(element, valueAccessor) {
        var thumbnail = ko.unwrap(valueAccessor());

        $(element).fadeOut('slow',function() {
            $(element).attr('src', thumbnail).fadeIn(270);
        });
    }
};

ko.applyBindings(new MacScreenViewModel());

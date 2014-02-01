var CardProcessor =
{
    publishCard: function (el) {

        this.validateCard(CardViewModel);

        var data = {
            card : ko.toJSON(CardViewModel)
        };

        $.post(Data.ajax.url, data,
            function (returnedData) {
            }
        );
    },

    validateCard : function() {

    }
};
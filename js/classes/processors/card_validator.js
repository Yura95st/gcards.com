function CardValidator() {
    var self = this;
    var result = {
        mgs : "",
        success: true
    };

    self.validate = function (card) {

        if (!card) {
            result.success = false;
            result.msg = "Card is undefined";
        }
        else if (!validateCoverId(card.coverId)) {
            result.success = false;
            result.msg = "CoverId is invalid";
        }
        else if (!validateBlocks(card.blocks)) {
            result.success = false;
        }

        return result;
    };

    var validateBlocks = function(blocks) {
        if (!blocks || blocks.length == 0) {
            result.msg = "There is no blocks on the card";
            return false;
        }
        else if (blocks.length > 10) {
            result.msg = "Too many blocks";
            return false;
        }
        else {
            for (var i = 0, length = blocks.length; i < length; i++) {
                if (!validateBlock(blocks[i])) {
                    return false;
                }
            }
        }

        result.msg = "";
        result.success = true;
        return true;
    };

    var validateBlock = function(block) {
        if (block == false || block.content == "" || block.content == Data.values.defaultCard.block.content) {
            result.msg = "There is an empty block";
            return false;
        }

        block.content = block.content.substr(0, 10000);
        return true;
    };

    var validateCoverId = function(coverId) {
        var pattern = /[0-9]+/i;

        if (!coverId || pattern.exec(coverId) == null || coverId === 0) {
            return false;
        }
        return true;
    };
}

Global.cardValidator = new CardValidator();
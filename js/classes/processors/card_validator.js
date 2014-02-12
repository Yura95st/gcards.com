function CardValidator() {
    var self = this;
    var result = {
        mgs : "",
        success: true
    };

    self.validate = function (card) {

        if (!card) {
            result.success = false;
            result.msg = Data.info.card_undefined;
        }
        else if (!validateCoverId(card.coverId)) {
            result.success = false;
            result.msg = Data.info.card_cover_unpicked;
        }
        else if (!validateBlocks(card.blocks)) {
            result.success = false;
        }

        return result;
    };

    var validateBlocks = function(blocks) {
        if (!blocks || blocks.length == 0) {
            result.msg = Data.info.card_no_blocks;
            return false;
        }
        else if (blocks.length > 10) {
            result.msg = Data.info.card_too_many_blocks;
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
            result.msg = Data.info.card_empty_blocks;
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
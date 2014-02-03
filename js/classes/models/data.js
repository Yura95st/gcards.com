var Data =
{
    header: '#header',
    card: {
        block: '.card-block',
        blockContent: '.block-content',
        blockWrap: '.card-block-wrap',
        containment: '.main-body',
        cover: '.card-cover',
        editor: '.note-editor',
        editable: '.note-editable',
        toolbar: '.editor-toolbar'
    },
    ajax: {
        progress: '.progress',
        url: 'http://127.0.0.1/gcards.com/card_controller/publish/?XDEBUG_SESSION_START=18498'
    },
    modal: {
        content: '.content',
        loader: '.loader',
        wrap: '#modal'
    },
    infoMessage: {
        wrap: '#info-message'
    },
    coverPicker: {
        wrap: '.cover-picker'
    },
    values: {
        defaultCard: {
            cover: {
                id: 1,
                mini: "http://127.0.0.1/gcards.com/img/covers/mini/bg_5_mini.jpg",
                original: "http://127.0.0.1/gcards.com/img/covers/original/bg_5.jpg"
            },
            block: {
                content: "Double-click to edit",
                position: {
                    x: 10,
                    y: 10,
                    height: 75,
                    width: 400
                }
            }
        },
        coverPicker: {
            header : "Cover Picker",
            menu: [
                {
                    id: 1,
                    title: "All"
                },
                {
                    id: 2,
                    title: "New Year"
                },
                {
                    id: 3,
                    title: "St. Valentines Day"
                },
                {
                    id: 4,
                    title: "Women's Day"
                }
            ],
            covers: [
                // all:
                [
                    {
                        id: 1,
                        mini: "http://127.0.0.1/gcards.com/img/covers/mini/bg_5_mini.jpg",
                        original: "http://127.0.0.1/gcards.com/img/covers/original/bg_5.jpg"
                    },
                    {
                        id: 2,
                        mini: "http://127.0.0.1/gcards.com/img/covers/mini/bg_4_mini.jpg",
                        original: "http://127.0.0.1/gcards.com/img/covers/original/bg_4.jpg"
                    },
                    {
                        id: 3,
                        mini: "http://127.0.0.1/gcards.com/img/covers/mini/bg_12_mini.jpg",
                        original: "http://127.0.0.1/gcards.com/img/covers/original/bg_12.jpg"
                    }
                ],
                // New Year:
                [
                    {
                        id: 1,
                        mini: "http://127.0.0.1/gcards.com/img/covers/mini/bg_5_mini.jpg",
                        original: "http://127.0.0.1/gcards.com/img/covers/original/bg_5.jpg"
                    },
                    {
                        id: 3,
                        mini: "http://127.0.0.1/gcards.com/img/covers/mini/bg_12_mini.jpg",
                        original: "http://127.0.0.1/gcards.com/img/covers/original/bg_12.jpg"
                    }
                ],
                // st. Valentines Day:
                [
                    {
                        id: 1,
                        mini: "http://127.0.0.1/gcards.com/img/covers/mini/bg_5_mini.jpg",
                        original: "http://127.0.0.1/gcards.com/img/covers/original/bg_5.jpg"
                    }
                ],
                // Women's Day:
                [
                    {
                        id: 2,
                        mini: "http://127.0.0.1/gcards.com/img/covers/mini/bg_4_mini.jpg",
                        original: "http://127.0.0.1/gcards.com/img/covers/original/bg_4.jpg"
                    }
                ]
            ]

        }
    }
};

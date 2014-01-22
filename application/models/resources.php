<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Resources extends CI_Model
{
    public $background = array(
        'img/backgrounds/bg_1.jpg',
        'img/backgrounds/bg_2.jpg',
        'img/backgrounds/bg_3.jpg',
        'img/backgrounds/bg_4.jpg',
        'img/backgrounds/bg_5.jpg',
        'img/backgrounds/bg_6.jpg',
        'img/backgrounds/bg_7.jpg',
        'img/backgrounds/bg_8.jpg',
        'img/backgrounds/bg_9.jpg',
        'img/backgrounds/bg_10.jpg',
        'img/backgrounds/bg_11.jpg',
        'img/backgrounds/bg_12.jpg',
        'img/backgrounds/bg_13.jpg',
        'img/backgrounds/bg_14.jpg',
        'img/backgrounds/bg_15.jpg',
        'img/backgrounds/bg_16.jpg',
        'img/backgrounds/bg_17.jpg',
        'img/backgrounds/bg_18.jpg',
        'img/backgrounds/bg_19.jpg',
        'img/backgrounds/bg_20.jpg',
        'img/backgrounds/bg_21.jpg',
        'img/backgrounds/bg_22.jpg',
        'img/backgrounds/bg_23.jpg',
        'img/backgrounds/bg_24.jpg',
        //'img/backgrounds/bg_25.jpg',
        'img/backgrounds/bg_26.jpg',
        'img/backgrounds/bg_27.jpg',
        'img/backgrounds/bg_28.jpg',
        'img/backgrounds/bg_29.jpg',
        'img/backgrounds/bg_30.jpg',
        'img/backgrounds/bg_31.jpg',
        'img/backgrounds/bg_32.jpg',
        'img/backgrounds/bg_33.jpg',
        'img/backgrounds/bg_34.jpg'
    );

    public $backgroundMini = array(
        'img/backgrounds/bg_1_mini.jpg',
        'img/backgrounds/bg_2_mini.jpg',
        'img/backgrounds/bg_3_mini.jpg',
        'img/backgrounds/bg_4_mini.jpg',
        'img/backgrounds/bg_5_mini.jpg',
        'img/backgrounds/bg_6_mini.jpg',
        'img/backgrounds/bg_7_mini.jpg',
        'img/backgrounds/bg_8_mini.jpg',
        'img/backgrounds/bg_9_mini.jpg',
        'img/backgrounds/bg_10_mini.jpg',
        'img/backgrounds/bg_11_mini.jpg',
        'img/backgrounds/bg_12_mini.jpg',
        'img/backgrounds/bg_13_mini.jpg',
        'img/backgrounds/bg_14_mini.jpg',
        'img/backgrounds/bg_15_mini.jpg',
        'img/backgrounds/bg_16_mini.jpg',
        'img/backgrounds/bg_17_mini.jpg',
        'img/backgrounds/bg_18_mini.jpg',
        'img/backgrounds/bg_19_mini.jpg',
        'img/backgrounds/bg_20_mini.jpg',
        'img/backgrounds/bg_21_mini.jpg',
        'img/backgrounds/bg_22_mini.jpg',
        'img/backgrounds/bg_23_mini.jpg',
        'img/backgrounds/bg_24_mini.jpg',
        //'img/backgrounds/bg_25_mini.jpg',
        'img/backgrounds/bg_26_mini.jpg',
        'img/backgrounds/bg_27_mini.jpg',
        'img/backgrounds/bg_28_mini.jpg',
        'img/backgrounds/bg_29_mini.jpg',
        'img/backgrounds/bg_30_mini.jpg',
        'img/backgrounds/bg_31_mini.jpg',
        'img/backgrounds/bg_32_mini.jpg',
        'img/backgrounds/bg_33_mini.jpg',
        'img/backgrounds/bg_34_mini.jpg'
    );

    public $indexBackground = array(
        'img/backgrounds/bg_28.jpg',
        'img/backgrounds/bg_29.jpg',
        'img/backgrounds/bg_30.jpg',
        'img/backgrounds/bg_32.jpg',
        'img/backgrounds/bg_34.jpg'
    );

    public $font_family = array(
        'Arial', 'Cambria', 'Calibri', 'Comic Sans MS', 'Courier New',
        'Georgia', 'Helvetica', 'Lucida Sans', 'Tahoma', 'Times New Roman',
        'Verdana'
    );

    public $font_size = array(
        '5', '6', '7', '8', '9',
        '10', '11', '12', '14',
        '16', '18', '20', '22',
        '24', '28', '36', '48',
        '72'
    );

    public $size_type = array(
        'px', 'pt'
    );

    public $font_weight = array(
        'bold', 'bolder', 'normal', 'lighter'
    );

    public $font_style = array(
        'italic', 'normal', 'oblique'
    );

    public $color_named = array(
        'aliceblue', 'antiquewhite', 'aqua', 'aquamarine', 'azure', 'beige', 'bisque', 'black',
        'blanchedalmond', 'blue', 'blueviolet', 'brown', 'burlywood', 'cadetblue', 'chartreuse',                          'chocolate', 'coral', 'cornflowerblue', 'cornsilk', 'crimson', 'cyan', 'darkblue', 'darkcyan',
        'darkgoldenrod', 'darkgray', 'darkgreen', 'darkkhaki', 'darkmagenta', 'darkolivegreen',
        'darkorange', 'darkorchid', 'darkred', 'darksalmon', 'darkseagreen', 'darkslateblue',
        'darkslategray', 'darkturquoise', 'darkviolet', 'deeppink', 'deepskyblue', 'dimgray', 'dodgerblue',
        'firebrick', 'floralwhite', 'forestgreen', 'fuchsia', 'gainsboro', 'ghostwhite', 'gold',
        'goldenrod', 'gray', 'green', 'greenyellow', 'honeydew', 'hotpink', 'indianred', 'indigo',
        'ivory', 'khaki', 'lavender', 'lavenderblush', 'lawngreen', 'lemonchiffon', 'lightblue',
        'lightcoral', 'lightcyan', 'lightgoldenrodyellow', 'lightgreen', 'lightgrey', 'lightpink',
        'lightsalmon', 'lightseagreen', 'lightskyblue', 'lightslategray', 'lightsteelblue', 'lightyellow',
        'lime', 'limegreen', 'linen', 'magenta', 'maroon', 'mediumaquamarine', 'mediumblue',
        'mediumorchid', 'mediumpurple', 'mediumseagreen', 'mediumslateblue', 'mediumspringgreen',
        'mediumturquoise', 'mediumvioletred', 'midnightblue', 'mintcream', 'mistyrose', 'moccasin',
        'navajowhite', 'navy', 'oldlace', 'olive', 'olivedrab', 'orange', 'orangered', 'orchid',
        'palegoldenrod', 'palegreen', 'paleturquoise', 'palevioletred', 'papayawhip', 'peachpuff', 'peru',
        'pink', 'plum', 'powderblue', 'purple', 'red', 'rosybrown', 'royalblue', 'saddlebrown', 'salmon',
        'sandybrown', 'seagreen', 'seashell', 'sienna', 'silver', 'skyblue', 'slateblue', 'slategray',
        'snow', 'springgreen', 'steelblue', 'tan', 'teal', 'thistle', 'tomato', 'turquoise', 'violet',
        'wheat', 'white', 'whitesmoke', 'yellow', 'yellowgreen'
    );
} 
<?php
	require_once ('templates/resources.php');
?>
<div id="card_maker_box">
    <div id="card_maker_header">Инстументы открытки</div>
    
    <div class="card_maker_tabs_container">
        <ul id="card_maker_tabs">
			<li><a href="#" class="active" onclick="Card.instrumentNav(this); return false;" value="0">Фон</a></li>
			<li><a href="#" onclick="Card.instrumentNav(this); return false;" value="1">Заголовок</a></li>
			<li><a href="#" onclick="Card.instrumentNav(this); return false;" value="2">Текст</a></li>
			<li><a href="#" onclick="Card.instrumentNav(this); return false;" value="3">Подпись</a></li>
		</ul>
    </div>
    
    <div class="card_maker_content" id="card_maker_content">
        <ul id="card_maker_backround_chooser" class="background_chooser">
        <?php
            $count = sizeof($BACKGROUND_MINI_ARRAY);
            for($i=0; $i<$count; $i++) {
                printf('<li class="%s" onclick="Card.changeBackground(this);" value="%s"><div style="background: url(\'%s\') 0 0;"></div></li>',
                ($i==0? 'active' : ''), $i, $BACKGROUND_MINI_ARRAY[$i]);
            }
        ?>
        </ul>
        
        <?php
            $tab_name = array('caption', 'text', 'signature');
            
            for ($i=0; $i<sizeof($tab_name); $i++) {
                echo '<ul id="card_maker_'.$tab_name[$i].'_editor" class="card_text_editor" style="display: none;">
                <li><textarea onkeyup="Card.editCardText(this);" autocomplete="off" name="'.$tab_name[$i].'"></textarea></li>
                <li style="height: 43px;"><p>Цвет текста:</p>
                    <input type="minicolors" data-position="top" name="'.$tab_name[$i].'" value="#FFFFFF" onchange="Card.editCardFontColor(this);" />
                </li>
                <li><p>Шрифт:</p>
                    <select id="font_chooser_'.$tab_name[$i].'" onchange="Card.editCardFont(this);" name="'.$tab_name[$i].'">';
                    $count = sizeof($FONT_ARRAY);
                    for($j=0; $j<$count; $j++) {
                        printf('<option value="%s" %s>%s</option>',
                        $j, ($j==0? "SELECTED":""), $FONT_ARRAY[$j]);
                    }
                echo '</select></li>
                <li><p>Размер текста:</p>
                    <select id="fontSize_chooser_'.$tab_name[$i].'" onchange="Card.editCardFontSize(this);" name="'.$tab_name[$i].'">';
                    $count = sizeof($FONTSIZE_ARRAY);
                    for($j=0; $j<$count; $j++) {
                        printf('<option value="%s" %s>%s</option>',
                        $j, ($j==13? "SELECTED":""), $FONTSIZE_ARRAY[$j]);
                    }
                echo '</select></li>
                <li><p>Выравнивание текста:</p>
                    <select id="alignment_chooser_'.$tab_name[$i].'" onchange="Card.editCardTextAlignment(this);" name="'.$tab_name[$i].'">
                        <option value="0">По левому краю</option>
                        <option value="1">По центру</option>
                        <option value="2">По правому краю</option>
                    </select>
                </li>
                <li><p>Изменение угла:</p>
                    <input id="angle_changer_'.$tab_name[$i].'" type="text" style="width: 25px" name="'.$tab_name[$i].'"/>
                </li>                                
                </ul>';
            }
        ?>
    </div>
    <div class="card_maker_footer">
        <button onclick="Card.generate(this);">Создать открытку</button>
        <div class="progress"></div>
    </div>            
</div>
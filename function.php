<?php

//エスケープ処理をする関数
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

//htmlスペシャルキャラクター　クロスイン


<?php

require get_template_directory() . '/inc/theme-setup.php';


/**
 * Упрощенный перевод
 * @param  string $text строка для перевода
 * @return string - строка с переводом
 */
function tlang($text){
  return __($text, 'ui');
}

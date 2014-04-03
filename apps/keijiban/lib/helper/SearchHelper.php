<?php

function highlight_and_format_text($text,$sentence)
{
  return nl2br(str_replace($sentence,
    '<span style=\'background-color:#ff0\'>'.$sentence.'</span>',
    $text));
}

function highlight_mail_to($address,$text,$sentence)
{
  return str_replace($sentence,
  '<span style=\'background-color:#ff0\'>'.$sentence.'</span>',
  $text).'<<a href=\'mailto:'.$address.'\'>'.$address.'</a>>';
}

?>

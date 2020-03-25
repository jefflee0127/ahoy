<?php

/*
function getMentions($content)
{
global $DB;
$mention_regex = '/(?:@|#)[^\s\t\n\r]+/'; //mention regrex to get all @texts

if (preg_match_all($mention_regex, $content, $matches))
{
foreach ($matches[1] as $match)
{
$match_user =$DB->row("SELECT * FROM users WHERE user_id=?",array($match));

$match_search = '@[' . $match . ']';
$match_replace = '<a target="_blank" href="' . $match_user['user_profile_url'] . '">@' . $match_user['user_name'] . '</a>';

if (isset($match_user['user_id']))
{
$content = str_replace($match_search, $match_replace, $content);
}
}
}
return $content;
}
*/


$input = 'I @loves @me some @cochin, really.';

$regex = '~(@\w+)~';
if (preg_match_all($regex, $input, $matches, PREG_PATTERN_ORDER)) {
   foreach ($matches[1] as $word) {
      $word = substr($word, 1);
      echo $word .'<br/>';
   }
}

?>

<?php
/**
 * trims text to a space then adds ellipses if desired
 * @param  string $input      text to trim
 * @param  int    $length     in characters to trim to
 * @param  bool   $ellipses   if ellipses (...) are to be added
 *
 * @return string
 *
 * @see http://www.ebrueggeman.com/blog/abbreviate-text-without-cutting-words-in-half
 */
function trim_text($input, $length, $ellipses = true)
{
  //no need to trim, already shorter than trim length
  if (strlen($input) <= $length) {
    return $input;
  }

  //find last space within length
  $last_space = strrpos(substr($input, 0, $length), ' ');
  $trimmed_text = substr($input, 0, $last_space);

  //add ellipses (...)
  if ($ellipses) {
    $trimmed_text .= '...';
  }

  return $trimmed_text;
}

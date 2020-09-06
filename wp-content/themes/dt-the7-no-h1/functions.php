<?php

// Filter to remove <h1> tags only but to leave content untouched
function filter_h1_tags_only($buffer) {
  return preg_replace(array('/<h1\s*>/i',
                          '/<\/h1\s*>/i'), '', $buffer);
}

// Filter to remove <h1> tags and all between <h1> tags
function filter_h1_tags_with_content($buffer) {
//  return "just to check";
  return preg_replace('/(<h1\s*>)(.*)(<\/h1\s*>)/i', '', $buffer);
}

// Filter to replace <h1> tags with <h2>
function filter_h1_tags_replace_to_h2($buffer) {
  return preg_replace(array('/<h1\s*>/i',
                          '/<\/h1\s*>/i'),
                      array('<h2>','</h2>') , $buffer);
}

// choose one of the filter option
function hardwood_buffer_start() { ob_start("filter_h1_tags_only"); }
//function hardwood_buffer_start() { ob_start("filter_h1_tags_with_content"); }
//function hardwood_buffer_start() { ob_start("filter_h1_tags_replace_to_h2"); }

function hardwood_buffer_end() { ob_end_flush(); }

add_action('wp_loaded', 'hardwood_buffer_start');
add_action('shutdown', 'hardwood_buffer_end');

<?php
defined('BASEPATH') or exit('No direct script access allowed');

// ------------------------------------------------------------------------

function set_active($uri)
{
  $CI = &get_instance();
  return (strpos($CI->uri->uri_string(), $uri) === 0) ? 'active' : '';
}

function set_active_dropdown($uris = [])
{
  $CI = &get_instance();
  $current_uri = $CI->uri->uri_string();

  foreach ($uris as $uri) {
    if (strpos($current_uri, $uri) === 0) {
      return 'show here'; // class "open" biasa dipakai untuk buka dropdown
    }
  }
  return '';
}

// ------------------------------------------------------------------------

/* End of file Menu_helper.php */
/* Location: ./application/helpers/Menu_helper.php */
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Meeting_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set("Asia/Jakarta");
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function result_meetingData()
  {
    $this->db->select('*');
    $this->db->from('tbl_meeting');
    $this->db->order_by('id_meeting', 'asc');
    $query = $this->db->get()->result();
    return $query;
  }

  // ------------------------------------------------------------------------

}

/* End of file Meeting_model.php */
/* Location: ./application/models/Meeting_model.php */
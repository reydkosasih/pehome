<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // if ($this->session->userdata('username') == false) {
    //   redirect('home/home_page');
    // }
    $this->load->model('meeting_model');
    $data['tbl_user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->vars($data);
  }

  public function home_page()
  {
    $data['title'] = 'Home - PE Home';
    $data['subtitle'] = 'Home';

    //! Call data here
    $data['meet'] = $this->meeting_model->result_meetingData();

    $this->load->view('theme/1-header', $data);
    $this->load->view('theme/2-wrapper', $data);
    $this->load->view('theme/3-navbar', $data);
    $this->load->view('theme/4-sidebar', $data);
    $this->load->view('theme/5-toolbar-begin', $data);
    $this->load->view('home/v_home', $data);
    $this->load->view('theme/6-footer-end', $data);
  }
}


/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
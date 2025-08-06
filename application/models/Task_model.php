<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Task_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set("Asia/Jakarta");
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function add_task()
  {
    $addTask = [
      'id_meeting' => $this->input->post('id_meeting'),
      'tugas' => $this->input->post('tugas'),
      'tgl_mulai' => $this->input->post('tgl_mulai'),
      'tgl_selesai' => $this->input->post('tgl_selesai'),
      'pic' => $this->input->post('pic'),
      'created_at' => date('Y-m-d H:i:s')
    ];

    $addTaskDetail = [
      'id_meeting' => $this->input->post('id_meeting'),
      'tugas' => $this->input->post('tugas'),
      'tgl_mulai' => $this->input->post('tgl_mulai'),
      'tgl_selesai' => $this->input->post('tgl_selesai'),
      'detail_tugas' => $this->input->post('detail_tugas'),
      'pic' => $this->input->post('pic'),
      'created_at' => date('Y-m-d H:i:s')
    ];

    $query = $this->db->insert('tbl_meeting', $addTask);
    $query = $this->db->insert('tbl_meeting_detail', $addTaskDetail);

    if ($query) {
      $_SESSION['success'] = "Berhasil menambahkan tugas!";
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      exit;
    } else {
      $_SESSION['error'] = "Gagal menambahkan tugas!";
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      exit;
    }
  }

  // ------------------------------------------------------------------------

}

/* End of file Task_model.php */
/* Location: ./application/models/Task_model.php */
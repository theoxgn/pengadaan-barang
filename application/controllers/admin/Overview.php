<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        if ($this->session->userdata('login') <> 1) {
            redirect(site_url('login'));
        }
	}
	public function index()
	{
        $this->load->view("admin/overview");
	}
}

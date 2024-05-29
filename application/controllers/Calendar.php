<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load any required models, libraries, etc. here
        // $this->load->model('example_model');
    }

    public function index() {
        // Load the view for the calendar page
        $this->load->view('admin/calendar');
    }
}

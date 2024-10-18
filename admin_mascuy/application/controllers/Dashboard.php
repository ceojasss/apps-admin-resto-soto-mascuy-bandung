<?php

class Dashboard extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->data['JudulWebsite'] = "Dashboard";
        $this->data['PageView'] = "administrator/pages/dashboard/view";
        $this->load->view($this->data['UrlTemplate'] , $this->data);
    }
}
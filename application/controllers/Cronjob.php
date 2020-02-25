<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cronjob extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    public function reset_visitor_per_day()
    {
        $this->Main_model->cleanData('visitor_per_day');
    }
}
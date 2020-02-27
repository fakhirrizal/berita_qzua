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
    public function status_ads(){
        $tanda = '';
        $tanggal_yg_mau_dicek = date('Y-m-d');
        $get_data_iklan = $this->Main_model->getSelectedData('iklan a', 'a.*')->result();
        foreach ($get_data_iklan as $key => $value) {
            if (($tanggal_yg_mau_dicek >= $value->start_date && $tanggal_yg_mau_dicek <= $value->expired_date)){
                $tanda = $value->id_iklan;
                break;
            }else{
                echo '';
            }
        }
        $this->Main_model->updateData('iklan',array('status'=>'displayed'),array('id_iklan'=>$tanda));
        $get_data_iklan_expired = $this->db->query("SELECT * FROM `iklan` WHERE `expired_date` < NOW() AND `id_iklan` NOT IN (".$tanda.")")->result();
        foreach ($get_data_iklan_expired as $key => $value) {
            $this->Main_model->updateData('iklan',array('status'=>'expired'),array('id_iklan'=>$value->id_iklan));
        }
        $get_data_iklan_in_the_queue = $this->db->query("SELECT * FROM `iklan` WHERE `expired_date` > NOW() AND `id_iklan` NOT IN (".$tanda.")")->result();
        foreach ($get_data_iklan_in_the_queue as $key => $value) {
            $this->Main_model->updateData('iklan',array('status'=>'in the queue'),array('id_iklan'=>$value->id_iklan));
        }
    }
}
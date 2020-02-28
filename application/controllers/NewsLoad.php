<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class NewsLoad extends CI_Controller {
        function __construct (){
            parent::__construct();
            $this->load->model('NewsLoad_Model');
        }

        function newsload (){
            $limit  = $_POST['limit'];            
            $query = $this->NewsLoad_Model->__getdata();
            foreach ($query->result() as $row)
            {
                // $date_formater  = date_format($row->created_at,"M d, Y");
                $date_new       = date("M d, Y", strtotime($row->created_at));
                $time_new       = date("h:i a", strtotime($row->created_at));
                $datetime       = $date_new." at ".$time_new; 
                $response[]     = array("judul"=>$row->judul,"berita"=>$row->berita,"created_at"=>$datetime);                   
            }            
            echo json_encode($response);            
        }
    }  
?>
<?php 
    class NewsLoad_Model extends CI_Model {
        function __getdata(){
            $this->db->limit(10);  // Produces: LIMIT 10
            return $this->db->get('berita');        
        }
    }

?>
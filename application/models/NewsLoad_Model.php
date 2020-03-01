<?php 
    class NewsLoad_Model extends CI_Model {
        function __getdata(){
            // $this->db->limit($limit);  // Produces: LIMIT 
            $this->db->order_by("created_at", "desc"); // Produce: 
            return $this->db->get('berita');        
        }
    }

?>
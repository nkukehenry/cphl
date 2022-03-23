<?php

/*
/* Retrieves outcomes data by objective_id
*/
if (!function_exists('outcomes')) {
    
    function outcomes($id){

        $ci =& get_instance();
        $ci->db->where('objective_id',$id);
        $query = $ci->db->get('ncda_outcomes');
        return $query->result();
    }
}

/*
/* Retrieves objectives data by project Id
*/
if (!function_exists('objectives')) {
    
    function objectives($id){

        $ci =& get_instance();
        $ci->db->where('strategy_id',$id);
        $query = $ci->db->get('ncda_objectives');
        return $query->result();
    }
}


/*
/* Retrieves parameters data by activity Id
*/
if (!function_exists('indicators')) {
    
    function indicators($id){

        $ci =& get_instance();
        $ci->db->where('outcome_id',$id);
        $query = $ci->db->get('ncda_indicators');
        return $query->result();
    }
}

/*
/* Retrieves parameter data by param Id
*/
if (!function_exists('indicator_data')) {
    
    function indicator_data($id,$branchActivity=false){

        $ci =& get_instance();
        $ci->db->where('indicator_id',$id);

        if(isset($_GET['from']))
        $ci->db->where("action_date >='".$_GET['from']."'");

        if(isset($_GET['to']))
        $ci->db->where("action_date <='".$_GET['to']."'");

        $query = $ci->db->get('ncda_field_outcome_data');
        return $query->row();
    }
}




?>
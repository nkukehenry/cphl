<?php 

class Facilities_model extends CI_Model{

    public function get(){

        $query = $this->db->get("ncda_facilities");
        return $query->result_array();
    }

    public function facility_by_id($id) {

        $query = $this->db->query("SELECT `nf`.*, `nd`.`district_name` as `district_name`,`nd`.`id` as `district_id` 
                                  FROM (`ncda_facilities` `nf`) 
                                  JOIN `ncda_districts` `nd` 
                                  ON `nd`.`id`=`nf`.`district_id`
                                  WHERE `nf`.`id`='$id'")
                          ->row();
        return (object)$query;
    }


    public function insert()
    {    
        $district = $this->input->post('district_id');
        $data = array(
            'facility_name' => $this->input->post('facility_name'),
            'facilty_description' => $this->input->post('facilty_description'),
            'district_id' => $district
        );
        
        $this->db->insert('ncda_facilities', $data);
        return  $district; 
    }


    public function update($id) 
    {
        $district = $this->input->post('district_id');
        $data = array(
            'facility_name' => $this->input->post('facility_name'),
            'facilty_description' => $this->input->post('facilty_description'),
            'district_id' => $district
        );
        if($id==0){
            $this->db->insert('ncda_facilities',$data);
            return  $district; 
        }else{
            $this->db->where('id',$id);
            $this->db->update('ncda_facilities',$data);
            return  $district; 
        }        
    }


    public function find($id)
    {
        return $this->db->get_where('ncda_facilities', array('id' => $id))->row();
    }


    public function delete($id)
    {
        return $this->db->delete('ncda_facilities', array('id' => $id));
    }

    public function facilities_with_district_info() {

        $query = $this->db->query('SELECT `nf`.*, `nd`.`district_name` as `district_name` 
                                  FROM (`ncda_facilities` `nf`) 
                                  JOIN `ncda_districts` `nd` 
                                  ON `nd`.`id`=`nf`.`district_id`')
                          ->result_array();
        return (object)$query;
    }
    
    public function facilities_by_district($id)
    {
        $query = $this->db->query("SELECT * FROM ncda_facilities WHERE district_id='$id'")
                          ->result_array();
        return (object)$query;

    }

    public function get_facilities($id){

        $query = $this->db->where('district_id',$id)->get("ncda_facilities");
        return $query->result_array();
    }

    public function teams_by_facility($id)
    {
        $query = $this->db->query("SELECT `bt`.*, `nf`.`facility_name` as `facility_name` 
                                  FROM (`ncda_branch_teams` `bt`) 
                                  JOIN `ncda_facilities` `nf` 
                                  ON `nf`.`id`=`bt`.`facility_id`
                                  WHERE `bt`.`facility_id`='$id'")
                          ->result_array();
        return (object)$query;

    }




}


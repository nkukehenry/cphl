<?php 

class Indicators_model extends CI_Model{

    public function get(){

        $query = $this->db->get("ncda_indicators");
        return $query->result();
    }

    public function insert()
    {    
        $user_id = 1;
        $data = array(
            'indicator_name' => $this->input->post('indicator_name'),
            'indicator_description' => $this->input->post('indicator_description'),
            'outcome_id' => $this->input->post('outcome_id'),
            'created_by'             => $user_id,
        );
        return $this->db->insert('ncda_indicators', $data);
    }


    public function update() 
    {
        $user_id = 1;
        $id = $this->input->post('id');
        $data = array(
            'indicator_name' => $this->input->post('indicator_name'),
            'indicator_description' => $this->input->post('indicator_description'),
            'outcome_id'           => $this->input->post('outcome_id'),
            'created_by'            => $user_id,
        );
        
        $this->db->where('id',$id);
        return $this->db->update('ncda_indicators',$data);
                 
    }


    public function find($id)
    {
        return $this->db->get_where('ncda_indicators', array('id' => $id))->row();
    }


    public function delete($id)
    {
        return $this->db->delete('ncda_indicators', array('id' => $id));
    }


    public function indicators_with_outcomes_info() {

        $query = $this->db
                ->query("
                    SELECT `np`.*, `na`.`outcome_name` as `outcome_name` 
                    FROM (`ncda_indicators` `np`) 
                    JOIN `ncda_outcomes` `na` 
                    ON `na`.`id`=`np`.`outcome_id`")
                ->result_array();

        return (object)$query;
    } 

    public function indicators_by_outcome_id($id) {

        $query = $this->db
                 ->query("
                    SELECT `np`.*, `na`.`outcome_name` as `outcome_name` 
                    FROM (`ncda_outcomes` `na`) 
                    JOIN `ncda_indicators` `np` 
                    ON `na`.`id`=`np`.`outcome_id` 
                    WHERE `np`.`outcome_id` = '$id'")
                ->result();
        return $query;

    } 


}


<?php 

class Outcomes_model extends CI_Model{

    public function get(){

        $query = $this->db->get("ncda_outcomes");
        return $query->result();
    }

    public function insert()
    {    
        $data = array(
            'outcome_name'        => $this->input->post('outcome_name'),
            'outcome_description' => $this->input->post('outcome_description'),
            'objective_id'        => $this->input->post('objective_id'),
            'target'              => $this->input->post('target'),
            'created_by'          => $this->input->post('created_by')
        );
        return $this->db->insert('ncda_outcomes', $data);
    }


    public function update() 
    {
        $data = array(
            'outcome_name'        => $this->input->post('outcome_name'),
            'outcome_description' => $this->input->post('outcome_description'),
            'objective_id'        => $this->input->post('objective_id'),
            'target'              => $this->input->post('target'),
            'created_by'          => $this->input->post('created_by')
        );
       
        $this->db->where('id',$this->input->post('id'));
        return $this->db->update('ncda_outcomes',$data);
    }

    public function find($id)
    {
        return $this->db->get_where('ncda_outcomes', array('id' => $id))->row();
    }

    public function delete($id)
    {
        return $this->db->delete('ncda_outcomes', array('id' => $id));
    }


    public function outcomes_with_objectives_info() {

         $query = $this->db
                  ->query("
                      SELECT `na`.*, `no`.`objective_name` as `objective_name` 
                      FROM (`ncda_outcomes` `na`) 
                      JOIN `ncda_objectives` `no` 
                      ON `no`.`id`=`na`.`objective_id`")->result();
        return $query;
    } 

    public function outcomes_by_objective_id($id) {

        $query = $this->db
                ->query("
                    SELECT `na`.*, `no`.`objective_name` as `objective_name` 
                    FROM (`ncda_outcomes` `na`)
                    JOIN `ncda_objectives` `no` 
                    ON `no`.`id`=`na`.`objective_id` 
                    WHERE `na`.`objective_id` = '$id'")
                ->result();
        return $query;
    } 

}


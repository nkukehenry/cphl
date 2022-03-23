<?php 

class Objectives_model extends CI_Model{

    private $user_id = null;

    public function __construct()
    {
        $this->user_id =(isset(user()->user_id))?user()->user_id:null;
    }

    public function get(){
        $this->db->where('is_core',0);
        $query = $this->db->get("ncda_objectives");
        return $query->result();
    }

   
    public function insert()
    {   
         
        $data = array(
            'objective_name' => $this->input->post('objective_name'),
            'objective_description' => $this->input->post('objective_description'),
            'strategy_id' => $this->input->post('strategy_id'),
            'created_by' =>  $this->user_id,
            'is_core'   =>($this->input->post('is_core')!=null)?$this->input->post('is_core'):0
        );
        return $this->db->insert('ncda_objectives', $data);
    }


    public function update() 
    {
         
        $data = array(
            'objective_name' => $this->input->post('objective_name'),
            'objective_description' => $this->input->post('objective_description'),
            'strategy_id'    => $this->input->post('strategy_id'),
            'created_by'    =>  $this->user_id
        );

        $this->db->where('id',$this->input->post('id'));
        return $this->db->update('ncda_objectives',$data);      
    }


    public function find($id)
    {
        return $this->db->get_where('ncda_objectives', array('id' => $id))->row();
    }


    public function delete($id)
    {
        return $this->db->delete('ncda_objectives', array('id' => $id));
    }


    public function objectives_with_strategy_info() {

        $result = $this->db->query('SELECT `no`.*, `np`.`strategy_name` as `strategy_name` 
                                  FROM (`ncda_objectives` `no`) 
                                  JOIN `ncda_strategys` `np` 
                                  ON `np`.`id`=`no`.`strategy_id`')
                          ->result();
        return $result;

    } 

    public function objectives_by_strategy_id($id,$perPage=null,$page=null) {

        if($perPage)
        $this->db->limit($perPage,$page);
        
        $result = $this->db->query("SELECT `no`.*, `np`.`strategy_name` as `strategy_name` 
                                  FROM (`ncda_objectives` `no`) 
                                  JOIN `ncda_strategys` `np` 
                                  ON `np`.`id`=`no`.`strategy_id` 
                                  WHERE `no`.`strategy_id` = '$id'")
                            ->result();
        return $result;

    } 

    public function countObjects($id){
        $this->db->where('strategy_id',$id);
        return $this->db->get('ncda_objectives')->num_rows();
    }

    public function countCoreObjects(){
        $this->db->where('is_core',1);
        return $this->db->get('ncda_objectives')->num_rows();
    }

    public function core_objectives(){
        $this->db->where('is_core',1);
        return $this->db->get('ncda_objectives')->result();
    }


}


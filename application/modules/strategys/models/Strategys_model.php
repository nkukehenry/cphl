<?php 

class Strategys_model extends CI_Model{

    public function get($perPage,$page){
        
        $this->db->limit($perPage,$page);
        $this->db->order_by('id','desc');
        $query = $this->db->get("ncda_strategys");
        return $query->result();
    }

    public  function countStrategys(){
        return $this->db->count_all('ncda_strategys');
    }

    public function insert()
    {    
        $start_date = $this->input->post('start_date');
        $end_date   = $this->input->post('end_date');

        $diff     = strtotime($start_date) - strtotime($end_date);
        $duration = ceil(abs($diff / 86400)).' days';

        $data = array(
            'strategy_name' => $this->input->post('strategy_name')
        );

        return $this->db->insert('ncda_strategys', $data);
    }


    public function update($id) 
    {
        $start_date = $this->input->post('start_date');
        $end_date   = $this->input->post('end_date');

        $diff = strtotime($start_date) - strtotime($end_date);
        $duration = ceil(abs($diff / 86400)).' days';

        $data = array(
            'strategy_name' => $this->input->post('strategy_name'),
            'updated_at'     => date('Y-m-d')
        );

        if($id==0){
            return $this->db->insert('ncda_strategys',$data);
        }else{
            $this->db->where('id',$id);
            return $this->db->update('ncda_strategys',$data);
        }        
    }


    public function find($id)
    {
        return $this->db->get_where('ncda_strategys', array('id' => $id))->row();
    }

    public function delete($id)
    {
        return $this->db->delete('ncda_strategys', array('id' => $id));
    }

    public function saveData(){

        $outcomes = $this->input->post('outcome');
        $values     = $this->input->post('values');
        $indicators     = $this->input->post('indicators');
        $facility   = $this->input->post('facility');

        foreach($outcomes as $key=>$value){
            
            $rowValues = $values[$key];
            $rowIndicators = $indicators[$key];
            $outcome = $value;

            $this->saveParameterData($facility,$outcome ,$rowValues,$rowIndicators);
        }
        return true;
    }

    //count Active strategys 
    public  function countActiveStrategys(){
        return $this->db->where('status','Active')->get('ncda_strategys')->num_rows();
    }

    //count Completed strategys 
    public  function countCompletedStrategys(){
        return $this->db->where('status','Completed')->get('ncda_strategys')->num_rows();
    }


    public function getTopFive(){
        
        $this->db->limit(5);
        return $this->db->order_by('id','desc')->get("ncda_strategys")->result();
    }
  
    private function saveParameterData($facility,$outcomeId,$values,$indicators){

        foreach($values as $key=>$value):
           
            $row = array(
                'indicator_id'    => $indicators[$key],
                'indicator_value' => $values[$key],
                'facility_id'     => $facility,
                'action_date'     => date('Y-m-d')
            );

            $this->db->insert('ncda_field_outcome_data',$row);

        endforeach;

        return true;
    }

    public function  getParamScore($paramId,$facilityId){

        $this->db->select('indicator_value as score');
        $this->db->where('indicator_id',$paramId);

        if($facilityId)
            $this->db->where('facility_id',$paramId);
        
        $this->db->order_by('id','desc');
        $res = $this->db->get('ncda_field_outcome_data')->row();

        return ($res)?$res->score:null;
    }


}


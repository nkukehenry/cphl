<?php

class Strategys extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module="strategys";
        $this->load->model("strategys_model",'strategysModel'); //Strategys model
        $this->load->model("objectives/objectives_model",'objectivesModel'); //Objectives model
        $this->load->model("outcomes/outcomes_model",'outcomesModel'); //Activities model
        $this->load->model("districts/districts_model",'districtsModel'); //Districts model
        $this->load->model("indicators/indicators_model",'indicatorsModel'); //Districts model
        $this->load->model("facilities/facilities_model",'facilitiesnModel');
        
    }

    public function index(){  //strategys list
    
        $data['module']=$this->module;
        $data['title']="Strategys";
        $data['view']="strategys_list";

        $count = $this->strategysModel->countStrategys();
        $page = ($this->uri->segment(2))?$this->uri->segment(2):0;
        $perPage = 5;

        $data['strategys'] = $this->strategysModel->get($perPage,$page);
        $data['links'] = paginate('strategy-list',$count, $perPage,2);

        echo Modules::run('templates/main',$data);
    }
    
    public function create(){ // add strategys form
    
        $data['module']=$this->module;
        $data['title']="Create Strategy";
        $data['view']="create_strategy";

        echo Modules::run('templates/main',$data);
    }

    public function store() { //save strategy

        $this->strategysModel->insert();
        set_flash('Strategy saved successfully');
        return redirect(site_url('strategy-list'));
    }


    public function singleStrategy($id = null){ //show single strategy

        $data['strategy_obj'] = $this->strategysModel->find($id);
        $data['module']=$this->module;
        $data['title']="Strategys";
        $data['view']="edit_strategy";
        
        echo Modules::run('templates/main',$data);
    }

    public function update($id = null){ //updat strategy

        $this->strategysModel->update($this->input->post('id'));
        set_flash('Strategy updated successfully');
        return redirect(site_url('strategy-list'));
    }
 
    public function delete($id = null){ //delete strategy

        $this->strategysModel->delete($id);
        return redirect(site_url('strategy-list'));
    }  

    public function dataEntry($id = null){ //show single strategy

        $data['strategy']     = $this->strategysModel->find($id);
        $data['objectives']  = $this->objectivesModel->objectives_by_strategy_id($id);


        $objectiveId = ($this->input->post('objective_id'))?$this->input->post('objective_id'):null;
        $data['selectedObjective']  = ($objectiveId)? $this->objectivesModel->find($objectiveId): null;
        
        $outcomes   = ($objectiveId)?$this->outcomesModel->outcomes_by_objective_id($objectiveId):[];
       
        $data['selectedFacility'] = ($this->input->post('facility'))?$this->input->post('facility'):null;
        $data['outcomes']    = $this->paramtizedActivities($outcomes );
        $data['facilities']    = ($objectiveId)?$this->facilitiesnModel->get():[];
        $data['module']        = $this->module;

        $data['title'] = "Field Data Entry";
        $data['view']  = "data_entry";
        
        echo Modules::run('templates/main',$data);
    }

    private function paramtizedActivities($outcomes){
        
        foreach($outcomes as $act){
            $act->indicators   = $this->indicatorsModel->indicators_by_outcome_id($act->id);
        }
        return $outcomes;
    }


    public function submitData(){

        $this->strategysModel->saveData();
        set_flash('Activty data saved successfully');
        redirect(site_url('entry/'.$this->input->post('strategy_id')));
    }

    //Number of Completed strategy
    public function CompletedStrategys(){ 
        return $this->strategysModel->countCompletedStrategys();
    }

    //Number of Active strategy
    public function ActiveStrategys(){ 
        return $this->strategysModel->countActiveStrategys();
    }

    //get Top Five strategys
    public function getTopFive(){ 
        return $this->strategysModel->getTopFive();
    }
    

}


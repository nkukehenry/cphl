<?php

class Outcomes extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module="outcomes";
        $this->load->model("outcomes_model",'outcomesModel'); //outcomes model
        $this->load->model("objectives/objectives_model",'objectivesModel'); //objectives model
            
    }

	public function index($id = false){  //outcome list
	  
        $data['outcomes']   = $this->outcomesModel->outcomes_by_objective_id($id);
        $data['objective']  = $this->objectivesModel->find($id);
           
        $data['module'] = $this->module;
        $data['title']  = "Objective  Outcomes";
        $data['view']   = "data";

        echo Modules::run('templates/main',$data);
	}
    
	public function create($id){ // add outcome form
	
        $data['objective'] = $this->objectivesModel->find($id);
        $data['module']=$this->module;
        $data['title']="Objective Outcomes";
        $data['uptitle']="Main Outcomes";
        $data['view']="create";

        echo Modules::run('templates/main',$data);
	}

    public function store() { //outcome list

        $this->outcomesModel->insert();
        $objectiveId = $this->input->post('objective_id');
        set_flash('Outcome saved successfully');
        return redirect(site_url('outcome-list/'.$objectiveId));
    }

    public function singleOutcome($id = null){ //get outcome page

        $data['objective'] = $this->outcomesModel->find($id);
        $data['objective_obj'] = $this->objectivesModel->find($id);
       
        $data['module']=$this->module;
        $data['title']="Objective - Outcomes";
        $data['view']="edit";
        echo Modules::run('templates/main',$data);
    }

    public function update(){ //updat outcome

        $this->outcomesModel->update();
        $objectiveId = $this->input->post('objective_id');
        set_flash('Outcome saved successfully');
        return redirect(site_url('outcome-list/'.$objectiveId));
    }
 
    public function delete($id = null){ //delete outcome

        $this->outcomesModel->delete($id);
        return redirect(site_url('outcome-list'));
    }  


}

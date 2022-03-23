<?php

class Indicators extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module="indicators";
        $this->load->model("indicators_model",'indicatorsModel'); //Indicators model
        $this->load->model("outcomes/outcomes_model",'outcomesModel'); //outcomes model
            
    }

    public function index($id = false)
    {   
        $data['indicators'] = $this->indicatorsModel->indicators_by_outcome_id($id);
        $data['outcome']   = $this->outcomesModel->find($id);
        
        $data['module'] = $this->module;
        $data['title']  = "Outcome Indicators";
        $data['view']="data";

        echo Modules::run('templates/main',$data);
    }
    
    
    public function create($id){ // add indicators form
    
        $data['module']=$this->module;
        $data['title']="Create an Indicator";

        $outcome = $this->outcomesModel->find($id);
        $data['actv_name'] = $outcome->outcome_name;
        $data['actv_id'] = $id;

        $data['view']="create";
        echo Modules::run('templates/main',$data);
    }

    public function store() { //save indicator
        $this->indicatorsModel->insert();
        $outcomeId = $this->input->post('outcome_id');
        set_flash('Indicator saved successfully');
        return redirect(site_url('indicator-list/'.$outcomeId));
    }


    public function singleIndicator($id = null){ //show indicator strategy

        $data['indicator']     = $this->indicatorsModel->find($id);
        $data['outcome']      = $this->outcomesModel->find($id);

        $data['module']=$this->module;
        $data['title']="Indicators";

        $data['view']="edit";
        echo Modules::run('templates/main',$data);
    }

    public function update(){ //updat indicator

        $this->indicatorsModel->update();
        $outcomeId = $this->input->post('outcome_id');
        set_flash('Indicator updated successfully');
        return redirect(site_url('indicator-list/'.$outcomeId));
    }
 
    public function delete($id = null){ //delete indicators

        $this->indicatorsModel->delete($id);
        return redirect(site_url('indicator-list'));
    }  


}


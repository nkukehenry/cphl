<?php

class Objectives extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module = "objectives";
        $this->load->model("objectives_model",'objectivesModel'); //objectives model
        $this->load->model("strategys/strategys_model",'strategysModel'); //strategys model
            
    }

    public function index($id = false)
    {   
        $strategy = $this->strategysModel->find($id);
        $data['proj_name'] = $strategy->strategy_name;
        $data['proj_id']   = $id;
        $data['strategy']   = $this->strategysModel->find($id);

        $count   = $this->objectivesModel->countObjects($id);
        $page    = ($this->uri->segment(3))?$this->uri->segment(3):0;
        $perPage = 12;

        $data['objectives'] = $this->objectivesModel->objectives_by_strategy_id($id,$perPage,$page);
        $data['links']      = paginate('objective-list/'.$id,$count,$perPage,3);
        $data['page']   = $page;
        $data['module'] = $this->module;
        $data['title']  = "Objectives";
        $data['view']   = "strategy_objectives";

        echo Modules::run('templates/main',$data);
    }
    
    
    public function create($id){ // add objectives form
    
        $data['module']  = $this->module;
        $data['title']   = "Create an Objective";
        $data['view']    = "create";
        $data['strategy'] = $this->strategysModel->find($id);
        
        echo Modules::run('templates/main',$data);
    }

    public function store() { //save objective

        $this->objectivesModel->insert();
        set_flash('Objective saved successfully');

        $redirect_route = (isset($_POST['is_core']))?'core-objectives':'objective-list/'.$this->input->post('strategy_id');
        return redirect(site_url($redirect_route ));
    }


    public function singleObjective($id = null){ //show single objective

        $data['objective'] = $this->objectivesModel->find($id);
        $data['strategy']   = $this->strategysModel->find($id);

        $data['module'] = $this->module;
        $data['title']  = "Edit Objective";
        $data['view']   = "edit";

        echo Modules::run('templates/main',$data);
    }

    public function update(){ //updat objective
        $this->objectivesModel->update($this->input->post('id'));
        set_flash('Objective updated successfully');

        $redirect_route = (isset($_POST['is_core']))?'core-objectives':'objective-list/'.$this->input->post('strategy_id');
       
        return redirect($redirect_route);
    }
 
    public function delete($id = null){ //delete objective

        $this->strategysModel->delete($id);
        return redirect(site_url('parameter-list'));
    }  

    public function core_list()
    {   
        
        $count   = $this->objectivesModel->countCoreObjects();
        $page    = ($this->uri->segment(3))?$this->uri->segment(3):0;
        $perPage = 12;

        $data['objectives'] = $this->objectivesModel->core_objectives($perPage,$page);
        $data['links']      = paginate('objective-list/',$count,$perPage,3);
        $data['page']   = $page;
        $data['module'] = $this->module;
        $data['title']  = "Core Objectives";
        $data['view']   = "core_objectives";

        echo Modules::run('templates/main',$data);
    }
    


}


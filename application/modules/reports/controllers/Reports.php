<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MX_Controller {

	
	public function __Construct(){

		parent::__Construct();

		$this->load->model("strategys/strategys_model",'strategysModel'); //Strategys model
        $this->load->model("objectives/objectives_model",'objectivesModel'); //Objectives model
        $this->load->model("outcomes/outcomes_model",'outcomesModel'); //Activities model
        $this->load->model("districts/districts_model",'districtsModel'); //Districts model
        $this->load->model("indicators/indicators_model",'indicatorsModel'); //Districts model
        $this->load->model("facilities/facilities_model",'facilitiesnModel');

        $this->load->model("facilities/facilities_model",'facilitiesnModel');
    

		$this->module = 'reports';

	}

	public function strategys(){

		$strategyId = ($this->input->post('strategy')!=null)?$this->input->post('strategy'):null;

		$data['strategys']	= $this->strategysModel->get(100,0);
		$data['objectives'] = ($strategyId != null)?objectives($strategyId):[];
		$data['strategy']    = null;

		if($strategyId !=null ){
			$data['strategy'] = $this->strategysModel->find($strategyId);
			$html = $this->load->view('report_strategys',$data,true);
			echo $html;
			return;
		}
		
		$data['title']  = "Reports";
        $data['view']   = "data";
		$data['module'] = $this->module;
        
        echo Modules::run('templates/main',$data);

	}

	public function visual_report($strategyId=null){

		if($strategyId==null)
		 $strategyId= (isset($_GET['strategy']))?$_GET['strategy']:null;

		$data['strategys']	= $this->strategysModel->get(100,0);

		if($strategyId==null)
		$strategyId = (count($data['strategys'])>0)?$data['strategys'][0]->id:null;

		$data['objectives'] = ($strategyId != null)?objectives($strategyId):[];
		$data['strategy']    = $this->strategysModel->find($strategyId);

		$data['title']  = "Strategy Visualization Report";
        $data['view']   = "strategy_visualization";
		$data['module'] = $this->module;
        
        echo Modules::run('templates/main',$data);
	}

	public function outcomes($value='')
	{
		
		$data['objectives'] = $this->objectivesModel->core_objectives();
		$data['title']      = "Branch Activity Report";
        $data['view']       = "report_outcomes";
		$data['module']     = $this->module;
        
        echo Modules::run('templates/main',$data);
	}

	public function pdf_report($strategyId ){

		$data['strategys']	= $this->strategysModel->get(100,0);
		$data['objectives'] = ($strategyId != null)?objectives($strategyId):[];
		$data['strategy']    = null;

		if($strategyId !=null ){
			$data['strategy'] = $this->strategysModel->find($strategyId);
			$data['hide_menu'] = true;
			$html = $this->load->view('pdf_export',$data,true);
			$file_name = str_replace(" ","_",$data['strategy']->strategy_name)."_".time();

			//echo $html;
			make_pdf($html,$file_name,"D",true);
		}
	}

	

}

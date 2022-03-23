<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	
	public  function __construct(){
		parent:: __construct();

			$this->dashmodule="dashboard";
			$this->load->model("dashboard_mdl",'dash_mdl');
		
	}

	public function index()
	{
		echo Modules::run('reports/visual_report',null);
	}

	public function dashboardData(){
		
		$data = $this->dash_mdl->getData();
		echo json_encode($data);
	}



}

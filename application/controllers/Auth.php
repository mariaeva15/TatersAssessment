<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	
	public function index()
	{
		$this->load->view('Auth/login');
	}

	public function register()
    {
        // Fetch municipalities from the model
        $data['municipalities'] = $this->auth_model->getMunicipalities(); 
        $this->load->view('Auth/register', $data);
    }

	public function registration_form(){
		$this->auth_model->register_user();

        // Fetch municipalities from the model
        $data['municipalities'] = $this->auth_model->getMunicipalities(); 
        $this->load->view('Auth/register', $data);
	}

	public function login_form(){
		$this->auth_model->login_user();
	}

	public function main(){
		$this->load->view('Auth/index');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Auth/'); 
	}

	public function getLocations() {
        $municipality_id = $this->input->post('municipality_id');
        $barangays = $this->auth_model->getBarangaysByMunicipality($municipality_id);
        echo json_encode($barangays);
}
}



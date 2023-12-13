<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_Controller extends CI_Controller {

    public function index() {
        $data['username'] = $this->session->userdata('username');
        $this->load->view('auth/index', $data);
    }

    public function generate_report() {
        $this->load->model('auth_model');
    
        $report_type = $this->input->post('report_type');
    
        switch ($report_type) {
            case 'users_by_barangay':
                $barangay = $this->input->post('barangay');
                $data['report'] = $this->auth_model->get_users_by_barangay($barangay);
                // Debug: Print the last query
                echo $this->db->last_query();
                // Debug: Print the data
                print_r($data['report']);
                break;
            case 'all_data':
                $data['report'] = $this->auth_model->get_all_data();
                break;
            case 'users_by_barangay':
                $barangay = $this->input->post('barangay');
                $data['report'] = $this->auth_model->get_users_by_barangay($barangay);
                break;
            case 'users_by_municipality':
                $data['report'] = $this->auth_model->get_users_by_municipality();
                break;
            case 'users_by_age':
                $age = $this->input->post('age');
                $data['report'] = $this->auth_model->get_users_by_age($age);
                break;
            case 'users_by_gender':
                $data['report'] = $this->auth_model->get_users_by_gender();
                break;
            default:
                $data['report'] = array();
        }
    
        $data['username'] = $this->session->userdata('username');
        $this->load->view('auth/index', $data);
    }    
    }

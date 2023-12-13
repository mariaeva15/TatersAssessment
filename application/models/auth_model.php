<?php

class Auth_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function register_user()
    {
        $password = $this->input->post('password');
        $con_password = $this->input->post('con_password');

        if ($password != $con_password) {
            $this->session->set_flashdata('worng', 'The password not equal with confirmation!');
            redirect('Auth/register');
        } else {
            $data = array(
                "username" => $this->input->post('username'),
                "password" => password_hash($password, PASSWORD_DEFAULT), // Hash the password
                "lastname" => $this->input->post('lastname'),
                "firstname" => $this->input->post('firstname'),
                "house_street_village" => $this->input->post('house'),
                "barangay" => $this->input->post('barangay'),
                "municipality" =>  $this->input->post('municipality'),
                "mobile_number" => $this->input->post('mobile_number'),
                "age" => $this->input->post('age'),
                "gender" => $this->input->post('gender'),
                "email" => $this->input->post('email')
            );

            $this->db->insert('users', $data);
            $this->session->set_flashdata('suc', 'You are registered please login');
            redirect('Auth/');
        }
    }

    public function login_user()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->db->where('username', $username);
        $query = $this->db->get('users');
        $user = $query->row();

        if ($user && password_verify($password, $user->password)) {
            $this->session->set_flashdata('suc', 'You are logged');
            redirect('Auth/main');
        } else {
            $this->session->set_flashdata('warning', 'Incorrect Authentication!!!');
            redirect('Auth/');
        }
    }

    public function getMunicipalities() {
        // Implement your logic to retrieve municipalities from the database
        $query = $this->db->get('municipalities');
        return $query->result_array();
    }

    public function getBarangaysByMunicipality($municipality_id) {
        // Implement your logic to retrieve barangays based on the municipality from the database
        $this->db->where('municipality_id', $municipality_id);
        $query = $this->db->get('barangays');
        return $query->result_array();
    }

    public function get_all_data() {
        // Retrieve all user data excluding password
        return $this->db->select('username, firstname, lastname, email, barangay, municipality, age, gender')
                        ->from('users')
                        ->get()
                        ->result();
    }

        public function get_users_by_barangay($barangay) {
            $query = $this->db->select('username, firstname, lastname, email, barangay, municipality, age, gender')
                              ->from('users')
                              ->where('barangay', $barangay)
                              ->get();
            // Debug: Print the last query
            echo $this->db->last_query();
            return $query->result();
    }
    
    public function get_users_by_municipality($municipality) {
        // Retrieve users by Municipality
        return $this->db->select('username, firstname, lastname, email, barangay, municipality, age, gender')
                        ->from('users')
                        ->where('municipality', $municipality)
                        ->get()
                        ->result();
    }
    
    public function get_users_by_age($age) {
        // Retrieve users by Age
        return $this->db->select('username, firstname, lastname, email, barangay, municipality, age, gender')
                        ->from('users')
                        ->where('age', $age)
                        ->get()
                        ->result();
    }
    
    public function get_users_by_gender($gender) {
        // Retrieve users by Gender
        return $this->db->select('username, firstname, lastname, email, barangay, municipality, age, gender')
                        ->from('users')
                        ->where('gender', $gender)
                        ->get()
                        ->result();
    }    
}
?>

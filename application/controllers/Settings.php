<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CORE_Controller
{

    public function index()
    {

        if ($this->session->userdata('username') != '') {
            $this->load->view('layout/header');
            $this->load->view('layout/aside');
            $this->load->view('settings');
            $this->load->view('layout/footer');
        } else {
            redirect('login','refresh');
        }
    }

    public function changeSettings()
    {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header');
            $this->load->view('layout/aside');
            $this->load->view('settings');
            $this->load->view('layout/footer');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'email' => $this->input->post('email')
            );
            
            $this->db->where('id',1);
            $check = $this->db->update('users', $data);
            if ($check) {
                $msg = array(
                    'name' => 'alert alert-success alert-dismissible fade show',
                    'error' => 'Updated Successfully!!',
                    'close' => 'aria-hidden='
                );
                
                $this->session->set_flashdata('msg', $msg);
                $this->load->view('layout/header');
                $this->load->view('layout/aside');
                $this->load->view('settings');
                $this->load->view('layout/footer');
            } else {
                $msg = array(
                    'name' => 'alert alert-danger alert-dismissible fade show',
                    'error' => 'Failed to add!!',
                    'close' => 'aria-hidden='
                );
                $this->session->set_flashdata('msg', $msg);
                $this->load->view('layout/header');
                $this->load->view('layout/aside');
                $this->load->view('settings');
                $this->load->view('layout/footer');
            }
        }
    }
}

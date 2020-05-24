<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->model("user_model");
        $this->load->view('header');
        $this->load->helper('url');
        $base_url = load_class('Config')->config['base_url'];
    }

    public function index(){
        return redirect($base_url.'/user/login'); 
    }

	public function register()
	{
        $user= $this->session->get_userdata();

        if(isset($user['id'])){
            return redirect($base_url.'/movie'); 
        }else{
            $this->load->view('User/register');
        }
    }
    
    function store(){

        try{
            $base_url = load_class('Config')->config['base_url'];

            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
            if($this->user_model->createuser($data)){
                $this->load->view('Movies/list');
            }else{
                return redirect()->to($base_url.'index.php/User/Register');
            }
        }catch(Exception $e){
            return redirect()->to($base_url.'index.php/User/Register');

        }
    }

    public function login(){
        $user= $this->session->get_userdata();

        if(isset($user['id'])){
            return redirect($base_url.'/movie'); 
        }else{
            $this->load->view('User/login');
        }
    }

    public function processlogin(){

        $data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        );

        $result = $this->user_model->login($data);
        if($result != false){

            foreach($result->result() as $row){
                $session_data = array(
                    'id' => $row->id,
                    'name' => $row->name
                );

                $this->session->set_userdata($session_data);
            }
            $this->load->view('header');
            $this->load->view('Movies/list');

        }else{
            $this->session->set_flashdata('error', 'Invalid email or password');
            $this->load->view('User/login');
        }
    }

    public function logout(){

        $user= $this->session->get_userdata();

        if(isset($user['id'])){
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('name');
            $this->session->sess_destroy();
            $this->load->view('header');
            $this->load->view('User/login');
        }else{
            $this->session->set_flashdata('error', 'User must login before access!');
            return redirect($base_url.'/User/login'); 
        }
    }

    
    public function wishList(){

        $user= $this->session->get_userdata();

        if(isset($user['id'])){
            $movies = $this->user_model->movieList();

            if($movies != null){
            foreach($movies->result() as $row){
                $movielist = array(
                    'id'=> $row->id,
                    'id_movie' => $row->id_movie
                );
                $this->load->view('User/wishlist', compact("movielist"));
            }
            }else{
                $this->load->view('User/wishlist', compact("movielist"));
            }
        }else{
            $this->session->set_flashdata('error', 'User must login before access!');
            return redirect($base_url.'/User/login'); 
        }

    }
}

?>
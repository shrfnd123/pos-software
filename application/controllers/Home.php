<?php
	
class Home extends CI_Controller
{

public function __construct()
{
	parent::__construct();
	$this->load->model('home_model');
    $user_login =$this->session->userdata('usertypedata'); //var_dump($user_login);
         if ($user_login=='dental_sofware_admin>>><<<') {
              redirect('admin','refresh');
         }
	}

public function index()
{
  $data['pagetitle'] = 'Login Page';
  $this->load->view('login', $data);
			
}

 public function login_check()
 { 

       $username = $this->input->post('username');
       $password = md5($this->input->post('password'));
    if ($username) {
        $datanew =$this->home_model->resolve_user_login($username, $password);
            if ($datanew) {
            $session_data = array(
              'posdata_user_id' => $datanew[0]->user_id,
               'name' => $datanew[0]->user_full_name,
              'user_type' => $datanew[0]->user_type
               ); 
                $this->session->set_userdata($session_data);
                  $level =  $this->session->userdata('user_type');
                    $_SESSION["isthislogin"] = "yes";
                     $this->session->set_userdata('<<<<<<','>>>>>');
                        if ($level=="1") {
                        echo "1";
                         $this->session->set_userdata('usertypedata','dental_sofware_admin>>><<<');
                           }
                           else if ($level=="2") {
                             $this->session->set_userdata('usertypedata','dental_sofware_secretary>>><<<');
                            echo "2";
                           }
                      
              }
              
                else{
                  echo "4";
                  }
             }
         else
        {
        echo "No direct access";
       }
}








}
?>
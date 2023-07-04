<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upload_Controller extends CI_Controller {    
public function __construct() {
    parent::__construct();   
}       
public function file_view(){
    $this->load->view('file_view', array('error' => ' ' ));    
}
public function do_upload(){
     $config =  array(
                  'upload_path'     => "./uploads/",
                  'allowed_types'   => "gif|jpg|png|jpeg|pdf",
                  'overwrite'       => TRUE,
                  'max_size'        => "2048000",  // Can be set to particular file size
                  'max_height'      => "768",
                  'max_width'       => "1024"  
                );    
				$this->load->library('upload', $config);
				if($this->upload->do_upload())
				{
					$data = array('upload_data' => $this->upload->data());
					var_dump($data);
					//$this->load->view('upload_success',$data);
				}
				else
				{
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
				//$this->load->view('file_view', $error);
				}    
}
}
?>
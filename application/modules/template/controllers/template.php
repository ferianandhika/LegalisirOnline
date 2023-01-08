<?php
class Template extends MX_Controller
{
    function __construct()
    {
     parent::__construct();
    }
    
    function loadview($data=NULL,$page = NULL)
    {
        $this->load->view('v_header',$data);  
        $this->load->view('v_content',$data); 
        if($page != NULL){
            $this->load->view($page,$data);
        } else {
           $this->load->view('v_content',$data);
        }
        $this->load->view('v_footer',$data);
    }
}

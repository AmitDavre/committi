<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() {
		ob_start();
        parent::__construct();
        if ($this->session->userdata('username') == '') {
            redirect(base_url('login'));
            exit;
        }
        $this->load->model('User_model'); 
      
    }

/////////////////////////////////////// ADMIN PROFILE /////////////////////////////////////////////////////////////
	public function profile()
	{
		$id =$this->session->userdata('id');
        $check_tab_rights=$this->checkRights('Profile',$id);
        $rights=array();
        if($check_tab_rights=='' && ($this->session->userdata('s_admin')!='1') &&($this->session->userdata('login_type')=='admin')){
            redirect(base_url() . 'dashboard');
        }else if($check_tab_rights!='' && ($this->session->userdata('s_admin')!='1') &&($this->session->userdata('login_type')=='admin')){
        $rights['rights']=$check_tab_rights;
        }
		if(isset($_SESSION['error'])){
			    unset($_SESSION['error']);
			}
		if(isset($_POST['submit'])) {		// on updating admin details 
			$id = $this->input->post('admin_id');						// hidden admin id 
			$where['id'] = $id;											// Where condition for admin
			$where3['user_login_id'] = $id;											// Where condition for admin

			$where4['u_id'] = $id;	

      ///////////////////////Unlink the image/////////////////////////
			if($_FILES['upload']['name']!='')
           { 
              $unlink_image=$this->User_model->query("select profile_image from users where id='".$id."' and profile_image!=''");
			  if($unlink_image->num_rows()>0)
			  {
                $image=$unlink_image->result_array();
                $image_path='assets/media/profile_images/'.$image[0]['profile_image'];
                if (file_exists($image_path)){
                unlink($image_path);
               }
             }
            }
			////////////////////////   UPLOAD PROFILE PICTURE /////////////////////

			$config['upload_path'] = 'assets/media/profile_images';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $_FILES['upload']['name'];
            
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            
            if($this->upload->do_upload('upload'))
            {
                $uploadData = $this->upload->data();
                $picture = $uploadData['file_name'];
            }
            else
            {
                $picture = '';
            } 

			//////////////////////////UPLOAD PROFILE PICTURE ENDS////////////////////
			$data = array(

	            'first_name'        => $this->input->post('first_name'),
	            'middle_name'       => $this->input->post('middle_name'),
	            'last_name'        	=> $this->input->post('last_name'),
	            'username'        	=> $this->input->post('username'),
	            'profile_image'     => $picture,
           

	        ); 

	        $data2 = array(

	            'first_name'        => $this->input->post('first_name'),
	            'middle_name'       => $this->input->post('middle_name'),
	            'last_name'        	=> $this->input->post('last_name'),
	            'username'        	=> $this->input->post('username'),

	        ); 

	        $data3 = array(

		        'user_first_name'       	=> $this->input->post('first_name'),
	            'user_middle_name'        	=> $this->input->post('middle_name'),
	            'user_last_name'        	=> $this->input->post('last_name'),
	            'user_gender'        		=> $this->input->post('user_gender'),
	            // 'user_sin'        			=> $this->input->post('hidden_SinVal'),
	            // 'user_dob'        			=> $this->input->post('hidden_date_of_birth'),
	            'usert_street'        		=> $this->input->post('user_street'),
	            'user_street_name'        	=> $this->input->post('user_street_name'),
	            'user_unit_no'        		=> $this->input->post('user_unit_no'),
	            'user_provience'        	=> $this->input->post('user_provience'),
	            'user_postal_code'        	=> $this->input->post('user_postal_code'),
	            'user_phone_no'        		=> $this->input->post('user_phone_number'),
	            'user_unit_no'        		=> $this->input->post('user_suite'),
	            'user_employment_status'    => $this->input->post('user_employment_status'),
	            'user_gross_income'         => $this->input->post('user_annual_income'),
	            'user_household_income'     => $this->input->post('user_household_income'),
	            'user_residential_status'   => $this->input->post('user_residential'),
	            'user_planning'        		=> $this->input->post('user_funds'),
	            'user_fund_time'        	=> $this->input->post('user_funds_time'),
	            'user_city'        			=> $this->input->post('user_city'),
	        );
		
			// user application data array 
	        $user_application_data=array(
                  
                'user_application_first_name'       	=> $this->input->post('first_name'),
	            'user_application_middle_name'        	=> $this->input->post('middle_name'),
	            'user_application_last_name'        	=> $this->input->post('last_name'),
	            'user_application_gender'        		=> $this->input->post('user_gender'),
	            'usert_application_street'        		=> $this->input->post('user_street'),
	            'user_application_street_name'        	=> $this->input->post('user_street_name'),
	            'user_application_unit_no'        		=> $this->input->post('user_unit_no'),
	            'user_application_provience'        	=> $this->input->post('user_provience'),
	            'user_application_postal_code'        	=> $this->input->post('user_postal_code'),
	            'user_application_phone_no'        		=> $this->input->post('user_phone_number'),
	            'user_application_unit_no'        		=> $this->input->post('user_suite'),
	            'user_application_employment_status'    => $this->input->post('user_employment_status'),
	            'user_application_gross_income'         => $this->input->post('user_annual_income'),
	            'user_application_household_income'     => $this->input->post('user_household_income'),
	            'user_application_residential_status'   => $this->input->post('user_residential'),
	            'user_application_planning'        		=> $this->input->post('user_funds'),
	            'user_application_fund_time'        	=> $this->input->post('user_funds_time'),
	        );
            $check_user_application_table=$this->User_model->query("select * from user_application where u_id='".$id."'");
            if($check_user_application_table->num_rows()>0){
            	$UpdateuserApplicationData = $this->User_model->updatedata('user_application',$where4, $user_application_data);
            }
            

			if($picture != '')
			{
		        $insertAdminData     		= $this->User_model->updatedata('users',$where,$data);
		        $insertAdminUpdateData      = $this->User_model->updatedata('committi_users',$where3,$data3);
			}
			else
			{
		        $insertAdminData     		= $this->User_model->updatedata('users',$where,$data2);
		        $insertAdminUpdateData      = $this->User_model->updatedata('committi_users',$where3,$data3);
			}
			$this->session->set_flashdata('profile_update', 'Record Updated Successfully');  


			$login_type = $this->session->userdata('login_type');
			if($login_type == 'user')
			{
				$query = $this->User_model->query("SELECT * FROM users u join committi_users c on u.id=c.user_login_id WHERE id= '".$id."'");
			}
			else
			{
		        $query = $this->User_model->query("SELECT * FROM users WHERE id= '".$id."'");

			}

	        
	        if($query->num_rows() > 0)
	        {
	            $result = $query->result_array();
	        }
	        else
	        {
	            $result = '';
	        }

	        $joining_committi_data_array=array();
           $residential_data_array=array();
            $fetch_dropdown_values=$this->User_model->query("select * from dropdown_values");
            if($fetch_dropdown_values->num_rows()>0){
                foreach ($fetch_dropdown_values->result() as $value) {
                   if($value->dropdown_values_type=='residential status'){
                    // $data['residential_data']=$value;
                    array_push($residential_data_array,$value);
                   }
                    if($value->dropdown_values_type=='committi_joining_reasons'){
                    // $data['joining_committi_data']=$value;
                     array_push($joining_committi_data_array,$value);
                   }
                }
                 $committi_joining_data['joining_committi_data']=$joining_committi_data_array;
                 $residential_data['residential_data']=$residential_data_array;
            }else{
                 $committi_joining_data['joining_committi_data']='';
                 $residential_data['residential_data']='';
            }


	        $session_data['session_data']=$result['0'];
			$data['content'] = $this->load->view('dashboard/profile',$session_data+$rights+$residential_data+$committi_joining_data,true);
       		$this->load->view('template/template', $data);
		}
		else // on opening profile tab 
		{
			if(isset($_SESSION['profile_update'])){
			    unset($_SESSION['profile_update']);
			}
			if(isset($_SESSION['password_changed'])){
			    unset($_SESSION['password_changed']);
			}
			if(isset($_SESSION['error'])){
			    unset($_SESSION['error']);
				}
			$id 		= $session_data['session_data']=$this->session->userdata('id');
			$login_type = $this->session->userdata('login_type');
			if($login_type == 'user')
			{
				$query = $this->User_model->query("SELECT * FROM users u join committi_users c on u.id=c.user_login_id WHERE u.id= '".$id."'");

			}
			else
			{
		        $query = $this->User_model->query("SELECT * FROM users WHERE id= '".$id."'");

			}
	        if($query->num_rows() > 0)
	        {
	            $result = $query->result_array();
	        }
	        else
	        {
	            $result = '';
	        }
             
           $joining_committi_data_array=array();
           $residential_data_array=array();
            $fetch_dropdown_values=$this->User_model->query("select * from dropdown_values");
            if($fetch_dropdown_values->num_rows()>0){
                foreach ($fetch_dropdown_values->result() as $value) {
                   if($value->dropdown_values_type=='residential status'){
                    // $data['residential_data']=$value;
                    array_push($residential_data_array,$value);
                   }
                    if($value->dropdown_values_type=='committi_joining_reasons'){
                    // $data['joining_committi_data']=$value;
                     array_push($joining_committi_data_array,$value);
                   }
                }
                 $committi_joining_data['joining_committi_data']=$joining_committi_data_array;
                 $residential_data['residential_data']=$residential_data_array;
            }else{
                 $committi_joining_data['joining_committi_data']='';
                 $residential_data['residential_data']='';
            }




	        $session_data['session_data']=$result['0'];
			$data['content'] = $this->load->view('dashboard/profile',$session_data+$rights+$residential_data+$committi_joining_data,true);
	        $this->load->view('template/template', $data);
		}
	}
	public function change_password()
	{
			if(isset($_POST['submit'])) 
			{	
				if(isset($_SESSION['profile_update'])){
				    unset($_SESSION['profile_update']);
				}
				if(isset($_SESSION['password_changed'])){
			    unset($_SESSION['password_changed']);
				}
				if(isset($_SESSION['error'])){
			    unset($_SESSION['error']);
				}							// on updating admin details 
				$id = $this->input->post('admin_id');						// hidden admin id 
				$where['id'] = $id;											// Where condition for admin

				$new_password 			=$this->input->post('new_password');
				$confirm_new_password	=$this->input->post('confirm_new_password');

				if($new_password == $confirm_new_password )
				{
					$data = array(
		            'password'        => md5($this->input->post('new_password')),
			        ); 

		        	$insertAdminData     = $this->User_model->updatedata('users',$where,$data);
		        	$this->session->set_flashdata('password_changed', 'Record Updated Successfully');  



		        	$id = $session_data['session_data']=$this->session->userdata('id');
					$query = $this->User_model->query("SELECT * FROM users WHERE id= '".$id."'");
			        if($query->num_rows() > 0)
			        {
			            $result = $query->result_array();
			        }
			        else
			        {
			            $result = '';
			        }

			        $session_data['session_data']=$result['0'];
					$data['content'] = $this->load->view('dashboard/password',$session_data,true);
		       		$this->load->view('template/template', $data);
				}
				else
				{
					$this->session->set_flashdata('error', 'Please check the Password'); 
					 

					$id = $session_data['session_data']=$this->session->userdata('id');
					$query = $this->User_model->query("SELECT * FROM users WHERE id= '".$id."'");
			        if($query->num_rows() > 0)
			        {
			            $result = $query->result_array();
			        }
			        else
			        {
			            $result = '';
			        }

			        $session_data['session_data']=$result['0'];
					$data['content'] = $this->load->view('dashboard/password',$session_data,true);
		       		$this->load->view('template/template', $data);
				}
			}
			else
			{
				$id = $session_data['session_data']=$this->session->userdata('id');
				$query = $this->User_model->query("SELECT * FROM users WHERE id= '".$id."'");
		        if($query->num_rows() > 0)
		        {
		            $result = $query->result_array();
		        }
		        else
		        {
		            $result = '';
		        }

				$session_data['session_data']=$result['0'];
				$data['content'] = $this->load->view('dashboard/password',$session_data,true);
	       		$this->load->view('template/template', $data);
			}

	}

/////////////////////////////////////// ADMIN PROFILE  END /////////////////////////////////////////////////////////////


	public function test_page()
		{
			$id = $session_data['session_data']=$this->session->userdata('id');
			$query = $this->User_model->query("SELECT * FROM users WHERE id= '".$id."'");
	        if($query->num_rows() > 0)
	        {
	            $result = $query->result_array();
	        }
	        else
	        {
	            $result = '';
	        }

	        $session_data['session_data']=$result['0'];
			$data['content'] = $this->load->view('dashboard/testpage',$session_data,true);
	   		$this->load->view('template/template', $data);

	}

	public function plan_description()
		{
			$id = $session_data['session_data']=$this->session->userdata('id');
			$query = $this->User_model->query("SELECT * FROM users WHERE id= '".$id."'");
	        if($query->num_rows() > 0)
	        {
	            $result = $query->result_array();
	        }
	        else
	        {
	            $result = '';
	        }

	        $plan_id= base64_decode($this->uri->segment(2));
	        $query_plans = $this->User_model->query("SELECT * FROM plans WHERE id= '".$plan_id."'");
	        if($query_plans->num_rows() > 0)
	        {
	            $result_plans = $query_plans->result_array();
	        }
	        else
	        {
	            $result_plans = '';
	        }

	        $plan_details['plan_details']=$result_plans['0'];
	        $session_data['session_data']=$result['0'];
			$data['content'] = $this->load->view('user/plan_description',$session_data+$plan_details,true);
	   		$this->load->view('template/template', $data);



	}	

}

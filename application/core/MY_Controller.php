<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct() {

		parent::__construct();
	}
	
	public function checkRights($tab_name,$user_id)
    {
      $check_tab_rights=$this->User_model->query("select * from admin_accesses inner join tab_list on admin_accesses.admin_accesses_tab_list_id = tab_list.tab_list_id where user_id='".$user_id."' and tab_name='".$tab_name."' and (view_right='1' or edit_right='1' or all_rights='1')");
      if($check_tab_rights->num_rows()>0){
          $check_tab_rights=$check_tab_rights->result_array();
      }
      else{
        $check_tab_rights='';
      }
      return $check_tab_rights;
    }
    public function remove_currency_symbol($input){
       $search=array('$',',');
       $replace=array('','');
       return str_replace($search,$replace,$input);
    }
    public function common_get_plan_by_id($plan_id){
       $plan_result='';
     $plan_info=$this->User_model->select_where('plans',array('id'=>$plan_id));
     if($plan_info->num_rows()>0){
      $plan_result=$plan_info->result_array();
      $plan_result=$plan_result[0];
     }
     return $plan_result;
    }
    public function common_get_bank_by_id($bank_id){
     $bank_result='';
     $get_bank_info=$this->User_model->select_where('bank_accounts',array('bank_account_id'=>$bank_id));
     if($get_bank_info->num_rows()>0){
      $bank_result=$get_bank_info->result_array();
      $bank_result=$bank_result[0];
     }
     return $bank_result;
    }
    public function common_get_user_app_by_id($app_id){
      $bank_result='';
      $get_bank_info=$this->User_model->select_where('user_application',array('a_id'=>$app_id));
      if($get_bank_info->num_rows()>0){
        $bank_result=$get_bank_info->result_array();
        $bank_result=$bank_result[0];
      }
      return $bank_result;
    }
}

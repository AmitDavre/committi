<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function __construct() {
        parent::__construct();
		
        $this->load->database();
    }
	
	function new_query($query,$data)
	{
		return $result = $this->db->query($query,$data);
	}
	
    function count_all($table){


        return $this->db->count_all($table);
    }


    function select($table, $limit, $start, $by) {
        $this->db->limit($limit, $start);
        $this->db->order_by($by, 'asc');
        $query = $this->db->get($table);
        //print_r($query); exit;
        return $query;
    }

    /*     * ***********************************.....select from a table with where condition************************************************************** */

    function select_where($table, $where) {
        
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $result = $this->db->get();
        // print_r($result); exit;
        return $result;
    }

    /*     ************************************.....delete from a table with where condition************************************************************** */

    function delete($table, $data) {
        $this->db->where($data);
        $this->db->delete($table);
    }

    /*     * ****************************************.....update a table with where condition************************************************************** */

    function updatedata($table, $data, $data1) {
        $this->db->where($data);
        $this->db->update($table, $data1);
    }


    function insertdata($table, $data) {
        $this->db->insert($table, $data);
    }

    function get_values($table, $fields_required) {
        $this->db->select($fields_required);
        $this->db->from($table);
        $result = $this->db->get();
        return $result;
    }

    function getCondition($table, $fields_required, $col_name, $value) {
        $this->db->select($fields_required);
        $this->db->from($table);
        $this->db->where($col_name, $value);
        $result = $this->db->get();
        return $result;
    }

    function get_stringCondtion($table, $fields, $str_con) {
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->where($str_con);
        $result = $this->db->get();
        return $result;
    }

    function get_stringCondtionOrder($table, $fields, $str_con, $order_strng = '') {
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->where($str_con);

        if ($order_strng != '') {
            $this->db->order_by($order_strng);
        }
        $result = $this->db->get();
        return $result;
    }

    function listing_order($table, $col, $ac) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($col, $ac);
        return $result = $this->db->get();
    }

    function getComboxCondition($table, $where, $col, $limit = 0) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($col, $where);
        if ($limit != 0) {
            $this->db->limit($limit);
        }
        $query = $this->db->get();
        return $query;
    }

    function commonSave($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    function commonDelete($table, $col, $val) {
        $this->db->where($col, $val);
        $this->db->delete($table);
    }

    function commonUpdate($table, $data, $col, $val) {
        $this->db->where($col, $val);
        $this->db->update($table, $data);
    }

    function get_CondtionOrder($table, $fields, $str_con, $order_strng = '') {
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->where($str_con);

        if ($order_strng != '') {
            $this->db->order_by($order_strng);
        }
        $this->db->limit(10);
        $result = $this->db->get();
        return $result;
    }

    function get_stringCondtionGroup($table, $fields, $str_con, $group) {
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->where($str_con);
        $this->db->group_by($group);
        $result = $this->db->get();
        return $result;
    }

    function query($query) {
        return $result = $this->db->query($query);
    }

    function query_count($query) {
        $result = $this->db->query($query);

        return $result->num_rows();
    }
	
	//    ascending order
	 function select_where_asc($table, $where, $order_id) {
        $this->db->select('*');
        $this->db->from($table);
		$this->db->where($where);
        $this->db->order_by($order_id, 'ASC');
        return $result = $this->db->get();
    }
	
	//    desciding order
	 function select_where_desc($table, $where, $order_id) {
        $this->db->select('*');
        $this->db->from($table);
		$this->db->where($where);
        $this->db->order_by($order_id, 'DESC');
        return $result = $this->db->get();
    }
	
	 function select_star($table) {
        $this->db->select('*');
        $this->db->from($table);
		 return $result = $this->db->get();
	 }
	 
	 function select_star_asc($table,$order) {
        $this->db->select('*');
        $this->db->from($table);
		 $this->db->order_by($order, 'ASC');
		 return $result = $this->db->get();
	 }
	 
	  function select_star_desc($table,$order) {
        $this->db->select('*');
        $this->db->from($table);
		 $this->db->order_by($order, 'DESC');
		 return $result = $this->db->get();
	 }
}
?>

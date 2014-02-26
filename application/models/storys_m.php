<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * ChildStory APP后台
 *
 * 内容Model
 *
 * @package		CHILDSTORY
 * @subpackage	Model
 * @category	Model
 * @author		hopohu <178118455@qq.com>
 * @copyright	Copyright (c) 2011 - 2012, 178118455@qq.com.
 * @license		GNU General Public License 2.0
 * @link		
 * @version		1.0
 */

class Storys_m extends CI_Model {
	protected $table;
	
	public function __construct()
	{
		$this->table = 'tb_story';
		parent::__construct();
	}
	
	//----------------------------CRUD-----------------------------------
	/**
	 * 获取所有story
	 *
	 * @param unknown_type $where
	 * @return unknown
	 */
	public function get_all_storys($where = array())
	{
		if(!empty($where))
		{
			$this->db->where($where);
		}
		$query = $this->db->get($this->table);	
		return $query->result();
	}
	
	
	/**
	 * 获取story列表
	 *
	 * @param unknown_type $isall
	 * @param unknown_type $where
	 * @param unknown_type $start
	 * @param unknown_type $limit
	 * @return unknown
	 */
	public function get_storys($isall = true, $where = array(), $start = 1, $limit = 0)
	{
		if(!empty($where))
		{
			$this->db->where($where);
		}
		//$this->db->select('story_name', 'story_content', 'refer');
		$this->db->order_by("id", "asc");
		if($isall)
		{
			$query = $this->db->get($this->table);	
		}
		else 
		{
			$query = $this->db->get_where($this->table, $where, $limit, $start);
		}
		
		//$row = $this->db->_object_to_array($query->result());
		return $query->result();
	}
	
	/**
	 * 计算个数
	 *
	 * @param unknown_type $isall
	 * @param unknown_type $where
	 * @param unknown_type $start
	 * @param unknown_type $limit
	 * @return unknown
	 */
	public function count_storys($where = array())
	{
		if(!empty($where))
		{
			$this->db->where($where);
		}
		$this->db->select('id');
		$query = $this->db->get_where($this->table, $where);
		
		return count($query->result());
	}
	
	
	
	/**
	 * 获取指定story
	 *
	 * @param unknown_type $id
	 * @return unknown
	 */
	public function get_story($id = 0)
	{
		if($id)	
		{
			$this->db->where('id', $id);
		}
		$query = $this->db->get($this->table);
		return $query->result();
	}
	
	
	/**
	 * 添加一条数据
	 *
	 * @param unknown_type $data
	 * @return unknown
	 */
	public function insert($data = array())
	{
		return $this->db->insert($this->table, $data);
	}
	
	/**
	 * 更新一条数据
	 *
	 * @param unknown_type $id
	 * @param unknown_type $data
	 * @return unknown
	 */
	public function update($id = 0, $data = array())
	{
		return $this->db->update($this->table, $data, array('id'=>$id));
	}
	
	/**
	 * 删除一条数据
	 *
	 * @param unknown_type $id
	 * @return unknown
	 */
	public function delete($id)
	{
		return $this->db->delete($this->table, array('id'=>$id));
	}

}

/* End of file Storys_m.php */
/* Location: ./application/models/Storys_m.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ChildStory APP后台
 *
 * 内容Controller
 *
 * @package		CHILDSTORY
 * @subpackage	Controller
 * @category	Controller
 * @author		hopohu <178118455@qq.com>
 * @copyright	Copyright (c) 2011 - 2012, 178118455@qq.com.
 * @license		GNU General Public License 2.0
 * @link		
 * @version		1.0
 */

class Story extends CI_Controller  {
	function Story()
	{
		parent::__construct();

		$this->load->database();
		$this->load->model('Storys_m');
	}
	
	/**
	 * 获取新的story列表
	 *
	 */
	public function fetch_new_storys()
	{
		//$postData = $this->input->post();
		//$last_story_id = intval($postData('id'));
		$last_story_id = $this->uri->segment(2);
		//var_dump($last_story_id);exit;
		$where = array('id > '=>$last_story_id);
		$storys = $this->Storys_m->get_storys(false, $where, 0, 50);
		
		$ret = array();
		$data = array();
		foreach ($storys as $story)
		{
			$item = array();
			$item['id'] = intval($story->id);
			$item['name'] = htmlspecialchars($story->story_name);
			$item['content'] = htmlspecialchars($story->story_content);
			$data[] = $item;
		}
		
		$ret['result'] = !empty($data) ? true : false;
		$ret['data'] = $data;
		exit(json_encode($ret));
	}
	
	/**
	 * 拉取story个数
	 *
	 */
	public function fetch_new_cnt()
	{
		$last_story_id = $this->uri->segment(2);
		$where = array('id > '=>$last_story_id);
		$count = $this->Storys_m->count_storys($where);
		$data = array('count'=>$count);
		exit(json_encode($data));
	}
}

/* End of file story.php */
/* Location: ./application/controllers/story.php */
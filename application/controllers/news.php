<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: liemtd
 * Date: 8/25/14
 * Time: 3:07 PM
 */
class News extends CI_Controller
{
    private $_data;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_m');
        $this->_data = array();
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
    }

    public function index()
    {
        $this->_data['title'] = 'FRAMGIA & ASCEND';
        if (!($this->_data['news'] = $this->cache->get('news'))){
            $this->_data['news'] = $this->news_m->get_all();
            $this->cache->save('news', $this->_data['news'], 300);
        }

        $this->layout->view('news/index', $this->_data);
        $this->output->cache($this->_data);
    }

}

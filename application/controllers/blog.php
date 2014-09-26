<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: liemtd
 * Date: 8/25/14
 * Time: 3:07 PM
 */
class Blog extends CI_Controller
{
    private $_data;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('group_m');
        $this->_data = array();
    }

    public function index()
    {
        $this->_data['title'] = 'FRAMGIA & ASCEND';
        $this->_data['show_slider'] = true;
        $this->layout->view('blog/index', $this->_data);
    }

}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: liemtd
 * Date: 8/25/14
 * Time: 3:07 PM
 */
class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('group_m');
    }

    public function index()
    {
        $data['all_ar'] = $this->group_m->get_all_ar();
        $data['by_id_ar'] = $this->group_m->get_by_id_ar(1);
        $data['by_name_ar'] = $this->group_m->get_by_name_ar();
        $data['max_ar'] = $this->group_m->get_max_status_ar();
        $this->load->view('home/index', $data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
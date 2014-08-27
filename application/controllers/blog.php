<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: liemtd
 * Date: 8/25/14
 * Time: 3:07 PM
 */
class Blog extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('group_m');
    }

    public function index()
    {
        $data = array(
            'blog_title'   => 'My Blog Title',
            'blog_heading' => 'My Blog Heading',
            'blog_entries' => array(
                array('title' => 'Title 1', 'body' => 'Body 1'),
                array('title' => 'Title 2', 'body' => 'Body 2'),
                array('title' => 'Title 3', 'body' => 'Body 3')
            )
        );
        $this->parser->parse('blog/index', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
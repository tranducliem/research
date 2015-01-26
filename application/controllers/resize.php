<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: liemtd
 * Date: 8/25/14
 * Time: 3:07 PM
 */
class Resize extends CI_Controller
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

    public function add(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        $config = array(
            array(
                'field'   => 'username',
                'label'   => 'Username',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'password',
                'label'   => 'Password',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'passconf',
                'label'   => 'Password Confirmation',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'email',
                'label'   => 'Email',
                'rules'   => 'required'
            )
        );

        $this->form_validation->set_rules($config);

    }

    public function addCaltegory(){
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'callback_username_check');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');

        $config = array(
            'signup' => array(
                array(
                    'field' => 'username',
                    'label' => 'Username',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'passconf',
                    'label' => 'PasswordConfirmation',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'email',
                    'label' => 'Email',
                    'rules' => 'required'
                )
            ),
            'email' => array(
                array(
                    'field' => 'emailaddress',
                    'label' => 'EmailAddress',
                    'rules' => 'required|valid_email'
                ),
                array(
                    'field' => 'name',
                    'label' => 'Name',
                    'rules' => 'required|alpha'
                ),
                array(
                    'field' => 'title',
                    'label' => 'Title',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'message',
                    'label' => 'MessageBody',
                    'rules' => 'required'
                )
            )
        );

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('myform');
        }
        else
        {
            $this->load->view('formsuccess');
        }
    }


    public function username_check($str)
    {
        if ($str == 'test')
        {
            $this->form_validation->set_message('username_check', 'The %s field can not be the word "test"');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}

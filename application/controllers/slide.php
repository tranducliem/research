<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: liemtd
 * Date: 8/25/14
 * Time: 3:07 PM
 */
class Slide extends CI_Controller
{
    private $_data;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('slide_m');
        $this->_data = array();
    }

    public function index()
    {
        $this->_data['title'] = 'FRAMGIA & ASCEND';
        $this->_data['show_slider'] = true;
        //echo json_encode($this->slide_m->get_all());
        redirect(base_url());
    }

    public function get_slide_top(){
        $path = base_url().'public/images/demo/slider/';
        $images = $this->slide_m->get_images_by_album($this->input->post('album_slug'));
        foreach($images as $img){
            $this->_data[] = array(
                            'image' => $path.$img->image,
                            'title' => '<span class="heading">'.$img->title.'</span>'.$img->description.', <a href="'.$img->link_to.'">view here</a>'
                        );
        }
        echo json_encode($this->_data);
    }

    public function create(){
        $input = $this->input->post();
        $this->_data = array(
            'name'          =>     $input['name'],
            'description'   =>     $input['description'],
            'image'         =>     $input['image'],
            'image_url'     =>     $input['image_url'],
            'link_to'       =>     $input['link_to'],
            'album_id'      =>     $input['album_id']
        );
        if($this->slide_m->insert($this->_data)){
            echo 'Success';
        }else{
            echo 'Failure';
        }
        $this->layout->view('slide/create', $this->_data);
    }

    public function update($id = 0){
        $id or redirect(base_url());
        $input = $this->input->post();
        $this->_data = array(
            'name'          =>     $input['name'],
            'description'   =>     $input['description'],
            'image'         =>     $input['image'],
            'image_url'     =>     $input['image_url'],
            'link_to'       =>     $input['link_to'],
            'album_id'      =>     $input['album_id']
        );
        if($this->slide_m->update($id, $this->_data)){
            echo 'Success';
        }else{
            echo 'Failure';
        }
        $this->layout->view('slide/update', $this->_data);
    }

    public function delete($id = 0){
        $id or redirect(base_url());
        if($this->slide_m->delete($id)){
            echo 'Success';
        }else{
            echo 'Failure';
        }
    }

    public function enable($id = 0){
        if($this->slide_m->update($id, array('status'=>'1'))){
            return true;
        }
        return false;
    }

    public function disable($id = 0){
        if($this->slide_m->update($id, array('status'=>'0'))){
            return true;
        }
        return false;
    }

}

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: liemtd
 * Date: 8/25/14
 * Time: 3:07 PM
 */
class Slide_m extends MY_Model
{
    //protected $_table = "slides";

    public function __contruct()
    {
        parent::__construct();
    }

    public function get_all(){
        return parent::get_all();
    }

    public function get_images_by_album($slug = ''){
        $this->db
            ->select('slides.image, slides.title, slides.description, slides.link_to')
            ->join('albums', 'slides.album_id = albums.id')
            ->where('slides.status', '1')
            ->where('albums.slug', $slug);
        return parent::get_all();
    }

    public function insert($data = array()){
        return parent::insert($data);
    }

    public function update($id = 0, $data = array()){
        return parent::update($id,$data);
    }

    public function delete($id = 0){
        return parent::delete($id);
    }
} 
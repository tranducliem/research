# Ticket 20609: Research for Caching in CI - Part 1 + Part 2
[![Build Status](http://192.168.0.18/research/)]

* [Website](https://www.framgia.com/)
* [Documentation](http://192.168.0.18/research/)
* [License](http://192.168.0.18/research/)
* Version: 2.2.4

## Web caching là gì ?
    Web caching là việc lưu trữ bản sao của những tài liệu web sao cho gần với người dùng,
    cả về mặt chức năng trong web client hoặc những web caching servers riêng biệt.

## Ưu điểm chính của Web caching là gì ?
    Ưu điểm chính: Giảm tải băng thông chiếm dụng bởi client, giữ cho các như cầu về băng thông hạ xuống và dễ dàng quản lý (tiết kiệm chi phí mua băng thông).
    Thứ 2 là giảm tải cho server, thứ 3 việc truy cập vào website để lấy dữ liệu tốc độ truy xuất sẽ nhanh hơn.

## Có mấy loại Web caching chính ?
    Có 3 loại cache chính là: Browser Cache, Proxy Cache, Gateway Cache

## Làm thế nào để sử dụng được Webcaching trong CI ?
    Để sử được caching chúng ta phải khai báo thư viện:
    $this->load->driver('cache');

## Sử dụng Webcaching trong CI như thế nào ?
    Sử dụng caching trong CI:
    + Sử dụng driver bằng cách khai báo:
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

    + Lưu giá trị vào cache:
        $this->cache->save('test', 'this is value', 300); //300 là thời gian lưu trữ (= 5 phút)

    + Lấy về giá trị đã lưu trữ vào cache:
        $test = $this->cache->get('test');

    + Kiểm tra hosting có support caching hay không:
        $this->cache->apc->is_supported(); //Trả về true or false

    + Xóa 1 giá trị đã lưu vào cache thông qua key
        $this->cache->delete('cache_item_id');

    + Làm sạch toàn bộ dữ liệu đã được lưu và cache
        $this->cache->clean(); //mặc định function sẽ trả về false

    + Lấy về thông tin của cache
        $this->cache->cache_info();

    + Lấy về thông tin mở rộng (metadata) của cache
        $this->cache->get_metadata('my_cached_item');

    + Đối với Memcached Caching cách làm cũng tương tự:
        //Lưu trữ dữ liệu vào cache thông qua key
        $this->cache->memcached->save('test', 'this is value', 300);

    + Caching đối với file:
        $this->cache->file->save('key', 'value', 300);

## Lưu ý khi sử dụng Webcaching trong CI ?
    + Nếu bạn muốn sử dụng caching toàn bộ controller thì sử dụng câu lệnh:
        $this->output->cache();

    + Thư mục lưu trữ cache trong CI là "system/cache" và để website có thể sử dụng được thì folder phải có quyền ghi.
        VD: mã quyền 0777

## Tổng quan
    Web caching là việc lưu trữ bản sao của những tài liệu web sao cho gần với người dùng,
    cả về mặt chức năng trong web client hoặc những web caching servers riêng biệt.
    Những mạng lưới web cache là việc kết hợp các servers với nhau thành một tổ chức mạng lưới Web caching đa cấp độ.









# Ticket 18660: Research about Controllers of CI Framework - Part 1

[![Build Status](http://192.168.0.18/research/)]

* [Website](https://www.framgia.com/)
* [Documentation](http://192.168.0.18/research/)
* [License](http://192.168.0.18/research/)
* Version: 2.2.3

## Miêu tả:
    "A Controller is simply a class file that is named in a way that can be associated with a URI.
    Consider this URI: example.com/index.php/blog/
    In the above example, CodeIgniter would attempt to find a controller named blog.php and load it."

## Code model My_Model để cho model kế thừa sử dụng lại sau này, một sô function cơ bản trong class My_Model
    /**
     *
     * @todo Provide short description.
     *
     * @param string $method
     * @param array $arguments
     * @return \MY_Model
     * @throws Exception
     */
    public function __call($method, $arguments)
    {
        $db_method = array($this->db, $method);
    
        if (is_callable($db_method))
        {
            $result = call_user_func_array($db_method, $arguments);
    
            if (is_object($result) && $result === $this->db)
            {
                return $this;
            }
    
            return $result;
        }
    
        throw new Exception("class '".get_class($this)."' does not have a method '".$method."'");
    }
    
    /**
     * Get table name
     *
     * @param boolean $prefix Whether the table name should be prefixed or not.
     * @return string
     */
    public function table_name($prefix = true)
    {
        return $prefix ? $this->db->dbprefix($this->_table) : $this->_table;
    }
    
    /**
     * Set table name
     *
     * @param string $name The name for the table.
     * @return string
     */
    public function set_table_name($name = null)
    {
        return $this->_table = $name;
    }
    
    /**
     * Get a single record by creating a WHERE clause with a value for your
     * primary key.
     *
     * 
     * @param string $id The value of your primary key
     * @return object
     */
    public function get($id)
    {
        return $this->db->where($this->primary_key, $id)
                        ->get($this->_table)
                        ->row();
    }
    
    /**
     * Get a single record by creating a WHERE clause with the key of $key and
     * the value of $val.
     *
     * @todo What are the ghost parameters this accepts?
     *
     * 
     * @return object
     */
    public function get_by($key = null, $value = null)
    {
        $where = func_get_args();
        $this->_set_where($where);
    
        return $this->db->get($this->_table)
                        ->row();
    }
    
    /**
     * Get many result objects in an array.
     *
     * Similar to get(), but returns a result array of many result objects.
     *
     * 
     * @param string $primary_value The value of your primary key
     * @return array
     */
    public function get_many($primary_value)
    {
        $this->db->where($this->primary_key, $primary_value);
        return $this->get_all();
    }
    
    /**
     * Similar to get_by(), but returns a result array of many result objects.
     *
     * The function accepts ghost parameters, fetched via func_get_args().
     * Those are:
     *  1. string `$key` The key to search by.
     *  2. string `$value` The value of that key.
     *
     * They are used in the query in the where statement something like:
     *   <code>[...] WHERE {$key}={$value} [...]</code>
     *
     * 
     * @return array
     */
    public function get_many_by()
    {
        $where = func_get_args();
        $this->_set_where($where);
    
        return $this->get_all();
    }


##  Tạo mới slider model để tương tác với cơ sở dữ liệu
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

## Tạo mới slider controller để xử lý cá request và điều hướng trang, một vài function cơ bản
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

## Chỉnh sửa lại code javascript lấy dữ liệu fill vào slider
    $.ajax({
        type: 'POST',
        url: '<?php echo(base_url());?>slide/get_slide_top',
        data: {album_slug: 'home-page-slider'},
        success: function(data){
            data = $.parseJSON(data);
            $.supersized({slides: data});
        },
        error: function(xhr){
            console.error(xhr.message);
        }
    });

## Database
    DROP TABLE IF EXISTS `research_albums`;
    CREATE TABLE `research_albums` (
      `id` int(6) NOT NULL AUTO_INCREMENT,
      `title` varchar(200) DEFAULT NULL,
      `slug` varchar(250) DEFAULT NULL,
      `status` bit(1) NOT NULL DEFAULT b'1',
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

    INSERT INTO `research_albums` VALUES ('1', 'Home Page Slider', 'home-page-slider', '');

    INSERT INTO `research_groups` VALUES ('1', 'admin', 'Administrator', '1');
    INSERT INTO `research_groups` VALUES ('2', 'user', 'User', '1');
    INSERT INTO `research_groups` VALUES ('3', 'spa', 'SPA', '1');
    INSERT INTO `research_groups` VALUES ('4', 'backpackers', 'City Backpackers ', '1');
    INSERT INTO `research_groups` VALUES ('5', 'grumpy', 'Grumpy Mole', '2');
    INSERT INTO `research_groups` VALUES ('6', 'vertu', 'Vertu', '1');








# Ticket 18658: Research about Template of CI Framework - Part 2

[![Build Status](http://192.168.0.18/research/)]

* [Website](https://www.framgia.com/)
* [Documentation](http://192.168.0.18/research/)
* [License](http://192.168.0.18/research/)
* Version: 2.2.3

## Miêu tả:
    1. The Template Parser Class enables you to parse pseudo-variables contained within your view files.
    2. It can parse simple variables or variable tag pairs.
    3. If you've never used a template engine, pseudo-variables look like this:


## Cơ bản những đoạn code chủ chốt trong commit
    1. Dùng để load metadata muốn import vào trang
       * <?php echo $this->load->view('layout/partials/metadata'); ?>

    2. Dùng để load header muốn import vào trang
       * <?php echo $this->load->view('layout/partials/header'); ?>

    3. Dùng để load menu muốn import vào trang
       * <?php echo $this->load->view('layout/partials/menu'); ?>

    4. Dùng để load slider muốn import vào trang
       * <?php echo $this->load->view('layout/partials/slider'); ?>

    5. Dùng để load content riêng biệt được hiển thị trên mỗi trang
       * <?php echo $content_layout; ?>

    6. Dùng để load footer muốn import vào trang
       * <?php echo $this->load->view('layout/partials/footer'); ?>

    7. Dùng để load copyright muốn import vào trang
       * <?php echo $this->load->view('layout/partials/copyright'); ?>

## Code dùng để lấy về dữ liệu dạng json từ server. Mảng dữ liệu để phục vụ cho hiển thị Slider
    <script type="text/javascript" >
        $(document).ready(function(){
            $.ajax({
                type: 'POST',
                url: '<?php echo(base_url());?>slide/get_slide_top',
                data: {album_slug: 'home-page-slider'},
                success: function(data){
                    data = $.parseJSON(data);
                    $.supersized({slides: data});
                },
                error: function(xhr){
                    console.error(xhr.message);
                }
            });
        });
    </script>

## Mỗi phần import ở trên sẽ load một file và chèn vào đúng vị trí view được load
    * Mỗi phần import ở trên sẽ load một file và chèn vào đúng vị trí view được load, file được import vào có thể có định dạng. Html và PHP, bên trong file import vẫn có thể
      viết code như bình thường, mọi giá trị gửi từ controller xuống đề nhận được.

## Cấu hình thư viện tự động load thay vì phải load từng trang một
    * $autoload['libraries'] = array('database', 'session', 'parser', 'layout');

## Partial file
    * research/application/views/layout/partials/copyright.php
    * research/application/views/layout/partials/footer.php
    * research/application/views/layout/partials/header.php
    * research/application/views/layout/partials/menu.php
    * research/application/views/layout/partials/metadata.php
    * research/application/views/layout/partials/slider.php

## Database
    DROP TABLE IF EXISTS `research_slides`;
    CREATE TABLE `research_slides` (
      `id` int(6) NOT NULL AUTO_INCREMENT,
      `name` varchar(100) NOT NULL,
      `title` varchar(100) DEFAULT NULL,
      `description` varchar(200) DEFAULT NULL,
      `image` varchar(200) DEFAULT NULL,
      `image_url` varchar(250) DEFAULT NULL,
      `link_to` varchar(200) DEFAULT NULL,
      `album_id` int(6) NOT NULL,
      `status` bit(1) NOT NULL DEFAULT b'1',
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
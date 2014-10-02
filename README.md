# Research about Template of CI Framework - Part 2

[![Build Status](http://192.168.0.18/research/)

* [Website](https://www.framgia.com/)
* [Documentation](http://192.168.0.18/research/)
* [License](http://192.168.0.18/research/)
* Version: 2.2.3

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
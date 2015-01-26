# Ticket 24804: Research for Image Manipulation Of CodeIgniter Framework - Part 1 + Part 2

[![Build Status](http://192.168.0.18/research/)]

* [Website](https://www.framgia.com/)
* [Documentation](http://192.168.0.18/research/)
* [License](http://192.168.0.18/research/)
* Version: 2.2.6

1. Image Manipulation là gì ?
    Image Manipulation là một thư viện ảnh và được cả 3 thư viện ảnh lớn GD/GD2, NetPBM và ImageMagick support.
    Nó giúp bạn dễ dàng thao tác với những file ảnh, những công việc Resizing, Cropping, Rotating ... trở lên
    dễ dàng hơn rất nhiều. Image Manipulation bao gồm 5 thành phần chính là:
        + Image Resizing
        + Thumbnail Creation
        + Image Cropping
        + Image Rotating
        + Image Watermarking

    Lưu ý: Hiện nay thì Watermarking làm việc ổn định nhất trên thư viện GD/GD2

2. Làm thế nào để sử dụng Image Manipulation ?

    Image Manipulation cũng giống như những thư viện khác trong CI, trước khi dùng cần dược khai báo để hệ thông
    có thể tải về những class cần thiết trước khi dùng, cú pháp khai báo giống hệt với những cú pháp load những
    thư viện khác:

    $this->load->library('image_lib');

    Sau khi load thư viện thì toàn bộ những function trong thư viện sẽ được nạp vào hệ thống đang chạy và chúng ta
    có thể dễ dàng truy xuất thông qua cách gọi: $this->image_lib->abc();

    abc() là tên function người dùng muốn gọi tron gói thư viện "image_lib"

    image_lib cung cấp khá đầy đủ những function để thao tác xử lý những yêu cầu thường gặp phải như thay đổi kích
    thước, cắt ảnh, xoay chiều hoặc đóng đấu, để sử dụng chắc năng resize chúng ta sử dụng như sau:

    $config['image_library'] = 'gd2';
    $config['source_image']	= '/path/to/image/mypic.jpg';
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width']	= 75;
    $config['height']	= 50;
    //Thiết lập config trước khi khởi tạo thư viện

    $this->load->library('image_lib', $config);
    //Load thư viện với thông số config truyền vào. Chúng ta có thể truyền param config vào sau khi
    //load thư viện

    $this->image_lib->resize();
    //Sử dụng function resize() để xử lý chức năng thay đổi kích thước file ảnh

    Trên đây là 1 ví dụ rất đơn giản để xử lý việc resize kích thước ảnh.

    Ngoài ra nó còn support những function sau:
    $this->image_lib->crop()
    //Hỗ trợ crop file ảnh

    $this->image_lib->rotate()
    //Hỗ trợ xoay ảnh

    $this->image_lib->watermark()
    //Hỗ trợ đóng dấu vào ảnh

    $this->image_lib->clear()
    //Xóa toàn bộ những config hiện tại


    Theo mặc định thì khi gọi hàm xử lý kết quả trả về kiểu dữ liệu boolean (true or false)
    if ( ! $this->image_lib->resize()){
        echo $this->image_lib->display_errors();
    }

    Trong trường hợp có lỗi thì thông tin liên quan đến lỗi sẽ tồn tại trong function:
    $this->image_lib->display_errors()


    * Ưu - nhược điểm ?
        - Ưu điểm:
             + Cú pháp dễ gọi, việc config khá dễ dàng thông array lúc load thư viện
             + Thư viện được viết dựa trên những plugin cài có sẵn trên những server hiện nay như: GD/GD2, NetPBM , ImageMagick...
             + Được viết lại và loại bỏ đi một số thành phần không cần thiết nên thư viện rất nhẹ. Khi bạn dùng thư viện thường thì ngay lúc khai báo
                image file được load luôn vào hệ thống, còn đối với image_lib thì khi nào dùng đến mới được load chứ không load luôn lúc khai báo
             + Hỗ trợ việc lưu resoure vào cache chính vì thế rất phù hợp với việc xử lý nhiều dữ liệu cùng một lúc, hạn chế chiếm tài nguyên của hệ thống
             + Hỗ trợ việc chuyển đổi, config tùy theo từng server support

        - Nhược điểm:
             + Watermarking hiện tại chỉ mới chạy ổn định trên GD/GD2
             + Còn hạn chế một số định dạng file đầu vào
             + Vẫn còn phải config khá nhiều trước khi gọi hàm xử lý
             + Một số loại font vẫn chưa hỗ trợ
             + Chất lượng ảnh vẫn không giữ được 100% sau khi convert (có thể chấp nhận được, vì giảm xuống không đáng kể)


3. Tùy chọn:

    Xin được trích dẫn nguyên bản, thông tin Preferences do tác giả đưa lên:

    + Tùy chọn cho xử lý đóng dấu ảnh:

        Preference	        Default Value	Options	Description
        wm_type	            text	        text, overlay	Sets the type of watermarking that should be used.
        source_image	    None	        None	Sets the source image name/path. The path must be a relative or absolute server path, not a URL.
        dynamic_output	    FALSE	        TRUE/FALSE (boolean)	Determines whether the new image file should be written to disk or generated dynamically. Note: If you choose the dynamic setting, only one image can be shown at a time, and it can't be positioned on the page. It simply outputs the raw image dynamically to your browser, along with image headers.
        quality	            90%	            1 - 100%	Sets the quality of the image. The higher the quality the larger the file size.
        padding	            None	        A number	The amount of padding, set in pixels, that will be applied to the watermark to set it away from the edge of your images.
        wm_vrt_alignment	bottom	        top, middle, bottom	Sets the vertical alignment for the watermark image.
        wm_hor_alignment	center	        left, center, right	Sets the horizontal alignment for the watermark image.
        wm_hor_offset	    None	        None	You may specify a horizontal offset (in pixels) to apply to the watermark position. The offset normally moves the watermark to the right, except if you have your alignment set to "right" then your offset value will move the watermark toward the left of the image.
        wm_vrt_offset	    None	        None	You may specify a vertical offset (in pixels) to apply to the watermark position. The offset normally moves the watermark down, except if you have your alignment set to "bottom" then your offset value will move the watermark toward the top of the image.


    + Tùy chọn liên quan đến Text

        Preference	        Default Value	Options	Description
        wm_text	None	    None	        The text you would like shown as the watermark. Typically this will be a copyright notice.
        wm_font_path	    None	        None	The server path to the True Type Font you would like to use. If you do not use this option, the native GD font will be used.
        wm_font_size	    16	            None	The size of the text. Note: If you are not using the True Type option above, the number is set using a range of 1 - 5. Otherwise, you can use any valid pixel size for the font you're using.
        wm_font_color	    ffffff	        None	The font color, specified in hex. Note, you must use the full 6 character hex value (ie, 993300), rather than the three character abbreviated version (ie fff).
        wm_shadow_color	    None	        None	The color of the drop shadow, specified in hex. If you leave this blank a drop shadow will not be used. Note, you must use the full 6 character hex value (ie, 993300), rather than the three character abbreviated version (ie fff).
        wm_shadow_distance	3	            None	The distance (in pixels) from the font that the drop shadow should appear.


    + Liên quan đến che phủ ảnh

        Preference	        Default Value	Options	Description
        wm_overlay_path	    None	        None	The server path to the image you wish to use as your watermark. Required only if you are using the overlay method.
        wm_opacity	        50	            1 - 100	Image opacity. You may specify the opacity (i.e. transparency) of your watermark image. This allows the watermark to be faint and not completely obscure the details from the original image behind it. A 50% opacity is typical.
        wm_x_transp	        4	            A number	If your watermark image is a PNG or GIF image, you may specify a color on the image to be "transparent". This setting (along with the next) will allow you to specify that color. This works by specifying the "X" and "Y" coordinate pixel (measured from the upper left) within the image that corresponds to a pixel representative of the color you want to be transparent.
        wm_y_transp	        4	            A number	Along with the previous setting, this allows you to specify the coordinate to a pixel representative of the color you want to be transparent.

4. Ví dụ:

   //Cơ bản:
   $config['image_library'] = 'gd2';
   $config['source_image']	= '/path/to/image/mypic.jpg';
   $config['create_thumb'] = TRUE;
   $config['maintain_ratio'] = TRUE;
   $config['width']	= 75;
   $config['height']	= 50;
   $this->load->library('image_lib', $config);
   $this->image_lib->resize();


    //Ví dụ có báo lỗi
    $config['image_library'] = 'imagemagick';
    $config['library_path'] = '/usr/X11R6/bin/';
    $config['source_image']	= '/path/to/image/mypic.jpg';
    $config['x_axis'] = '100';
    $config['y_axis'] = '60';

    $this->image_lib->initialize($config);

    if ( ! $this->image_lib->crop())
    {
        echo $this->image_lib->display_errors();
    }


    //Liên quan đến rotate()
    $config['image_library'] = 'netpbm';
    $config['library_path'] = '/usr/bin/';
    $config['source_image']	= '/path/to/image/mypic.jpg';
    $config['rotation_angle'] = 'hor';

    $this->image_lib->initialize($config);

    if ( ! $this->image_lib->rotate())
    {
        echo $this->image_lib->display_errors();
    }


    //Đóng dấu ảnh
    $config['source_image']	= '/path/to/image/mypic.jpg';
    $config['wm_text'] = 'Copyright 2006 - John Doe';
    $config['wm_type'] = 'text';
    $config['wm_font_path'] = './system/fonts/texb.ttf';
    $config['wm_font_size']	= '16';
    $config['wm_font_color'] = 'ffffff';
    $config['wm_vrt_alignment'] = 'bottom';
    $config['wm_hor_alignment'] = 'center';
    $config['wm_padding'] = '20';

    $this->image_lib->initialize($config);

    $this->image_lib->watermark();









# Ticket 22376: Research for Form Validation Of CI - Part 1 + Part 2

[![Build Status](http://192.168.0.18/research/)]

* [Website](https://www.framgia.com/)
* [Documentation](http://192.168.0.18/research/)
* [License](http://192.168.0.18/research/)
* Version: 2.2.5

1. Overview
- Việc validate form là việc không thể thiếu trong lập trình Web. Có rất nhiều cách để validate dữ liệu, chúng ta hay gặp nhất là validate trên máy khách (client) kỹ thuật này sử dụng javascript để bắt lỗi dữ liệu do người dùng nhập vào. Cách tiếp theo là chúng ta có thể bắt lỗi dữ liệu trên server, một cách nữa cũng được sử dụng nhiều trong các ứng dụng lớn là bắt lỗi trên sql server (sử dụng trigger để validate dữ liệu trước khi được insert vào db).

- Javascript: Ưu điểm của kỹ thuật này là thuân thiện với người dùng, không cần phải gửi request lên server, giảm tải cho server, người dùng không cần phải chờ đợi mà có kết quả luôn. Nhược điểm của kỹ thuật này là người dùng có thể vô hiệu hóa javascript của trình duyệt như vậy dữ liệu chưa được validate vẫn có thể gửi thẳng lên server, hacker có thể gửi kèm những mã độc để tấn công website của chúng ta.

- PHPServer: để khắc phục những nhược điểm của việc bắt lỗi bằng javascript, công nghệ validate trên server đã ra đời, việc bắt lỗi trên phía server sẽ đảm bảo dữ liệu nhập vào từ form đúng định dạng với yêu cầu của hệ thống và sẽ loại bỏ những mã độc mà người dùng cho vào. Ưu điểm của phương pháp này là validate được thực hiện bên phía server chính vì vậy dù dữ liệu được gửi đi từ client không hợp lệ cũng không lo vì dữ liệu sẽ được validate thêm một lần nữa bên phía server trước khi được lưu vào db. Người dùng không thể can thiệp vào server để tắt phần validate đi được. Nhược điểm của kỹ thuật này là sẽ thêm xử lý cho phía server, muốn validate được thì bắt buộc phải submit dữ liệu lên server, người dùng phải mất một khoảng thời gian ngắn để đợi chờ kết quả trả về từ phía server (kém thân thiện như cách bắt lỗi bằng javascript)

- Để đơn giản hóa việc validate dữ liệu trên server thì CodeIgniter đã đưa ra thư viện "form_validation" support việc validate. Thư viện được viết trên ngôn ngữ PHP và có thể mở rộng cũng như custom cả về RegEx và message hoặc bạn có thể tao ra những RegEx của riêng.


2. How Does Validation Work ?
Để sủ dụng được thư viện form_validation thì chúng ta phải load thư viện:
+ Sử dụng câu lệnh:
$this->load->library('form_validation');

+ Custom một số message lỗi nếu bạn không thích message mặc định của hệ thống:
$this->form_validation->set_message('required', $this->lang->line('required'));
$this->form_validation->set_message('valid_email', $this->lang->line('invalid-email'));
$this->form_validation->set_message('matches', $this->lang->line('matches'));

+ Form dữ liệu bên phái client hoàn toàn dùng các thẻ HTML như các form bình thường khác:
<form id="RegisterForm" action="localhost/liemdemo/register" method="post">

<h5>Username</h5>
<input type="text" name="username" value="" size="50" />

<h5>Password</h5>
<input type="text" name="password" value="" size="50" />

<h5>Password Confirm</h5>
<input type="text" name="passconf" value="" size="50" />

<h5>Email Address</h5>
<input type="text" name="email" value="" size="50" />

<div><input type="submit" value="Submit" /></div>

</form>

+ Để hiển thị tin nhắn thông báo cho người dùng thì chúng ta sử dụng
<?php echo validation_errors(); ?>

+ Thiết lập các rule cho dữ liệu được gửi lên server:
$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean');
$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]|md5');
$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

+ Ngoài cách thiết lập ở trên ra thì chúng ta có thể thiết lập theo array như sau:
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

+ Sau khi thiết lập rule thì chúng ta sẽ bắt lỗi validate bằng lệnh sau:
if ($this->form_validation->run() == FALSE){
      $this->load->view('error'); //Hiển thị thông tin lỗi ra file view
}
//Nếu data hợp lệ thì sẽ đi tiếp

+ Mộ số quy tắc, lưu ý:
* + required: Bắt buộc phải nhập giá trị.
* + min_legth : Độ dài tối thiểu của trường, nếu nhỏ hơn thì hệ thống sẽ báo lỗi.
* + max_legth : Độ dài tối đa của trường, nếu lớn hơn thì hệ thống sẽ báo lỗi.
* + trim : Gọi đến hàm trim của PHP, để xóa bỏ các ký tự trắng ở đầu và cuối của giá trị nhập vào form. Mục đích an toàn của hệ thống.
* + xss_clean : Đẩy dữ liệu nhập vào qua bộ lọc XSS, nhằm loại bỏ các dữ liệu độc hại. Mục đích an toàn của hệ thống.
* + md5 : Chuyển đổi dữ liệu bằng phương thức MD5, thường dùng cho trường mật khẩu.
* + matches[attRef] : Kiểm tra xem giá trị của trường hiện tại có trùng với trường tham số - attRef hay không, thường dùng cho việc xác nhận mật khẩu.
* + callback_tên_hàm : Hàm callback giúp kiểm tra thêm điều kiện mà ta tự định nghĩa.
- Hàm run(() trong thư viện validate form trên CodeIgniter nhằm thực hiện việc validate, trả về TRUE nếu các quy tắc thực hiện thành công, ngược lại là FALSE.


3. Rule Reference
Dưới đây là một số rule cho việc validate sử dụng CI. Tôi xin được giữ nguyên bản (vì nhiều từ để nguyên còn dễ hiểu hơn là dịch)

Rule	        Parameter	     Description
required	No	             Returns FALSE if the form element is empty.
matches	        Yes	             Returns FALSE if the form element does not match the one in the parameter.	matches[form_item]
is_unique	Yes	             Returns FALSE if the form element is not unique to the table and field name in the parameter.	is_unique[table.field]
min_length	Yes	             Returns FALSE if the form element is shorter then the parameter value.	min_length[6]
max_length	Yes	             Returns FALSE if the form element is longer then the parameter value.	max_length[12]
exact_length	Yes	             Returns FALSE if the form element is not exactly the parameter value.	exact_length[8]
greater_than	Yes	             Returns FALSE if the form element is less than the parameter value or not numeric.	greater_than[8]
less_than	Yes	             Returns FALSE if the form element is greater than the parameter value or not numeric.	less_than[8]
alpha	        No	             Returns FALSE if the form element contains anything other than alphabetical characters.
alpha_numeric	No	             Returns FALSE if the form element contains anything other than alpha-numeric characters.
alpha_dash	No	             Returns FALSE if the form element contains anything other than alpha-numeric characters, underscores or dashes.
numeric	        No	             Returns FALSE if the form element contains anything other than numeric characters.
integer	        No	             Returns FALSE if the form element contains anything other than an integer.
decimal	        No	             Returns FALSE if the form element contains anything other than a decimal number.
is_natural	No	             Returns FALSE if the form element contains anything other than a natural number: 0, 1, 2, 3, etc.
is_natural_no_zero   No	             Returns FALSE if the form element contains anything other than a natural number, but not zero: 1, 2, 3, etc.
valid_email	No	             Returns FALSE if the form element does not contain a valid email address.
valid_emails	No	             Returns FALSE if any value provided in a comma separated list is not a valid email.
valid_ip	No	             Returns FALSE if the supplied IP is not valid. Accepts an optional parameter of "IPv4" or "IPv6" to specify an IP format.
valid_base64	No	             Returns FALSE if the supplied string contains anything other than valid Base64 characters.


4. Example
File: View.php

<html>
<head>
<title>My Form</title>
</head>
<body>
<?php echo validation_errors(); ?>
<?php echo form_open('form'); ?>
<h5>Username</h5>
<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />
<h5>Password</h5>
<input type="text" name="password" value="<?php echo set_value('password'); ?>" size="50" />
<h5>Password Confirm</h5>
<input type="text" name="passconf" value="<?php echo set_value('passconf'); ?>" size="50" />
<h5>Email Address</h5>
<input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />
<div><input type="submit" value="Submit" /></div>
</form>
</body>
</html>

File: UserController.php
<?php
class Form extends CI_Controller {

	public function index()
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'callback_username_check');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');

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
?>




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
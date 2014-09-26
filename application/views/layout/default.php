<!DOCTYPE html>
<html>
<head>
    <!-- Metadata -->
    <?php echo $this->load->view('layout/partials/metadata'); ?>
    <!-- /Metadata -->
</head>
<body id="top" class="bgded fixed">
    <!-- Header -->
    <?php echo $this->load->view('layout/partials/header'); ?>
    <!-- /Header -->
    <!-- Menu -->
    <?php echo $this->load->view('layout/partials/menu'); ?>
    <!-- /Menu -->
    <!-- Slider -->
    <?php echo $this->load->view('layout/partials/slider'); ?>
    <!-- /Slider -->
    <?php echo $content_layout; ?>
    <!-- Footer -->
    <?php echo $this->load->view('layout/partials/footer'); ?>
    <!-- /Footer -->
    <!-- Copyright -->
    <?php echo $this->load->view('layout/partials/copyright'); ?>
    <!-- /Copyright -->
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

        /*jQuery(function ($) {
            $.supersized({
                slides: [{
                    image: '<?php //echo(base_url());?>public/images/demo/slider/1.jpg',
                    title: '<span class="heading">Overlay text for image 1</span>smaller subline text, <a href="#">view here</a>'
                }, {
                    image: '<?php //echo(base_url());?>public/images/demo/slider/2.jpg',
                    title: '<span class="heading">Overlay text for image 2</span>smaller subline text, <a href="#">view here</a>'
                }, {
                    image: '<?php //echo(base_url());?>public/images/demo/slider/3.jpg',
                    title: '<span class="heading">Overlay text for image 3</span>smaller subline text, <a href="#">view here</a>'
                }]
            });
        });*/
    </script>
</body>
</html>
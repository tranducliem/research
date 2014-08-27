<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{blog_title}</title>
    <link href="<?php echo(base_url());?>public/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top" class="bgded fixed" style="background-image:url('<?php echo(base_url());?>public/images/demo/backgrounds/background_1.jpg');">
<!-- ################################################################################################ -->
<div class="wrapper row0">
    <header id="header" class="clear">
        <!-- ################################################################################################ -->
        <div id="logo">
            <h1><a href="index.html">{blog_heading}</a></h1>
            <p>Urna sit amet pulvinar dapibus, dui leo egestas augue</p>
        </div>
        <!-- ################################################################################################ -->
    </header>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row1">
    <nav id="mainav" class="clear">
        <!-- ################################################################################################ -->
        <ul class="clear">
            <li class="active"><a href="index.html">Home</a></li>
            <li><a class="drop" href="#">Pages</a>
                <ul>
                    <li><a href="pages/gallery.html">Gallery</a></li>
                    <li><a href="pages/full-width.html">Full Width</a></li>
                    <li><a href="pages/sidebar-left.html">Sidebar Left</a></li>
                    <li><a href="pages/sidebar-right.html">Sidebar Right</a></li>
                </ul>
            </li>
            <li><a class="drop" href="#">Dropdown</a>
                <ul>
                    <li><a href="#">Level 2</a></li>
                    <li><a class="drop" href="#">Level 2 + Drop</a>
                        <ul>
                            <li><a href="#">Level 3</a></li>
                            <li><a href="#">Level 3</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="#">Link Text</a></li>
            <li><a href="#">Link Text</a></li>
        </ul>
        <!-- ################################################################################################ -->
    </nav>
</div>
<!-- ################################################################################################ -->
<div class="wrapper">
    <div id="slider">
        <!-- ############################################################################################################# -->
        <div id="slidewrap">
            <div class="heading"><span id="slidecaption"></span></div>
        </div>
        <!-- ############################################################################################################# -->
    </div>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row3">
    <main id="container" class="clear">
        <!-- container body -->
        <!-- ########################################################################################## -->
        <ul class="nospace center clear">
            <li class="one_third first"><a href="#"><img class="circle pad5 borderedbox push30" src="<?php echo(base_url());?>public/images/demo/gallery/b1.jpg" alt=""></a>
                <h6 class="push10">Blandit elementum</h6>
                <p class="nospace push10">Integer imperdiet vestibulum leo ut tincidunt in sagittis.</p>
                <p class="nospace"><a href="#">Read more &raquo;</a></p>
            </li>
            <li class="one_third"><a href="#"><img class="circle pad5 borderedbox push30" src="<?php echo(base_url());?>public/images/demo/gallery/b2.jpg" alt=""></a>
                <h6 class="push10">Blandit elementum</h6>
                <p class="nospace push10">Integer imperdiet vestibulum leo ut tincidunt in sagittis.</p>
                <p class="nospace"><a href="#">Read more &raquo;</a></p>
            </li>
            <li class="one_third"><a href="#"><img class="circle pad5 borderedbox push30" src="<?php echo(base_url());?>public/images/demo/gallery/b3.jpg" alt=""></a>
                <h6 class="push10">Blandit elementum</h6>
                <p class="nospace push10">Integer imperdiet vestibulum leo ut tincidunt in sagittis.</p>
                <p class="nospace"><a href="#">Read more &raquo;</a></p>
            </li>

            {blog_entries}

            {/blog_entries}
        </ul>
        <!-- ########################################################################################## -->
        <!-- / container body -->
        <div class="clear"></div>
    </main>
</div>

<!-- ################################################################################################ -->
<div class="wrapper row4">
    <footer id="footer" class="clear">
        <!-- ################################################################################################ -->
        <div class="one_third first">
            <h6 class="title">Lorem ipsum dolor</h6>
            <address class="push30">
                Company Name<br>
                Street Name &amp; Number<br>
                Town<br>
                Postcode/Zip
            </address>
            <ul class="nospace">
                <li class="push10"><span class="icon-time"></span> Mon. - Fri. 9:00am - 7:00pm</li>
                <li class="push10"><span class="icon-phone"></span> +00 (123) 456 7890</li>
                <li><span class="icon-envelope-alt"></span> info@domain.com</li>
            </ul>
        </div>
        <div class="one_third">
            <h6 class="title">Lorem ipsum dolor</h6>
            <ul class="nospace clear">
                <li class="clear push30">
                    <div class="imgl"><img src="<?php echo(base_url());?>public/images/demo/80x80.gif" alt=""></div>
                    <p class="nospace push15">Integer imperdiet vestibulum leo ut tincidunt in sagittis.</p>
                    <p class="nospace"><a href="#">Read more &raquo;</a></p>
                </li>
                <li class="clear">
                    <div class="imgl"><img src="<?php echo(base_url());?>public/images/demo/80x80.gif" alt=""></div>
                    <p class="nospace push15">Integer imperdiet vestibulum leo ut tincidunt in sagittis.</p>
                    <p class="nospace"><a href="#">Read more &raquo;</a></p>
                </li>
            </ul>
        </div>
        <div class="one_third">
            <h6 class="title">Lorem ipsum dolor</h6>
            <ul class="nospace clear ftgal">
                <li class="one_third first"><a href="#"><img src="<?php echo(base_url());?>public/images/demo/100x100.gif" alt=""></a></li>
                <li class="one_third"><a href="#"><img src="<?php echo(base_url());?>public/images/demo/100x100.gif" alt=""></a></li>
                <li class="one_third"><a href="#"><img src="<?php echo(base_url());?>public/images/demo/100x100.gif" alt=""></a></li>
                <li class="one_third first"><a href="#"><img src="<?php echo(base_url());?>public/images/demo/100x100.gif" alt=""></a></li>
                <li class="one_third"><a href="#"><img src="<?php echo(base_url());?>public/images/demo/100x100.gif" alt=""></a></li>
                <li class="one_third"><a href="#"><img src="<?php echo(base_url());?>public/images/demo/100x100.gif" alt=""></a></li>
            </ul>
        </div>
        <!-- ################################################################################################ -->
    </footer>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row5">
    <div id="copyright" class="clear">
        <!-- ################################################################################################ -->
        <p class="fl_left">Copyright &copy; 2014 - All Rights Reserved - <a href="#">Domain Name</a></p>
        <p class="fl_right">Template by <a target="_blank" href="#" title="Liem Framgia">Liem Framgia</a></p>
        <!-- ################################################################################################ -->
    </div>
</div>
<!-- JAVASCRIPTS -->
<!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> -->
<script src="<?php echo(base_url());?>public/layout/scripts/jquery-latest.min.js"></script>
<!-- Homepage Slider -->
<script src="<?php echo(base_url());?>public/layout/scripts/supersized/supersized.min.js"></script>
<script>
    jQuery(function ($) {
        $.supersized({
            slides: [{
                image: '<?php echo(base_url());?>public/images/demo/slider/1.jpg',
                title: '<span class="heading">Overlay text for image 1</span>smaller subline text, <a href="#">view here</a>'
            }, {
                image: '<?php echo(base_url());?>public/images/demo/slider/2.jpg',
                title: '<span class="heading">Overlay text for image 2</span>smaller subline text, <a href="#">view here</a>'
            }, {
                image: '<?php echo(base_url());?>public/images/demo/slider/3.jpg',
                title: '<span class="heading">Overlay text for image 3</span>smaller subline text, <a href="#">view here</a>'
            }]
        });
    });
</script>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Ngoc Quang
 * Date: 12/3/2018
 * Time: 12:10 PM
 */?>
        <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <base href="{{asset('public/layout/frontend')}}/">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>CMS Shop | @yield('title')</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">var scrolltotop={setting:{startline:100,scrollto:0,scrollduration:1e3,fadeduration:[500,100]},controlHTML:'<img src="https://i1155.photobucket.com/albums/p559/scrolltotop/arrow50.png" />',controlattrs:{offsetx:5,offsety:5},anchorkeyword:"#top",state:{isvisible:!1,shouldvisible:!1},scrollup:function(){this.cssfixedsupport||this.$control.css({opacity:0});var t=isNaN(this.setting.scrollto)?this.setting.scrollto:parseInt(this.setting.scrollto);t="string"==typeof t&&1==jQuery("#"+t).length?jQuery("#"+t).offset().top:0,this.$body.animate({scrollTop:t},this.setting.scrollduration)},keepfixed:function(){var t=jQuery(window),o=t.scrollLeft()+t.width()-this.$control.width()-this.controlattrs.offsetx,s=t.scrollTop()+t.height()-this.$control.height()-this.controlattrs.offsety;this.$control.css({left:o+"px",top:s+"px"})},togglecontrol:function(){var t=jQuery(window).scrollTop();this.cssfixedsupport||this.keepfixed(),this.state.shouldvisible=t>=this.setting.startline?!0:!1,this.state.shouldvisible&&!this.state.isvisible?(this.$control.stop().animate({opacity:1},this.setting.fadeduration[0]),this.state.isvisible=!0):0==this.state.shouldvisible&&this.state.isvisible&&(this.$control.stop().animate({opacity:0},this.setting.fadeduration[1]),this.state.isvisible=!1)},init:function(){jQuery(document).ready(function(t){var o=scrolltotop,s=document.all;o.cssfixedsupport=!s||s&&"CSS1Compat"==document.compatMode&&window.XMLHttpRequest,o.$body=t(window.opera?"CSS1Compat"==document.compatMode?"html":"body":"html,body"),o.$control=t('<div id="topcontrol">'+o.controlHTML+"</div>").css({position:o.cssfixedsupport?"fixed":"absolute",bottom:o.controlattrs.offsety,right:o.controlattrs.offsetx,opacity:0,cursor:"pointer"}).attr({title:"Scroll to Top"}).click(function(){return o.scrollup(),!1}).appendTo("body"),document.all&&!window.XMLHttpRequest&&""!=o.$control.text()&&o.$control.css({width:o.$control.width()}),o.togglecontrol(),t('a[href="'+o.anchorkeyword+'"]').click(function(){return o.scrollup(),!1}),t(window).bind("scroll resize",function(t){o.togglecontrol()})})}};scrolltotop.init();</script>
    <noscript>Not seeing a <a href="https://www.scrolltotop.com/">Scroll to Top Button</a>? Go to our FAQ page for more info.</noscript>

    <script type="text/javascript">
        $(function() {
            var pull        = $('#pull');
            menu        = $('nav ul');
            menuHeight  = menu.height();

            $(pull).on('click', function(e) {
                e.preventDefault();
                menu.slideToggle();
            });
        });

        $(window).resize(function(){
            var w = $(window).width();
            if(w > 320 && menu.is(':hidden')) {
                menu.removeAttr('style');
            }
        });
    </script>
</head>
<body>
<!-- header -->
<header id="header">
    <div class="container">
        <div class="row">
            <div id="logo" class="col-md-3 col-sm-12 col-xs-12">
                <h1>
                    <a href="{{asset('/')}}"><img src="img/home/logo-cms.png"></a>
                    <nav><a id="pull" class="btn btn-danger" href="#">
                            <i class="fa fa-bars"></i>
                        </a></nav>
                </h1>
            </div>
            <div id="search" class="col-md-7 col-sm-12 col-xs-12">
                <form method="get" action="{{asset('search/')}}">
                    <div class="input-group">
                        <div class="input-group-btn form-group">
                            <input required type="text" name="result" class="btn btn-default" placeholder="Nhập từ khóa...">
                        </div>
                        <div class="input-group-btn form-group">
                             <input type="submit" name="submit" class="btn btn-default" value="Tìm Kiếm">
                          </div>
                      </div>
                  </form>
              </div>
              <div id="cart" class="col-md-2 col-sm-12 col-xs-12">
                  <a class="display" href="{{asset('cart/show')}}">Giỏ hàng</a>
                  <a href="{{asset('cart/show')}}">{{Cart::count()}}</a>
              </div>
          </div>
      </div>
  </header><!-- /header -->
<!-- endheader -->

<!-- main -->
<section id="body">
    <div class="container">
        <div class="row">
            <div id="sidebar" class="col-md-3">
                <nav id="menu">
                    <ul>
                        <li class="menu-item">danh mục sản phẩm</li>
                        @foreach($categories as $cate)
                        <li class="menu-item"><a href="{{asset('category/'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}" title="">{{$cate->cate_name}}</a></li>
                        @endforeach
                    </ul>
                    <!-- <a href="#" id="pull">Danh mục</a> -->
                </nav>

                <div id="banner-l" class="text-center">
                    <div class="banner-l-item">
                        <a href="#"><img src="img/home/banner-l-1.png" alt="" class="img-thumbnail"></a>
                    </div>
                    <div class="banner-l-item">
                        <a href="#"><img src="img/home/banner-l-2.png" alt="" class="img-thumbnail"></a>
                    </div>
                    <div class="banner-l-item">
                        <a href="#"><img src="img/home/banner-l-3.png" alt="" class="img-thumbnail"></a>
                    </div>
                    <div class="banner-l-item">
                        <a href="#"><img src="img/home/banner-l-4.png" alt="" class="img-thumbnail"></a>
                    </div>
                    <div class="banner-l-item">
                        <a href="#"><img src="img/home/banner-l-5.png" alt="" class="img-thumbnail"></a>
                    </div>
                    <div class="banner-l-item">
                        <a href="#"><img src="img/home/banner-l-6.png" alt="" class="img-thumbnail"></a>
                    </div>
                    <div class="banner-l-item">
                        <a href="#"><img src="img/home/banner-l-7.png" alt="" class="img-thumbnail"></a>
                    </div>
                </div>
            </div>

            <div id="main" class="col-md-9">
                <!-- main -->
                <!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
                <div id="slider">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/home/slide-1.png" alt="Los Angeles" >
                            </div>
                            <div class="carousel-item">
                                <img src="img/home/slide-2.png" alt="Chicago">
                            </div>
                            <div class="carousel-item">
                                <img src="img/home/slide-3.png" alt="New York" >
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>

                <div id="banner-t" class="text-center">
                    <div class="row">
                        <div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
                            <a href="#"><img src="img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
                        </div>
                        <div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
                            <a href="#"><img src="img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
                        </div>
                    </div>
                </div>
                <div id="wrap-inner">
                <!--Wrap-inner-->
                    @yield('main')
                </div>

            </div>
        </div>
    </div>
</section>
<!-- endmain -->

<!-- footer -->
<footer id="footer">
    <div id="footer-t">
        <div class="container">
            <div class="row">
                <div id="logo-f" class="col-md-3 col-sm-12 col-xs-12 text-center">
                    <a href="{{asset('/')}}"><img src="img/home/logo-cms.png"></a>
                </div>
                <div id="about" class="col-md-3 col-sm-12 col-xs-12">
                    <h3>About us</h3>
                    <p class="text-justify">CMS Shop thành lập năm 2009. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque corporis temporibus veritatis nam vero obcaecati dolor, iure rerum, modi quasi..</p>
                </div>
                <div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
                    <h3>Hotline</h3>
                    <p>Phone Sale: (+84) 0968 795 507</p>
                    <p>Email: cmsshop@gmail.com</p>
                </div>
                <div id="contact" class="col-md-3 col-sm-12 col-xs-12">
                    <h3>Contact Us</h3>
                    <p>Address 1: 308 - Minh Khai - Hai  Bà Trưng - Hà Nội</p>
                    <p>Address 2: Số 25 Ngõ 178/71 - Tây Sơn Đống Đa - Hà Nội</p>
                </div>
            </div>
        </div>
        <div id="footer-b">
            <div class="container">
                <div class="row">
                    <div id="footer-b-l" class="col-md-6 col-sm-12 col-xs-12 text-center">
                        <p>Cửa hàng điện thoại chính hãng CMS Shop - www.cms.edu.vn</p>
                    </div>
                    <div id="footer-b-r" class="col-md-6 col-sm-12 col-xs-12 text-center">
                        <p>© 2017 CMS Shop Academy. All Rights Reserved</p>
                    </div>
                </div>
            </div>
            <div id="scroll">
               <!-- <a href="#"><img src="img/home/scroll.png"></a>-->
            </div>
        </div>
    </div>
</footer>
<!-- endfooter -->
</body>
</html>

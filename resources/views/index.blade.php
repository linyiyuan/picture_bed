<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/assets/img//apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('/assets/img/cosmosplanet.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Shmily的相册
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     字体和图标     -->
    <link href="{{ asset('/assets/css/fonts-googleapis.css') }}" rel="stylesheet" />
    <link href="{{ asset('/font-awesome4.7/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- CSS文件 -->
    <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/paper-kit.css?v=2.2.0') }}" rel="stylesheet" />
    <!--引入自己CSS-->
    <link href="{{ asset('/assets/css/my_settings.css') }}" rel="stylesheet" />
    <!-- 仅用于演示的CSS，不要将其包含在项目中 -->
    <link href="{{ asset('/assets/demo/demo.css') }}" rel="stylesheet" />
    <script src="{{ asset('/assets/js/iconfont.js') }}"></script>
    <style type="text/css">
        .dropdown {
            display: none;
        }
    </style>
</head>

<body class="index-page sidebar-collapse">
<!-- 导航栏开始 -->
<nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
    <div class="container">
        <div class="navbar-translate">
            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <button type="button" class="btn btn-info btn-round" onclick="enter_blog()">
                        <i class="fa fa-heart"></i>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">进入相册</font>
                        </font>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- 导航栏结束 -->
<div class="page-header section-dark" style="background-image: url('https://shmily-album.oss-cn-shenzhen.aliyuncs.com/system_image/2160x1920_DICE_08.jpg')">
    <div class="filter"></div>
    <div class="content-center">
        <div class="container">
            {{--<div class="title-brand">--}}
                {{--<div class="fog-low">--}}
                    {{--<img src="{{ asset('/assets/img/fog-low.png') }}" alt="">--}}
                {{--</div>--}}
                {{--<div class="fog-low right">--}}
                    {{--<img src="{{ asset('/assets/img/fog-low.png') }}" alt="">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<h2 class="presentation-subtitle text-center">假如人生是一场游戏</h2>--}}
            {{--<h2 class="presentation-subtitle text-center">你会选择什么样的角色呢</h2>--}}
        </div>
    </div>
    <div class="moving-clouds" style="background-image: url('{{ asset('/assets/img/clouds.png') }}'); "></div>
    <h6 class="category category-absolute"></h6>
</div>
</body>
<!--   核心JS文件   -->
<script src="{{ asset('/assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
<!--  开关插件，完整的文档如下：http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{ asset('/assets/js/plugins/bootstrap-switch.js') }}"></script>
<!--  Sliders插件，完整文档如下：http://refreshless.com/nouislider/ -->
<script src="{{ asset('/assets/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
<!--  pplugin用于日期选取器，完整文档如下：https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="{{ asset('/assets/js/plugins/moment.min.js') }}"></script>
<script src="{{ asset('/assets/js/plugins/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<!-- 工具箱控制中心：视差效果、示例页面脚本等 -->
<script src="{{ asset('/assets/js/paper-kit.js?v=2.2.0') }}" type="text/javascript"></script>
<script type="text/javascript">
    function enter_blog() {
        window.location.href = "{{url('/photo_list')}}";
    }
</script>

</html>
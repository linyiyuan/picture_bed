@include('common.header')

@section('style')

@show

@section('header')
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="/" rel="tooltip" title="Coded by Creative Tim"
                   data-placement="bottom" target="_blank">
                    Shmily的相册
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <ul class="navbar-nav">
                    <li class="dropdown nav-item">
                    <li class="dropdown nav-item">
                        <a class="nav-link" href="{{ url('/personal') }}">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">关于我</font>
                            </font>
                        </a>
                    </li>
                    <li class="dropdown nav-item">
                        <a class="nav-link" href="http://linyiyuan.github.io" target="_blank" >
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">前往博客</font>
                            </font>
                        </a>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-info btn-round" onclick="enter_blog()">
                            <i class="fa fa-heart"></i>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">返回主页</font>
                            </font>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@show

@yield('content')

@section('footer')
    <footer class="footer footer-black  footer-white ">
        <div class="container">
            <div class="row">
                <nav class="footer-nav">
                    <ul>
                        <li>
                            <a href="https://github.com/linyiyuan" target="_blank">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Github</font>
                                </font>
                            </a>
                        </li>
                        <li>
                            <a href="http://linyiyuan.github.io/" target="_blank">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">博客</font>
                                </font>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.creative-tim.com/license" target="_blank">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">许可证</font>
                                </font>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="credits ml-auto">
                    <span class="copyright">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                                ©
                            </font>
                        </font>
                        <script>
                        document.write(new Date().getFullYear())
                        </script>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">2019，用</font>
                        </font><i class="fa fa-heart heart"></i>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;"> 创意蒂姆
                            </font>
                        </font>
                    </span>
                </div>
            </div>
        </div>
    </footer>
@show

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
    <!-- 图片放大所需的JS-->
    <script src="{{ asset('/assets/fancybox/jquery.fancybox.min.js') }}"> </script>
    <script type="text/javascript">
        function enter_blog() {
            window.location.href = "{{url('/photo_list')}}";
        }
    </script>
</html>

@section('javascript')
@show
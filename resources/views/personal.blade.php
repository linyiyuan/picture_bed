@extends('common.common')

@section('content')
    <div class="container pt-5">
        <div class="title">
            <blockquote class="blockquote text-right">
                <p class="mb-0">20岁的年龄多会一门技能，三十岁就会少跪地求人一次</p>
                <footer class="blockquote-footer">《林氏语录》
                    <cite title="Source Title">Choice→選</cite>
                </footer>
            </blockquote>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="card card-profile">
                    <div class="card-cover" style="background-image: url('https://shmily-album.oss-cn-shenzhen.aliyuncs.com/system_image/2160x1920_DICE_08.jpg')">
                    </div>
                    <div class="card-avatar border-white">
                        <a href="#avatar">
                            <img src="https://shmily-album.oss-cn-shenzhen.aliyuncs.com/system_image/34758948.jpg" alt="...">
                        </a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Choice→選</font>
                            </font>
                        </h4>
                        <h6 class="card-category">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">PHP开发工程师</font>
                            </font>
                        </h6>
                        <p class="card-description">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">喜欢悠闲独自在</font><br>
                                <font style="vertical-align: inherit;">You still have lots to work on
                                </font>
                            </font>
                        </p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="javascript:void(0);" class="btn btn-just-icon btn-outline-info" data-html="true" data-toggle="tooltip" data-placement="top" title="<span class='h6 text-info'>QQ:375133100</span>" data-clipboard-action="copy" data-clipboard-text="375133100" id="copy_qq">
                            <i class="fa fa-qq" aria-hidden="true"></i>
                        </a>
                        <a href="#paper-kit" class="btn btn-just-icon btn-outline-success" data-html="true" data-toggle="tooltip" data-placement="top" title="<span class='h6 text-success'>微信:13211035441</span>" data-clipboard-action="copy" data-clipboard-text="13211035441" id="copy_wx">
                            <i class="fa fa-wechat" aria-hidden="true" data-clipboard-action="copy" data-clipboard-target="#copy_wx"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul id="tabs" class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">个人简介</font>
                                    </font>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">技能提升</font>
                                    </font>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#messages" role="tab">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">兴趣爱好</font>
                                    </font>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="my-tab-content" class="tab-content text-center">
                    <div class="tab-pane active" id="home" role="tabpanel" style="text-align: left; margin-bottom: 40px">
                        <div class="bd-callout">
                            <h4 id="data-attributes-for-individual-tooltips">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">这里是关于我的自我介绍</font>
                                </font>
                            </h4>
                            <p>
                                ---- 想要快速提升自己，就去做自己内心最害怕的事
                            </p>
                        </div>
                        <h3 style="margin-bottom: 10px">关于我</h3>
                        <p style="margin-bottom: 15px"><font style="vertical-align: inherit;">PHP狂热爱好者</font></p>
                        <p style="margin-bottom: 15px"><font style="vertical-align: inherit;">开源爱好者，喜欢逛开源社区，阅读源代码</font><br></p>
                        <p style="margin-bottom: 15px"><font style="vertical-align: inherit;">擅于利用 Google SegmentFault Stack Overflow 解决各类问题</font><br></p>
                        <p style="margin-bottom: 15px"><font style="vertical-align: inherit;">拥有代码洁癖，喜欢条理性，逻辑性的代码, 合理的注释合理的TODO</font><br></p>
                        <p style="margin-bottom: 15px"><font style="vertical-align: inherit;">不折不扣的极客精神, 进新技术永远保持着好奇心</font><br></p>
                        <p style="margin-bottom: 15px"><font style="vertical-align: inherit;">极快的学习能力以及适应能力，能够短时间熟悉新事物</font><br></p>

                        <div></div>
                        <h3 style="margin-bottom: 10px">联系方式</h3>
                        <p style="margin-bottom: 15px"><font style="vertical-align: inherit;">微信：13211035441</font></p>
                        <p style="margin-bottom: 15px"><font style="vertical-align: inherit;">Q Q：375133100</font><br></p>
                        <p style="margin-bottom: 15px"><font style="vertical-align: inherit;">网易邮箱: linyiyuann@163.com</font><br></p>
                        <p style="margin-bottom: 15px"><font style="vertical-align: inherit;">谷歌邮箱: linyiyuan@gmail.com</font><br></p>
                        <p style="margin-bottom: 15px"><font style="vertical-align: inherit;">GitHub: <a href="https://github.com/linyiyuan" target="_blank">https://github.com/linyiyuan</a></font><br></p>
                        <p style="margin-bottom: 15px"><font style="vertical-align: inherit;">博客: <a href="https://linyiyuan.github.io/" target="_blank">https://linyiyuan.github.io/</a></font><br></p>
                        <p style="margin-bottom: 15px"><font style="vertical-align: inherit;">笔记: <a href="http://gitbook.linyiyuan.top/" target="_blank">http://gitbook.linyiyuan.top/</a></font><br></p>
                        <p style="margin-bottom: 15px"><font style="vertical-align: inherit;">简历: <a href="http://resume.linyiyuan.top/" target="_blank">http://resume.linyiyuan.top/</a></font><br></p>
                        <p style="margin-bottom: 15px"><font style="vertical-align: inherit;">简历PDF: <a href="http://images.linyiyuan.top/PHP开发工程师-林益远.pdf/" target="_blank">http://images.linyiyuan.top/PHP开发工程师-林益远.pdf/</a></font><br></p>
                        <p style="margin-bottom: 15px"><font style="vertical-align: inherit;">掘金: <a href="https://juejin.im/user/5c749f1951882561dd7b7e83" target="_blank">https://juejin.im/user/5c749f1951882561dd7b7e83</a></font><br></p>
                        <p style="margin-bottom: 15px"><font style="vertical-align: inherit;">知乎: <a href="https://www.zhihu.com/people/lin-yi-yuan-35-45/activities" target="_blank">https://www.zhihu.com/people/lin-yi-yuan-35-45/activities</a></font><br></p>
                        <p style="margin-bottom: 15px"><font style="vertical-align: inherit;">微博: <a href="https://weibo.com/3118916401/profile?rightmod=1&wvr=6&mod=personinfo" target="_blank">https://weibo.com/3118916401/profile?rightmod=1&wvr=6&mod=personinfo</a></font><br></p>
                    </div>

                    {{--<div class="tab-pane" id="profile" role="tabpanel">--}}
                        {{--<div class="container">--}}
                            {{--<div class="bd-callout">--}}
                                {{--<h4 id="data-attributes-for-individual-tooltips">--}}
                                    {{--<font style="vertical-align: inherit;">--}}
                                        {{--<font style="vertical-align: inherit;">这里是关于技能的描述</font>--}}
                                    {{--</font>--}}
                                {{--</h4>--}}
                                {{--<p>--}}
                                    {{--个体运用已有的知识经验,通过练习而形成的一定的动作方式或智力活动方式。 指掌握并能运用专门技术的能力。指技术、能力。--}}
                                {{--</p>--}}
                            {{--</div>--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-md-4 mb-2">--}}
                                    {{--<div class="info border">--}}
                                        {{--<div class="icon icon-primary">--}}
                                            {{--<i class="fab fa-java"></i>--}}
                                        {{--</div>--}}
                                        {{--<div class="description">--}}
                                            {{--<h4 class="info-title">--}}
                                                {{--<font style="vertical-align: inherit;">--}}
                                                    {{--<font style="vertical-align: inherit;">Java</font>--}}
                                                {{--</font>--}}
                                            {{--</h4>--}}
                                            {{--<p>--}}
                                                {{--Java 是由Sun Microsystems公司于1995年5月推出的高级程序设计语言。--}}
                                            {{--</p>--}}
                                        {{--</div>--}}
                                        {{--<div class="container">--}}
                                            {{--<div class="progress">--}}
                                                {{--<div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-4 mb-2">--}}
                                    {{--<div class="info border">--}}
                                        {{--<div class="icon icon-warning">--}}
                                            {{--<i class="fab fa-python"></i>--}}
                                        {{--</div>--}}
                                        {{--<div class="description">--}}
                                            {{--<h4 class="info-title">--}}
                                                {{--<font style="vertical-align: inherit;">--}}
                                                    {{--<font style="vertical-align: inherit;"> Python </font>--}}
                                                {{--</font>--}}
                                            {{--</h4>--}}
                                            {{--<p>--}}
                                                {{--Python是一种解释型、面向对象、动态数据类型的高级程序设计语言。--}}
                                            {{--</p>--}}
                                        {{--</div>--}}
                                        {{--<div class="container">--}}
                                            {{--<div class="progress">--}}
                                                {{--<div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-4 mb-2">--}}
                                    {{--<div class="info border">--}}
                                        {{--<div class="icon icon-danger">--}}
                                            {{--<i class="fab fa-php"></i>--}}
                                        {{--</div>--}}
                                        {{--<div class="description">--}}
                                            {{--<h4 class="info-title">--}}
                                                {{--<font style="vertical-align: inherit;">--}}
                                                    {{--<font style="vertical-align: inherit;"> PHP </font>--}}
                                                {{--</font>--}}
                                            {{--</h4>--}}
                                            {{--<p>--}}
                                                {{--PHP 是一种创建动态交互性站点的强有力的服务器端脚本语言。--}}
                                            {{--</p>--}}
                                        {{--</div>--}}
                                        {{--<div class="container">--}}
                                            {{--<div class="progress">--}}
                                                {{--<div class="progress-bar progress-bar-striped bg-gree" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-4 mb-2">--}}
                                    {{--<div class="info border">--}}
                                        {{--<div class="icon icon-primary">--}}
                                            {{--<i class="fab fa-java"></i>--}}
                                        {{--</div>--}}
                                        {{--<div class="description">--}}
                                            {{--<h4 class="info-title">--}}
                                                {{--<font style="vertical-align: inherit;">--}}
                                                    {{--<font style="vertical-align: inherit;">Java</font>--}}
                                                {{--</font>--}}
                                            {{--</h4>--}}
                                            {{--<p>--}}
                                                {{--Java 是由Sun Microsystems公司于1995年5月推出的高级程序设计语言。--}}
                                            {{--</p>--}}
                                        {{--</div>--}}
                                        {{--<div class="container">--}}
                                            {{--<div class="progress">--}}
                                                {{--<div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-4 mb-2">--}}
                                    {{--<div class="info border">--}}
                                        {{--<div class="icon icon-warning">--}}
                                            {{--<i class="fab fa-python"></i>--}}
                                        {{--</div>--}}
                                        {{--<div class="description">--}}
                                            {{--<h4 class="info-title">--}}
                                                {{--<font style="vertical-align: inherit;">--}}
                                                    {{--<font style="vertical-align: inherit;"> Python </font>--}}
                                                {{--</font>--}}
                                            {{--</h4>--}}
                                            {{--<p>--}}
                                                {{--Python是一种解释型、面向对象、动态数据类型的高级程序设计语言。--}}
                                            {{--</p>--}}
                                        {{--</div>--}}
                                        {{--<div class="container">--}}
                                            {{--<div class="progress">--}}
                                                {{--<div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-4 mb-2">--}}
                                    {{--<div class="info border">--}}
                                        {{--<div class="icon icon-danger">--}}
                                            {{--<i class="fab fa-php"></i>--}}
                                        {{--</div>--}}
                                        {{--<div class="description">--}}
                                            {{--<h4 class="info-title">--}}
                                                {{--<font style="vertical-align: inherit;">--}}
                                                    {{--<font style="vertical-align: inherit;"> PHP </font>--}}
                                                {{--</font>--}}
                                            {{--</h4>--}}
                                            {{--<p>--}}
                                                {{--PHP 是一种创建动态交互性站点的强有力的服务器端脚本语言。--}}
                                            {{--</p>--}}
                                        {{--</div>--}}
                                        {{--<div class="container">--}}
                                            {{--<div class="progress">--}}
                                                {{--<div class="progress-bar progress-bar-striped bg-gree" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-4 mb-2">--}}
                                    {{--<div class="info border">--}}
                                        {{--<div class="icon icon-warning">--}}
                                            {{--<i class="fab fa-python"></i>--}}
                                        {{--</div>--}}
                                        {{--<div class="description">--}}
                                            {{--<h4 class="info-title">--}}
                                                {{--<font style="vertical-align: inherit;">--}}
                                                    {{--<font style="vertical-align: inherit;"> Python </font>--}}
                                                {{--</font>--}}
                                            {{--</h4>--}}
                                            {{--<p>--}}
                                                {{--Python是一种解释型、面向对象、动态数据类型的高级程序设计语言。--}}
                                            {{--</p>--}}
                                        {{--</div>--}}
                                        {{--<div class="container">--}}
                                            {{--<div class="progress">--}}
                                                {{--<div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-4 mb-2">--}}
                                    {{--<div class="info border">--}}
                                        {{--<div class="icon icon-danger">--}}
                                            {{--<i class="fab fa-php"></i>--}}
                                        {{--</div>--}}
                                        {{--<div class="description">--}}
                                            {{--<h4 class="info-title">--}}
                                                {{--<font style="vertical-align: inherit;">--}}
                                                    {{--<font style="vertical-align: inherit;"> PHP </font>--}}
                                                {{--</font>--}}
                                            {{--</h4>--}}
                                            {{--<p>--}}
                                                {{--PHP 是一种创建动态交互性站点的强有力的服务器端脚本语言。--}}
                                            {{--</p>--}}
                                        {{--</div>--}}
                                        {{--<div class="container">--}}
                                            {{--<div class="progress">--}}
                                                {{--<div class="progress-bar progress-bar-striped bg-gree" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="tab-pane" id="messages" role="tabpanel">--}}
                        {{--<div class="container">--}}
                            {{--<div class="bd-callout">--}}
                                {{--<h4 id="data-attributes-for-individual-tooltips">--}}
                                    {{--<font style="vertical-align: inherit;">--}}
                                        {{--<font style="vertical-align: inherit;">这里是关于爱好的描述</font>--}}
                                    {{--</font>--}}
                                {{--</h4>--}}
                                {{--<p>--}}
                                    {{--爱好是指当人的兴趣不是指向对某种对象的认识，而是指向某种活动时，人的动机便成为人的爱好了。兴趣和爱好都和人的积极情感相联系，培养良好的兴趣爱好是推动人努力学习、积极工作的有效途径。--}}
                                {{--</p>--}}
                            {{--</div>--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-md-3 mb-2">--}}
                                    {{--<div class="card card-pricing" data-background="image" style="background-image: url('./assets/img/dsdfasfx.jpg')">--}}
                                        {{--<div class="card-body" style="min-height: 0px;padding-top: 0px;padding-bottom: 0px;">--}}
                                            {{--<div class="card-icon">--}}
                                                {{--<i class="fas fa-code"></i>--}}
                                            {{--</div>--}}
                                            {{--<h3 class="card-title">--}}
                                                {{--<font style="vertical-align: inherit;">--}}
                                                    {{--<font style="vertical-align: inherit;">编程</font>--}}
                                                {{--</font>--}}
                                            {{--</h3>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-3 mb-2">--}}
                                    {{--<div class="card card-pricing" data-background="image" style="background-image: url('./assets/img/dsdfasfx.jpg')">--}}
                                        {{--<div class="card-body" style="min-height: 0px;padding-top: 0px;padding-bottom: 0px;">--}}
                                            {{--<div class="card-icon">--}}
                                                {{--<i class="fas fa-book-reader"></i>--}}
                                            {{--</div>--}}
                                            {{--<h3 class="card-title">--}}
                                                {{--<font style="vertical-align: inherit;">--}}
                                                    {{--<font style="vertical-align: inherit;">阅读</font>--}}
                                                {{--</font>--}}
                                            {{--</h3>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-3 mb-2">--}}
                                    {{--<div class="card card-pricing" data-background="image" style="background-image: url('./assets/img/dsdfasfx.jpg')">--}}
                                        {{--<div class="card-body" style="min-height: 0px;padding-top: 0px;padding-bottom: 0px;">--}}
                                            {{--<div class="card-icon">--}}
                                                {{--<i class="fas fa-photo-video"></i>--}}
                                            {{--</div>--}}
                                            {{--<h3 class="card-title">--}}
                                                {{--<font style="vertical-align: inherit;">--}}
                                                    {{--<font style="vertical-align: inherit;">摄影</font>--}}
                                                {{--</font>--}}
                                            {{--</h3>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-3 mb-2">--}}
                                    {{--<div class="card card-pricing" data-background="image" style="background-image: url('./assets/img/dsdfasfx.jpg')">--}}
                                        {{--<div class="card-body" style="min-height: 0px;padding-top: 0px;padding-bottom: 0px;">--}}
                                            {{--<div class="card-icon">--}}
                                                {{--<i class="fas fa-fish"></i>--}}
                                            {{--</div>--}}
                                            {{--<h3 class="card-title">--}}
                                                {{--<font style="vertical-align: inherit;">--}}
                                                    {{--<font style="vertical-align: inherit;">垂钓</font>--}}
                                                {{--</font>--}}
                                            {{--</h3>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-3 mb-2">--}}
                                    {{--<div class="card card-pricing" data-background="image" style="background-image: url('./assets/img/dsdfasfx.jpg')">--}}
                                        {{--<div class="card-body" style="min-height: 0px;padding-top: 0px;padding-bottom: 0px;">--}}
                                            {{--<div class="card-icon">--}}
                                                {{--<i class="fas fa-tree"></i>--}}
                                            {{--</div>--}}
                                            {{--<h3 class="card-title">--}}
                                                {{--<font style="vertical-align: inherit;">--}}
                                                    {{--<font style="vertical-align: inherit;">花草</font>--}}
                                                {{--</font>--}}
                                            {{--</h3>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-3 mb-2">--}}
                                    {{--<div class="card card-pricing" data-background="image" style="background-image: url('./assets/img/dsdfasfx.jpg')">--}}
                                        {{--<div class="card-body" style="min-height: 0px;padding-top: 0px;padding-bottom: 0px;">--}}
                                            {{--<div class="card-icon">--}}
                                                {{--<i class="fas fa-drumstick-bite"></i>--}}
                                            {{--</div>--}}
                                            {{--<h3 class="card-title">--}}
                                                {{--<font style="vertical-align: inherit;">--}}
                                                    {{--<font style="vertical-align: inherit;">烹饪</font>--}}
                                                {{--</font>--}}
                                            {{--</h3>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-3 mb-2">--}}
                                    {{--<div class="card card-pricing" data-background="image" style="background-image: url('./assets/img/dsdfasfx.jpg')">--}}
                                        {{--<div class="card-body" style="min-height: 0px;padding-top: 0px;padding-bottom: 0px;">--}}
                                            {{--<div class="card-icon">--}}
                                                {{--<i class="fas fa-car"></i>--}}
                                            {{--</div>--}}
                                            {{--<h3 class="card-title">--}}
                                                {{--<font style="vertical-align: inherit;">--}}
                                                    {{--<font style="vertical-align: inherit;">汽车</font>--}}
                                                {{--</font>--}}
                                            {{--</h3>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-3 mb-2">--}}
                                    {{--<div class="card card-pricing" data-background="image" style="background-image: url('./assets/img/dsdfasfx.jpg')">--}}
                                        {{--<div class="card-body" style="min-height: 0px;padding-top: 0px;padding-bottom: 0px;">--}}
                                            {{--<div class="card-icon">--}}
                                                {{--<i class="fas fa-mountain"></i>--}}
                                            {{--</div>--}}
                                            {{--<h3 class="card-title">--}}
                                                {{--<font style="vertical-align: inherit;">--}}
                                                    {{--<font style="vertical-align: inherit;">爬山</font>--}}
                                                {{--</font>--}}
                                            {{--</h3>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-3 mb-2">--}}
                                    {{--<div class="card card-pricing" data-background="image" style="background-image: url('./assets/img/dsdfasfx.jpg')">--}}
                                        {{--<div class="card-body" style="min-height: 0px;padding-top: 0px;padding-bottom: 0px;">--}}
                                            {{--<div class="card-icon">--}}
                                                {{--<i class="fas fa-gamepad"></i>--}}
                                            {{--</div>--}}
                                            {{--<h3 class="card-title">--}}
                                                {{--<font style="vertical-align: inherit;">--}}
                                                    {{--<font style="vertical-align: inherit;">游戏</font>--}}
                                                {{--</font>--}}
                                            {{--</h3>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-3 mb-2">--}}
                                    {{--<div class="card card-pricing" data-background="image" style="background-image: url('./assets/img/dsdfasfx.jpg')">--}}
                                        {{--<div class="card-body" style="min-height: 0px;padding-top: 0px;padding-bottom: 0px;">--}}
                                            {{--<div class="card-icon">--}}
                                                {{--<i class="fas fa-guitar"></i>--}}
                                            {{--</div>--}}
                                            {{--<h3 class="card-title">--}}
                                                {{--<font style="vertical-align: inherit;">--}}
                                                    {{--<font style="vertical-align: inherit;">吉他</font>--}}
                                                {{--</font>--}}
                                            {{--</h3>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-3 mb-2">--}}
                                    {{--<div class="card card-pricing" data-background="image" style="background-image: url('./assets/img/dsdfasfx.jpg')">--}}
                                        {{--<div class="card-body" style="min-height: 0px;padding-top: 0px;padding-bottom: 0px;">--}}
                                            {{--<div class="card-icon">--}}
                                                {{--<i class="fas fa-route"></i>--}}
                                            {{--</div>--}}
                                            {{--<h3 class="card-title">--}}
                                                {{--<font style="vertical-align: inherit;">--}}
                                                    {{--<font style="vertical-align: inherit;">旅行</font>--}}
                                                {{--</font>--}}
                                            {{--</h3>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
<script>
    $(function() {
        $('[data-fancybox="gallery"]').fancybox({
            // Options will go here
        });
    });
</script>
<!-- 这里是复制文本的 -->
<script src="./assets/clipboard/clipboard.min.js" type="text/javascript"></script>
<script src="./assets/layer/layer.js" type="text/javascript"></script>
<script>
    var btns = document.querySelectorAll('#copy_qq');
    var clipboard = new ClipboardJS(btns);

    clipboard.on('success', function(e) {
        layer.msg('复制成功,请到QQ上搜索我添加');
    });

    clipboard.on('error', function(e) {
        layer.msg('复制失败,请重试或手动输入');
    });
</script>
<script>
    var btns = document.querySelectorAll('#copy_wx');
    var clipboard = new ClipboardJS(btns);

    clipboard.on('success', function(e) {
        layer.msg('复制成功,请到微信上搜索我添加');
    });

    clipboard.on('error', function(e) {
        layer.msg('复制失败,请重试或手动输入');
    });
</script>
@stop

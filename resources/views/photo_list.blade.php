@extends('common.common')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title">
                    <h3>我的相册
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($list as $key)
                <div class="col-sm-3">
                    <div class="card mb-3">
                        <a href="{{ url('/photo_detail/'. $key['id']) }}">
                            <div class="photo-img" data-background="image"
                                 style="background-image: url('{{ $key['album_cover'] }}');"></div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $key['album_name'] }}</h5>
                                <p class="card-text">
                                    <small class="text-muted">发布时间：{{ $key['created_at'] }}</small>
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="pagination-area">
                    <ul class="pagination pagination-primary pagination-no-border justify-content-center">
                        <li class="page-item">
                            <a href="#paper-kit" class="page-link"><i class="fa fa-angle-double-left"
                                                                      aria-hidden="true"></i></a>
                        </li>
                        <li class="page-item active">
                            <a href="#paper-kit" class="page-link">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">1</font>
                                </font>
                            </a>
                        </li>
                        <li class="page-item">
                            <a href="#paper-kit" class="page-link">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">2</font>
                                </font>
                            </a>
                        </li>
                        <li class="page-item">
                            <a href="#paper-kit" class="page-link">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">3</font>
                                </font>
                            </a>
                        </li>
                        <li class="page-item">
                            <a href="#paper-kit" class="page-link">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">4</font>
                                </font>
                            </a>
                        </li>
                        <li class="page-item">
                            <a href="#paper-kit" class="page-link">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">5</font>
                                </font>
                            </a>
                        </li>
                        <li class="page-item">
                            <a href="#paper-kit" class="page-link"><i class="fa fa-angle-double-right"
                                                                      aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop

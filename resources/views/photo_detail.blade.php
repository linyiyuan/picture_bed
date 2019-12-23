@extends('common.common')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="title">
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        @foreach($list as $key)
            <div class="col-sm-3">
                <div class="card mb-4">
                    <a href="{{ $key['photo_url'] }}" data-fancybox="gallery" data-caption="Caption #1" data-type="image">
                        <div class="photo-img" data-background="image" style="background-image: url('{{ $key['photo_url'] }}');"></div>
                    </a>
                    <div class="card-body p-0 text-center">
                        {{--<small class="text-muted"></small>--}}
                        <h5 class="mt-2">{{ $key['created_at'] }}</h5>
                    </div>
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

@section('javascript')
    <script>
        $(function() {
            $('[data-fancybox="gallery"]').fancybox({
                // Options will go here
            });
        });
    </script>
@stop

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
                {!! $pageShow !!}
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

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
    @if(session('message'))
        @if(session('message')['code'] == 200)
            <div class="success" >
                成功消息提示：{{  session('message')['message'] }}
            </div>
        @elseif(session('message')['code'] == 400)
                <div class="alert alert-danger" role="alert" style="margin-top: -11px">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>错误信息提示：</strong>{{ session('message')['message'] }}
                </div>
        @endif
    @endif
    <div class="container">
        <div class="row">
            @foreach($list as $key)
                <div class="col-sm-3" >
                    <div class="card mb-3">
                        @if($key['album_type'] == 1)
                            <a href="{{ url('/photo_detail/'. $key['id']) }}">
                        @elseif($key['album_type'] == 2)
                            @if(\Illuminate\Support\Facades\Cookie::get('photo_album_' . $key['id']))
                                <a href="/photo_detail/{{ $key['id'] }}" >
                            @else
                                <a href="javascript:;" onclick="showModel({{ json_encode($key) }})" >
                            @endif


                        @endif
                            <div class="photo-img" data-background="image"
                                 style="background-image: url('{{ $key['album_cover'] }}');"></div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $key['album_name'] }}
                                    @if($key['album_type'] == 2)
                                        @if(\Illuminate\Support\Facades\Cookie::get('photo_album_' . $key['id']))
                                            <i class="fa fa-unlock-alt"></i>
                                        @else
                                            <i class="fa fa-lock"></i>
                                        @endif
                                    @endif
                                </h5>
                                <p class="card-text">
                                    <small class="text-muted">发布时间：{{ $key['created_at'] }}</small>
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- 公告弹出 modal -->
        <div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-notice">
                <div class="modal-content">
                    <form id="questionForm" method="post">
                        {{ csrf_field() }}
                        <div class="modal-header no-border-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h5 class="modal-title" id="myModalLabel">请回答以下问题</h5>
                        </div>
                        <div class="modal-body">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">问题:</label>
                                    <input type="text" disabled class="form-control" id="question" value="我的生日是？？">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">答案:</label>
                                    <input type="text" class="form-control" name="answer" placeholder="请输入问题答案">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info btn-link" data-dismiss="modal">返回</button>
                            <button type="submit" class="btn btn-success btn-link">提交</button>
                        </div>
                    </form>
                </div>
            </div>
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
<script>
    function showModel(data) {
        $('#questionForm').attr('action', '/photo_detail/' + data.id);
        $('#question').val(data.album_question)
        $('#noticeModal').modal()
    }
</script>

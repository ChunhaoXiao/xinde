@extends('admin.layout')

@section('title', '文章评论')

@section('content_header')
    <!-- <h1>首页</h1> -->
    <h4>评论管理</h4>
@endsection

@section('content')
<form action="">
    <div class="row justify-content-end align-items-center pb-3">
        <div class="col-sm-2"><input type="text" class="form-control" placeholder="用户名" name="username" value="{{request()->username??''}}"></div>
        <div class="col-sm-2"><input type="text" class="form-control" name="content" placeholder="评论内容" value="{{request()->content}}"></div>
        <div class="col-sm-1"><button class="btn btn-info">搜索</button></div>
    </div>
</form>
<table class="table table-hover table-bordered">
    <thead>
        <th>评论内容</th>
        <th>文章</th>
        
        <th>评论人</th>
        <th>评论时间</th>
        <th class="text-center">操作</th>
    </thead>
    <tbody>
        @foreach($datas as $v)
            <tr>
                <td style="width:30%">{{ $v->content }}</td>
                <td><a class="text-secondary" href="{{route('admin.articlecomment.index', ['article_id' => $v->article->id])}}">{{ Str::limit($v->article->title, 40) }}</a></td>
                
                <td><a class="text-secondary" href="{{route('admin.articlecomment.index', ['user_id' => $v->user->id])}}">{{$v->user->name}}</a></td>
                <td>{{$v->created_at}}</td>
                <td class="text-center">
               
                  <i title="删除" class="far fa-trash-alt" data-url="{{route('admin.articlecomment.destroy', $v)}}"></i> 
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<p>{{$datas->withQueryString()->links()}}</p>
@endsection



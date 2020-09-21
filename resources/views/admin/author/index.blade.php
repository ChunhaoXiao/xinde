@extends('admin.layout')

@section('title', '后台管理系统')

@section('content_header')
    <h4>作者管理</h4>
@stop

@section('content')
<p><a href="{{ route('admin.authors.create')}}" class="btn btn-info">添加作者</a></p>
    <table class="table table-bordered table-hover">
        <thead>
            <th>名字</th>
            <th>头像</th>
            <th class="w-25">简介</th>
            <th>文章数量</th>
            <th>添加时间</th>
            <th class="text-center">操作</th>
        </thead>
        <tbody>
            @foreach($datas as $v)
                <tr>
                    <td>{{$v->name}}</td>
                    <td>@if(!empty($v->avatar)) <img src="{{asset('storage/'.$v->avatar)}}" alt="" width="50" height="50">  @endif</td>
                    <td class="w-25">{{Str::limit($v->introduction, 100)}}</td>
                    <td>{{ $v->articles_count }}</td>
                    <td>{{$v->created_at}}</td>
                    <td class="text-center">
                    <a  href="{{route('admin.authors.edit', $v)}}" title="编辑" class="far fa-edit alert-link text-secondary"></a> 
                  <i title="删除" class="far fa-trash-alt ml-4" data-url="{{route('admin.authors.destroy', $v)}}"></i> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop



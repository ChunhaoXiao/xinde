@extends('admin.layout')

@section('title', '微视分类')

@section('content_header')
    <!-- <h1>首页</h1> -->
    <h4>微视分类</h4>
@stop

@section('content')
<p><a class="btn btn-info" href="{{ route('admin.microvideocategory.create') }}">添加分类</a></p>
<table class="table table-hover table-bordered">
    <thead>
        <th>分类名称</th>
        <th>分类图标</th>
        
        <th>排序</th>
        <th>视频数量</th>
        <th class="text-center">操作</th>
    </thead>
    <tbody>
        @foreach($datas as $v)
            <tr>
                <td>{{ $v->name }}</td>
                <td>@if($v->icon) <img src="{{asset('storage/'.$v->icon)}}" width="40" height="40"/> @endif</td>
                
                <td>{{$v->sort}}</td>
                <td>0</td>
                <td class="text-center">
                <a  href="{{route('admin.microvideocategory.edit', $v)}}" title="编辑" class="far fa-edit alert-link text-secondary"></a> 
                  <i title="删除" class="far fa-trash-alt ml-5" data-url="{{route('admin.microvideocategory.destroy', $v)}}"></i> 
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop



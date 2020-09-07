@extends('admin.layout')

@section('title', '后台管理系统')

@section('content_header')
    <h34广告管理</h4>
@stop

@section('content')
<p><a class="btn btn-info" href="{{route('admin.advertisement.create')}}">添加广告</a></p>
    <table class="table table-hover table-bordered">
        <thead>
            <th>广告位置</th>
            <th>开始时间</th>
            <th>结束时间</th>
            <th>广告内容</th>
            <th>连接</th>
            <th>是否显示</th>
            <th></th>
        </thead>
        <tbody>
           @foreach($datas as $k => $v) 
            <tr>
                <td>{{ $v->position->name }}</td>
                <td>{{ $v->start_time }}</td>
                <td>{{ $v->end_time }}</td>
                <td><img src="{{asset('storage/'.$v->content)}}" alt="" width="50" height="50"></td>
                <td>{{$v->link}}</td>
                <td>{{$v->is_show?'是' :'否'}}</td>
                <td></td>
            </tr>
           @endforeach
        </tbody>
    </table>
@stop



@extends('admin.layout')

@section('title', '后台管理系统')

@section('content_header')
    <!-- <h1>首页</h1> -->
    <h3>导航管理</h3>
@stop

@section('content')
<p><a class="btn btn-info" href="{{route('admin.us.create')}}">添加导航</a></p>
  <table class="table table-borderd">
    <thead>
        <th>名称</th>
        <th>排序</th>
        <th>操作</th>
    </thead>
    <tbody>
        @foreach($datas as $v)
            <tr>
                <td>{{$v->name}}</td>
                <td>{{$v->sort??0}}</td>
                <td>

                <a  href="{{route('admin.us.edit', $v)}}" title="编辑" class="far fa-edit alert-link text-secondary"></a> 
                  <i title="删除" class="far fa-trash-alt ml-3" data-url="{{route('admin.us.destroy', $v)}}"></i> 
                </td>
            </tr>
        @endforeach

    </tbody>
  </table>
@stop



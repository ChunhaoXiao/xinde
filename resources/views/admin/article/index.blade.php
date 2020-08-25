@extends('admin.layout')

@section('title', '后台管理系统')

@section('content_header')
    <!-- <h1>首页</h1> -->
@stop

@section('content')
<div class="box">
    <div class="box-header">
      <h3 class="box-title">文章管理</h3>
      <x-articlesearch/>
      <div class="box-tools">

        <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
          <!-- <input type="text" name="table_search" class="form-control pull-right" placeholder="Search"> -->

         
          <div class="input-group-btn pb-3">
              <a href="{{ route('admin.articles.create') }}" class="btn btn-info">添加文章</a>
            <!-- <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button> -->
          </div>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <table class="table table-bordered text-center">
        <thead>
            <th>标题</th>
            <th>文章分类</th>
            <th>状态</th>
            <th>文章来源</th>
            <th>发布时间</th>
            <th></th>
        </thead>
        <tbody>
            @foreach($datas as $v)
                <tr>
                    <td>{{ $v->title }}</td>
                    <td>{{ $v->category->name }}</td>
                    <td>
                    @if($v->status == 1)
                    <button class="btn btn-xs btn-success">已发布</button>
                    @else
                    <button class="btn btn-xs btn-danger">未发布</button>
                    @endif
                    
                    </td>
                    <td>{{ $v->source }}</td>
                    <td>{{ $v-> created_at }}</td>
                    <td>
                    <a  href="{{route('admin.articles.edit', $v)}}" title="编辑" class="far fa-edit alert-link text-secondary"></a> 
                  <i title="删除" class="far fa-trash-alt ml-3" data-url="{{route('admin.articles.destroy', $v)}}"></i> 
                  <!-- <i title="查看栏目文章" class="far fa-newspaper ml-3"></i>
                    </td> -->
                </tr>
            @endforeach
        </tbody>
    </table>

      <!-- <div class="row text-center border-bottom font-weight-bold pb-2">
        <div class="col-sm-2">栏目名称</div>
        <div class="col-sm-2">上级栏目</div>
        <div class="col-sm-2">内容类型</div>
        <div class="col-sm-2">图标</div>
        <div class="col-sm-1">文章数量</div>
        <div class="col-sm-1">排序</div>
        <div class="col-sm-auto">操作</div>
      </div> -->

      
  </div>
@stop



@extends('admin.layout')

@section('title', '后台管理系统')

@section('content_header')
    <!-- <h1>首页</h1> -->
@stop

@section('content')
<div class="box">
    <div class="box-header">
      <h3 class="box-title">栏目管理</h3>

      <div class="box-tools">
        <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
          <!-- <input type="text" name="table_search" class="form-control pull-right" placeholder="Search"> -->

          <div class="input-group-btn pb-3">
              <a href="{{ route('admin.columns.create') }}" class="btn btn-info">添加栏目</a>
            <!-- <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button> -->
          </div>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    
      <div class="row text-center border-bottom font-weight-bold pb-2">
        <div class="col-sm-2">栏目名称</div>
        <div class="col-sm-2">上级栏目</div>
        <div class="col-sm-2">内容类型</div>
        <div class="col-sm-2">图标</div>
        <div class="col-sm-1">文章数量</div>
        <div class="col-sm-1">排序</div>
        <div class="col-sm-auto">操作</div>
      </div>

      @foreach($datas as $v)
          @if($v->parent_id == 0)
            <x-categoryrow :v="$v"/>
          @endif
      @endforeach
  </div>
@stop



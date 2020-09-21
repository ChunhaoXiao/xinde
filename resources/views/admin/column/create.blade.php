@extends('admin.layout')

@section('title', '后台管理系统')

@section('content_header')
    <!-- <h1>首页</h1> -->
@stop

@section('content')

<div class="box">
  <div class="box-header">
      <h4 class="box-title pb-3">{{isset($data)?'修改' : '添加'}}栏目</h4>
      <form method="post" action="{{isset($data)?route('admin.columns.update', $data) : route('admin.columns.store')}}"  enctype="multipart/form-data">
            <div class="box-body">
              <x-textinput label="栏目名称" type="text" name="name" :value="$data->name??old('name')??''"/>
              <x-select label="上级栏目" defaultOptionText="一级栏目" name="parent_id" :options="$categories" :selected="$data->parent_id??''"/>
              <x-select label="内容类型" name="content_type_id" :options="$content_types" :selected="$data->content_type_id??''"/>
              <x-textinput label="栏目排序" type="number" name="sort" :value="$data->sort??0"/>
              <x-radio label="前端显示" name="is_show" :options="[1 => '是', 0 => '否']" :checked="$data->is_show??0"/>

              <x-radio label="文章排行排除此栏目" name="popular_exclude" :options="[0 => '否', 1 => '是']" :checked="$data->popular_exclude??0"/>

              <x-file label="栏目图标" name="icon" :default="$data->icon??''"/>
             
                @isset($data)
                  @method('PUT')
                @endisset
              <x-submit />
            </div>
      </form>
  </div>
</div>            
@stop 

@extends('admin.layout')

@section('title', '后台管理系统')

@section('content_header')
    <!-- <h1>首页</h1> -->
@stop

@section('content')

<div class="box">
  <div class="box-header">
      <h4 class="box-title pb-3">{{isset($data)?'修改' : '添加'}}栏目</h4>
      <form method="post" action="{{isset($data)?route('admin.us.update', $data) : route('admin.us.store')}}"  enctype="multipart/form-data">
            <div class="box-body">
              <x-textinput label="名称" type="text" name="name" :value="$data->name??old('name')??''"/>
              
              <x-textinput label="排序" type="number" name="sort" :value="$data->sort??old('sort')??0"/>
              <x-textarea label="链接内容" name="content" rows="8" :value="$data->content??old('content')??''"/>   
                @isset($data)
                  @method('PUT')
                @endisset
              <x-submit />
            </div>
      </form>
  </div>
</div>            
@stop 

@extends('admin.layout')

@section('title', '后台管理系统')

@section('content_header')
    <!-- <h1>首页</h1> -->
@stop

@section('content')

<div class="box">
  <div class="box-header">
      <h4 class="box-title pb-3">{{isset($data)?'修改' : '添加'}}作者</h4>
      <form method="post" action="{{isset($data)?route('admin.authors.update', $data) : route('admin.authors.store')}}"  enctype="multipart/form-data">
            <div class="box-body">
              <x-textinput label="作者姓名" type="text" name="name" :value="$data->name??old('name')??''"/>
            <x-file label="栏目头像" name="avatar" :default="$data->icon??''" :default="$data->avatar??''"/>
            <x-textarea label="作者简介" rows="4" name="introduction" :value="$data->introduction??''"/>
             
                @isset($data)
                  @method('PUT')
                @endisset
              <x-submit />
            </div>
      </form>
  </div>
</div>            
@stop 

@extends('admin.layout')

@section('title', '后台管理系统')

@section('content_header')
    <h4>添加分类</h4>
@endsection

@section('content')
<div class="box">
  <div class="box-header">
      <h4 class="box-title pb-3">{{isset($data)?'修改' : '添加'}}分类</h4>
      <form method="post" action="{{isset($data)?route('admin.microvideocategory.update', $data) : route('admin.microvideocategory.store')}}"  enctype="multipart/form-data">
            <div class="box-body">
              <x-textinput label="分类名称" type="text" name="name" :value="$data->name??old('name')??''"/>
              <x-file label="栏目图标" name="icon" :default="$data->icon??''"/>
              <x-textinput label="栏目排序" type="number" name="sort" :value="$data->sort??0"/>
             
                @isset($data)
                  @method('PUT')
                @endisset
              <x-submit />
            </div>
      </form>
  </div>
</div>            
@endsection

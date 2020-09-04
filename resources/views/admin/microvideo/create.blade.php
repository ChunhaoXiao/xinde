@extends('admin.layout')

@section('title', '后台管理系统')

@section('content_header')
   
@endsection

@section('content')
<div class="box">
  <div class="box-header">
      <h4 class="box-title pb-3">{{isset($data)?'修改' : '添加'}}微视频</h4>
      <form method="post" action="{{isset($data)?route('admin.microvideo.update', $data) : route('admin.microvideo.store')}}"  enctype="multipart/form-data">
            <x-textinput label="标题" name="title"/>
            <x-select label="分类" name="category_id" :options="[]"/>
      </form>
  </div>
</div>            
@endsection

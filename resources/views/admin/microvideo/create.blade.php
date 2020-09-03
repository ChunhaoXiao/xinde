@extends('admin.layout')

@section('title', '后台管理系统')

@section('content_header')
   
@endsection

@section('content')
<div class="box">
  <div class="box-header">
      <h4 class="box-title pb-3">{{isset($data)?'修改' : '添加'}}微视频</h4>
      <form method="post" action="{{isset($data)?route('admin.microvideocategory.update', $data) : route('admin.microvideocategory.store')}}"  enctype="multipart/form-data">
            
      </form>
  </div>
</div>            
@endsection

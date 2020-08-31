@extends('admin.layout')

@section('title', '后台管理系统')

@section('content_header')
     <!-- <h1>编辑用户</h1>  -->
@stop

@section('content')

<div class="box">
  <div class="box-header">
      <h4 class="box-title pb-3">编辑用户</h4>
      <form method="post" action="{{ route('admin.users.update', $data)}}"  enctype="multipart/form-data">
            <div class="box-body">
              <x-textinput label="用户名" type="text" name="name" :value="$data->name??''"/>
              <x-textinput label="邮箱地址" type="text" name="name" :value="$data->email"/>
              <x-textinput label=手机号 type="text" name="name" :value="$data->mobile"/>
              <x-textinput label="密码" type="text" name="name"/>
              
             
              
                  @method('PUT')
               
              <x-submit />
            </div>
      </form>
  </div>
</div>            
@stop 

@extends('admin.layout')

@section('title', '后台管理系统')

@section('content_header')
    <!-- <h1>首页</h1> -->
    <h3>用户管理</h3>
@stop

@section('content')
<form action="">
  <div class="form-group row ml-auto justify-content-end">
    <div class="col-sm-2"><input type="text" class="form-control" placeholder="用户名" name="name" value="{{request()->name??''}}"></div>
    <div class="col-sm-2"><input type="text" class="form-control" placeholder="邮箱" name="email" value="{{request()->email??''}}"></div>
    <div class="col-sm-2"><input type="text" class="form-control" placeholder="手机号" name="mobile" value="{{request()->mobile??''}}"></div>
    <div class="col-sm-1"><button class="btn btn-info">搜索</button></div>
  </div>
</form>
<!-- <p><a href="{{route('admin.goods.create')}}" class="btn btn-info">添加商品</a></p> -->
<table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                    <thead>
                    <tr role="row">
                      <th class="sorting_asc">用户名</th>
                      <th class="sorting">邮箱</th>
                      <th class="sorting">手机号</th>
                      <th class="sorting" style="width: 20%;">注册时间</th>
                      
                      <th>操作</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  
                  @foreach($datas as $v)
                  <tr role="row">
                  <td>{{ $v->name }}</td>
                    <td>{{ $v->email }}</td>
                    
                    <td>{{ $v->mobile }}</td>
                    <td>{{ $v->created_at }}</td>
                    <td>
                    <a  href="{{route('admin.users.edit', $v)}}" title="编辑" class="far fa-edit alert-link text-secondary"></a> 
                  <i title="删除" class="far fa-trash-alt ml-3" data-url="{{route('admin.users.destroy', $v)}}"></i> 
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                <p>{{$datas->withQueryString()->links()}}</p>
@stop



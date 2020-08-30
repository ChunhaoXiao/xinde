@extends('admin.layout')

@section('title', '后台管理系统')

@section('content_header')
    <!-- <h1>首页</h1> -->
@stop

@section('content')
<p><a href="{{route('admin.goods.create')}}" class="btn btn-info">添加商品</a></p>
<table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                    <thead>
                    <tr role="row">
                      <th class="sorting_asc">缩略图</th>
                      <th class="sorting">商品名称</th>
                      <th class="sorting">商品价格</th>
                      <th class="sorting" style="width: 20%;">简短描述</th>
                      <th class="sorting">虚拟销量</th>
                      <th class="sorting">是否上架</th>
                      <th class="sorting">库存</th>
                      <!-- <th class="sorting">类型</th> -->
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  
                  @foreach($datas as $v)
                  <tr role="row" class="odd">
                    <td><img src="{{asset('storage/'.$v->cover)}}" alt="{{$v->name}}" width="50" height="50" /></td>
                    <td>{{ $v->name }}</td>
                    <td>{{ $v->price }}</td>
                    <td>{{ Str::limit($v->subtitle, 50) }}</td>
                    <td>{{ $v->virtual_sales }}</td>
                    <td class="text-center align-middle">@if($v->on_sale) <span class="btn btn-outline-success btn-xs">已上架</span> @else <i class="btn btn-outline-danger btn-xs">已下架</i> @endif</td>
                    <td>{{ $v->stock }}</td>
                    <!-- <td></td> -->
                    <td>
                    <a  href="{{route('admin.goods.edit', $v)}}" title="编辑" class="far fa-edit alert-link text-secondary"></a> 
                  <i title="删除" class="far fa-trash-alt ml-3" data-url="{{route('admin.goods.destroy', $v)}}"></i> 
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
@stop



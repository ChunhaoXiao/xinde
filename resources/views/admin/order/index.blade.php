@extends('admin.layout')

@section('content_header')
    <h4>订单列表</h4>
@endsection

@section('content')
    <table class="table table-hover table-bordered">
      <thead>
        <th>订单号</th>
        <th>所属用户</th>
        <th>订单状态</th>
        <th>订单金额</th>
        <th>商品数量</th>
        <th>创建时间</th>
        <th></th>
      </thead>
      <tbody>
        @foreach($datas as $v)
            <tr>
             <td>{{$v->order_number}}</td>
             <td>{{$v->user->name}}</td>
             <td>{{$v->order_status}}</td>
             <td>{{$v->total_amount}}</td>
             <td>{{$v->order_details_count}}</td>
             <td>{{$v->created_at}}</td>
             <td>
                 <a href="{{route('admin.order.show', $v)}}" class="btn btn-info btn-sm">查看详情</a>
             </td>
            </tr>
        @endforeach
      </tbody>
    </table>
@endsection
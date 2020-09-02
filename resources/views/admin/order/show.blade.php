@extends('admin.layout')

@section('content_header')
    <h4>订单详情</h4>
@endsection

@section('content')
    <div>
        <div class="card">
            <div class="card-header">
                基本信息
            </div>
            <div class="card-body">
                <div class="row p-2">
                    <div class="col-sm">订单号:123456987455</div>
                    <div class="col-sm">订单状态:</div>
                    <div class="col-sm">下单时间:</div>
                </div>
                <div class="row p-2">
                    <div class="col-sm">所属用户:</div>
                    <div class="col-sm">订单状态:</div>
                    <div class="col-sm">下单时间:</div>
                </div>
            </div>
        </div>
    </div>
@endsection
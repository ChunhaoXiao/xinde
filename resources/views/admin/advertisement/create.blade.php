@extends('admin.layout')

@section('content')

<div class="box">
    <div class="box-header">
        <h4 class="box-title pb-3">{{isset($data)?'修改' : '添加'}}广告</h4>
        <form method="post" action="{{isset($data)?route('admin.advertisement.update', $data) : route('admin.advertisement.store')}}"  enctype="multipart/form-data">
            <x-select name="position_id" label="广告位置" :options="$positions"/>
            <x-textinput name="start_time" type="date" label="开始时间"/>
            <x-textinput name="end_time" type="date" label="结束时间"/>
            <x-file name="content" label="图片" />
            <x-textinput name="link"  label="链接"/>
            <x-radio label="是否显示" name="is_show" :options="[1 => '是', 0 => '否']" :checked="$data->is_show??1"/>
            <x-submit />
        </form>
    </div>
</div>  

@stop

@section('js')
@parent
  
@stop


@extends('admin.layout')

@section('content')

<div class="box">
  <div class="box-header">
      <h4 class="box-title pb-3">{{isset($data)?'修改' : '添加'}}商品</h4>
      <form method="post" action="{{isset($data)?route('admin.goods.update', $data) : route('admin.goods.store')}}"  enctype="multipart/form-data">
            <div class="box-body">
              <x-textinput label="商品名称" type="text" name="name" :value="$data->name??old('name')??''"/>
              <x-textarea label="商品简短说明" name="subtitle" placeholder="例如：钢铁是怎样炼成的/人民文学出版社2018版/语文教材/版本完善，编校精良，助力成长"/>    
              <x-file label="封面图" name="cover" :default="$data->cover??''"/>
              <x-textinput label="原价" type="number" name="market_price" :value="$data->market_price??old('market_price')??''"/>    
              <x-textinput label="商品价格" type="number" name="price" :value="$data->title??old('name')??''"/>  
              <x-textinput label="虚拟销量" type="text" name="virtual_sales" :value="$data->virtual_sales??old('virtual_sales')??''"/>      
              <x-textinput label="库存量" type="text" name="stock" :value="$data->title??old('stock')??''"/>   
              <x-radio label="是否是新品" name="is_new" :options="[1 => '是', 0 => '否']" :checked="0"/>
              <x-radio label="是否是热卖" name="is_hot" :options="[1 => '是', 0 => '否']" :checked="0"/>
              <x-radio label="是否是推荐" name="is_recommend" :options="[1 => '是', 0 => '否']" :checked="0"/>  
              <x-radio label="是否是促销" name="is_discount" :options="[1 => '是', 0 => '否']" :checked="0"/>
              
              
              <x-radio label="是否上架" name="on_sale" :options="[1 => '上架', 0 => '不上架']" :checked="$data->on_sale??1"/>
                  <div class="form-group row">
                    <label for="" class="col-sm-1">商品相册</label>
                    <div class="col-sm-10">
                    <x-uploader :pictures="[]" :text="[]"/>
                    </div>
                  </div>
              
              <x-editor label="商品描述" name="description" :value="$data->article_content??old('description')??''"/>
              
                @isset($data)
                  @method('PUT')
                @endisset
              <x-submit />
            </div>
      </form>
  </div>
</div>  

@stop

@section('js')
@parent
  
@stop


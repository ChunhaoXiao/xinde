<div class="row p-2 text-center border-bottom">
    <div class="col-sm-2" data-toggle="collapse" data-target="#c{{$v->id}}">@if($v->subcates->isNotEmpty())<i class="far fa-minus-square mr-1">@endif</i>{{ $v->name??'' }}</div>
    <div class="col-sm-2">{{ $v->parent->name??'一级栏目' }}</div>
    <div class="col-sm-2">{{ $v->type->name??'' }}</div>
    <div class="col-sm-2">@if(!empty($v->icon))<img src="{{asset('storage/'.$v->icon)}}" width="30" height="30"/>@endif</div>
    <div class="col-sm-1">{{ $v->articles_count }}</div>
    <div class="col-sm-1">{{ $v->sort }}</div>
    <div class="col-sm-auto">
        <a  href="{{route('admin.columns.edit', $v)}}" title="编辑" class="far fa-edit alert-link text-secondary"></a> 
        <i title="删除" class="far fa-trash-alt ml-3" data-url="{{ route('admin.columns.destroy', $v) }}"></i>
        @if($v->subcates()->doesntExist()) 
        <a href="{{route('admin.articles.index', ['category_id' => $v->id])}}"  title="查看栏目文章" class="far fa-newspaper ml-3 alert-link text-secondary"></a>
        @endif
    </div>
</div>

@if($v->subcates)
    <div class="collapse" id="c{{$v->id}}">
        @foreach($v->subcates as $v1)
            <div class="row p-2 text-center border-bottom pl-3">
                <div class="col-sm-2">{{ $v1->name??'' }}</div>
                <div class="col-sm-2">{{ $v1->parent->name??'' }}</div>
                <div class="col-sm-2">{{ $v1->type->name??'' }}</div>
                <div class="col-sm-2">@if(!empty($v1->icon))<img src="{{asset('storage/'.$v1->icon)}}" width="30" height="30"/>@endif</div>
                <div class="col-sm-1">{{ $v1->articles_count }}</div>
                <div class="col-sm-1">{{ $v1->sort }}</div>
                <div class="col-sm-auto">
                  <a  href="{{route('admin.columns.edit', $v1)}}" title="编辑" class="far fa-edit alert-link text-secondary"></a> 
                  <i title="删除" class="far fa-trash-alt ml-3" data-url="{{ route('admin.columns.destroy', $v1)}}"></i> 
                  <a href="{{route('admin.articles.index',['category_id' => $v1->id])}}" title="查看栏目文章" class="far fa-newspaper ml-3 alert-link text-secondary"></a>
                </div>
            </div>
        @endforeach
    </div>
@endif

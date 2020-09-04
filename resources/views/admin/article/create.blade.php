@extends('admin.layout')

@section('content')

<div class="box">
  <div class="box-header">
      <h4 class="box-title pb-3">{{isset($data)?'修改' : '添加'}}栏目</h4>
      <form method="post" action="{{isset($data)?route('admin.articles.update', $data) : route('admin.articles.store')}}"  enctype="multipart/form-data">
            <div class="box-body">
              <x-textinput label="文章标题" type="text" name="title" :value="$data->title??old('title')??''"/>
              <div class="form-group row">
                  <label for="" class="col-sm-1 col-form-label">
                      所属栏目
                  </label>
                  <div class="col-sm-8">
                      <x-categorytree  name="category_id" :selected="$data->category_id??''"/>
                  </div>
              </div>
              <x-file label="封面图" name="cover" :default="$data->cover??''"/>

              <div id="content_form_input">
               
              </div>
             
              <x-textinput label="文章来源" type="text" name="source" :value="$data->source??''"/>
              <x-select name="column_author_id" label="专栏作者" :options="$authors"/>
              <x-radio label="状态" name="status" :options="[1 => '已发布', 0 => '未发布']" :checked="$data->is_show??1"/>
              
              <div class="row pb-3">

                <label for="" class="col-sm-1">选项</label>
                <div class="col-sm-3">
                 <div class="row">
                   <div class="col-sm"> <x-scheckbox label="置顶" name="is_top" :checked="isset($data) && $data->is_top == 1?'checked':''"/> </div>
                   <div class="col-sm"> <x-scheckbox label="推荐" name="is_recommend" :checked="isset($data) && $data->is_recommend == 1?'checked':''"/> </div>
                   <div class="col-sm"> <x-scheckbox label="轮播图" name="is_swiper" :checked="isset($data) && $data->is_swiper == 1?'checked':''"/> </div>
                 </div>
                </div>

              </div>

              <x-editor label="内容" name="content" :value="$data->article_content??old('content')??''"/>
                @isset($data)
                  @method('PUT')
                @endisset
              <x-submit />
            </div>
      </form>
  </div>
</div>  


<!-----------------------不同内容类型的表单-------------------------------->

<div id="album_form" style="display:none">
  
</div>
@stop

@section('js')
@parent
  <script>
    
    $("select[name='category_id']").on('change', function() {
      let id = $(this).val()
      const data = @json($data??[]);
      console.log(data.id)
      $.ajax({
        url:"/admin/form",
        data:{
          category_id:id,
          article_id:data.id,
        },
        type:'get',
        success: res => {
          console.log(res)
          $("#content_form_input").empty();
          $("#content_form_input").html(res);

          // if(res.identity == 'album') {
          //   $("#content_form_input").html($("#album_form").html())
          // }
        },
        error:res => {
          //alert(res)
          console.log(res)
        }
      })
      
    });

    $(function(){
      $("select[name='category_id']").trigger('change');
      
      //alert('aaas')
      //const data = @json($data??[]);
      // if(data) {
      //   console.log(data)
      //   $.ajax({
      //     url:"/admin/form/"+data.id,

      //     success:res => {
      //       console.log(res)
      //       if(res) {
      //         $("#content_form_input").empty().html(res)
      //       }
           
      //     }
      //   })
      // }
    })
  </script>
@stop


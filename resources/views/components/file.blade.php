<div class="form-group row">
    <label class="{{ isset($labelcol)?'col-sm-'.$labelcol : 'col-sm-1' }} col-form-label">{{$label??''}}</label>
    <div class="{{ isset($inputcol)? 'col-sm-'.$inputcol : 'col-sm-8'}}">

        <div class="custom-file">
          <input type="file" class="custom-file-input" id="{{$name??''}}_pic" name="{{$name??''}}" lang="zh_cn">
          <label class="custom-file-label" for="{{$name??''}}_pic" data-browse="选择图片">选择图片</label>
        </div>
        @if(!empty($default))
            <div class="pt-2">
                <img src="{{asset('storage/'.$default)}}" alt="" width="50" height="50">
                <input type="hidden" name="{{$name}}" value="{{$default}}">
            </div>
        @endif
    </div>
</div>

<script type="module">
    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
</script>
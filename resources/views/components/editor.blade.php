<div class="form-group row">
  <label class="{{ isset($labelcol)?'col-sm-'.$labelcol : 'col-sm-1' }} col-form-label">{{$label??''}}</label>
  <div class="{{ isset($inputcol)? 'col-sm-'.$inputcol : 'col-sm-10'}}">
    <textarea name="{{$name}}" id="editor" rows="10">{!! $value !!}</textarea>
  </div>
</div>
<!-- <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js"></script> -->
<!-- <link href="{{asset('css/froala_editor.pkgd.min.css')}}" ref="stylesheet" type="text/css"/>
<script src="{{asset('js/froala_editor.pkgd.min.js')}}"></script>
<script src="{{asset('js/zh_cn.js')}}"></script>
<script src="{{ asset('js/file.min.js') }}"></script>
<script src="{{ asset('js/image.min.js') }}"></script> -->
<script type="module">
 // const identity = "{{$identity??'textarea'}}";
new FroalaEditor("#editor", {
    language:'zh_cn',
    heightMin: 250,
    fileUploadURL: "{{ route('admin.upload') }}",
    imageUploadURL:"{{ route('admin.upload') }}",
    requestHeaders: {
        //custom_header: 'My custom header data.'
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }

    // fileUploadParams: {
    //   id: 'my_editor'
    // }
});

</script>
<script type="module">
  
</script>

<link href="{{asset('css/dropzone.css')}}" rel="stylesheet" type="text/css"/>
<script src="{{asset('js/dropzone.js')}}" type="module"></script>

<div>
  <div id="myId"  class="p-2" style="border:dashed 2px #0087f7;display: flex; flex-wrap:wrap; min-height:250px;border-radius:5px; background:white">选择图片</div>
  @if(!empty($default))

  @endif
</div>

<script type="module">
    
    $(function(){
        
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        //alert($('meta[name="csrf-token"]').attr('content'))

        // $("div#myId").dropzone({ url: "{{ route('admin.upload') }}", headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')} });

        Dropzone.options.myId = {
            init:function() {
                this.on("success", function(file) {
                    let path = JSON.parse(file.xhr.response).savepath;

                    $(file.previewTemplate).append("<input type=hidden name=images[picture][] value="+path+"/>");
                });
                //this.on("")
            },
            url:"{{ route('admin.upload') }}",
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize:2, // MB
            thumbnailWidth:180,
            thumbnailHeight:150,
            acceptedFiles:"image/*",
            addRemoveLinks:true,
            dictFileTooBig:'上传失败，图片过大',
            dictInvalidFileType:"不允许该文件类型",
            dictRemoveFile:"删除",
            dictRemoveFileConfirmation:"确认删除？",
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                done("Naha, you don't.");
                }
                else { done(); }
            },
            headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
            previewTemplate:`<div class="dz-preview dz-file-preview mr-1">
                <div class="dz-details">
                    <div class="dz-filename"><span data-dz-name></span></div>
                    <div class="dz-size" data-dz-size></div>
                    <img data-dz-thumbnail />
                </div>
                <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                <div  style="width:120px"><input type="text" class="mt-2" name="images[text][]"/></div>
                <div class="dz-error-message"><span data-dz-errormessage></span></div>
                </div>`
        };
        let upload = $("#myId").dropzone();

       
    })
    
</script>

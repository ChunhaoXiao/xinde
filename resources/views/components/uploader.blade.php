<link href="{{asset('css/dropzone.css')}}" rel="stylesheet" type="text/css"/>
<script src="{{asset('js/dropzone.js')}}"></script>

<div>
  <div id="myid"  class="p-2" style="border:dashed 2px #0087f7;display: flex; flex-wrap:wrap; min-height:250px;border-radius:5px; background:white">选择图片</div>


 
</div>
<script type="module">
    
    let datas = @json($pictures);
    let text = @json($text);
    //console.log('服务器图片',datas)
    $(function(){
       
        
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        //alert($('meta[name="csrf-token"]').attr('content'))

        // $("div#myId").dropzone({ url: "{{ route('admin.upload') }}", headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')} });

        Dropzone.autoDiscover = false;
        // Dropzone.options.myid = {
        //     init:function() {
        //         Dropzone.autoDiscover = false
        //         this.autoDiscover = false;
        //         this.on("success", function(file) {
        //             let path = JSON.parse(file.xhr.response).savepath;

        //             $(file.previewTemplate).append("<input type=hidden name=images[picture][] value="+path+"/>");
        //         });


        //         $.each(datas.picture, (key,value) => {

        //             var mockFile = { name: "images[picture][]", size: 1, thumbnailWidth:180,
        //     thumbnailHeight:150, previewTemplate:this.previewTemplate};
        //             this.files.push(mockFile);
        //             this.emit("addedfile", mockFile);
        //             this.emit("thumbnail", mockFile, "{{asset('storage')}}/"+value);
        //             this.emit("complete", mockFile);
        //         });
               
        //     },
           
        //     url:"{{ route('admin.upload') }}",
        //     paramName: "file", // The name that will be used to transfer the file
        //     maxFilesize:2, // MB
        //     thumbnailWidth:180,
        //     thumbnailHeight:150,
        //     acceptedFiles:"image/*",
        //     addRemoveLinks:true,
        //     dictFileTooBig:'上传失败，图片过大',
        //     dictInvalidFileType:"不允许该文件类型",
        //     dictRemoveFile:"删除",
        //     dictRemoveFileConfirmation:"确认删除？",
        //     accept: function(file, done) {
        //         if (file.name == "justinbieber.jpg") {
        //         done("Naha, you don't.");
        //         }
        //         else { done(); }
        //     },
        //     headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
        //     previewTemplate:`<div class="dz-preview dz-file-preview mr-1">
        //         <div class="dz-details">
        //             <div class="dz-filename"><span data-dz-name></span></div>
        //             <div class="dz-size" data-dz-size></div>
        //             <img data-dz-thumbnail />
        //         </div>
        //         <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
        //         <div  style="width:120px"><input type="text" class="mt-2" name="images[text][]"/></div>
        //         <div class="dz-error-message"><span data-dz-errormessage></span></div>
        //         </div>`
        // };
        
       
        //let upload = $("#myId").dropzone();
       
        //let upload = $("#myid").dropzone();

        var myDropzone = new Dropzone("div#myid", { 
            init:function() {
                Dropzone.autoDiscover = false
                this.autoDiscover = false;
                this.on("success", function(file) {
                    let path = JSON.parse(file.xhr.response).savepath;

                    $(file.previewTemplate).append("<input type=hidden name=images[picture][] value="+path+"/>");
                    console.log("file.previewTemplate is :", file.previewTemplate);
                });

                // this.on("complete", file => {
                //     console.log("file added:",file)
                // })

                //编辑时显示服务器端的图片
                $.each(datas, (key,value) => {

                    var mockFile = { name: "images"};
                    this.files.push(mockFile);
                    this.emit("addedfile", mockFile);
                    this.emit("thumbnail", mockFile, "{{asset('storage')}}/thumb/"+value);
                    //this.emit("success", mockFile);
                    this.emit("complete", mockFile);
                    console.log("mockfile is template is:", mockFile.previewTemplate)
                    //console.log(value)
                    $(mockFile.previewTemplate).append("<input type=hidden name=images[picture][] value="+value+"/>")
                    console.log("{{asset('storage')}}/thumb/"+value)
                    $(mockFile.previewTemplate).find("input[class=mt-2]").val(text[key])

                
                });
               
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
            previewTemplate:`<div class="dz-preview dz-file-preview  text-center mr-1">
                <div class="dz-details">
                    <div class="dz-filename"><span data-dz-name></span></div>
                    <div class="dz-size" data-dz-size></div>
                    <img data-dz-thumbnail />
                </div>
                <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                <div><input type="text" class="mt-2" name="images[text][]"/></div>
                <div class="dz-error-message"><span data-dz-errormessage></span></div>
                </div>`
        });
       
    })
    
</script>

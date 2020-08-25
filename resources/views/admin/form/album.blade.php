<div class="form-group row">
  <label class="{{ isset($labelcol)?'col-sm-'.$labelcol : 'col-sm-1' }} col-form-label">{{$label??''}}</label>
  <div class="{{ isset($inputcol)? 'col-sm-'.$inputcol : 'col-sm-8'}}">
    <x-uploader :pictures="$data->album->thumb??[]" :text="$data->album->images['text']??[]"/>
  </div>
  
</div>
<script>
    
</script>
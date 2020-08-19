<div class="form-group row">
    <label class="{{ isset($labelcol)?'col-sm-'.$labelcol : 'col-sm-1' }} col-form-label">{{$label??''}}</label>
    <div class="{{ isset($inputcol)? 'col-sm-'.$inputcol : 'col-sm-8'}}">
    <input name="{{$name??''}}" class="form-control" value="{{$value??''}}">
    </div>
</div>
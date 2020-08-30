<div class="form-group row">
    <label class="{{ isset($labelcol)?'col-sm-'.$labelcol : 'col-sm-1' }} col-form-label">{{$label??''}}</label>
    <div class="{{ isset($inputcol)? 'col-sm-'.$inputcol : 'col-sm-8'}}">
    <textarea {{$attributes}} name="{{$name??''}}" class="form-control" placeholder="{{$placeholder??''}}">{{$value??''}}</textarea>
    </div>
</div>
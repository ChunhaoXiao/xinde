<div class="form-group row pt-1">
    <label for="" class="{{ isset($labelcol)?'col-sm-'.$labelcol : 'col-sm-1' }}">{{$label??''}}</label>
    <div class="{{ isset($inputcol)? 'col-sm-'.$inputcol : 'col-sm-8'}}">
        @if(!empty($options))
            @foreach($options as $k => $v)
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="{{ $name.$k }}" name="{{ $name }}" class="custom-control-input" value="{{$k}}" {{$checked == $k ? 'checked' : ''}}>
                <label class="custom-control-label" for="{{ $name.$k }}">{{$v}}</label>
                </div>
            @endforeach
        @endif
    </div>
</div>

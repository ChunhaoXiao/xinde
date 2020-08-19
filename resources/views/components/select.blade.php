<div class="form-group row">
    <label class="{{ isset($labelcol)?'col-sm-'.$labelcol : 'col-sm-1' }} col-form-label">{{$label??''}}</label>
    <div class="{{ isset($inputcol)? 'col-sm-'.$inputcol : 'col-sm-8'}}">
      <select class="form-control" name="{{ $name }}">
          <option value="">{{ $defaultOptionText??'请选择' }}</option>
            @if(!empty($options))
                @foreach($options as $k =>  $v)
                    <option {{ isset($selected) && $k == $selected?'selected' : '' }} value="{{$k}}">{{$v}}</option>
                @endforeach
            @endif
      </select>
    </div>
</div>
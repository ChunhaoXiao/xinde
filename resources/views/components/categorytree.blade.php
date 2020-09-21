<select class="form-control" name="{{$name??''}}">
    <option value="">{{ $defaultOptionText??'请选择' }}</option>

    @if(!empty($options))
        
        @foreach($options as $k =>  $v)
            @if($v->subcates->isEmpty())
              <option {{ isset($selected) && $v->id == $selected?'selected': '' }} value="{{$v->id}}">{{$v->name}}</option>
            @else

            
            @foreach($v->subcates as $k1 => $v1)
                <option value="{{$v1->id}}" {{ isset($selected) && $v1->id == $selected?'selected' : '' }}>--{{$v1->name}}</option>
            @endforeach
             
            @endif
        @endforeach

    @endif

</select>

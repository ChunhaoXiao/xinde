<div class="form-group row">
    @csrf
    <label class="{{ isset($labelcol)?'col-sm-'.$labelcol : 'col-sm-1' }} col-form-label"></label>
    <div class="{{ isset($inputcol)? 'col-sm-'.$inputcol : 'col-sm-8'}}">
      <button class="btn btn-info pull-right">确定</button>
    </div>
</div>
@if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
<form action="">
<div class="row pb-3 col-offset-1 pl-2 pt-3">
    
    <div class="col-sm">
        <div id="example1_filter" class="dataTables_filter">
            <input type="search" class="form-control form-control-sms" placeholder="文章标题" name="title" value="{{ request()->title }}">
        </div>
    </div>

    <div class="col-sm">
        <x-categorytree defaultOptionText="栏目" name="category_id" :selected="request()->category_id??''"/>
    </div>

    <div class="col-sm">
        <x-select :options="[1 => '已发布', 0 => '未发布']" defaultOptionText="状态" name="status" :selected="request()->status"/>
    </div>
    <div class="col-sm">
      <input type="search" class="form-control form-control-sms" placeholder="文章来源" name="source" value="{{request()->source}}">
    </div>
    <div class="col-sm">
    <input type="text" placeholder="开始时间" onfocus="(this.type='date')" class="form-control" name="start_time" value="{{request()->start_time}}">
    </div>
    
        <div class="col-sm-auto">--</div>
    <div class="col-sm">
      <input type="text" placeholder="结束时间" onfocus="(this.type='date')" class="form-control" name="end_time" value="{{request()->end_time}}"> 
    </div>
    <div class="col-sm-auto"><button class="btn btn-info">搜索</button></div>
</div>
</form>
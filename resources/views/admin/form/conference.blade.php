<x-select name="conference_type" label="会议类型" :options="App\Models\Conference::TYPE"/>
<x-textinput label="会议开始时间" name="start_date" type="datetime-local" :value="$data->conference->start_date??''"/>
<x-textinput label="会议结束时间" name="end_date" type="datetime-local" :value="$data->conference->end_date??''"/>
<x-textinput label="报名开始时间" name="enroll_begin_time" type="datetime-local" :value="$data->conference->enroll_begin_time??''"/>
<x-textinput label="报名结束时间" name="enroll_end_time" type="datetime-local" :value="$data->conference->enroll_end_time??''"/>
<x-textinput label="地点" name="address" :value="$data->conference->address??''"/>
<x-textarea label="会议简介" rows="5" name="introduction" :value="$data->conference->introduction??''"/>

<div class="d-flex align-items-center justify-content-around">
    <img src="{{ isset(cache('settings')) ? asset('uploads/'.cache('settings')['report_logo']) : '' }}" width="80">
    <div>{!! cache('settings')['report_header'] !!}</div>
    <img src="{{ isset(cache('settings')) ? asset('uploads/'.cache('settings')['report_logo']) : '' }}" width="80">
</div>

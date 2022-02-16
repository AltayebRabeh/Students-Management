<div class="d-flex align-items-center justify-content-around">
    <img src="{{ cache('settings') != null ? asset('uploads/'.cache('settings')['report_logo']) : '' }}" width="80">
    <div>{!! cache('settings')['report_header'] !!}</div>
    <img src="{{ cache('settings') != null ? asset('uploads/'.cache('settings')['report_logo']) : '' }}" width="80">
</div>

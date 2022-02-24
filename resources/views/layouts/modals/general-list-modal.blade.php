
<div class="modal fade" id="generalListModal" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="generalModal" action="" method="GET">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="section_id">القسم</label>
                            <select name="section_id" class="form-control">
                                <option disable></option>
                                @if(cache('sections') != null)
                                    @foreach (cache('sections') as $section)
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="year_id">السنة</label>
                            <select name="year_id" class="form-control">
                                <option disable></option>
                                @if(cache('years') != null)
                                    @foreach (cache('years') as $year)
                                        <option value="{{ $year->id }}">{{ $year->year }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="classroom_id">الصف الدراسي</label>
                            <select name="classroom_id" class="form-control">

                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="semester_id">الفصل الدراسي</label>
                            <select name="semester_id" class="form-control">

                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="subject_teacher_id">إختيار المادة</label>
                            <select name="subject_teacher_id" class="form-control subject_teacher_id" id="subject_teacher_id">

                            </select>
                            @error('subject_teacher_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">إغلاق</button>
                    <button type="submit" class="btn mb-2 btn-success">متابعة</button>
                </div>
            </form>
        </div>
    </div>
</div>

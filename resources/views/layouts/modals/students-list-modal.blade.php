<div class="modal fade" id="studentListModal" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('students.list') }}" method="GET">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyModalLabel">عرض قائمة الطلاب</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="section">القسم</label>
                            <select name="section_id" id="section" class="form-control">
                                <option></option>
                                @foreach (cache('sections') as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="classroom">الصف الدراسي</label>
                            <select name="classroom_id" id="classroom" class="form-control">
                                    
                            </select>
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
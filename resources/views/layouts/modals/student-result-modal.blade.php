<div class="modal fade" id="studentResultModal" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('student-grades.handle-result') }}" method="POST">
                @csrf
                @method('POST')
                <div class="modal-header">
                    <h5 class="modal-title" id="varyModalLabel">نتيجة طالب</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="input-group">
                                <input type="text" name="university_number" placeholder="الرقم الجامعي" class="form-control form-control-lg">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary btn-lg">متابعة</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
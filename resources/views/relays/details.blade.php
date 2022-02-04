@extends('layouts.main')
@section('content')


    <div class="row">
    <!-- Small table -->
        <div class="col-md-12 my-4">
            <div class="d-flex mb-4">
                <h2 class="h4">تفاصل الترحيل</h2>
                <a href="{{ route('relays.index') }}" class="btn btn-primary ml-auto">رجوع</a>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <!-- table -->
                    <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>الرقم الجامعي</th>
                        <th>إسم الطالب</th>
                        <th>من الفصل</th>
                        <th>إلى الفصل</th>
                        <th>من السنة</th>
                        <th>إلى السنة</th>
                        <th>الحالة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($relayStudents as $relayStudent)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $relayStudent->student->university_number }}</td>
                            <td>{{ $relayStudent->student->name }}</td>
                            <td>{{ App\Models\Classroom::find($relayStudent->from_classroom)->name }}</td>
                            <td>{{ App\Models\Classroom::find($relayStudent->to_classroom)->name }}</td>
                            <td>{{ App\Models\Year::find($relayStudent->from_year)->year }}</td>
                            <td>{{ App\Models\Year::find($relayStudent->to_year)->year }}</td>
                            <td>
                                @if($relayStudent->reject)
                                    <span class="badge badge-danger">إعادة</span>
                                @else
                                    <span class="badge badge-success">نجاح</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    <div class="d-flex justify-content-center pt-4">
                        {{ $relayStudents->links() }}
                    </div>
                </div>
            </div>
        </div> <!-- customized table -->
    </div> <!-- end section -->

    @include('layouts.modals.delete-modal')

@endsection
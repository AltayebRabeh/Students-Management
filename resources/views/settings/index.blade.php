@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/quill.snow.css') }}">
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 my-4">
            <h2 class="h4">الاعدادات</h2>
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @foreach($settings as $setting)
                            <div class="form-group mb-4">
                                <input type="hidden" name="settings[{{ $loop->iteration }}][key]" value="{{ $setting->key }}">
                                <input type="hidden" name="settings[{{ $loop->iteration }}][type]" value="{{ $setting->type }}">
                                <label for="value">{{ $setting->name }}</label>

                                @if($setting->type == 'image')
                                    <input type="file" name="settings[{{ $loop->iteration }}][value]" class="form-control"">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                        <br>
                                    @enderror
                                    
                                    @if($setting->value != '')
                                        <img height="100" src="{{ asset('uploads/'.$setting->value) }}" alt="{{ $setting->name }}" class="avatar-img rounded-circle pt-2">
                                    @endif
                                @endif

                                @if($setting->type == 'text')
                                    <input type="text" name="settings[{{ $loop->iteration }}][value]" class="form-control" value="{{ $setting->value }}">
                                @endif

                                @if($setting->type == 'long-text')
                                    <div id="editor" style="min-height:100px;">{!! $setting->value !!}</div>
                                    <textarea name="settings[{{ $loop->iteration }}][value]" id="editorInput" class="d-none"></textarea>
                                @endif
                                
                            </div>
                        @endforeach
                        <input type="submit" value="حفظ" class="btn btn-primary save">
                    </form>
                </div>
            </div>
        </div> 
    </div> 

@endsection

@section('js')
    <script src="{{ asset('js/quill.min.js') }}"></script>
    <script>
        var editor = document.getElementById('editor');
        var editorInput = document.getElementById('editorInput');
        var save = document.querySelector('.save');

        save.onclick = (e) => {
            editorInput.innerHTML = editor.firstElementChild.innerHTML;
        }

        if (editor)
        {
            var toolbarOptions = [

                [
                    {
                        'header': [1, 2, 3, 4, 5, 6, false]
                    }
                ],
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [
                    {
                        'header': 1
                    },
                    {
                        'header': 2
                    }
                ],
                [
                    {
                        'list': 'ordered'
                    },
                    {
                        'list': 'bullet'
                    }
                ],
                [
                    {
                        'script': 'sub'
                    },
                    {
                        'script': 'super'
                    }
                ],
                [
                    {
                        'indent': '-1'
                    },
                    {
                        'indent': '+1'
                    }
                ], // outdent/indent
                [
                    {
                        'direction': 'rtl'
                    }
                ], // text direction
                [
                    {
                        'color': []
                    },
                    {
                        'background': []
                    }
                ], // dropdown with defaults from theme
                [
                    {
                        'align': []
                    }
                ],
                ['clean'] // remove formatting button
            ];
            var quill = new Quill(editor,
            {
                modules:
                {
                    toolbar: toolbarOptions
                },
                theme: 'snow'
            });
        }
      
    </script>
@endsection
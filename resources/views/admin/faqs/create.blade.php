@extends('admin.master')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Add New FAQ</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <form action="{{ route('faqs.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-10">
                                <div class="form-group">
                                    <label for="question">Question</label>
                                    <textarea type="text" name="question" class="form-control"
                                              rows="3" id="question">{{ old('question') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="answer">Answer</label>
                                    <textarea type="text" name="answer" class="form-control"
                                              rows="3" id="elm1">{{ old('answer') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!--tinymce js-->
    <script src="{{ asset('assets/js/plugin/tinymce/tinymce.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('assets/js/form-editor.init.js') }}"></script>
@endsection

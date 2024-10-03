@extends('admin.master')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Update Story</div>
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
                <form action="{{ route('stories.update', $story->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">

                                <div class="form-group">
                                    <label for="year">Year</label>
                                    <input type="text" name="year" id="year" class="form-control"
                                           placeholder="YYYY" maxlength="4" value="{{ old('year', $story->year) }}" required />
                                </div>


                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                           value="{{ old('title', $story->title) }}" placeholder="Enter Title"/>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea type="text" name="description" class="form-control"
                                              rows="3" id="elm1">{{ old('description', $story->description) }}</textarea>
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

    <script>
        document.getElementById('year').addEventListener('input', function (e) {
            let value = e.target.value;
            if (!/^\d{0,4}$/.test(value)) {
                e.target.value = value.slice(0, 4);  // Limit input to 4 digits
            }
        });
    </script>
@endsection

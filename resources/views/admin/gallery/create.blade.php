@extends('admin.master')

@section('styles')
    <link href="{{ asset('assets/css/uploadImages.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('container')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Add Gallery</div>
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
                <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data" id="my-form" >
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                           value="{{ old('title') }}" placeholder="Enter Title"/>
                                </div>

                                <div class="form-group">
                                    <label for="desc">Description</label>
                                    <textarea type="text" name="desc" class="form-control"
                                              rows="3" id="elm1">{{ old('desc') }}</textarea>
                                </div>

                            </div>

                            <div class="col-md-6 col-lg-6">

                                <div class="form-group">
                                    <label for="image">Member Image</label>
                                    <input type="file" name="image" class="form-control" id="image"/>
                                </div>

                                <div class="form-group">
                                    <label>Photo Gallery (MultiImage)</label>
                                    <div class="multiple-uploader bg-light bg-gradient" id="multiple-uploader">
                                        <div class="mup-msg ">
                                            <span class="mup-main-msg">click to upload images.</span>
                                            <span class="mup-msg" id="max-upload-number">Upload up to 10 images</span>
                                            <span class="mup-msg">Only images, pdf and psd files are allowed for upload</span>
                                        </div>
                                    </div>
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
    <script>
        var loadFile = function (event) {
            for (let i = 0; i < event.target.files.length; i++) {
                var image = document.createElement('img');
                image.src = URL.createObjectURL(event.target.files[i]);
                image.id = "output";
                image.width = "200";
                document.querySelector(".cont").appendChild(image);
            }
        };
    </script>

    <script src="{{ asset('assets/js/multiple-uploader.js') }}"></script>
    <script>
        let multipleUploader = new MultipleUploader('#multiple-uploader').init({
            maxUpload: 20, // maximum number of uploaded images
            maxSize: 2, // in size in mb
            filesInpName: 'album', // input name sent to backend
            formSelector: '#my-form', // form selector
        });
    </script>

    <!--tinymce js-->
    <script src="{{ asset('assets/js/plugin/tinymce/tinymce.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('assets/js/form-editor.init.js') }}"></script>
@endsection

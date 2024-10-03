@extends('admin.master')

@section('styles')
    <link href="{{ asset('assets/css/uploadImages.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('container')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Update Technology</div>
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
                <form action="{{ route('technologies.update', $technology->id) }}" method="POST" enctype="multipart/form-data" id="my-form" >
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                           value="{{ old('title', $technology->title) }}" placeholder="Enter Title"/>
                                </div>

                                <div class="form-group">
                                    <label for="image">Current Main Image</label><br/>
                                    <img width="530px" src="{{ asset('upload/technologies/'. $technology->image ) }}"/>
                                </div>

                                <div class="form-group">
                                    <label for="image">Upload New Main Image</label>
                                    <input type="file" name="image" class="form-control" id="image"/>
                                </div>

                                <div class="form-group">
                                    <label for="desc">Main Description</label>
                                    <textarea type="text" name="desc" class="form-control"
                                              rows="3" id="elm1">{{ old('desc', $technology->desc) }}</textarea>
                                </div>

                            </div>

                            <div class="col-md-6 col-lg-6">

                                <div class="form-group">
                                    <label for="desc_box">Description Box (optional)</label>
                                    <textarea type="text" name="desc_box" class="form-control"
                                              rows="3" id="elm1">{{ old('desc_box', $technology->desc_box) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="extra_desc_box">Extra Description Box (optional)</label>
                                    <textarea type="text" name="extra_desc_box" class="form-control"
                                              rows="3" id="elm1">{{ old('extra_desc_box', $technology->extra_desc_box) }}</textarea>
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


    <div class="row">
        <div class="col-md-12">
            <div class="card card-post card-round">
                <div class="card-body">
                    <h4>Upload A New Technology Photo Gallery </h4>
                    <button type="button" class="btn btn-primary btn-rounded btn-sm"
                            data-bs-toggle="modal" title="Add"
                            data-original-title="Add"
                            data-bs-target="#addPhotoGalleryModal">
                        Add Image
                    </button>
                    <hr/>
                    <div class="modal fade" id="addPhotoGalleryModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Upload New Photo Gallery</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('images.store', ['modelName' => 'Technology', 'modelId' => $technology->id]) }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="image"/>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        @foreach($technology->images as $image)
                            <div class="col-md-4">
                                <div class="card card-post card-round">
                                    <img class="card-img-top img-fluid img-responsive"
                                         style="width:100%; height: 230px;"
                                         src="{{ asset('upload/albums/'. $image->image_path) }}"
                                         alt="Card image cap"/>
                                    <div class="card-body">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger btn-rounded btn-sm"
                                                data-bs-toggle="modal" title="delete"
                                                data-original-title="Remove"
                                                data-bs-target="#Modal{{$technology->id}}">
                                            Delete
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="Modal{{$technology->id}}" tabindex="-1"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are You
                                                            Sure?</h5>
                                                        <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Are you sure that you want to delete
                                                        this
                                                        item?
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                            Close
                                                        </button>

                                                        <form action="{{ route('images.destroy', $image->id) }}"
                                                              method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger px-5">
                                                                Yes, delete
                                                            </button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
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
    <script>
        // Initialize TinyMCE for all textareas
        tinymce.init({
            selector: 'textarea', // Target all textarea elements
            plugins: 'link image code',
            toolbar: 'undo redo | styleselect | bold italic | link image | code',
            height: 300,
        });

    </script>

    <!-- init js -->
    <script src="{{ asset('assets/js/form-editor.init.js') }}"></script>
@endsection

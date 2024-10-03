@extends('admin.master')

@section('styles')
    <link href="{{ asset('dashboard/assets/css/tagsinput.css') }}" rel="stylesheet"/>
    <link href="{{ asset('dashboard/assets/css/uploadImages.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('container')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Add New Project</div>
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
                <form id="my-form" action="{{ route('admin.projects.update', $project->id) }}" method="POST"
                      enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">

                                <div class="form-group">
                                    <label for="title">Project Title</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                           value="{{ old('title', $project->title) }}"
                                           placeholder="Enter Project Title"/>
                                </div>

                                <div class="form-group">
                                    <label for="client_name">Client Name</label>
                                    <input type="text" name="client_name" class="form-control" id="client_name"
                                           value="{{ old('client_name', $project->client_name) }}"
                                           placeholder="Enter Client Name"/>
                                </div>

                                <div class="form-group">
                                    <label for="duration">Project Duration (in month)</label>
                                    <input type="number" name="duration" class="form-control" id="duration"
                                           value="{{ old('duration', $project->duration) }}" placeholder="6"/>
                                </div>

                                <div class="form-group">
                                    {{--                                    <label for="image">Current Project Main Image</label>--}}
                                    <img width="200px" src="{{ asset('upload/projects/'. $project->image ) }}">
                                </div>

                                <div class="form-group">
                                    <label for="image">Upload New Project Main Image</label>
                                    <input type="file" name="image" class="form-control" id="file"
                                           onchange="loadFile(event)"/>
                                    <p class="cont"></p>
                                </div>

                                <div class="form-group">
                                    <label for="overview">Project Overview</label>
                                    <textarea type="text" name="overview" class="form-control"
                                              rows="5" id="elm1">{{ old('overview', $project->overview) }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6">

                                <div class="form-group">
                                    <label for="title">Project Start Date</label>
                                    <input type="date" name="start_date" class="form-control" id="start_date"
                                           value="{{ old('start_date', $project->start_date) }}"/>
                                </div>

                                <div class="form-group">
                                    <label for="scope">Project Scope (optional)</label>
                                    <textarea type="text" name="scope" class="form-control"
                                              rows="3" id="scope">{{ old('scope', $project->scope) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="solution">Project Solution (optional)</label>
                                    <textarea type="text" name="solution" class="form-control"
                                              rows="3"
                                              id="solution">{{ old('solution', $project->solution) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="challenge">Project Challenge (optional)</label>
                                    <textarea type="text" name="challenge" class="form-control"
                                              rows="3"
                                              id="challenge">{{ old('challenge', $project->challenge) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="category_id">Project Category</label>
                                    <select name="category_id" class="single-select form-control">
                                        @foreach($categories as $category)
                                            <option
                                                value="{{ $category->id }}" {{ $project->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="team_id">Made by</label>
                                    <select name="team_id" class="single-select form-control">
                                        @foreach($teams as $team)
                                            <option
                                                value="{{ old('team_id', $team->id) }}" {{ $project->team_id == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="location">Project Location</label>
                                    <input type="text" name="location" class="form-control" id="location"
                                           value="{{ old('location', $project->location) }}" placeholder="UAE, Dubai"/>
                                </div>

                                <div class="form-group">
                                    <label for="tags">Project Tags (write tag word then press enter)</label>
                                    <input type="text" name="tags" class="form-control" id="tags" data-role="tagsinput"
                                           value="{{ old('tags', $project->tags) }}"/>
                                </div>

                            </div>

                            <div class="col-md-6 col-lg-12">
                                <div class="form-group">
                                    <label>Project Photo Gallery (MultiImage)</label>
                                    <div class="multiple-uploader bg-light bg-gradient" id="multiple-uploader">
                                        <div class="mup-msg ">
                                            <span class="mup-main-msg">click to upload images.</span>
                                            <span class="mup-msg"
                                                  id="max-upload-number">Upload up to 10 images</span>
                                            <span
                                                class="mup-msg">Only images, pdf and psd files are allowed for upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Upload</button>
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
                    <button type="button" class="btn btn-primary btn-rounded btn-sm"
                            data-bs-toggle="modal" title="Add"
                            data-original-title="Add"
                            data-bs-target="#addPhotoGalleryModal">
                        Add Photo Gallery
                    </button>
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
                                <form action="{{ route('admin.gallery.store') }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="hidden" name="project_id" value="{{ $project->id }}">
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
                </div>
            </div>
        </div>
        @foreach($project->gallery as $image)
            <div class="col-md-4">
                <div class="card card-post card-round">
                    <img class="card-img-top img-fluid img-responsive"
                         style="width:100%; height: 230px;"
                         src="{{ asset('upload/projects/gallery/'. $image->image) }}"
                         alt="Card image cap"/>
                    <div class="card-body">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger btn-rounded btn-sm"
                                data-bs-toggle="modal" title="delete"
                                data-original-title="Remove"
                                data-bs-target="#Modal{{$project->id}}">
                            Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="Modal{{$project->id}}" tabindex="-1"
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

                                        <form action="{{ route('admin.gallery.destroy', $image->id) }}"
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
@endsection

@section('scripts')
    <script src="{{ asset('dashboard/assets/js/tagsinput.js') }}"></script>

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

    <script src="{{ asset('dashboard/assets/js/multiple-uploader.js') }}"></script>
    <script>
        let multipleUploader = new MultipleUploader('#multiple-uploader').init({
            maxUpload: 20, // maximum number of uploaded images
            maxSize: 2, // in size in mb
            filesInpName: 'gallery', // input name sent to backend
            formSelector: '#my-form', // form selector
        });
    </script>

    <!--tinymce js-->
    <script src="{{ asset('dashboard/assets/js/plugin/tinymce/tinymce.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('dashboard/assets/js/form-editor.init.js') }}"></script>
@endsection

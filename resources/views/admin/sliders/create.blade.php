@extends('admin.master')

@section('styles')
    <link href="{{ asset('assets/css/uploadImages.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('container')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Add New Slider</div>
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
                <form id="my-form" action="{{ route('sliders.store') }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                           value="{{ old('title') }}" placeholder="Enter Title"/>
                                </div>

                                <div class="form-group" id="video-file-group">
                                    <label for="media">Upload Slider Media (Video OR Image</label>
                                    <input type="file" id="media-file" class="form-control" accept="*">
                                    <p id="upload-status"></p>
                                    <input type="hidden" name="media" id="media-url">
                                </div>

                                <div class="form-group">
                                    <label for="desc">Description</label>
                                    <textarea type="text" name="desc" class="form-control"
                                              rows="5" id="elm1">{{ old('desc') }}</textarea>
                                </div>

                            </div>

                            <div class="col-md-6 col-lg-6 bg-light bg-gradient">
                                <h4>All fields on the right side are optional fields</h4>
                                <h5>
                                    Chose to fill
                                    <strong>Extra Description</strong>
                                    OR <strong>Youtube Section</strong>
                                </h5>

                                <div class="form-group">
                                    <label for="extra_desc">Extra Description</label>
                                    <textarea type="text" name="extra_desc" class="form-control"
                                              rows="5" id="elm1">{{ old('extra_desc') }}</textarea>
                                </div>

                                <hr/>

                                <h5>Youtube Section</h5>

                                <div class="form-group">
                                    <label for="youtube_video_url">Youtube Video URL</label>
                                    <input type="url" name="youtube_video_url" class="form-control"
                                           id="youtube_video_url"
                                           value="{{ old('youtube_video_url') }}"
                                           placeholder="Enter Youtube Video URL"/>
                                </div>

                                <div class="form-group">
                                    <label for="youtube_video_title">Youtube Video Title</label>
                                    <input type="text" name="youtube_video_title" class="form-control"
                                           id="youtube_video_title"
                                           value="{{ old('youtube_video_title') }}"
                                           placeholder="Enter Youtube Video Title"/>
                                </div>

                                <div class="form-group">
                                    <label for="about_youtube_video">About Youtube Video</label>
                                    <input type="text" name="about_youtube_video" class="form-control"
                                           id="about_youtube_video"
                                           value="{{ old('about_youtube_video') }}" placeholder="About Youtube Video"/>
                                </div>

                                <div class="form-group">
                                    <label for="cover_youtube_image">Cover Youtube Image</label>
                                    <input type="file" name="cover_youtube_image" class="form-control" id="file"
                                           onchange="loadFile(event)"/>
                                    <p class="cont"></p>
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

    <!--tinymce js-->
    <script src="{{ asset('assets/js/plugin/tinymce/tinymce.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('assets/js/form-editor.init.js') }}"></script>

    <script>
        // Initialize TinyMCE for all textareas
        tinymce.init({
            selector: 'textarea', // Target all textarea elements
            plugins: 'link image code',
            toolbar: 'undo redo | styleselect | bold italic | link image | code',
            height: 300,
        });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>

        const videoFile = document.getElementById('media-file');

        console.log('test');
        videoFile.addEventListener('change', function () {
            var fileInput = videoFile;
            var formData = new FormData();
            formData.append('media', fileInput.files[0]);

            document.getElementById('upload-status').innerHTML = 'Uploading...';

            console.log('{{ route('media.upload') }}');
            console.log('{{ csrf_token()}}');
            console.log(formData);

            axios.post('{{ route('media.upload') }}', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
                .then(function (response) {
                    console.log('response');
                    console.log(response);
                    if (response.data.status) {
                        document.getElementById('upload-status').innerHTML = 'Upload successful!';
                        document.getElementById('media-url').value = response.data.media;
                    } else {
                        document.getElementById('upload-status').innerHTML = 'Upload failed!';
                    }
                })
                .catch(function (error) {
                    document.getElementById('upload-status').innerHTML = 'Error during upload!';
                    console.error(error);
                });
        });

        // Handle form submission (submit the video URL along with other form data)
        // document.getElementById('my-form').addEventListener('submit', function (event) {
        //     event.preventDefault();
        //
        //     var form = this;
        //     var formData = new FormData(form);
        //
        //     console.log('formData44');
        //     console.log(formData);
        //
        //     fetch(form.action, {
        //         method: 'POST',
        //         body: formData
        //     })
        //         .then(response => response.json())
        //         .then(data => {
        //             if (data.status) {
        //                 alert('Item created successfully!');
        //             } else {
        //                 alert('Error creating item.');
        //             }
        //         })
        //         .catch(error => {
        //             console.error('Error:', error);
        //         });
        // });
    </script>
@endsection

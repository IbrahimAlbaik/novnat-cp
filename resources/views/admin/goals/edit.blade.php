@extends('admin.master')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Update Goal</div>
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
                <form action="{{ route('goals.update', $goal->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                           value="{{ old('title', $goal->title) }}" placeholder="Enter Title"/>
                                </div>
                                <div class="form-group">
                                    <label for="URL">URL</label>
                                    <input type="url" name="URL" class="form-control" id="URL"
                                           placeholder="https://www.example.com/" value="{{ old('URL', $goal->URL) }}"/>
                                </div>

                            </div>

                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="image">Current Image</label><br/>
                                    <img src="{{ asset('upload/goals/'. $goal->image ) }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control" id="image"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Update</button>
                        <button class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('admin.master')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Update Member Team</div>
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
                <form action="{{ route('teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="role">Member Role</label>
                                    <select name="role" class="single-select form-control">
                                        <option value="member"{{ $team->role == 'member' ? 'selected' : '' }} >
                                            Main Member
                                        </option>
                                        <option value="adviser" {{ $team->role == 'adviser' ? 'selected' : '' }}>
                                            Adviser
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Member Name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                           value="{{ old('name', $team->name) }}" placeholder="Enter member Name"/>
                                </div>
                                <div class="form-group">
                                    <label for="position">Member Position</label>
                                    <input type="text" name="position" class="form-control" id="position"
                                           value="{{ old('position', $team->position) }}"
                                           placeholder="Enter member Position"/>
                                </div>



                            </div>

                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="image">Upload New Member Image</label>
                                    <input type="file" name="image" class="form-control" id="image"/>
                                </div>

                                <div class="form-group">
                                    <label for="linkedin_url">LinkedIn URL</label>
                                    <input type="url" name="linkedin_url" class="form-control" id="linkedin_url"
                                           placeholder="https://www.linkedin.com/"
                                           value="{{ old('linkedin_url', $team->linkedin_url) }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="image">Current Image</label><br/>
                                    <img src="{{ asset('upload/teams/'. $team->image ) }}"/>
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

@extends('admin.master')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
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
                <div class="card-body">
                    <h3>Update About us Info</h3>
                    <form action="{{ route('about.update', $about->id) }}" class="form-horizontal" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-hover">
                                <tbody>
                                <tr>
                                    <th class="table-primary">Email</th>
                                    <td>
                                        <input type="email" name="email" class="form-control" id="email"
                                               value="{{ old('email', $about->email) }}"
                                               placeholder="Enter Company Email"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="table-primary">Partnering Email</th>
                                    <td>
                                        <input type="email" name="partnering_email" class="form-control" id="partnering_email"
                                               value="{{ old('partnering_email', $about->partnering_email) }}"
                                               placeholder="Enter Company Partnering Email"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="table-primary">Address</th>
                                    <td>
                                        <input type="text" name="address" class="form-control" id="address"
                                               value="{{ old('address', $about->address) }}"
                                               placeholder="Enter Company Address"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="table-primary">Bio</th>
                                    <td>
                                        <textarea type="text" name="bio" class="form-control"
                                                  rows="3">{{ old('bio', $about->bio) }}</textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <th class="table-primary">LinkedIn URL</th>
                                    <td>
                                        <input type="url" name="linkedin_url" class="form-control" id="linkedin_url"
                                               value="{{ old('linkedin_url', $about->linkedin_url) }}"
                                               placeholder="Enter LikedIn Link"/>
                                    </td>
                                </tr>

                                </tbody>
                            </table>

                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-info" type="submit">Update Info</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!--tinymce js-->
    <script src="{{ asset('dashboard/assets/js/plugin/tinymce/tinymce.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('dashboard/assets/js/form-editor.init.js') }}"></script>
@endsection

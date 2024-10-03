@extends('admin.master')

@section('styles')
@endsection

@section('container')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Update Feature: <i class="{{ $feature->icon }}"></i></div>
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
                <form action="{{ route('features.update', $feature->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="title">Feature Name</label>
                                    <input type="text" value="{{ old('title', $feature->title) }}" name="title"
                                           id="title" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="icon">Select New Icon</label>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                aria-expanded="false">Select Icon
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                             style="max-height: 300px; overflow-y: auto;">
                                            <!-- Dynamic Icon List -->
                                            <a class="dropdown-item" href="#"
                                               data-icon="fa-solid fa-circle-dollar-to-slot">
                                                <i class="fa-solid fa-circle-dollar-to-slot"></i> Solid Dollar Slot
                                            </a>
                                            <a class="dropdown-item" href="#" data-icon="fa-solid fa-building">
                                                <i class="fa-solid fa-building"></i> Solid Building
                                            </a>
                                            <a class="dropdown-item" href="#" data-icon="fa-regular fa-building">
                                                <i class="fa-regular fa-building"></i> Regular Building
                                            </a>
                                            <a class="dropdown-item" href="#" data-icon="fa-solid fa-tree">
                                                <i class="fa-solid fa-tree"></i> Solid Tree
                                            </a>
                                            <a class="dropdown-item" href="#" data-icon="fa-solid fa-leaf">
                                                <i class="fa-solid fa-leaf"></i> Solid Leaf
                                            </a>
                                            <a class="dropdown-item" href="#" data-icon="fa-brands fa-pagelines">
                                                <i class="fa-brands fa-pagelines"></i> Brands Pagelines
                                            </a>
                                            <a class="dropdown-item" href="#" data-icon="fa-solid fa-spa">
                                                <i class="fa-solid fa-spa"></i> Solid Spa
                                            </a>
                                            <a class="dropdown-item" href="#" data-icon="fa-solid fa-clover">
                                                <i class="fa-solid fa-clover"></i> Solid Clover
                                            </a>
                                            <a class="dropdown-item" href="#"
                                               data-icon="fa-brands fa-canadian-maple-leaf">
                                                <i class="fa-brands fa-canadian-maple-leaf"></i> Canadian Maple Leaf
                                            </a>
                                            <a class="dropdown-item" href="#"
                                               data-icon="fa-solid fa-hand-holding-heart">
                                                <i class="fa-solid fa-hand-holding-heart"></i> Solid Hand Holding Heart
                                            </a>
                                            <a class="dropdown-item" href="#"
                                               data-icon="fa-solid fa-hand-holding-droplet">
                                                <i class="fa-solid fa-hand-holding-droplet"></i> Solid Hand Holding
                                                Droplet
                                            </a>
                                            <a class="dropdown-item" href="#" data-icon="fa-solid fa-handshake">
                                                <i class="fa-solid fa-handshake"></i> Solid Handshake
                                            </a>
                                            <a class="dropdown-item" href="#" data-icon="fa-regular fa-handshake">
                                                <i class="fa-regular fa-handshake"></i> Regular Handshake
                                            </a>
                                        </div>
                                    </div>

                                    <input type="hidden" name="icon" id="selectedIcon">

                                    <div class="mt-2">
                                        <label>Selected Icon Preview:</label>
                                        <i id="icon-preview" class="fa-solid fa-building" style="font-size: 24px;"></i>
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
        // Handle icon selection from the dropdown
        document.querySelectorAll('.dropdown-item').forEach(function (item) {
            item.addEventListener('click', function (e) {
                e.preventDefault();
                var iconClass = this.getAttribute('data-icon');
                // Set the selected icon value in the hidden input
                document.getElementById('selectedIcon').value = iconClass;
                // Update the preview icon class
                document.getElementById('icon-preview').className = iconClass;
            });
        });
    </script>

@endsection

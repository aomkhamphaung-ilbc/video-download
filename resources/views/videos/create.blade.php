@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload Video</div>

                    <div class="card-body">
                        <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="title">Title:</label>
                                    <input type="text" name="title" id="title" required><br>
                                </div>

                                <div class="col-md-6">
                                    <label for="video">Video:</label>
                                    <input type="file" name="file_name" id="video" required><br>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-secondary mt-3">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

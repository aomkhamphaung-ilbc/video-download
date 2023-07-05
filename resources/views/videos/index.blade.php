@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Video</div>

                    <div class="card-body">
                        @foreach ($videos as $video)
                            <li>
                                <a href="{{ route('videos.show', $video) }}">{{ $video->title }}</a>
                            </li>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

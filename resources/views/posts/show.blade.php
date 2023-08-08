@extends('layouts.app')

@section('template_title')
    {{ $post->title ?? "{{ __('Show') Posts" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="d-flex align-items-center p-2 bg-secondary">
                        <div class="col-6 text-start text-white">
                            <span class="card-title">{{ __('Show') }} Posts</span>
                        </div>
                        <div class="col-6 text-end">
                            <a class="btn btn-primary" href="{{ route('posts.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $posts->title }}
                        </div>
                        <hr>
                        <div class="form-group">
                            <strong>Body:</strong>
                            {{ $posts->body }}
                        </div>
                        <hr>
                        <div class="form-group">
                            <strong>userId:</strong>
                            {{ $posts->userId }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Posts
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="d-flex align-items-center p-2 bg-secondary">
                        <div class="col-6 text-start text-white">
                            <span class="card-title">{{ __('Create') }} Posts</span>
                        </div>
                        <div class="col-6 text-end">
                            <a class="btn btn-primary" href="{{ route('posts.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('posts.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('posts.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

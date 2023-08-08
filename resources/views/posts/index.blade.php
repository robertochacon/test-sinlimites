@extends('layouts.app')

@section('template_title')
    Posts
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Posts') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead bg-dark text-white">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Title</th>
										<th>Body</th>
										<th>UserId</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            
											<td>{{ $post->title }}</td>
											<td>{{ $post->body }}</td>
											<td>{{ $post->userId }}</td>

                                            <td>
                                                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-block mt-1 btn-primary " href="{{ route('posts.show',$post->id) }}" style="width:100%;"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-block mt-1 btn-success" href="{{ route('posts.edit',$post->id) }}" style="width:100%;"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm btn-block mt-1" style="width:100%;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex">
                                {{ $posts->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

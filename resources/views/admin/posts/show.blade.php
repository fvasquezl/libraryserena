@extends('layouts.master')

@section('content-header')
    @include('layouts.partials.contentHeader',$info =[
           'title' =>'Publicaciones',
           'subtitle' => 'Mostrar',
           'breadCrumbs' =>['posts','show']
           ])
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4 shadow-sm">
                    <div class="card-header d-flex justify-content-between">
                        {{ $post->present()->postTitle() }}
                    </div>

                    <div class="card-body">

                        <p class="card-text">{{ $post->excerpt }}</p>
                        <ul class="list-unstyled">
                         @foreach ($post->documents as $document)
                            <li><i class="far fa-file-pdf"></i> <a href="{{ $document->path }}">{{ $document->title }}</a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection

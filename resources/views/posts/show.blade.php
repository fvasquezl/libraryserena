@extends('layouts.app')

@section('meta-title',$post->title)
@section('meta-description',$post->excerpt)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow p-2  mb-4 card-outline card-primary">
                @include('posts.partials.header')

                <div class="card-body">
                    <p class="card-text">{!! $post->excerpt !!}</p>

                    @include('posts.partials.footer')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

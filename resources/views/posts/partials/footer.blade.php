<hr>
@if($post->documents->count())
<ul class="list-unstyled">
    @foreach ($post->documents as $document)
    <li>
        <i class="fas fa-file-pdf fa-2x text-danger"></i>
        <a href="{{ url($document->url) }}" target="_blank">{{ $document->title }}</a>
    </li>
    @endforeach
</ul>
@endif
<div class="d-flex justify-content-between">
    <p class="text-left card-text">
        <i class="fas fa-paperclip"></i>
        {{$post->present()->departments()}}
    </p>
    <p class="text-right card-text">
        <i class="fas fa-tags fa-sm"></i>
        @foreach ($post->tags as $tag)
        {{ $tag->name }}
        @endforeach
    </p>
</div>

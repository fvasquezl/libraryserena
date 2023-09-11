@if (session('info'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('info') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


@push('scripts')
<script>
    $(".alert").fadeTo(4000, 0).slideUp(50, function(){
        $(this).remove(); 
    });
</script>
@endpush
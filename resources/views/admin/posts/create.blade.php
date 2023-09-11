
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ingresa el titulo de la publicacion</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('admin.posts.store','#create') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input name="title" id="post-title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{old('title')}}"
                                   placeholder="Inresa aqu&iacute; el t&iacute;tulo de la publicaci&oacute;n" autofocus required>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button  class="btn btn-primary">Crear publicacion</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


@push('scripts')
<script>
    if(window.location.hash === '#create')
    {
        $('#myModal').modal('show');
    }

    $('#myModal').on('hide.bs.modal',function(){
        window.location.hash = '#'
    });

    $('#myModal').on('shown.bs.modal',function(){
        $('#post-title').focus()
        window.location.hash = '#create'
    });
</script>
@endpush

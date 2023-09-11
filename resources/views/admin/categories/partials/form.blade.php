@csrf
<div class="form-group">
    <label for="name">Nombre:</label>
    <input name='name' value="{{old('name',$category->name) }}"
        class="form-control @error('name') is-invalid @enderror">
    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

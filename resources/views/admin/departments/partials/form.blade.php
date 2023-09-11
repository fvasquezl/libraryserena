@csrf
<div class="form-group">
    <label for="name">Identificador:</label>
    <input name='name' value="{{old('name',$department->name) }}"
        class="form-control @error('name') is-invalid @enderror">
    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label for="display_name">Nombre:</label>
    <input name="display_name" value="{{ old('display_name', $department->display_name) }}"
        class="form-control  @error('display_name') is-invalid @enderror">
    @error('display_name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label>Descripcion</label>
    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
        placeholder="Inresa aqu&iacute; la descripcion del departamento">{{ old('description',$department->description) }}
        </textarea>
    @error('description')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<ul class="list-unstyled">
    @foreach ($departments as $department)
    <li>
        <label>
            <input name="departments[]" type="checkbox" value="{{ $department->id }}"
                {{ $user->departments->contains($department->id)? 'checked':'' }}>
                {{ $department->name }} (<small class="text-muted">{{ $department->display_name}}</small>)
        </label>
    </li>
    @endforeach
</ul>
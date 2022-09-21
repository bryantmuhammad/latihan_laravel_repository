<div class="mb-3">
    <label for="{{ $id ?? '' }}" class="form-label">{{ $label }}</label>
    <textarea name="{{ $name }}" class="form-control @error($name) is-invalid @enderror {{ $classCustom ?? '' }}"
        cols="{{ $cols ?? 30 }}" rows="{{ $rows ?? 10 }}" id="{{ $id ?? '' }}"
        {{ isset($required) ? 'required' : '' }}>{{ $value ?? '' }}</textarea>
    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

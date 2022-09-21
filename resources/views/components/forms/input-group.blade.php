<div class="mb-3">
    <label for="{{ $id ?? '' }}" class="form-label">{{ $label }}</label>
    <input type="{{ $type ?? 'text' }}" class="form-control {{ $classCustom ?? '' }} @error($name) is-invalid @enderror"
        id="{{ $id ?? '' }}" placeholder="{{ $placeholder ?? '' }}" value="{{ $value ?? '' }}"
        name="{{ $name }}" {{ $customAttribute ?? '' }} {{ isset($required) ? 'required' : '' }}>
    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

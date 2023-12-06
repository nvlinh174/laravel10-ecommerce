@empty(!$title)
    <label class="form-label @if ($required) required @endif">{{ $title }}</label>
@endempty
@if ($attributes['type'] === 'password')
    <div class="input-icon input-password">
        <input
            class="form-control @error($name) is-invalid @enderror @empty(!$customClass) {{ $customClass }} @endempty"
            name="{{ $name }}" {{ $attributes }}>
        <x-admin.forms.invalid-feedback name="{{ $name }}" />
        <span class="input-icon-addon">
            <x-admin.icons.password />
        </span>
    </div>
@else
    <input
        class="form-control @error($name) is-invalid @enderror @empty(!$customClass) {{ $customClass }} @endempty"
        name="{{ $name }}" {{ $attributes }}>
    <x-admin.forms.invalid-feedback name="{{ $name }}" />
@endif

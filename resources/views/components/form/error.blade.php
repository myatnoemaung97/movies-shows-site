@props(['name'])

@error($name)
    <p class="text-danger fs-6">{{ $message }}</p>
@enderror

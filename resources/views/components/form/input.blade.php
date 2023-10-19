@props(['name', 'label', 'type' => null, 'value' => null])

<x-form.label :name="$name" :label="$label"/>
@if($type === 'file' && $value !== null)
    <br>
    <img class="mb-2" src="{{ $value }}" style="max-width: 100px; max-height: 400px;">
@endif
<input class="form-control" type="{{ $type ?? 'text' }}" id="{{ $name }}" name="{{ $name }}"
       value="{{ old($name) ?? $value }}">
<x-form.error :name="$name"/>

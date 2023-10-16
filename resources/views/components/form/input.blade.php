@props(['name', 'label', 'type' => null])

<x-form.label :name="$name" :label="$label"/>
<input class="form-control" type="{{ $type ?? 'text' }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name) }}">
<x-form.error :name="$name" />

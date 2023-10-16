@props(['name', 'label'])

<x-form.label :name="$name" :label="$label"/>
<textarea class="form-control" id="{{ $name }}" name="{{ $name }}">{{ old($name) }}</textarea>
<x-form.error :name="$name" />


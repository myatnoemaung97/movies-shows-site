@props(['name', 'label', 'rows'])

<x-form.label :name="$name" :label="$label"/>
<textarea class="form-control" id="{{ $name }}" name="{{ $name }}" rows="{{ $rows }}">{{ old($name) }}</textarea>
<x-form.error :name="$name" />


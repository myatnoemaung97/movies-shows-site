@props(['name', 'label', 'rows', 'value' => null])

<x-form.label :name="$name" :label="$label"/>
<textarea class="form-control" id="{{ $name }}" name="{{ $name }}" rows="{{ $rows }}">{{ old($name) ?? $value }}</textarea>
<x-form.error :name="$name" />


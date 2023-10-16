@props(['name', 'label', 'options'])

<x-form.label :name="$name" :label="$label"/>

<select class="form-control" id="{{ $name }}" name="{{ $name }}">
    @foreach($options as $option)
        <option value="{{ $option }}">{{ $option }}</option>
    @endforeach
</select>
<x-form.error :name="$name" />


@props(['name', 'label', 'options'])

<x-form.label :name="$name" :label="$label"/>

<select class="form-control" id="{{ $name }}" name="{{ $name }}">
    <option value="">-select</option>
    @foreach($options as $option)
        <option value="{{ $option }}" {{ old($name) === $option ? 'selected' : '' }}>{{ $option }}</option>
    @endforeach
</select>
<x-form.error :name="$name" />


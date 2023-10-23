@props(['name', 'label', 'options', 'value' => null])

<x-form.label :name="$name" :label="$label"/>

<select class="form-control" id="{{ $name }}" name="{{ $name }}">
    <option disabled selected>-</option>
    @foreach($options as $option)
        <option value="{{ $option }}" {{ old($name) === $option || $value === $option ? 'selected' : '' }}>{{ $option }}</option>
    @endforeach
</select>
<x-form.error :name="$name" />


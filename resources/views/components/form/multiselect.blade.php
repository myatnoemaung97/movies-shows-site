@props(['name', 'label', 'options'])

<x-form.label :name="$name" :label="$label" />
<select class="js-example-basic-multiple form-control text-black" id="{{ $name }}" name="{{$name}}[]" multiple="multiple">
    <option value="">-select</option>
    @foreach($options as $option)
        <option value="{{ $option->id }}" {{ old($name) && in_array($option->id, old($name)) ? 'selected' : '' }}>{{ $option->name }}</option>
    @endforeach
</select>
<x-form.error :name="$name" />

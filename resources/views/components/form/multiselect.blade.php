@props(['name', 'label', 'options', 'values'])

<x-form.label :name="$name" :label="$label"/>
<select class="js-example-basic-multiple form-control text-black" id="{{ $name }}" name="{{$name}}[]"
        multiple="multiple">
    <option value="">-select</option>
    @foreach($options as $option)
        <option
            value="{{ $option->name }}" {{ (old($name) && in_array($option->name, old($name))) || (!$errors->any() && $values && in_array($option->name, $values)) ? 'selected' : '' }}>{{ $option->name }}</option>
    @endforeach
</select>
<x-form.error :name="$name"/>

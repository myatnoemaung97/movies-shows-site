@props(['action', 'method', 'header', 'button', 'person' => null])

<x-form.formfield>
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method($method)

        <h3 class="text-center">{{ $header }}</h3>

        <x-form.input :name="'name'" :label="'Name'" :value="$person?->name"/>

        <x-form.input :type="'file'" :name="'image'" :label="'Image'" :value="$person?->image"/>

        <button type="submit" class="btn btn-success mt-3">{{ $button }}</button>
    </form>
</x-form.formfield>




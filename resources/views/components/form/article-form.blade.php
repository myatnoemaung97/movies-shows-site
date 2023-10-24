@props(['action', 'method', 'header', 'button', 'article' => null])

<x-form.formfield>
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method($method)

        <input type="hidden" name="status" value="draft">

        <h3 class="text-center">{{ $header }}</h3>

        <x-form.input :name="'title'" :label="'Title'" :value="$article?->title"/>

        <x-form.input :type="'file'" :name="'image'" :label="'Image'" :value="$article?->image"/>

        <x-form.textarea :name="'body'" :label="'Body'" :rows="15" :value="$article?->body"/>

        <button type="submit" class="btn btn-success mt-3">{{ $button }}</button>
    </form>
</x-form.formfield>




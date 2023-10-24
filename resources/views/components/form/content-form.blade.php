@props(['action', 'method', 'header', 'button', 'article', 'content' => null])

<x-form.formfield>
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method($method)

        <h3 class="text-center">{{ $header }}</h3>

        <h5 class="mt-5">{{ $article->title }}</h5>

        <x-form.input :type="'file'" :name="'image'" :label="'Image'" :value="$content?->image"/>

        <x-form.textarea :name="'body'" :label="'Body'" :rows="15" :value="$content?->body"/>

        <button type="submit" class="btn btn-success mt-3">{{ $button }}</button>
    </form>
</x-form.formfield>




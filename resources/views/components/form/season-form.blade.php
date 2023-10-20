@props(['action', 'method', 'header', 'button', 'show', 'season' => null])

<x-form.formfield>
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method($method)

        <input type="hidden" name="showId" value="{{ $show->id }}">
        <input type="hidden" name="showSlug" value="{{ $show->slug }}">


        <h3 class="text-center">{{ $header }}</h3>

        <h4 class="mt-5">{{ $show->title }}</h4>

        <x-form.input :type="'number'" :name="'season_number'" :label="'Season Number'" :value="$season?->season_number"/>

        <x-form.input :type="'date'" :name="'release_date'" :label="'Release Date'"
                      :value="$season?->release_date"/>

        <x-form.input :type="'file'" :name="'poster'" :label="'Poster'" :value="$season?->poster"/>

        <x-form.input :type="'text'" :name="'trailer'" :label="'Trailer Link'" :value="$season?->trailer"/>

        <button type="submit" class="btn btn-success mt-3">{{ $button }}</button>
    </form>
</x-form.formfield>




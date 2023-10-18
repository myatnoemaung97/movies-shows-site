@props(['action', 'method', 'header', 'people', 'button', 'movie' => null])

<x-form.formfield>
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method($method)

        <h3 class="text-center">{{ $header }}</h3>

        <x-form.input :name="'title'" :label="'Title'" :value="$movie?->title"/>

        <x-form.select :name="'age_rating'" :label="'Age Rating'" :options="['G', 'PG', 'PG-13', 'R', 'NC-17']"
                       :value="$movie?->age_rating"/>

        <x-form.input :type="'date'" :name="'release_date'" :label="'Release Date'" :value="$movie?->release_date"/>

        <x-form.textarea :name="'description'" :label="'Description'" :rows="8" :value="$movie?->description"/>

        <x-form.input :type="'number'" :name="'run_time'" :label="'Run time (in minutes)'" :value="$movie?->run_time"/>

        <x-form.input :type="'file'" :name="'poster'" :label="'Poster'" :value="$movie?->poster"/>

        <x-form.input :type="'text'" :name="'trailer'" :label="'Trailer Link'" :value="$movie?->trailer"/>

        <x-form.multiselect :name="'directors'" :label="'Director(s)'" :options="$people" :values="$movie?->directors()->pluck('name')->toArray()"/>

        <x-form.multiselect :name="'cast'" :label="'Cast Members'" :options="$people" :values="$movie?->actors()->pluck('name')->toArray()"/>

        <button type="submit" class="btn btn-success mt-3">{{ $button }}</button>
    </form>
</x-form.formfield>




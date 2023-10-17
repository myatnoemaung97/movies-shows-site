@props(['header', 'people'])

<x-form.formfield>
    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <h3 class="text-center">{{ $header }}</h3>

        <x-form.input :name="'title'" :label="'Title'" />

        <x-form.select :name="'age_rating'" :label="'Age Rating'"  :options="['G', 'PG', 'PG-13', 'R', 'NC-17']"/>

        <x-form.input :type="'date'" :name="'release_date'" :label="'Release Date'" />

        <x-form.textarea :name="'description'" :label="'Description'" :rows="8"/>

        <x-form.input :type="'number'" :name="'run_time'" :label="'Run time (in minutes)'"/>

        <x-form.input :type="'file'" :name="'poster'" :label="'Poster'"/>

        <x-form.input :type="'text'" :name="'trailer'" :label="'Trailer Link'"/>

        <x-form.multiselect :name="'directors'" :label="'Director(s)'" :options="$people" />

        <x-form.multiselect :name="'cast'" :label="'Cast Members'" :options="$people" />

        <button type="submit" class="btn btn-success mt-3">Create</button>
    </form>
</x-form.formfield>




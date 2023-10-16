@props(['header'])

<x-form.formfield>
    <form action="{{ route('movies.store') }}" method="POST">
        @csrf

        <h3 class="text-center">{{ $header }}</h3>

        <x-form.input :name="'title'" :label="'Title'" />

        <x-form.select :name="'age_rating'" :label="'Age Rating'"  :options="['G', 'PG', 'PG-13', 'R', 'NC-17']"/>

        <x-form.input :type="'date'" :name="'release_date'" :label="'Release Date'" />

        <x-form.textarea :name="'description'" :label="'Description'"/>

        <x-form.input :type="'number'" :name="'run_time'" :label="'Run time (in minutes)'"/>

        <button type="submit" class="btn btn-success">Create</button>
    </form>
</x-form.formfield>




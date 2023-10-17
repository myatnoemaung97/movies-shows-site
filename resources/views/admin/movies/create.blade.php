<x-admin-layout>
    <main style="padding: 20px;">
        <a href="/admin/movies" class="btn btn-success float-right">Back</a>
        <x-form.movie-form :header="'Create A New Movie'" :people="$people"/>
    </main>
</x-admin-layout>

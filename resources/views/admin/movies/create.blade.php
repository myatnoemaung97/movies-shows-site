<x-admin-layout>
    <main style="padding: 20px;">
        <a href="/admin/movies" class="btn btn-success float-right">Back</a>
        <x-form.movie-form :action="'/admin/movies'" :method="'POST'" :header="'Create A New Movie'" :people="$people" :genres="$genres" :button="'Create'"/>
    </main>
</x-admin-layout>

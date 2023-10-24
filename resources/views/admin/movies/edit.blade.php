<x-admin-layout>
    <main style="padding: 20px;">
        <a href="{{ back()->getTargetUrl() }}" class="btn btn-success float-right">Back</a>
        <?php $action = "/admin/movies/$movie->slug" ?>
        <x-form.movie-form :action="$action" :method="'PATCH'" :header="'Edit Movie'" :people="$people" :genres="$genres" :movie="$movie" :button="'Save'"/>
    </main>
</x-admin-layout>

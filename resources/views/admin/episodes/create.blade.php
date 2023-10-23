<x-admin-layout>
    <main style="padding: 20px;">
        <a href="{{ route('seasons.show', [$show->slug, $season->season_number]) }}"
           class="btn btn-success float-right">Back</a>
        <x-form.episode-form
            :action="'/admin/shows/' . $show->slug . '/seasons/' . $season->season_number . '/episodes'"
            :method="'POST'" :header="'Create A New Episode'" :button="'Create'"
            :show="$show" :season="$season"
        />
    </main>
</x-admin-layout>

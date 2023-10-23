<x-admin-layout>
    <main style="padding: 20px;">
        <a href="/admin/shows/{{ $show->slug }}/seasons/{{ $season->season_number }}"
           class="btn btn-success float-right">Back</a>
        <x-form.season-form :action="'/admin/shows/'. $show->slug. '/seasons/' . $season->season_number"
                            :method="'PATCH'" :show="$show" :season="$season" :header="'Edit Season'" :button="'Save'"/>
    </main>
</x-admin-layout>

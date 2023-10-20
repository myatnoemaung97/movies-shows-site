<x-admin-layout>
    <main style="padding: 20px;">
        <a href="/admin/shows/{{ str_replace(' ', '-', $show->title) }}/seasons/{{ $season->id }}" class="btn btn-success float-right">Back</a>
        <x-form.season-form :action="'/admin/shows/'. $show->id . '/seasons/' . $season->id" :method="'PATCH'" :show="$show" :season="$season" :header="'Edit Season'" :button="'Save'"/>
    </main>
</x-admin-layout>

<x-admin-layout>
    <main style="padding: 20px;">
        <a href="/admin/shows/{{ $show->slug }}" class="btn btn-success float-right">Back</a>
        <x-form.season-form :action="'/admin/shows/'. $show->slug . '/seasons'" :method="'POST'" :show="$show" :header="'Create A New Season'" :button="'Create'"/>
    </main>
</x-admin-layout>

<x-admin-layout>
    <main style="padding: 20px;">
        <a href="/admin/playlists" class="btn btn-success float-right">Back</a>
        <x-form.playlist-form :action="'/admin/playlists'" :method="'POST'" :header="'Create A New Playlist'" :medias="$medias"  :button="'Create'"/>
    </main>
</x-admin-layout>

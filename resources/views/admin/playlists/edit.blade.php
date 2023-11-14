<x-admin-layout>
    <main style="padding: 20px;">
        <a href="{{ back()->getTargetUrl() }}" class="btn btn-success float-right">Back</a>
        <x-form.playlist-form :action="'/admin/playlists/' . $playlist->id" :method="'PATCH'" :header="'Edit Playlist'"
                             :playlist="$playlist" :medias="$medias" :button="'Save'"/>
    </main>
</x-admin-layout>

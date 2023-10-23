<x-admin-layout>
    <main style="padding: 20px;">
        <a href="{{ back()->getTargetUrl() }}" class="btn btn-success float-right">Back</a>
        <x-form.episode-form
            :action="'/admin/shows/' . $show->slug . '/seasons/' . $season->season_number . '/episodes/' . $episode->episode_number"
            :method="'PATCH'" :header="'Edit Episode'" :button="'Save'"
            :show="$show" :season="$season" :episode="$episode"
        />
    </main>
</x-admin-layout>

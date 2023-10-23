@props(['action', 'method', 'header', 'button', 'show', 'season', 'episode' => null])

<x-form.formfield>
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method($method)

        <input type="hidden" name="season_id" value="{{ $season->id }}">

        <h3 class="text-center">{{ $header }}</h3>

        <h4 class="mt-5">{{ $show->title }} - Season {{ $season->season_number }} {{ $episode !== null ? 'Episode ' . $episode->episode_number : '' }}</h4>

        <x-form.input :name="'title'" :label="'Title'" :value="$episode?->title"/>

        <x-form.input :type="'number'" :name="'episode_number'" :label="'Episode Number'"
                      :value="$episode?->episode_number"/>

        <x-form.input :type="'number'" :name="'run_time'" :label="'Run Time'" :value="$episode?->run_time"/>

        <x-form.input :type="'date'" :name="'release_date'" :label="'Release Date'"
                      :value="$episode?->release_date"/>

        <x-form.textarea :name="'description'" :label="'Description'" :rows="8" :value="$episode?->description"/>

        <button type="submit" class="btn btn-success mt-3">{{ $button }}</button>
    </form>
</x-form.formfield>




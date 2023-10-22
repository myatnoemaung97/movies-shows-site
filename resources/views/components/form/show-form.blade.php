@props(['action', 'method', 'header', 'people', 'genres', 'button', 'show' => null])

<x-form.formfield>
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method($method)

        <h3 class="text-center">{{ $header }}</h3>

        <x-form.input :name="'title'" :label="'Title'" :value="$show?->title"/>

        <x-form.select :name="'age_rating'" :label="'Age Rating'" :options="['G', 'PG', 'PG-13', 'R', 'NC-17']"
                       :value="$show?->age_rating"/>

        <div class="row">
            <div class="col-6">
                <x-form.input :type="'date'" :name="'release_date'" :label="'Release Date'"
                              :value="$show?->release_date"/>
            </div>
            <div class="col-6">
                <x-form.select :name="'status'" :label="'Status'" :options="['on going', 'finished', 'canceled']"
                               :value="$show?->status"/>
            </div>
        </div>

        <x-form.textarea :name="'description'" :label="'Description'" :rows="8" :value="$show?->description"/>

        <x-form.multiselect :name="'genres'" :label="'Genre(s)'" :options="$genres" :values="$show?->genres()->pluck('name')->toArray()"/>

        <x-form.input :type="'file'" :name="'poster'" :label="'Poster'" :value="$show?->poster"/>

        <x-form.input :type="'text'" :name="'trailer'" :label="'Trailer Link'" :value="$show?->trailer"/>

        <x-form.multiselect :name="'creators'" :label="'Creators(s)'" :options="$people"
                            :values="$show?->creators()->pluck('name')->toArray()"/>

        <x-form.multiselect :name="'cast'" :label="'Cast Members'" :options="$people"
                            :values="$show?->actors()->pluck('name')->toArray()"/>

        <button type="submit" class="btn btn-success mt-3">{{ $button }}</button>
    </form>
</x-form.formfield>




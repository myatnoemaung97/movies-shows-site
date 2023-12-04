@props(['action', 'method', 'header', 'button', 'person' => null])

<x-form.formfield>
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method($method)

        <h3 class="text-center">{{ $header }}</h3>

        <x-form.input :name="'name'" :label="'Name'" :value="$person?->name"/>

        <x-form.input :name="'birthday'" :type="'date'" :label="'Date of Birthday'" :value="$person?->birthday"/>

        <x-form.input :name="'country'" :label="'Country'" :value="$person?->country"/>

        <x-form.input :name="'height'" :type="'number'" :label="'Height (cm)'" :value="$person?->height"/>

        <label class="mt-3" for="roles">Role(s)</label>
        <select class="js-example-basic-multiple form-control text-black" id="roles" name="roles[]"
                multiple="multiple">
            <option value="" disabled>-select</option>
            <option
                value="Actor" {{ in_array('Actor', explode(', ', $person?->roles)) ? 'selected' : '' }}>
                Actor
            </option>
            <option
                value="Director" {{ in_array('Actor', explode(', ', $person?->roles)) ? 'selected' : '' }}>
                Director
            </option>
        </select>
        <x-form.error :name="'roles'"/>

        <x-form.textarea :name="'bio'" :label="'Biography (summary)'" :rows="5" :value="$person?->bio"/>

        <x-form.textarea :name="'biography'" :label="'Biography (full)'" :rows="10" :value="$person?->biography"/>

        <x-form.input :type="'file'" :name="'image'" :label="'Image'" :value="$person?->image"/>

        <button type="submit" class="btn btn-success mt-3">{{ $button }}</button>
    </form>
</x-form.formfield>




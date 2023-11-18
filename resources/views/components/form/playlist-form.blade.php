@props(['action', 'method', 'header', 'medias', 'button', 'playlist' => null])

<x-form.formfield>
    <form action="{{ $action }}" method="POST">
        @csrf
        @method($method)

        <h3 class="text-center">{{ $header }}</h3>

        <x-form.input :name="'name'" :label="'Name'" :value="$playlist?->name"/>

        <label class="mt-3" for="medias">Media(s)</label>
        <select class="js-example-basic-multiple form-control text-black" id="medias" name="medias[]"
                multiple="multiple">
            <option value="">-select</option>
            @foreach($medias as $media)
                <?php $class = class_basename($media) ?>
                <option
                    value="{{ $media->id }},{{ $class }}" {{ ($class === 'Movie' ? $playlist?->movies()->contains($media) : $playlist?->shows()->contains($media)) ? 'selected' : '' }}>{{ $media->title }}
                    ({{ date('Y', strtotime($media->release_date)) }}
                    ) {{ $class === 'Show' ? 'TV-Series' : '' }}</option>
            @endforeach
        </select>
        <x-form.error :name="'medias'"/>

        <button type="submit" class="btn btn-success mt-3">{{ $button }}</button>
    </form>
</x-form.formfield>




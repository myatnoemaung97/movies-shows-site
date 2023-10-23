<x-show-season :show="$show" :seasons="$seasons">
    <div class="text-center">
        <img src="{{ $show->poster }}" alt="show poster"
             style="max-width: 200px; max-height: 500px;">
    </div>
    <hr>
    <div>
        <div class="d-flex flex-column float-right">
            <p>Created: {{ $show->created_at }}</p>
            <p>Updated: {{ $show->updated_at }}</p>
            <div class="d-flex justify-content-end">
                <a class="btn btn-success" href="{{ route('shows.edit', $show->slug) }}">Edit</a>
            </div>
        </div>
        <h4><a href="{{ route('shows.show', $show->slug) }}" style="text-decoration: none;"
               class="text-black">{{ $show->title }}</a></h4>
        <p class="mt-3">Rating: {{ $show->age_rating }}</p>
        <p>Release Date: {{ $show->release_date }}</p>
        <p>Status: {{ ucwords($show->status) }}</p>
        <p>Genre(s): {{ ucwords(implode(', ', $show->genres()->pluck('name')->toArray())) }}</p>
        <p>Creator(s): <span
                class="fw-semibold">{{ implode(', ', $show->creators()->pluck('name')->toArray()) }}</span>
        </p>
        <p>Cast: <span
                class="fw-semibold">{{ implode(', ', $show->actors()->pluck('name')->toArray()) }}</span>
        </p>
    </div>
    <hr>
    <div>
        <h5>Description</h5>
        <p>{{ $show->description }}</p>
    </div>
    <hr>
    <div>
        <h5>Trailer</h5>
        <p><a href="{{ $show->trailer }}" target="_blank">{{ $show->trailer }}</a></p>
    </div>
</x-show-season>

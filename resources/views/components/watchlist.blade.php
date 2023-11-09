@props(['medias'])

<div class="topbar-filter user">
    <p>Found <span>{{ $medias->count() }} medias</span> in total</p>
    <label>Sort by:</label>
    <select>
        <option value="range">-- Choose option --</option>
        <option value="saab">-- Choose option 2--</option>
    </select>
</div>
<div class="flex-wrap-movielist user-fav-list">
    @foreach($medias as $media)
        <x-media-list-item :media="$media"/>
    @endforeach
    {{ $medias->links() }}
</div>

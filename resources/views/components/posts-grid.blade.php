@props(['posts'])

@if ($posts->count())
    <x-post-featured-card :post="$posts->first()" />

    @if ($posts->count() > 1)
        <div class="lg:grid lg:grid-cols-6 gap-6">
            @foreach ($posts->skip(1)->take(2) as $post)
                <x-post-card :post="$post" class="col-span-3" />
            @endforeach
        </div>
    @endif

    @if ($posts->count() > 3)
        <div class="lg:grid lg:grid-cols-6 gap-6">
            @foreach ($posts->skip(3) as $post)
                <x-post-card :post="$post" class="col-span-2" />
            @endforeach
        </div>
    @endif
@else
    <p class="text-center text-gray-500 py-10">No posts found matching your criteria. Check back later!</p>
@endif

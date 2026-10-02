@props(['category'])

<a href="/?category={{ $category->slug }}{{ request('search') ? '&search=' . request('search') : '' }}"
   class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold hover:border-blue-500 hover:text-blue-500 transition-colors"
   style="font-size: 10px">
    {{ $category->name }}
</a>

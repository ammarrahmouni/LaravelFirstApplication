@auth
<a href="{{ route('home') }}" class="list-group-item list-group-item-action">{{ __('home.all') }} </a>
 
@else 

<a href="{{ route('guset.user') }}" class="list-group-item list-group-item-action">{{ __('home.all') }} </a>

@endauth

@if (isset($categories) && $categories->count() > 0)
    @foreach ($categories as $category)
        <a href="{{ route('category.post', $category->id) }}"
            class="list-group-item list-group-item-action">{{ $category->name }} </a>
    @endforeach
@endif

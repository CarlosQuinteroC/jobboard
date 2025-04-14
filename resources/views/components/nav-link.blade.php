@props(['active' => false])

<a class="{{ $active ? 'bg-white text-red-700 border-red-500': 'bg-red-700 text-white hover:bg-black hover:text-white'}} rounded-md px-10 mr-4 py-2 br text-sm font-medium"
   aria-current="{{ $active ? 'page': 'false' }}"
   {{ $attributes }}
>{{ $slot }}</a>

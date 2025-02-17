<!-- <a {{ $attributes }}></a> -->
@props(['active' => false, 'type' =>'a'])
<?php if ($type ==='a') : ?>

<a class="{{ $active ? 'bg-white text-gray' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}
rounded-md px-3 py-2 text-sm font-medium" aria-current="{{ $active ? 'page': 'false' }}"
{{ $attributes }}
>{{ $slot }}</a>

<?php else : ?>
<button class="{{ $active ? 'bg-white text-gray' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}
rounded-md px-3 py-2 text-sm font-medium" aria-current="{{ $active ? 'page': 'false' }}"
{{ $attributes }}
>{{ $slot }}</button>
<?php endif ?>
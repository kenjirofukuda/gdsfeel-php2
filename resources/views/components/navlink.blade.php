@props(['active' => false])

<a class="{{ $active ? 'bg-blue-900 text-white visited:text-white' : 'text-gray-800 hover:bg-gray-200 hover:text-black' }}"
    {{ $attributes }}>
    {{ $slot }}
</a>

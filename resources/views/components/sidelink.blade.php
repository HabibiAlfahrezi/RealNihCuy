@props(['active' => false])

<a
  {{ $attributes->merge([
    'class' => ($active ? 'text-primary bg-orange-100' : 'text-dark') . ' group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium duration-300 ease-in-out hover:bg-orange-100 hover:text-primary dark:hover:bg-meta-4'
  ]) }}
>
  {{ $slot }}
</a>

<div id="element-list" class="border border-gray400 flex vscroll">
    @if (isset($structure))
        @foreach ($structure->elements() as $el)
            <a
                href="/structure/{{ $struc_name }}/element/{{ $el->elkey }}"
                class="block border-b border-gray-400">
                {{ $el }}
            </a>
        @endforeach
    @endif
</div>

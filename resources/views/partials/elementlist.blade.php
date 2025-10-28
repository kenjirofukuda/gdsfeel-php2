<div id="element-list" class="border border-gray400 flex vscroll">
    @unless (empty($structure))
        @foreach ($structure->elements() as $el)
            <x-navlink
                href="/structure/{{ $struc_name }}/element/{{ $el->elkey }}"
                :active="isset($element) ? $element->elkey === $el->elkey : false"

            >
                {{ $el }}
            </x-navlink>
        @endforeach
    @endunless
</div>

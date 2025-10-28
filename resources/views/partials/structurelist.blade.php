@php
$basic_class = 'block border-b border-gray-400';
@endphp
<div id="struc-list" class="border border-gray400 flex vscroll">
    @foreach ($library->structureNames() as $sn)
        <a
            href="/structure/{{ $sn }}"
            class="{{ $basic_class }}">
            {{ $sn }}
        </a>
    @endforeach
</div>

<div id="struc-list" class="border border-gray400 flex vscroll">
    @foreach ($library->structureNames() as $sn)
        <x-navlink
            href="/structure/{{ $sn }}"
            :active="$struc_name === $sn"
        >
            {{ $sn }}
        </x-navlink>
    @endforeach
</div>

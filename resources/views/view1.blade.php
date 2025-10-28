@php
$struc_name = "dummy_struct" ;
$head = "dummy_head" ;
$element = [
'attr1' => 'val1',
'attr2' => 'val2',
];
//$inform = Inform::seed_instance();
//var_dump($inform);
@endphp
<!DOCTYPE html>
<html>
    <head>
        <title>GdsFeel</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="{{ asset('css/styles2.css') }}">
    </head>
    <body>
        <div id="container" class="box max-h-full">
            <div id="row1" class="header row">
                <div id="struc_name" style="visibility: hidden;">{{ $struc_name }}</div>
                <div id="prefs">
                    ここにプリファレンスパネル
                </div>
                <div>data path: <span id="struc_path" class="font-bold">
                    {{ $head }}
                </span></div>
            </div>
            <div id="row2" class="content row flex">
                <!-- Structure リスト -->
                <div id="struc-list" class="flex vscroll">
                    <ul class="no-bullets nav-list-vivid">
                        @foreach ($library->structureNames() as $sn)
                            <li>{{ $sn }}</li>
                        @endforeach
                    </ul>
                </div>
                @if (1 === 0)
                    <!-- Element リスト -->
                    <div id="element-list" class="flex vscroll">
                        <ul class="no-bullets nav-list-vivid">
                            @for ($i = 0; $i < 10; $i++)
                                <li>elem-{{ $i }}</li>
                            @endfor
                        </ul>
                    </div>
                @endif
                @if (1 === 0)
                    <!-- Element インスペクター -->
                    <div id="element-inspector" class="flex vscroll">
                        <div id="php_inspector">
                            {{ var_dump($element, true) }}
                        </div>
                        <div id="js_inspector"></div>
                    </div>
                @endif
                <div id="box-right" class="flex">
                    @include('partials.coordinateinfo')
                    @include('partials.viewingcmds')
                    <div id="canvas-wrapper" class="bg-sky-50">
                        <canvas id="canvas"></canvas>
                    </div>
                </div>

            </div> <!-- row2 -->
            <div id="row3" class="row footer">
                <p><b>states area</b> (reserved)</p>
            </div>
        </div> <!-- container -->
    </body>
</html>

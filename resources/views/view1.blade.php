@php
$struc_name = "dummy_struct" ;
$head = "dummy_head" ;
//$inform = Inform::seed_instance();
//var_dump($inform);
$struc_name = $structure->name ?? '';
@endphp
<!DOCTYPE html>
<html>
    <head>
        <title>GdsFeel</title>
        <link rel="stylesheet" href="{{ asset('css/styles2.css') }}">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
        <div id="container" class="box max-h-full">
            <div id="row1" class="header row">
                <div id="struc_name" style="visibility: hidden;">{{ $struc_name }}</div>
                <div id="prefs">
                    ここにプリファレンスパネル
                </div>
                <div>data path: <span id="struc_path" class="font-bold">
                    {{ $library->name . '/' . $struc_name }}
                </span></div>
            </div>
            <div id="row2" class="content row flex">
                <!-- Structure リスト -->
                @include('partials.structurelist')
                @if (isset($structure))
                    <!-- Element リスト -->
                    @include('partials.elementlist')
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

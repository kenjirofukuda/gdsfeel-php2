<?php
$struc_name = $structure->name ?? '';
if (!copy(storage_path('lib_data.js'), public_path('js/lib_data.js'))) {
  dd('copy fail: ' . storage_path('lib_data.js') . ' to '. public_path('js/lib_data.js'));
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>{{ env('APP_NAME')  }}</title>
        <link rel="stylesheet" href="{{ asset('css/styles2.css') }}">
        @include('partials.cdn');
        @include('partials.scripts');
    </head>
    <body onload="loadIt()">
        <div id="container" class="box max-h-full">
            <div id="row1" class="header row">
                <div id="struc_name" class="h-0 invisible">{{ $struc_name }}</div>
                <div id="prefs" class="h-0 invisible">
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

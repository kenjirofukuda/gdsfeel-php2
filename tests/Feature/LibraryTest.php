<?php

use \App\gds\Structure;

test('library not null', function () {
    expect($this->library)->not->tobeNull();
});

test('name is "bghier"', function () {
    expect($this->library->name)->toBe('bghier');
});

test('structures() not empty', function () {
    $result = $this->library->structures();
    expect($result)->toBeArray();
    expect(count($result))->not->toBeEmpty();
    expect(count($result))->toBe(31);
    // FIXME: use polyfill's array_all needed. <= php8.4
    // $all_structure = array_all($result, fn($s) => $s::class === Structure::class);
    // expect($all_structure)->toBeTrue();
    foreach ($result as $s) {
        // expect can't get Expection instance
        // expect($s)->toBeInstaceOf(Structure::class);
        expect($s::class === Structure::class)->toBeTrue();
    }
});


test('library structureNames() not empty', function () {
    $expected = [
        'PC',
        '2PC',
        'VIA',
        '2VIA',
        'AC',
        'MNC_AON',
        'VIAC',
        'VC',
        'AON_',
        'CV',
        'BAN_MOS',
        'BGAOP_C2',
        'C',
        'V',
        'Q',
        'BUF_Q1',
        'BUFINT_N',
        'BAN_MNC2',
        'BAN_MNC1',
        'PROB_PAD',
        'RW_AC',
        'RW',
        'RC_RD',
        'PMOS',
        'BG_MNR',
        'MNC_',
        'BGAON_',
        'RBG',
        'BANDG_Q',
        'BGAOP',
        'Bandgap'
    ];
    $result = $this->library->structureNames();
    expect($result)->toEqualCanonicalizing($expected);
});


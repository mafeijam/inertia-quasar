<?php

use App\Translate;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;

Route::get('/', function () {
    return Inertia::render('Index');
});

Route::get('/login', function () {
    return Inertia::render('Login');
});


Route::get('/about', function () {
    // session()->put('flash', 'hi');
    return Inertia::render('About')->with('flash', 'hihi');
});

Route::get('/translate', function () {
    return Inertia::render('Translate');
});

Route::post('/translate', function (Request $request) {
    $valid = $request->validate([
        'en' => 'required',
        'zh' => 'required'
    ]);

    Translate::create([
        'key' => Str::random(5),
        'data' => $valid
    ]);

    return back()->with('flash', 'success');
});

Route::get('/client', function () {
    return Inertia::render('Client');
});

Route::get('/pdf', function () {
    $pdf = app('dompdf.wrapper');

    $image = Storage::get('victorysec_logo.png');

    $image = 'data:image/png;base64,' . base64_encode($image);

    return  $pdf->loadView('pdf.client', compact('image'))->stream('file.pdf');
});


Route::get('/g', function () {
    ini_set('memory_limit', '-1');
    set_time_limit(0);
    $start = microtime(true);

    exec('curl google.com');

    // return microtime(true) - $start;

    $done = LazyCollection::times(1000000, function ($n) {
        return tap(new stdClass, function ($obj) use ($n) {
            $obj->a = $n;
            $obj->aa = Str::random(10);
            $obj->aaa = Str::random(10);
            $obj->aaaa = Str::random(10);
            $obj->aaaaa = Str::random(10);
            $obj->b = Str::random(10);
            $obj->bb = Str::random(10);
            $obj->bbb = Str::random(10);
            $obj->bbbb = Str::random(10);
            $obj->bbbbb = Str::random(10);
            $obj->c = Str::random(10);
            $obj->cc = Str::random(10);
            $obj->ccc = Str::random(10);
            $obj->cccc = Str::random(10);
            $obj->ccccc = Str::random(10);
            $obj->ccccc = Str::random(10);
        });
    })->map(function ($n) {
        $n->m = $n->a % 100000 === 0;
        $n->mu = number_format(memory_get_peak_usage() / 1024 / 1024, 2);
        return $n;
    })->where('m', true)->all();

    return microtime(true) - $start;
});

<?php

$callback = function() {
    return view('routing.routing');
};

Route::get('/', $callback);
Route::post('/', $callback);
Route::put('/', $callback);
Route::patch('/', $callback);
Route::delete('/', $callback);
Route::options('/', $callback);

Route::match(['get', 'post', 'put', 'patch', 'delete', 'options'], '/match', function() {
    return view('routing.match');
});

Route::any('/any', function() {
    return view('routing.any');
});

Route::redirect('redirect', 'routing', 301);

Route::view('/view', 'routing.view', [ 'value' => 'value' ]);

Route::get('parameters/{one}/{two}/{three?}', function ($oneId, $two, $three = 'three-value') {
    echo "one $oneId, two $two, three $three";
    var_dump(route('parameters', [ 'one' => 1, 'two' => 'two-value' ]));
})->where([
    'one' => '[0-9]+',
    'two' => '[a-z]+'
])->name('parameters');

Route::name('name1.')->group(function () {
    Route::get('name2', function () {
        var_dump(request()->route()->named('name1.name2'));
    })->name('name2');
});

Route::get('users/{user}', function (App\User $user) {
    return $user->email;
});
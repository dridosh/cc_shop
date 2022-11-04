<pre>
<?php
function foo()
{
    static $count = 4;
    return ++$count;
}
print foo();
print foo();
print foo();







function delete_sidorov(array $data)
{
    foreach ($data as $key => $item) {
        if ($item['name'] == 'Сидоров') {
            unset($data[$key]);
        }
    }
    return $data;
}

$a = array(
    array(
        'name'      => 'Сидоров',
        'specialty' => 'техник'
    ),
    array(
        'name'      => 'Петров',
        'specialty' => 'тракторист'
    ),
    array(
        'name'       => 'Иванов',
        'speciality' => 'фермер'
    )
);
$result = delete_sidorov($a);

var_dump($result);

{{--@extends('layout.app')--}}
{{--@section('content')--}}
{{--    @auth()--}}
{{--        <form method="POST" action="{{ route('logOut') }}">--}}
{{--            @csrf--}}
{{--            @method('DELETE')--}}
{{--            <button type="submit">Выйти</button>--}}
{{--        </form>--}}
{{--    @endauth--}}

{{--    @guest()--}}
{{--        <form method="GET" action="{{ route('login') }}">--}}
{{--            @csrf--}}
{{--            <button type="submit">вход</button>--}}
{{--        </form>--}}
{{--    @endguest--}}
{{--@endsection--}}

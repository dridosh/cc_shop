
{{--<pre>
   @php(print_r($outArray) )
</pre>--}}

@extends('layout.app')

{{--   @dump($outArray)--}}

@section('content')


    {{--    {{ debug(route('logOut'), route('login')) }}--}}

    @auth()
        <form method="POST" action="{{ route('logOut') }}">
            @csrf
            @method('DELETE')
            <button type="submit">Выйти</button>
        </form>
    @endauth

    @guest()
        <form method="GET" action="{{ route('login') }}">
            @csrf
            <button type="submit">вход</button>
        </form>
    @endguest




@endsection

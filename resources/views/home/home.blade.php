
@extends('layouts.app')


@section('title', 'Доска объявлений')

@section('content')

    @include('home.blocks.header')

{{--    @include('layouts.breadcrumbs')--}}
{{--    {{ Breadcrumbs::render('home') }}--}}

    @include('home.blocks.card')

    @include('home.blocks.footer')


@endsection

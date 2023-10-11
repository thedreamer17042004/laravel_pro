@extends('layouts.website')
@section('content')

@include('website.includes.all_banner')

{{ $url = Config::set('app.value_menu',false) }}
@include('website.includes.index_menu1')


@include('website.includes.index_menu2')


@stop
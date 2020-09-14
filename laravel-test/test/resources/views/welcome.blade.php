@extends('layouts.app')

@section('title', 'Add advert')

@section('content')

    <h2>Тестовое задание "Создать JSON API для сайта объявлений"</h2>

    <a href="{{route('add.advert')}}">Добавить объявление</a>
    <br>
    <a href="{{route('show.advert.list')}}">Показать объявления</a>

@endsection

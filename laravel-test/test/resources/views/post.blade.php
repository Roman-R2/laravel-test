@extends('layouts.app')

@section('title', 'Add advert')

@section('content')

    <div class="d-flex justify-content-center align-items-center" style="height: 100%; ">
        <form action="http://localhost:8080/api/v1/adverts" style="width: 600px;" method="POST" enctype="application/json">
            <div class="form-group row">
                <label for="advertLabel" class="col-sm-2 col-form-label">Название</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="advertLabel" name="title" placeholder="Название объявления">
                </div>
            </div>
            <div class="form-group row">
                <label for="advertDescription" class="col-sm-2 col-form-label">Описание</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="advertDescription" rows="3" name="description" placeholder="Описание объявления" required></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="advertDescription" class="col-sm-2 col-form-label">Фото 1</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="photo1" name="photo1" placeholder="Ссылка на фото" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="advertDescription" class="col-sm-2 col-form-label">Фото 2</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="photo2" name="photo2" placeholder="Ссылка на фото">
                </div>
            </div>
            <div class="form-group row">
                <label for="advertDescription" class="col-sm-2 col-form-label">Фото 3</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="photo3" name="photo3" placeholder="Ссылка на фото">
                </div>
            </div>
            <div class="form-group row">
                <label for="advertPrice" class="col-sm-2 col-form-label">Цена</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="advertPrice" name="price" placeholder="Цена" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Опубликовать</button>
                </div>
            </div>
        </form>
    </div>
@endsection

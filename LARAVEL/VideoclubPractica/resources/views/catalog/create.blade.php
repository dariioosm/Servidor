<!DOCTYPE html>
<html>
    <body>
    @extends('layouts.master')
    @section('content')
    <div class="row">
        <form method="post" action="{{ route('catalog.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Título de la película</label>
                <input type="text" class="form-control" name="title" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Año</label>
                <input type="number" class="form-control" name="year" min="1900" max="2099" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Director</label>
                <input type="text" class="form-control" name="director" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Poster</label>
                <input type="text" class="form-control" name="poster">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Sinopsis
                    <textarea name="synopsis" id="" cols="30" rows="10"></textarea>
                </label>
                
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
            </div>
        @endsection
    </body>
</html>
@extends('layouts.main')
@section('title', 'Crie o Post')

@section('content')

<div class="container" id="container-principal">
    <div id="post-create-container" class="col-md-10 offset-md-1">
        <h1>Cria o evento</h1>
        <form action="/post/store" id="form-create-post" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Imagem</label>
                <input type="file" id="image" class="form-control-file" name="image" placeholder="Insera uma imagem">
            </div>
            <div class="form-group">
                <label for="title">Titulo do Post</label>
                <input type="text" id="title" class="form-control" name="title" placeholder="Titulo">
            </div>
            <div class="form-group">
                <label for="description">Conteundo do post</label>
                <textarea name="content" id="conteudoTextarea" hidden cols="30" rows="10"></textarea>
                <div id="summernote" class="summernote-borde" ></div>
            </div>
            <button type="submit">Salvar</button>
        </form>
    </div>
</div>
@endsection

@section('footer-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/lang/summernote-pt-BR.min.js"></script>
<script src="/js/summernote.js"></script>

@endsection
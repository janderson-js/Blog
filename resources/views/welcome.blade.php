@extends('layouts.main')
@section('title', 'Home')

@section('content')


<div id="search-container" class="col-md-12">
                <h1 id="h1">Busque um Post</h1>
                <form action="/" method="get">
                    <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
                </form>
            </div>
<div class="container" id="container-principal">

    <div class="col-md-12">


 
        <div class="row">
            <div class="col-sm p-3">
                <div class="container">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

                        @forelse ($posts as $post)
                        <!-- Postagem 1 -->
                        <div class="col post-card">
                            <div class="card">
                                <img src="{{ $post->thumb }}" class="card-img-top" alt="Imagem do Post 1">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text">Postado Por: {{ $post->user->full_name}}</p>
                                    <a href="/post/{{$post->id}}" class="btn btn-primary">Leia mais</a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <h1>Não Encontrei nada</h1>
                        @endforelse


                        <!-- Adicione mais posts conforme necessário -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
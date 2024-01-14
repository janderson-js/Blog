@extends('layouts.main')
@section('title', $post->title)

@section('content')

<div class="container" id="container-principal">
    <div class="col-md-12">
        <div class="row">
            <div class="col-sm p-3">
                <div class="container">

                    <div class="col post-card">
                        <div class="row">
                            <div class="card">
                                <div class="container mt-5">
                                    <!-- Post -->
                                    <div class="card" id="show-post">
                                        <div class="card-body">
                                            <!-- Imagem do Post -->
                                            <figcaption class="figure-caption">
                                                <img src="{{ $post->user->thumb }}"
                                                    style="width: 75px ; heigth: 75px ; border-radius: 100%;"
                                                    id="img-comment-user" class="img-fluid me-3"
                                                    alt="Imagem do Comentador 1">
                                                <span>{{ $post->user->full_name }}</span>
                                            </figcaption>
                                            
                                            <div class="text-center" id="img-post">
                                                <img class="img-fluid" src="{{$post->thumb}}" alt="{{$post->title}}">

                                            </div>
                                            <h2 class="text-center" id="title">{{$post->title}}</h2>
                                            <!-- Conteúdo do Post -->
                                            <div>

                                                <p class="text-center text-justify">{!! $post->content !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container mt-5">
                                    <!-- Formulário de Comentário -->

                                    <form>
                                        <div class="mb-3">
                                            <label for="comentario" class="form-label">Comentário:</label>
                                            <textarea class="form-control" id="comentario" rows="3" required></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Enviar Comentário</button>
                                    </form>

                                    <div class="mt-4" id="container-comments">
                                        <h3>Comentários:</h3>
                                        @forelse ($post->comments as $comment)
                                        <div class="container mt-5" id="comment">
                                            <!-- Comentário Principal -->
                                            <div class="card mb-3 comment">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <img src="{{ $comment->user->thumb }}"
                                                            style="width: 75px; height: 75px; border-radius: 100%;"
                                                            id="img-comment-user" class="img-fluid me-3"
                                                            alt="Imagem do Comentador 1">
                                                        <h5 class="card-title">{{ $comment->user->full_name }}</h5>
                                                    </div>
                                                    <p class="card-text">{{$comment->comment}}</p>

                                                    <!-- Botão de Resposta -->
                                                    <button type="button" class="btn btn-primary"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#replyForm{{ $comment->id }}"
                                                        aria-expanded="false"
                                                        aria-controls="replyForm{{ $comment->id }}">
                                                        Responder
                                                    </button>

                                                    <!-- Formulário de Resposta (inicialmente oculto) -->
                                                    <div class="collapse mt-3" id="replyForm{{ $comment->id }}">
                                                        <form method="post" action="">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="resposta" class="form-label">Sua
                                                                    Resposta:</label>
                                                                <textarea class="form-control" id="resposta"
                                                                    name="resposta" rows="3" required></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Enviar
                                                                Resposta</button>
                                                        </form>
                                                    </div>

                                                    <!-- Respostas ao Comentário Principal -->
                                                    @foreach ($comment->answers as $answer)
                                                    <div class="card mb-3 comment comment-level-1">
                                                        <div class="card-body">
                                                            <div class="d-flex align-items-center mb-2">
                                                                <img src="{{ $answer->user->thumb }}"
                                                                    style="width: 75px; height: 75px; border-radius: 100%;"
                                                                    id="img-comment-user" class="img-fluid me-3"
                                                                    alt="Imagem do Comentador 1">
                                                                <div>
                                                                    <h5 class="card-title">{{$answer->user->full_name}}
                                                                    </h5>
                                                                    <figcaption class="figure-caption"> Em resposta:
                                                                        {{ $comment->user->full_name }}</figcaption>
                                                                </div>
                                                            </div>
                                                            <p class="card-text">{{$answer->answer}}</p>
                                                            <!-- Botão de Resposta -->
                                                            <button type="button" class="btn btn-primary"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#replyForm{{ $answer->id }}"
                                                                aria-expanded="false"
                                                                aria-controls="replyForm{{ $answer->id }}">
                                                                Responder
                                                            </button>

                                                            <!-- Formulário de Resposta (inicialmente oculto) -->
                                                            <div class="collapse mt-3" id="replyForm{{ $answer->id }}">
                                                                <form method="post" action="">
                                                                    @csrf
                                                                    <div class="mb-3">
                                                                        <label for="resposta" class="form-label">Sua
                                                                            Resposta:</label>
                                                                        <textarea class="form-control" id="resposta"
                                                                            name="resposta" rows="3"
                                                                            required></textarea>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary">Enviar
                                                                        Resposta</button>
                                                                </form>
                                                            </div>


                                                            
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @foreach ( $answer->replies as $replie)

                                                        <div class="card mb-3 comment comment-level-2">
                                                            <div class="card-body">
                                                                <div class="d-flex align-items-center mb-2">
                                                                    <img src="{{ $answer->user->thumb }}"
                                                                        style="width: 75px; height: 75px; border-radius: 100%;"
                                                                        id="img-comment-user" class="img-fluid me-3"
                                                                        alt="Imagem do Comentador 1">
                                                                    <div>
                                                                        <h5 class="card-title">{{$replie->user->full_name}}
                                                                        </h5>
                                                                        <figcaption class="figure-caption"> Em resposta:
                                                                            {{ $answer->user->full_name }}</figcaption>
                                                                    </div>
                                                                </div>
                                                                <p class="card-text">{{$replie->answer}}</p>
                                                                <!-- Botão de Resposta -->
                                                                <button type="button" class="btn btn-primary"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#replyForm{{ $replie->id }}"
                                                                    aria-expanded="false"
                                                                    aria-controls="replyForm{{ $replie->id }}">
                                                                    Responder
                                                                </button>

                                                                <!-- Formulário de Resposta (inicialmente oculto) -->
                                                                <div class="collapse mt-3" id="replyForm{{ $replie->id }}">
                                                                    <form method="post" action="">
                                                                        @csrf
                                                                        <div class="mb-3">
                                                                            <label for="resposta" class="form-label">Sua
                                                                                Resposta:</label>
                                                                            <textarea class="form-control" id="resposta"
                                                                                name="resposta" rows="3"
                                                                                required></textarea>
                                                                        </div>
                                                                        <button type="submit" class="btn btn-primary">Enviar
                                                                            Resposta</button>
                                                                    </form>
                                                                </div>


                                                            </div>

                                                        </div>
                                                    @endforeach
                                                </div>


                                            </div>
                                        </div>
                                    </div>


                                    @empty
                                    <p>Não há comentarios!! Seja o primeiro a comentar</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endsection
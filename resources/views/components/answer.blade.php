<!-- resources/views/components/answer.blade.php -->
<div class="card mb-3 comment comment-level-1">
    <div class="card-body">
        <div class="d-flex align-items-center mb-2">
            <img src="{{ $answer->user->thumb }}" style="width: 75px; height: 75px; border-radius: 100%;" id="img-comment-user" class="img-fluid me-3" alt="Imagem do Comentador 1">
            <div>
                <h5 class="card-title">{{ $answer->user->full_name }}</h5>
                <figcaption class="figure-caption"> Em resposta: {{ $comment->user->full_name }}</figcaption>
            </div>
        </div>
        <p class="card-text">{{ $answer->answer }}</p>

        <!-- Botão de Resposta -->
        <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#replyForm{{ $answer->id }}" aria-expanded="false" aria-controls="replyForm{{ $answer->id }}">
            Responder
        </button>

        <!-- Formulário de Resposta (inicialmente oculto) -->
        <div class="collapse mt-3" id="replyForm{{ $answer->id }}">
            <x-reply-form :comment="$comment" :answer="$answer" />
        </div>

        <!-- Respostas à Resposta -->
        @foreach ($answer->replies as $reply)
            <x-reply :reply="$reply" />
        @endforeach
    </div>
</div>

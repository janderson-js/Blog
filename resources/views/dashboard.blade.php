@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')

<div class="container" id="container-principal">

    @if(count($posts) > 0)
        <div class="col-md-10 offset-md-1 dashboard-title-container">

            <h1>Meus Posts</h1>

        </div>
        <div class="col-md-10 offset-md-1 dashboard-posts-container">


            <table class="table" style="text-align:center;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td scope="row"> {{$loop->index + 1}} </td>
                        <td><a href="/post/{{$post->id}}">{{$post->title}}</a></td>

                        <td class="dashboard-acao">
                            <a href="/post/edit/{{$post->id}}" class="btn btn-info edit-btn" title="Editar evento">
                                <ion-icon name="create-outline"></ion-icon>Editar
                            </a>
                            <form action="/post/delete/{{$post->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger danger-btn" title="Deletar evento">
                                    <ion-icon name="trash-outline"></ion-icon>Deletar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        @else
            <p>Você ainda não tem posts, <a href="/post/create">Criar Posts</a> </p>
        @endif
        </div>

</div>
@endsection

@section('footer-scripts')
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@endsection
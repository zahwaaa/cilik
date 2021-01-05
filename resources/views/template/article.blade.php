@extends('template.master')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <h6 class="text-primary"><b>{{ $article->article_category->name }}</b></h6>
    <h1 class="mt-2 mb-4"><b>{{ $title }}</b></h1>
    <p class="card-text">Oleh<br>{{ $article->user->name }} {{ $article->user->last_name }}<br>{{ $article->updated_at->format('d F Y') }}</p>
    <img src="{{ asset('storage/' . $article->thumbnail)}}" width="700" height="auto"><br><br><br>
    <pre class="col-9 ml-n2" style="font-family: 'Ubuntu', sans-serif!important; font-size: 18px;">
        {!! $article->content !!}
    </pre>
    <br>
    <h4 class="mt-2 mb-4"><b>{{ $article->article_comments()->where('is_approved', 1)->count() }} Komentars</b></h4>
    <form action="{{ route('comment', $article->id) }}" method="post">@csrf
        <textarea class="form-control col-6" name="comment" required></textarea>
        <button class="btn btn-info mt-3 mb-5" type="submit">Buat Komentar</button>
    </form>

    @foreach($article->article_comments()->where('is_approved', 1)->get() as $comment)
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    {{ $comment->user->name }}
                </div>
                <div class="card-body">
                    <p class="card-text">{!! $comment->comment !!}</p>
                </div>
                <div class="card-footer text-muted">
                    {{ $comment->updated_at->format('d F Y, H:i') }}
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

<x-layout>
    <div class="container-fluid p-5 bg-danger text-center text-white">
        <div class="row">
            <h1 class="display-1">
                Tutti gli articoli filtrati per: {{$query}}
            </h1>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-around">
            @foreach ($articles as $article)   
                <div class="col-12 col-md-3 my-2">
                    <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="foto articolo">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">{{$article->subtitle}}</p>
                        <p class="small fst-italic text-capitalize">
                            @foreach ($article->tags as $tag)
                                #{{$tag->name}}
                            @endforeach
                        </p>
                        @if ($article->category)
                            <a href="{{route('article.byCategory', ['category' => $article->category->id])}}" class="small text-muted fst-italic text-capitalize">{{$article->category->name}}</a>
                        @else
                            <p class="small text-muted fst-italic text-capitalize">Non categorizzato</p>
                        @endif
                        <span class="text-muted small fst-italic">- Tempo di lettura {{$article->readDuration()}} min</span>
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                        Redatto il {{$article->created_at->format('d/m/Y')}} da 
                        <a href="{{route('article.byUser', ['user' => $article->user->id])}}" class="small text-muted fst-italic text-capitalize">{{$article->user->name}}</a>
                        <a href="{{route('article.show', compact('article'))}}" class="btn btn-info text-white">Leggi</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
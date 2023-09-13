<x-layout>
    <div class="container-fluid p-5 bg-danger text-center text-white">
        <div class="row">
            <h1 class="display-1">
                Redattore {{$user->name}}
            </h1>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-around">
            @foreach ($articles as $article)
                <div class="col-12 col-md-3 my-2">
                    <div class="card">
                        <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="foto articolo">
                        <div class="card-body">
                            <h5 class="card-title">{{$article->title}}</h5>
                            <p class="card-text">{{$article->subtitle}}</p>
                            <a href="{{route('article.byCategory', ['category' => $article->category->id])}}" class="small text-muted fst-italic text-capitalize">{{$article->category->name}}</a>
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-center align-items-center">
                            <a href="{{route('article.show', compact('article'))}}" class="btn btn-info text-white">Leggi</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
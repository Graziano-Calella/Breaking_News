<x-layout>
    <div class="container-fluid p-5 bg-info text-center text-white">
        <div class="row">
            <h1 class="display-1">
                Inserisci articolo
            </h1>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="card p-5 shadow" action="{{route('article.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo:</label>
                        <input name="title" type="text" class="form-control" id="title" value="{{old('title')}}">
                    </div>
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo:</label>
                        <input name="subtitle" type="text" class="form-control" id="subtitle" value="{{old('subtitle')}}">
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Descrizione</label>
                        <textarea name="body" class="form-control" cols="30" rows="7" id="body">{{old('body')}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine:</label>
                        <input name="image" type="file" class="form-control" id="image">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Categoria:</label>
                        <select name="category" id="category" class="form-control text-capitalize">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags:</label>
                        <input name="tags" type="text" class="form-control" id="tags" value="{{old('tags')}}">
                        <span class="small fst-italic">Dividi ogni tag con una virgola</span>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-info text-white">Inserisci un articolo</button>
                        <a class="btn btn-outline-info" href="{{route('home')}}">Torna alla home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
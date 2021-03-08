<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <section>
        <div class="container mt-5">
            <form action="/genres" method="POST">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Ajouter un genre</label>
                  <input type="text" name="genre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </section>
    <section>
        <div class="container mt-5">
            <form action="/membres" method="POST">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Nom</label>
                  <input type="text" name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">prenom</label>
                    <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <select name="genre_id" >
                    @foreach ($genres as $genre)
                        <option value="{{$genre->id}}">{{$genre->genre}}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </section>
    <section>
        <div class="container mt-5">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">nom</th>
                    <th scope="col">prenom</th>
                    <th scope="col">genre</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($membres as $membre)
                        <tr>
                            <th scope="row">{{$membre->id}}</th>
                            <td>{{$membre->nom}}</td>
                            <td>{{$membre->prenom}}</td>
                            <td>{{$membre->genres->genre}}</td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </section>
    <section>
        <div class="container mt-5">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">genre</th>
                    <th scope="col"> </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($genres as $genre)
                        <tr>
                            <th scope="row">{{$genre->id}}</th>
                            <td>{{$genre->genre}}</td>
                            <td>
                                @foreach ($genre->membres as $item)
                                    <p>{{$item->nom}} {{$item->prenom}}</p>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </section>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
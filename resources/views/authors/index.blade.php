@extends('layout')

@section('content')

    <div class="text" >

        <h1>
            Author
        </h1>
    </div>



    <div class="row">
        <div class="col-md">
            <div class="row g-3">

                <form class="col-md-12" method="post"  novalidate enctype="multipart/form-data">
                    <br/>




                    <div class="form-group">
                        @csrf
                        <label for="name">Author_id</label>
                        <input type="text" class="form-control" name="author_id"/>
                    </div>


                    <div class="form-group">
                        @csrf
                        <label for="name">Book_id</label>
                        <input type="text" class="form-control" name="book_id"/>
                    </div>


                    @csrf
                    <br/>

                    <div class="form_group">
                        <button type="submit" class="btn btn-primary">Create Author </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .container {
            max-width: 1000px;
        }
        .push-top {
            margin-top: 50px;
        }
        body{
            background-color:#fcfcfc;
        }
    </style>



    <div class="text-end">
        <br/>

        @if($authors)

            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Author_id</th>
                    <th>Book_id</th>
                    <th>Created date</th>
                    <th>Updated</th>


                </tr>
                </thead>
                <tbody>

                @foreach($authors as $Author)

                    <tr>
                        <td>{{$Author->id}}</td>
                        <td>{{$Author->author_id}}</a></td>
                        <td>{{$Author->book_id}}</td>
                        <td>{{$Author->created_at ? $Author->created_at->diffForHumans() : 'no date'}}</td>
                        <td>{{$Author->updated_at->diffForHumans()}}</td>
                        <td class="text-center">
                            <a href="{{ route('authors.edit', $Author->id)}}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('authors.destroy', $Author->id)}}" method="post" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        @endif



    </div>
@endsection

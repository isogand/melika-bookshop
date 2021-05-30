@extends('layout')

@section('content')

    <div class="text" >

        <h1>
            Edit & Update
        </h1>
    </div>



    <div class="row">
        <div class="col-md">
            <div class="row g-3">

                <form class="col-md-12" method="post"  novalidate enctype="multipart/form-data" action="{{ route('authors.update', $authors->id)}}">
                    <br/>

                    @csrf
                    @method('PATCH')


                    <div class="form-group">
                        @csrf
                        <label for="name">Author_Name</label>
                        <input type="text" class="form-control" name="author_id" value="{{ $authors->author_id }}"/>
                    </div>


                    <div class="form-group">
                        @csrf
                        <label for="name">Book_id</label>
                        <input type="text" class="form-control" name="book_id" value="{{ $authors->book_id }}"/>
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
            max-width: 1500px;
        }
        .push-top {
            margin-top: 50px;
        }
        body{
            background-color:#fcfcfc;
        }
    </style>




@endsection

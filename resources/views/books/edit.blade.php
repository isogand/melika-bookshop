@extends('layout')

@section('content')




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






    <h1> Edit & Update</h1>


    <div class="row">
        <div class="col-md">
            <div class="row g-3">

                <form class="col-md-12" method="post"  novalidate enctype="multipart/form-data" action="{{ route('books.update', $books->id)}}">
                    <br/>
                    @csrf
                    @method('PATCH')


                    <div class="input-group mb-3">
                        <input type="file" name="photo_id" class="form-control" id="inputGroupFile02" >
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>


                    <div class="form-group">
                        @csrf
                        <label for="name">Publisher_name</label>
                        <input type="text" class="form-control" name="publisher_name" value="{{ $books->publisher_name }}"/>
                    </div>

                    <div class="form-floating">
                        <label for="name">Book_title</label>
                        <input type="text" class="form-control" name="book_title" value="{{ $books->book_title }}"/>

                    </div>
                    <div class="form-group">
                        @csrf
                        <label for="name">Isbn</label>
                        <input type="text" class="form-control" name="isbn"value="{{ $books->isbn }}"/>
                    </div>

                    @csrf
                    <br/>

                    <div class="form_group">
                        <button type="submit" class="btn btn-primary">Edit Book </button>
                    </div>
                </form>
            </div>
        </div>
    </div>













@endsection

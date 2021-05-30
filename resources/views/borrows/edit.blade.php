@extends('layout')

@section('content')

    <div class="text" >

        <h1>
          Edit
        </h1>
    </div>



    <div class="row">
        <div class="col-md">
            <div class="row g-3">

                <form class="col-md-12" method="post"  novalidate enctype="multipart/form-data"action="{{ route('borrows.update', $borrows->id)}}">
                    <br/>
                    @csrf
                    @method('PATCH')


                    <div class="form-group">
                        @csrf
                        <label for="name">Due_at</label>
                        <input type="text" class="form-control" name="due_at" value="{{ $borrows->due_at }}"/>
                    </div>

                    <div class="form-group">
                        @csrf
                        <label for="name">Returned_at</label>
                        <input type="text" class="form-control" name="returned_at"value="{{ $borrows->returned_at }}"/>
                    </div>

                    <div class="form-group">
                        @csrf
                        <label for="name">Borrowed_by</label>
                        <input type="text" class="form-control" name="borrowed_by"value="{{ $borrows->borrowed_by }}"/>
                    </div>

                    <div class="form-group">
                        @csrf
                        <label for="name">Book_id</label>
                        <input type="text" class="form-control" name="book_id"value="{{ $borrows->book_id}}"/>
                    </div>


                    @csrf
                    <br/>

                    <div class="form_group">
                        <button type="submit" class="btn btn-primary">Edit Borrow</button>
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

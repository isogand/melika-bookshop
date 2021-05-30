@extends('layout')

@section('content')

    <div class="text" >

        <h1>
            Borrow
        </h1>
    </div>



    <div class="row">
        <div class="col-md">
            <div class="row g-3">

                <form class="col-md-12" method="post"  novalidate enctype="multipart/form-data">
                    <br/>


                    <div class="form-group">
                        @csrf
                        <label for="name">Due_at</label>
                        <input type="text" class="form-control" name="due_at"/>
                    </div>

                    <div class="form-group">
                        @csrf
                        <label for="name">Returned_at</label>
                        <input type="text" class="form-control" name="returned_at"/>
                    </div>

                    <div class="form-group">
                        @csrf
                        <label for="name">Borrowed_by</label>
                        <input type="text" class="form-control" name="borrowed_by"/>
                    </div>

                    <div class="form-group">
                        @csrf
                        <label for="name">Book_id</label>
                        <input type="text" class="form-control" name="book_id"/>
                    </div>


                    @csrf
                    <br/>

                    <div class="form_group">
                        <button type="submit" class="btn btn-primary">Create Borrow</button>
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



    <div class="text-end">
        <br/>

        @if($borrows)

            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Due_at</th>
                    <th>Returned_at</th>
                    <th>Borrowed_by</th>
                    <th>Book_id</th>
                    <th>Created date</th>
                    <th>Updated</th>


                </tr>
                </thead>
                <tbody>

                @foreach($borrows as $Borrow)

                    <tr>
                        <td>{{$Borrow->id}}</td>
                        <td>{{$Borrow->due_at}}</a></td>
                        <td>{{$Borrow->returned_at}}</td>
                        <td>{{$Borrow->borrowed_by}}</a></td>
                        <td>{{$Borrow->book_id}}</a></td>
                        <td>{{$Borrow->created_at ? $Borrow->created_at->diffForHumans() : 'no date'}}</td>
                        <td>{{$Borrow->updated_at->diffForHumans()}}</td>
                        <td class="text-center">
                            <a href="{{ route('borrows.edit', $Borrow->id)}}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('borrows.destroy', $Borrow->id)}}" method="post" style="display: inline-block">
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

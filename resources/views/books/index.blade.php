@extends('layout')

@section('content')

    <div class="text" >

        <h1>Books

        </h1>
    </div>



<div class="row">
    <div class="col-md">
        <div class="row g-3">

            <form class="col-md-12" method="post"  novalidate enctype="multipart/form-data">
                <br/>

                <div class="input-group mb-3">
                    <input type="file" name="photo_id" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>


                <div class="form-group">
                    @csrf
                    <label for="name">Publisher_name</label>
                    <input type="text" class="form-control" name="publisher_name"/>
                </div>

                <div class="form-floating">
                    <label for="name">Book_title</label>
                    <input type="text" class="form-control" name="book_title" />

                </div>
                <div class="form-group">
                    @csrf
                    <label for="name">Isbn</label>
                    <input type="text" class="form-control" name="isbn"/>
                </div>

                @csrf
                <br/>

                <div class="form_group">
                    <button type="submit" class="btn btn-primary">Create Book </button>
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

    @if($books)

        <table class="table">
            <thead>
            <tr>
                <th>id</th>
                <th>Photo</th>
                <th>Publisher_name</th>
                <th>Book_title</th>
                <th>Isbn</th>
                <th>Created date</th>
                <th>Updated</th>


            </tr>
            </thead>
            <tbody>

            @foreach($books as $Book)

               <tr>
                   <td>{{$Book->id}}</td>
                   <td> <img style="height:100px" src="{{$Book->photo ? $Book->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td>
                   <td>{{$Book->publisher_name}}</a></td>
                   <td>{{$Book->book_title}}</a></td>
                   <td>{{$Book->isbn}}</td>
                    <td>{{$Book->created_at ? $Book->created_at->diffForHumans() : 'no date'}}</td>
                    <td>{{$Book->updated_at->diffForHumans()}}</td>
                   <td class="text-center">
                       <a href="{{ route('books.edit', $Book->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('books.destroy', $Book->id)}}" method="post" style="display: inline-block">
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

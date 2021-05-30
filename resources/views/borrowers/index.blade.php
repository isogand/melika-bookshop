@extends('layout')

@section('content')

    <div class="text" >

        <h1>
            Borrower
        </h1>
    </div>



    <div class="row">
        <div class="col-md">
            <div class="row g-3">

                <form class="col-md-12"  method="post"  novalidate enctype="multipart/form-data">
                    <br/>

                    <div class="input-group mb-3">
                        <input type="file" name="photo_id" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>


                    <div class="form-group">
                        @csrf
                        <label for="name">Full_Name</label>
                        <input type="text" class="form-control" name="name"/>
                    </div>


                    <div class="form-group">
                        @csrf
                        <label for="name">Contact_number</label>
                        <input type="text" class="form-control" name="contact_number"/>
                    </div>

                    <div class="form-group">
                        <label for="name">Student_id</label>
                        <input type="text" class="form-control" name="code"/>
                    </div>
                    @csrf
                    <br/>

                    <div class="form_group">
                        <button type="submit" class="btn btn-primary">Create Borrower </button>
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

        @if($borrowers)

            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>photo_id</th>
                    <th>Full_Name</th>
                    <th>Contact_number</th>
                    <th>Student_id</th>
                    <th>Created date</th>
                    <th>Updated</th>


                </tr>
                </thead>
                <tbody>

                @foreach($borrowers as $Borrower)

                    <tr>
                        <td>{{$Borrower->id}}</td>
                        <td> <img style="height:100px" src="{{$Borrower->photo ? $Borrower->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td>
                        <td>{{$Borrower->name}}</a></td>
                        <td>{{$Borrower->contact_number}}</td>
                        <td>{{$Borrower->code}}</td>
                        <td>{{$Borrower->created_at ? $Borrower->created_at->diffForHumans() : 'no date'}}</td>
{{--                        {{dd($Borrower)}}--}}
                        <td>{{$Borrower->updated_at->diffForHumans()}}</td>
                        <td class="text-center">
                            <a href="{{ route('borrowers.edit', $Borrower->id)}}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('borrowers.destroy', $Borrower->id)}}" method="post" style="display: inline-block">
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

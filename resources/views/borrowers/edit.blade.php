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

                <form class="col-md-12" method="post"  novalidate enctype="multipart/form-data"  action="{{ route('borrowers.update', $borrowers->id)}}">
                    <br/>
                    @csrf
                    @method('PATCH')

                    <div class="input-group mb-3">
                        <input type="file" name="photo_id" class="form-control" id="inputGroupFile02" >
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>


                    <div class="form-group">
                        @csrf
                        <label for="name">Full_Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $borrowers->name }}"/>
                    </div>


                    <div class="form-group">
                        @csrf
                        <label for="name">Contact_number</label>
                        <input type="text" class="form-control" name="contact_number"  value="{{ $borrowers-> contact_number}}"/>
                    </div>

                    <div class="form-group">
                        <label for="name">Student_id</label>
                        <input type="text" class="form-control" name="code"  value="{{ $borrowers->code }}"/>
                    </div>
                    @csrf
                    <br/>

                    <div class="form_group">
                        <button type="submit" class="btn btn-primary">Edit  Borrower </button>
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

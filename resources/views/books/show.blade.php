@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3>Book Details</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <img style="height: 350px;width:400px;" src="{{ asset('/storage/'. $book->Cover_Image_URL) }}" alt="Cover Image" class="img-fluid mx-5">
                        <div class="card-body-right">
                            <h5>Title: {{ $book->Title }}</h5>
                            <p>Author: {{ $book->Author }}</p>
                            <p>Genre: {{ $book->Genre }}</p>
                            <p>Publication Year: {{ $book->Publication_Year }}</p>
                            <p>ISBN: {{ $book->ISBN }}</p>
                            <p>Cover Image:</p>
                            <p>URL: {{ $book->Cover_Image_URL }}</p>
                            <p>Created At: {{ $book->created_at }}</p>
                            <p>Updated At: {{ $book->updated_at }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection
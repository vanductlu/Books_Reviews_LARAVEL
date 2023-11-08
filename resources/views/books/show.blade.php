@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Book Details
                    </div>
                    <div class="card-body">
                        <h5>Title: {{ $book->Title }}</h5>
                        <p>Author: {{ $book->Author }}</p>
                        <p>Genre: {{ $book->Genre }}</p>
                        <p>Publication Year: {{ $book->Publication_Year }}</p>
                        <p>ISBN: {{ $book->ISBN }}</p>
                        <p>Cover Image:</p>
                        <img src="{{asset('/storage/'. $book->Cover_Image_URL)}}" alt="Cover Image" style="max-height: 200px;">
                        <p>URL: {{ $book->Cover_Image_URL }}</p>
                        <p>Created At: {{ $book->created_at }}</p>
                        <p>Updated At: {{ $book->updated_at }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
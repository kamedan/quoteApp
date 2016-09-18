@extends('layouts.master')

@section('title')
    Top Quotes
@endsection

@section('styles')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
@endsection

@section('content')

    <section class="quotes">
        <h1>Latest Quotes</h1>
        <article class="quote">
            <div><a class="delete" href="#">X</a></div>
            <div>Quote text</div>
            <div class="info"> Created by <a href="#">Amine</a> on ..</div>
        </article>



        Pagination
    </section>

    <section class="edit-quote">
        <h1> Add Quote</h1>

        <form action="">
            <div class="input-group">
                <label for="">Your name</label>
                <input type="text" name="author" id="author" placeholder="Your name">
            </div>

            <div class="input-group">
                <label for="">Your Quote</label>
                <textarea id="quote" name="quote" cols="30" rows="10" placeholder="Your quote"></textarea>
            </div>
            <button type="submit" class="btn">Submit Quote</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
    </section>
@endsection

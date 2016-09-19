@extends('layouts.master')

@section('title')
    Top Quotes
@endsection

@section('styles')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
@endsection

@section('content')
    @if(!empty(Request::segment(1)))
        <section class="filter-bar"> A filter has benn set <a href="{{route('index')}}">Show All quotes</a></section>
    @endif

    @if(count($errors) > 0)
        <section class="info-box fail">
            @foreach($errors->all() as $error)
                    {{$error}}
            @endforeach

        </section>
    @endif

    @if(Session::has('success'))
        <section class="info-box success">
            {{Session::get('success')}}

        </section>
    @endif
    <section class="quotes">
        <h1>Latest Quotes</h1>
        @for($i=0; $i < count($quotes) ; $i++)
            <article class="quote">
                <div><a class="delete" href="{{ route('delete', ['quote_id' => $quotes[$i]->id]) }}">X</a></div>
                <div>{{$quotes[$i]->quote}}</div>
                <div class="info"> Created by <a href="{{route('index', ['author' => $quotes[$i]->author->name ])}}"> {{$quotes[$i]->author->name}}</a> on {{$quotes[$i]->created_at}}</div>
            </article>
        @endfor

        <div class="pagination">
            @if($quotes->currentPage() !== 1)
                <a href="{{$quotes->previousPageUrl()}}"><span class="fa fa-caret-left"></span></a>
            @endif
            @if($quotes->currentPage() !== $quotes->lastPage() && $quotes->hasPages())
                    <a href="{{$quotes->nextPageUrl()}}"><span class="fa fa-caret-right"></span></a>
            @endif
</div>


</section>

<section class="edit-quote">
<h1> Add Quote</h1>

<form method="post" action="{{route(('create'))}}" >
    <div class="input-group">
        <label for="author">Your name</label>
        <input type="text" name="author" id="author" placeholder="Your name">
    </div>

    <div class="input-group">
        <label for="email">Your Email</label>
        <input type="text" name="email" id="email" placeholder="Your Email">
    </div>

    <div class="input-group">
        <label for="quote">Your Quote</label>
        <textarea id="quote" name="quote" cols="30" rows="10" placeholder="Your quote"></textarea>
    </div>
    <button type="submit" class="btn">Submit Quote</button>
    <input type="hidden" name="_token" value="{{Session::token()}}">
</form>
</section>
@endsection

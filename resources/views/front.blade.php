@extends('layouts.main')

@section('content')

<main role="main" class="container" style="margin-top:70px;">
    <div class="row mb-4">
        <div class="col-md-12">
            <h4>The most frequent words:</h4>
            <ul class="tag-list">
            @foreach($frequentWords as $word => $amount)
                <li class="tag">{{$word}} ({{$amount}})</li>
            @endforeach
            </ul>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            @foreach ($items as $item)
                <div class="item">
                    <h2><a href="{{ $item->permalink }}">{{ $item->title }}</a></h2>
                    <p>{!! $item->description !!}</p>
                    <p><small>Posted on {{ $item->date->format('j F Y | g:i a') }}</small></p>
                </div>
            @endforeach
        </div>
    </div>
</main>

@endsection

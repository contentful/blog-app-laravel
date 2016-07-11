@inject('parsedown', '\Parsedown')
@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-lg-8">
    <h1>{{ $post->getTitle() }}</h1>
    <p class="lead">
      by <a href="{{ route('author', [$post->getAuthor()[0]->getId()]) }}">{{ $post->getAuthor()[0]->getName() }}</a>
    </p>
    @if($post->getDate() !== null)
      <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->getDate()->format('F d, Y') }}</p>
    @endif
    <hr>
    @if($post->getFeaturedImage() !== null)
      <img class="img-responsive" src="{{ $post->getFeaturedImage()->getFile()->getUrl() }}?w=200" alt="">
      <hr>
    @endif

    <div>
      {!! $parsedown->text($post->getBody()) !!}
    </div>
  </div>

  <div class="col-lg-4">
    @include('partials.contentful-info')
  </div>
</div>
@endsection

@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-8">
    <h1 class="page-header">Posts by {{ $author->getName() }}</h1>

    @foreach ($posts as $post)
      @include('partials.post', array('post' => $post))

      <hr>
    @endforeach
  </div>

  <div class="col-md-4">
    <div class="well">
      <img src="{{ $author->getProfilePhoto()->getFile()->getUrl() }}" />
      <h2>{{ $author->getName() }}</h2>
      <p>{{ $author->getBiography() }}</p>
    </div>

    @include('partials.contentful-info')
  </div>
</div>
@endsection

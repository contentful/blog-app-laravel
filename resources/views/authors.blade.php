@extends('layouts.app')
@section('content')
<div class="col-md-8">
  <h1 class="page-header">Authors</h1>

  @foreach ($authors as $author)
    <section>
      <h2>
        <a href="{{ route('author', [$author->getId()]) }}">{{ $author->getName() }}</a>
      </h2>
      <p>{{ trim_text($author->getBiography(), 300) }}</p>
      <a class="btn btn-primary" href="{{ route('author', [$author->getId()]) }}">See Posts <span class="glyphicon glyphicon-chevron-right"></span></a>
    </section>
  @endforeach
</div>

<div class="col-md-4">
  @include('partials.contentful-info')
</div>
@endsection

@extends('layouts.app')
@section('content')
<div class="col-md-8">
  <h1 class="page-header">Categories</h1>

  @foreach ($categories as $category)
  <section>
    <h2>
      <a href="{{ route('category', [$category->getId()]) }}">{{ $category->getTitle() }}</a>
    </h2>
    <a class="btn btn-primary" href="{{ route('category', [$category->getId()]) }}">See Posts <span class="glyphicon glyphicon-chevron-right"></span></a>
  </section>
  @endforeach
</div>

<div class="col-md-4">
  @include('partials.contentful-info')
</div>
@endsection

@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-8">
    <h1 class="page-header"><img src="{{ $category->getIcon()->getFile()->getUrl() }}" /> {{ $category->getTitle() }}</h1>

    @foreach ($posts as $post)
      @include('partials.post', array('post' => $post))

      <hr>
    @endforeach
  </div>

  <div class="col-md-4">
    @include('partials.contentful-info')
  </div>
</div>
@endsection

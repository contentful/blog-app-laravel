@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-8">

    <h1 class="page-header">
      Page Heading
      <small>Secondary Text</small>
    </h1>

    @foreach ($posts as $post)
      @include('partials.post', array('post' => $post))

      <hr>
    @endforeach

    @if($showPrevious || $showNext)
      <ul class="pager">
        @if($showPrevious)
          <li class="previous">
            <a href="#">&larr; Older</a>
          </li>
        @endif
        @if($showNext)
          <li class="next">
            <a href="#">Newer &rarr;</a>
          </li>
        @endif
      </ul>
    @endif

  </div>

  <div class="col-md-4">
    <div class="well">
      <h4>Blog Categories</h4>
      <div class="row">
        <div class="col-lg-12">
          <ul class="list-unstyled category-list">
            @foreach ($categories as $category)
              <li><a href="{{ route('category', [$category->getId()]) }}">{{ $category->getTitle() }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>

    @include('partials.contentful-info')
  </div>
</div>
@endsection

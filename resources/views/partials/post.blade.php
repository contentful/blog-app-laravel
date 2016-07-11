@inject('parsedown', '\Parsedown')
<article>
  <h2>
    <a href="{{ route('post', [$post->getSlug()]) }}">{{ $post->getTitle() }}</a>
  </h2>
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
  <p>{!! $parsedown->text(trim_text($post->getBody(), 300)) !!}</p>
  <a class="btn btn-primary" href="{{ route('post', [$post->getSlug()]) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
</article>

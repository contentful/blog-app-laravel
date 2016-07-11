<?php
/**
 * @copyright 2016 Contentful GmbH
 * @license   MIT
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Contentful\Delivery\Client as DeliveryClient;
use Contentful\Delivery\Query;

class BlogController extends Controller
{
  const CT_POST = '2wKn6yEnZewu2SCCkus4as';
  const CT_CATEGORY = '5KMiN6YPvi42icqAUQMCQe';
  const CT_AUTHOR = '1kUEViTN4EmGiEaaeC6ouY';

  /**
   * @var DeliveryClient
   */
  private $client;

  public function __construct(DeliveryClient $client)
  {
    $this->client = $client;
  }

  public function showIndex()
  {
    $query = (new Query())->setContentType(self::CT_POST);
    $posts = $this->client->getEntries($query);

    $query = (new Query())->setContentType(self::CT_CATEGORY);
    $categories = $this->client->getEntries($query);

    return view('index', [
        'posts' => $posts,
        'categories' => $categories,
        'showPrevious' => $posts->getSkip() > 0,
        'showNext' => count($posts) + $posts->getSkip() > $posts->getTotal()
    ]);
  }

  public function showPost($slug)
  {
    $query = (new Query())
        ->setContentType(self::CT_POST)
        ->where('fields.slug', $slug)
        ->setLimit(1);
    $posts = $this->client->getEntries($query);

    if (!count($posts)) {
      abort(404);
    }

    return view('post', [
        'post' => $posts[0]
    ]);
  }

  public function showCategories()
  {
    $query = (new Query())->setContentType(self::CT_CATEGORY);
    $categories = $this->client->getEntries($query);

    return view('categories', [
        'categories' => $categories
    ]);
  }

  public function showCategory($categoryId)
  {
    $category = $this->client->getEntry($categoryId);

    $query = (new Query())
        ->setContentType(self::CT_POST)
        ->where('fields.category.sys.id', $categoryId);
    $posts = $this->client->getEntries($query);

    return view('category', [
        'category' => $category,
        'posts' => $posts
    ]);
  }

  public function showAuthors()
  {
    $query = (new Query())->setContentType(self::CT_AUTHOR);
    $authors = $this->client->getEntries($query);

    return view('authors', [
        'authors' => $authors
    ]);
  }

  public function showAuthor($authorId)
  {
    $author = $this->client->getEntry($authorId);
    $query = (new Query())
        ->setContentType(self::CT_POST)
        ->where('fields.author.sys.id', $authorId);
    $posts = $this->client->getEntries($query);

    return view('author', [
        'author' => $author,
        'posts' => $posts
    ]);
  }
}

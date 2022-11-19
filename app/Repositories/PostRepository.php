<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

interface PostRepositoryInterface
{
  public function create(array $userData): void;
  public function update(array $userData = []): void;
  public function getBySlug(string $slug): Post;
  public function getByUserId(int $userId, string $search = ''): Collection;
  public function getById(int $id): Post | null;
  public function deleteById(int $id): void;
}

class PostRepository implements PostRepositoryInterface
{
  /**
   * Create new user.
   *
   * @param array User data
   */
  public function create(array $userData): void
  {
    //
  }

  public function update(array $userData = []): void
  {
    //
  }

  public function getByUserId(int $userId, string $search = ''): Collection
  {
    $builder =  Post::where('user_id', $userId);
    if ($search) {
      $builder = $builder->where('title', 'LIKE', "%{$search}%");
    }
    return $builder->latest()
      ->limit(2)
      ->skip(0)
      ->get();
  }

  public function getBySlug(string $slug): Post
  {
    return Post::where('slug', $slug)->first();
  }

  public function getById(int $id): Post | null
  {
    return User::findById($id);
  }

  public function deleteById(int $id): void
  {
    //
  }
}

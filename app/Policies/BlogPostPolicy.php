<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\BlogPost;

class BlogPostPolicy
{
  use HandlesAuthorization;

  /**
  * Create a new policy instance.
  *
  * @return void
  */
  public function __construct()
  {
    //
  }
  public function view(User $user): bool
  {
    return true;
  }

  public function update(User $user, BlogPost $post): bool
  {
    return $user->id === $post->user_id;
  }
}

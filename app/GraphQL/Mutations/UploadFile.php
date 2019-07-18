<?php

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Support\Facades\Storage;

class UploadFile
{
  //Storage::put('avatars/1', $fileContents);
  //Storage::disk('s3')->put('avatars/1', $fileContents);
  //$exists = Storage::disk('s3')->exists('file.jpg');
  /*
  return Storage::download('file.jpg');
  return Storage::download('file.jpg', $name, $headers);
  $url = Storage::url('file.jpg');
  $size = Storage::size('file.jpg');
  $path = $request->file('avatar')->store('avatars');
  return $path;
  */
    /**
     * Return a value for the field.
     *
     * @param  null  $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param  mixed[]  $args The arguments that were passed into the field.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context Arbitrary data that is shared between all fields of a single query.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     * @return mixed
     */

    public function resolve($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $file = $args['file'];
        $filename = $args['filename'];
        $filesize = $args['filesize'];
        $filetype = $args['filetype'];
        return $file->storeAs("public/uploads",$filename);
    }
}

<?php

namespace App\GraphQL\Queries;
use App\User;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Support\Facades\Log;
use Nuwave\Lighthouse\Exceptions\AuthenticationException;

class Users
{
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
        $count = $args['count'];
        $page = $args['page'];
        $token = $args['token'];
        $id = $args['id'];
        $output = array();
        $total = count(User::all());
        if($token != "12345"){
          throw new AuthenticationException("Authorized access only");
        }
        $pagination = User::where("id",">",$id)->paginate($count);
        $output['pagination'] = json_decode($pagination->toJson());
        return $output;
    }
}

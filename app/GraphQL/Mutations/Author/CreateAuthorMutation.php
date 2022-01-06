<?php

namespace App\GraphQL\Mutations\Author;

use App\Models\Author;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class CreateAuthorMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createAuthor',
        'description' => 'Creates a Author'
    ];

    public function type(): Type
    {
        return GraphQL::type('Author');
    }

    public function args(): array
    {
        return [
            'first_name' => [
                'name' => 'first_name',
                'type' => Type::nonNull(Type::string()),
            ],
            'last_name' => [
                'name' => 'last_name',
                'type' => Type::nonNull(Type::string()),
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::nonNull(Type::string()),
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $author = new Author();
        $author->fill($args);
        $author->save();

        return $author;
    }
}
?>
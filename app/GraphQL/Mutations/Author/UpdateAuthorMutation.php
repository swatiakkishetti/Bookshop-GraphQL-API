<?php

namespace App\GraphQL\Mutations\Author;

use App\Models\Author;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class UpdateAuthorMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateAuthor',
        'description' => 'Updates Author'
    ];

    public function type(): Type
    {
        return GraphQL::type('Author');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::int()),
            ],
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
        $author = Author::findOrFail($args['id']);
        $author->fill($args);
        $author->save();

        return $author;
    }
}
?>
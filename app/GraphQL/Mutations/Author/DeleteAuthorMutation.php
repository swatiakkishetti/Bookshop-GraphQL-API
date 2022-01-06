<?php

namespace App\GraphQL\Mutations\Author;

use App\Models\Author;
use GraphQL\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteAuthorMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteAuthor',
        'description' => 'Deletes a Author'
    ];

    public function type(): Type
    {
        return Type::string();
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ],
            'first_name' => [
                'name' => 'first_name',
                'type' => Type::string(),
            ],
            'last_name' => [
                'name' => 'last_name',
                'type' => Type::string(),
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::string(),
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $book = Author::findOrFail($args['id']);

        return $book->delete() ? "Author deleted successfully" : "Cannot be deleted";
    }
}
?>
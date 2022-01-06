<?php

namespace App\GraphQL\Mutations\Book;

use App\Models\Book;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class UpdateBookMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateBook',
        'description' => 'Updates a Book'
    ];

    public function type(): Type
    {
        return GraphQL::type('Book');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::int()),
            ],
            'title' => [
                'name' => 'title',
                'type' => Type::nonNull(Type::string()),
            ],
            'price' => [
                'name' => 'price',
                'type' => Type::nonNull(Type::int()),
            ],
            'author_id' => [
                'name' => 'author_id',
                'type' => Type::nonNull(Type::int()),
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $book = Book::findOrFail($args['id']);
        $book->fill($args);
        $book->save();

        return $book;
    }
}
?>
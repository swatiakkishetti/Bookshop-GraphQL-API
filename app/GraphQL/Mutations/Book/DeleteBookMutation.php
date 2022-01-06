<?php

namespace App\GraphQL\Mutations\Book;

use App\Models\Book;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteBookMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteBook',
        'description' => 'Deletes a Book'
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
        ];
    }

    public function resolve($root, $args)
    {
        $book = Book::findOrFail($args['id']);

        return $book->delete() ? "Book deleted successfully" : "Cannot be deleted";
    }
}
?>
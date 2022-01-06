<?php

namespace App\GraphQL\Types;

use App\Models\Book;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class BookType extends GraphQLType
{

    protected $attributes = [
        'name' => 'Book',
        'description' => 'Book details',
        'model' => Book::class
    ];

    public function fields(): array
    {
        return[
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of Book'
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Title of Book'
            ],
            'price' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Price of Book'
            ],
            'author_id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of Author'
            ],
        ];
    }
}

?>
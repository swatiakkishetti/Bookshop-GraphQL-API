<?php

namespace App\GraphQL\Types;

use App\Models\Author;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AuthorType extends GraphQLType
{

    protected $attributes = [
        'name' => 'Author',
        'description' => 'Author details',
        'model' => Author::class
    ];

    public function fields(): array
    {
        return[
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of Author'
            ],
            'first_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'First Name of Author'
            ],
            'last_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Last Name of Author'
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Email of Author'
            ],
        ];
    }
}

?>
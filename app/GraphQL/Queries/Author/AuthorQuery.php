<?php

namespace App\GraphQL\Queries\Author;

use App\Models\Author;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class AuthorQuery extends Query{
    protected $attributes = [
        'name' => 'author',
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
                'type' => Type::int(),
                'rules' => ['required']
            ]
            ];
    }

    public function resolve($root, $args){
        return Author::findOrFail($args['id']);
    }
}
?>
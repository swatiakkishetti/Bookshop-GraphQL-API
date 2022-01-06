<?php

namespace App\GraphQL\Queries\Author;

use App\Models\Author;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class AuthorsQuery extends Query{
    protected $attributes = [
        'name' => 'authors',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Author'));
    }

    public function resolve($root, $args){
        return Author::all();
    }
}
?>
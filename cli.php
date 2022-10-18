<?php

use GeekBrains\LevelTwo\Blog\User;
use GeekBrains\LevelTwo\Person\{Name, Person};
use GeekBrains\LevelTwo\Blog\Post;
use GeekBrains\LevelTwo\Blog\Repositories\InMemoryUsersRepository;
use GeekBrains\LevelTwo\Blog\Exceptions\UserNotFoundException;
use GeekBrains\LevelTwo\Blog\Comment;

include __DIR__ . "/vendor/autoload.php";

$faker = Faker / Factory::create('ru_RU');
$name = new Name(
    $faker->firstName('female'),
    $faker->LastName('female')
);
$user = new User(
    $faker->randomDigiNotNull(),
    $name,
    $faker->sentence(1)
);

$route = $argv[1] ?? null;

switch ($route) {
    case "user":
        echo $user;
        break;

    case "post":
        $post = new Post(
            $faker->randomDigiNotNull(),
            $user,
            $faker->realText(rand(50, 100))
        );
        echo $post;
        break;

    case "comment":
        $post = new Post(
            $faker->randomDigiNotNull(),
            $user,
            $faker->realText(rand(50, 100))
        );
        $comment = new Comment(
            $faker->randomDigiNotNull(),
            $user,
            $post,
            $faker->realText(rand(50, 100))
        );
        echo $comment;
        break;
    default:
        echo "error try user post comment parameter";
}

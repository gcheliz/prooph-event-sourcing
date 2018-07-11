<?php

namespace {

    use App\Model\Command\ChangeEmail;
    use App\Model\Command\RegisterUser;
    use Ramsey\Uuid\Uuid;

    include "./config.php";

    $commandBus->dispatch(new RegisterUser([
        'id' => $userId,
        'email' => 'foo@test.com',
        'password' => 'foo'
    ]));

    for ($i = 0; $i < 5; $i++) {
        $commandBus->dispatch(new ChangeEmail([
            'email' => 'foo' . $i . '@email.com',
            'id' => $userId
        ]));
    }
}
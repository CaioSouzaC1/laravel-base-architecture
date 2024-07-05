<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Must be login in application to dispatch
Broadcast::channel('private-channel.{id}', fn($user, $id) => $user->id ===  $id, ['guards' => ['api']]);

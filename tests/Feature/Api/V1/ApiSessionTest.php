<?php

use App\Models\User;
use function Pest\Laravel\deleteJson;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

test('login', function () {
    postJson('/api/session/login', [
        "email"     =>  "proto@taag-genetics.com",
        "password"  =>  "proto247"
    ])->assertStatus(200)->assertJson(["message" => "Login success"]);
});
test('user', function () {
    getJson('/api/session/user')->assertStatus(200)->assertJson(["email" => "proto@taag-genetics.com"]);
});

<?php

use App\Models\User;

use function Pest\Laravel\deleteJson;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

test('index', function () {
    getJson('/api/user')
        ->assertStatus(200)
        ->assertJson([['email' => 'proto@my-project.com']]);
});
test('create', function () {
    postJson('/api/user', [
        "name"      => "Test Control",
        "email"     => "test-unit@my-project.com",
        "password"  => "test-unit"
    ])->assertStatus(201)->assertJson(['email' => 'test-unit@my-project.com']);
});
test('read', function () {
    $user = User::where('email', 'proto@my-project.com')->first();
    getJson('/api/user/' . $user->uuid)
        ->assertStatus(200)
        ->assertJson(['email' => 'proto@my-project.com']);
});
test('update', function () {
    $user = User::where('email', 'test-unit@my-project.com')->first();
    putJson('/api/user/' . $user->uuid, [
        "name"      => "Unit Test",
        "email"     => "test-unit@my-project.com",
    ])->assertStatus(200)
        ->assertJson(['name' => 'Unit Test']);
});
test('delete', function () {
    $user = User::where('email', 'test-unit@my-project.com')->first();
    deleteJson('/api/user/' . $user->uuid)
        ->assertStatus(204);
});

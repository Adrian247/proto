<?php

use App\Models\User;

use function Pest\Laravel\deleteJson;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

test('index', function () {
    getJson('/api/user')
        ->assertStatus(200)
        ->assertJson([['email' => 'proto@taag-genetics.com']]);
});
test('create', function () {
    postJson('/api/user', [
        "name"      => "Test Control",
        "email"     => "test-unit@taag-genetics.com",
        "password"  => "test-unit"
    ])->assertStatus(201)->assertJson(['email' => 'test-unit@taag-genetics.com']);
});
test('read', function () {
    $user = User::where('email', 'proto@taag-genetics.com')->first();
    getJson('/api/user/' . $user->uuid)
        ->assertStatus(200)
        ->assertJson(['email' => 'proto@taag-genetics.com']);
});
test('update', function () {
    $user = User::where('email', 'test-unit@taag-genetics.com')->first();
    putJson('/api/user/' . $user->uuid, [
        "name"      => "Unit Test",
        "email"     => "test-unit@taag-genetics.com",
    ])->assertStatus(200)
        ->assertJson(['name' => 'Unit Test']);
});
test('delete', function () {
    $user = User::where('email', 'test-unit@taag-genetics.com')->first();
    deleteJson('/api/user/' . $user->uuid)
        ->assertStatus(204);
});

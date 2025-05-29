<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

test('basic json route test', function () {
    // Test a simple JSON route that should work
    $response = $this->get('/test-json');
    dump('Test-json GET status: ' . $response->getStatusCode());
    dump('Test-json response: ' . $response->getContent());
    
    expect($response->getStatusCode())->toBe(200);
    expect($response->json('message'))->toBe('Test route works');
});

test('basic routes test', function () {
    // Test a GET route that should return a view without middleware
    $response = $this->get('/test-signup');
    dump('Test-signup GET status: ' . $response->getStatusCode());
    
    if ($response->getStatusCode() !== 200) {
        dump('Test-signup response content: ' . substr($response->getContent(), 0, 200) . '...');
    }
    
    expect($response->getStatusCode())->toBe(200);
});

test('user can register with valid data', function () {
    $response = $this->post('/sign-up', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ]);

    // Debug: dump the response status and content
    dump('Response status: ' . $response->getStatusCode());
    
    $response->assertRedirect('/dashboard');
    $this->assertAuthenticated();
    $this->assertDatabaseHas('users', [
        'email' => 'test@example.com',
        'name' => 'Test User',
    ]);
});

test('user can login with valid credentials', function () {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => Hash::make('password123'),
    ]);

    $response = $this->post('/sign-in', [
        'email' => 'test@example.com',
        'password' => 'password123',
    ]);

    $response->assertRedirect('/dashboard');
    $this->assertAuthenticated();
});

test('user cannot login with invalid credentials', function () {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => Hash::make('password123'),
    ]);

    $response = $this->post('/sign-in', [
        'email' => 'test@example.com',
        'password' => 'wrongpassword',
    ]);

    $response->assertSessionHasErrors(['email']);
    $this->assertGuest();
});

test('authenticated user can access dashboard', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/dashboard');

    $response->assertStatus(200);
    $response->assertSee($user->name);
    $response->assertSee('Welcome back');
});

test('guest user is redirected to login from dashboard', function () {
    $response = $this->get('/dashboard');

    $response->assertRedirect('/sign-in');
});

test('user can logout', function () {
    $user = User::factory()->create();

    $this->actingAs($user);
    
    $response = $this->post('/logout');

    $response->assertRedirect('/');
    $this->assertGuest();
});

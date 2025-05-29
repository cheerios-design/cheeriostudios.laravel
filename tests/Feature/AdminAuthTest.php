<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('admin login page can be rendered', function () {
    $response = $this->get('/admin/login');

    $response->assertStatus(200);
    $response->assertSee('Admin Login');
    $response->assertSee('Admin Access Required');
});

test('admin can login with valid credentials', function () {
    $admin = User::factory()->create([
        'email' => 'admin@test.com',
        'password' => Hash::make('password123'),
        'role' => 'admin'
    ]);

    $response = $this->post('/admin/login', [
        'email' => 'admin@test.com',
        'password' => 'password123',
    ]);

    $response->assertRedirect('/admin/dashboard');
    $this->assertAuthenticated();
});

test('regular user cannot login to admin', function () {
    $user = User::factory()->create([
        'email' => 'user@test.com',
        'password' => Hash::make('password123'),
        'role' => 'user'
    ]);

    $response = $this->post('/admin/login', [
        'email' => 'user@test.com',
        'password' => 'password123',
    ]);

    $response->assertRedirect('/admin/login');
    $response->assertSessionHasErrors(['email']);
    $this->assertGuest();
});

test('admin cannot login with invalid credentials', function () {
    $admin = User::factory()->create([
        'email' => 'admin@test.com',
        'password' => Hash::make('password123'),
        'role' => 'admin'
    ]);

    $response = $this->post('/admin/login', [
        'email' => 'admin@test.com',
        'password' => 'wrongpassword',
    ]);

    $response->assertRedirect('/admin/login');
    $response->assertSessionHasErrors(['email']);
    $this->assertGuest();
});

test('unauthenticated user is redirected to admin login from admin dashboard', function () {
    $response = $this->get('/admin/dashboard');

    $response->assertRedirect('/admin/login');
});

test('authenticated regular user is redirected to admin login from admin dashboard', function () {
    $user = User::factory()->create(['role' => 'user']);

    $response = $this->actingAs($user)->get('/admin/dashboard');

    $response->assertRedirect('/admin/login');
});

test('authenticated admin user can access admin dashboard', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $response = $this->actingAs($admin)->get('/admin/dashboard');

    $response->assertStatus(200);
    $response->assertSee('Admin Dashboard');
});

test('admin can logout from admin panel', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $this->actingAs($admin);
    
    $response = $this->post('/admin/logout');

    $response->assertRedirect('/admin/login');
    $this->assertGuest();
});

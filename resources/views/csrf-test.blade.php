<!DOCTYPE html>
<html>
<head>
    <title>CSRF Test Page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>CSRF Token Test</h1>
    
    <p><strong>Current CSRF Token:</strong> {{ csrf_token() }}</p>
    
    <form action="{{ route('admin.login') }}" method="POST">
        @csrf
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="admin@cheeriostudios.com" required>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Test Login</button>
    </form>
    
    <hr>
    
    <h3>Session Info:</h3>
    <p>Session ID: {{ session()->getId() }}</p>
    <p>Session Path: {{ config('session.path') }}</p>
    <p>Session Domain: {{ config('session.domain') }}</p>
    <p>Session Driver: {{ config('session.driver') }}</p>
    
    <hr>
    
    <p><a href="{{ route('admin.login') }}">Go to Official Admin Login</a></p>
</body>
</html>

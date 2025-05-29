<!DOCTYPE html>
<html>
<head>
    <title>Admin Login Debug</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .debug { background: #f5f5f5; padding: 10px; margin: 10px 0; border-radius: 5px; }
        .form { background: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        input, button { display: block; margin: 10px 0; padding: 8px; width: 300px; }
        button { background: #dc3545; color: white; border: none; cursor: pointer; }
        button:hover { background: #c82333; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
    <h1>Admin Login Debug Page</h1>
    
    <div class="debug">
        <h3>Debug Information:</h3>
        <p><strong>CSRF Token:</strong> {{ csrf_token() }}</p>
        <p><strong>Session ID:</strong> {{ session()->getId() }}</p>
        <p><strong>Session Driver:</strong> {{ config('session.driver') }}</p>
        <p><strong>Session Path:</strong> {{ config('session.path') }}</p>
        <p><strong>Current URL:</strong> {{ url()->current() }}</p>
        <p><strong>Admin Login Route:</strong> {{ route('admin.login') }}</p>
    </div>

    @if ($errors->any())
        <div class="error">
            <h3>Errors:</h3>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('status'))
        <div class="success">
            <p>{{ session('status') }}</p>
        </div>
    @endif

    <div class="form">
        <h3>Admin Login Test Form</h3>
        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <label>Email:</label>
            <input type="email" name="email" value="admin@cheeriostudios.com" required>
            
            <label>Password:</label>
            <input type="password" name="password" value="admin123" required>
            
            <label>
                <input type="checkbox" name="remember" style="width: auto;"> Remember me
            </label>
            
            <button type="submit">Login to Admin Dashboard</button>
        </form>
    </div>
    
    <div class="debug">
        <h3>Quick Links:</h3>
        <p><a href="{{ route('admin.login') }}">Official Admin Login Page</a></p>
        <p><a href="{{ route('login') }}">Regular User Login</a></p>
        <p><a href="{{ route('home') }}">Homepage</a></p>
    </div>

    <script>
        // Show the CSRF token in the form for verification
        console.log('CSRF Token:', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        console.log('Form CSRF Input:', document.querySelector('input[name="_token"]').value);
    </script>
</body>
</html>

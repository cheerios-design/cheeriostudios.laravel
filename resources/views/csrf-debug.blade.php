<!DOCTYPE html>
<html>
<head>
    <title>CSRF Debug</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>CSRF Debug Information</h1>
    
    <h3>Session Information:</h3>
    <p><strong>Session ID:</strong> {{ session()->getId() }}</p>
    <p><strong>Session Driver:</strong> {{ config('session.driver') }}</p>
    <p><strong>Session Path:</strong> {{ config('session.path') }}</p>
    <p><strong>Session Domain:</strong> {{ config('session.domain') }}</p>
    <p><strong>App URL:</strong> {{ config('app.url') }}</p>
    <p><strong>Current URL:</strong> {{ url()->current() }}</p>
    
    <h3>CSRF Token Information:</h3>
    <p><strong>Meta CSRF Token:</strong> {{ csrf_token() }}</p>
    <p><strong>Session Token:</strong> {{ session()->token() }}</p>
    
    <h3>Test Form:</h3>
    <form action="{{ route('admin.login') }}" method="POST">
        @csrf
        <p><strong>Form CSRF Token:</strong> <span id="form-token"></span></p>
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="admin@cheeriostudios.com" required>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" value="admin123" required>
        </div>
        <button type="submit">Test Submit</button>
    </form>
    
    <script>
        // Display the form token
        const tokenInput = document.querySelector('input[name="_token"]');
        if (tokenInput) {
            document.getElementById('form-token').textContent = tokenInput.value;
        }
        
        // Check if meta and form tokens match
        const metaToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const formToken = tokenInput ? tokenInput.value : null;
        
        if (metaToken === formToken) {
            console.log('✅ CSRF tokens match');
        } else {
            console.log('❌ CSRF tokens do not match');
            console.log('Meta token:', metaToken);
            console.log('Form token:', formToken);
        }
    </script>
</body>
</html>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<form method="POST" action="/subscribe">
    @csrf
    <input type="email" name="email" placeholder="Enter your email" required>
    <button type="submit">Subscribe</button>
</form>

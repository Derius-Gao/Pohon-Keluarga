<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <input type="email" name="email" placeholder="Masukkan email Anda" required>
    <button type="submit">Kirim Link Reset</button>
</form>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buku Tamu Digital</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f3f4f6; margin: 0; padding: 20px; }
        .container { max-width: 700px; margin: auto; }
        h1 { text-align: center; color: #1f2937; }
        .card { background: #fff; padding: 20px; border-radius: 8px;
                box-shadow: 0 1px 4px rgba(0,0,0,.1); margin-bottom: 20px; }
        label { display: block; margin: 10px 0 4px; font-weight: bold; }
        input, textarea { width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; }
        button { margin-top: 15px; padding: 10px 20px; background: #2563eb; color: #fff;
                 border: none; border-radius: 6px; cursor: pointer; }
        button:hover { background: #1d4ed8; }
        .alert { background: #d1fae5; color: #065f46; padding: 10px; border-radius: 6px; margin-bottom: 15px; }
        .error { color: #dc2626; font-size: 13px; }
        .item { border-bottom: 1px solid #e5e7eb; padding: 12px 0; }
        .item:last-child { border-bottom: none; }
        .meta { color: #6b7280; font-size: 13px; }
    </style>
</head>
<body>
<div class="container">
    <h1>📖 Buku Tamu Digital</h1>

    <div class="card">
        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <form action="{{ route('bukutamu.store') }}" method="POST">
            @csrf
            <label>Nama</label>
            <input type="text" name="nama" value="{{ old('nama') }}">
            @error('nama') <div class="error">{{ $message }}</div> @enderror

            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email') <div class="error">{{ $message }}</div> @enderror

            <label>Pesan</label>
            <textarea name="pesan" rows="4">{{ old('pesan') }}</textarea>
            @error('pesan') <div class="error">{{ $message }}</div> @enderror

            <button type="submit">Kirim</button>
        </form>
    </div>

    <div class="card">
        <h3>Daftar Tamu ({{ $tamu->count() }})</h3>
        @forelse($tamu as $t)
            <div class="item">
                <strong>{{ $t->nama }}</strong>
                <span class="meta">({{ $t->email }}) • {{ $t->created_at->format('d M Y H:i') }}</span>
                <p>{{ $t->pesan }}</p>
            </div>
        @empty
            <p>Belum ada pesan.</p>
        @endforelse
    </div>
</div>
</body>
</html>
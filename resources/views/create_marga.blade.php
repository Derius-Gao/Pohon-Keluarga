
@extends('layout')

@section('title', 'Tambah Marga')

@section('content')
<div class="container mt-4">
            <div id="message" style="display:none; color:red;" class="mt-3">
    Anda sudah memiliki data marga, tidak bisa tambah lagi.
</div>
    <h2>Tambah Marga</h2>
    <form action="{{ route('marga.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Marga</label>
            <input type="text" name="nama_marga" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('marga.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
<script>
$(document).ready(function(){
    $.ajax({
        url: '{{ route("marga.check") }}',
        type: 'GET',
        success: function(response){
            if(response.exists){
                $('#btnSubmit').prop('disabled', true);
                $('#message').show();
                $('#formMarga input').prop('disabled', true);
            }
        }
    });
});
</script>

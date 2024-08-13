@extends('layouts.backend.app')
@section('content')
    <section class="account-settings">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="account-settings__content">
                    <h2>Pengaturan Akun</h2>
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="nomor_telp">Nomor Telepon</label>
                            <input type="text" id="nomor_telp" name="nomor_telp" class="form-control" value="{{ old('nomor_telp', $user->nomor_telp) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Kata Sandi Baru</label>
                            <input type="password" id="password" name="password" class="form-control">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Kata Sandi Baru</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
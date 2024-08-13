@extends('layouts.frontend.app')

@section('content')
<!-- Breadcrumb Begin -->
{{-- <div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                    <span>Pengaturan Akun</span>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Breadcrumb End -->

<!-- Account Settings Begin -->
<section class="account-settings">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="account-settings__content">
                    <h2>Pengaturan Akun</h2>
                    <form action="" method="POST">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            {{-- <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required> --}}
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            {{-- <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required> --}}
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Account Settings End -->
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/account.css') }}">
@endpush

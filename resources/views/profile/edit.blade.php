@extends('layouts.user')

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f5f7fa;
        color: #333;
    }

    .card {
        background-color: #ffffff;
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    label {
        font-weight: 500;
        color: #495057;
    }

    .form-control {
        border-radius: 8px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-control:focus {
        border-color: #a8dadc;
        box-shadow: 0 0 0 0.2rem rgba(168, 218, 220, 0.25);
    }

    .btn-primary {
        background-color: #b2c7f5;
        border-color: #b2c7f5;
        color: #1d3557;
        transition: background-color 0.4s ease, transform 0.4s ease;
        border-radius: 8px;
    }

    .btn-primary:hover {
        background-color: #94afe9;
        transform: scale(1.03);
    }

    .alert-success {
        border-radius: 8px;
    }
</style>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <h3 class="mb-4 text-center text-primary">Edit Profil</h3>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" id="name" name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

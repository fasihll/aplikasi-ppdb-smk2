@extends('template')
@section('title', 'Register')
@section('content')

    <div class="row">
        <div class="col-md-4">

            <h2 class="my-4 font-weight-bold text-primary">Register</h2>
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password2">Password Confirm</label>
                    <input type="password" name="password2" id="password2"
                        class="form-control @error('password2') is-invalid @enderror">
                    @error('password2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Daftar</button>
            </form>


        </div>
        <div class="col-md-8">
            <h2 class="font-weight-bold text-primary text-left" style="margin-top: 50px">AYO DAFTARKAN DIRIMU DI SEKOLAH
                FAVORIT DI SINI, <span class="text-danger">SEGERA!</span>
            </h2>
        </div>
    </div>
@endsection

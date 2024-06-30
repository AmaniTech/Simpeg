@extends('layouts.auth')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <img src="/fti.png" alt="" height="150" class="mr-2">
            {{-- <img src="/img/mapping.png" alt="" height="100"> --}}
            <a href="/" class="h1 d-block"><b>Simpeg</b></a>
        </div>
        <div class="card-body">
            {{-- <p class="login-box-msg">Sign in to start your session</p> --}}
            @if ($errors->any())
                <ul class="bg-danger py-4 rounded-sm">
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" autocomplete="false">
                    <div class="input-group-append">
                        <div class="input-group-text" style="width:50px">
                            <span class="fas fa-envelope ml-1"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="false">
                    <div class="input-group-append" id="togglepwd">
                        <a class="btn btn-default" role="button" style="width:50px">
                            <span class="fas fa-eye"></span>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


        </div>
        <!-- /.card-body -->
    </div>
@endsection


@section('page-js')
    <script>
        let pwd = true
        $('#togglepwd').click(function() {
            if (pwd) {
                pwd = false
                $('input[name="password"]').attr('type', 'text')
                $('#togglepwd span').removeClass("fa-eye")
                $('#togglepwd span').addClass("fa-eye-slash")
            } else {
                pwd = true
                $('input[name="password"]').attr('type', 'password')
                $('#togglepwd span').removeClass("fa-eye-slash")
                $('#togglepwd span').addClass("fa-eye")
            }
        })
    </script>
@endsection

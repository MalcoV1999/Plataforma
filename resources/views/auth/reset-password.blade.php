@extends('frontend.layouts.master')

@section('content')
 <!--============================
        CHANGE PASSWORD START
    ==============================-->
    <section id="wsus__login_register">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-md-10 col-lg-7 m-auto">
                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf
                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="wsus__change_password">
                            <h4>Restablecer la contraseña</h4>
                            <div class="wsus__single_pass">
                                <label>Correo Electrónico</label>
                                <input id="email" type="email" name="email"
                                value="{{old('email'),$request->email}}" placeholder="Correo Electrónico">
                            </div>
                            <div class="wsus__single_pass">
                                <label>Nueva Contraseña</label>
                                <input id="password" type="password" name="password"
                                placeholder="Nueva Contraseña">
                            </div>
                            <div class="wsus__single_pass">
                                <label>Repetir Contraseña</label>
                                <input id="password_confirmatiom" type="password" name="password_confirmation"
                                placeholder="Repetir Contraseña">
                            </div>
                            <button class="common_btn" type="submit">Restablecer contraseña</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        CHANGE PASSWORD END
    ==============================-->
@endsection
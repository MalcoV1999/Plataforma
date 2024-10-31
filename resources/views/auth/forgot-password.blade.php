@extends('frontend.layouts.master')

@section('content')

    <!--============================
        FORGET PASSWORD START
    ==============================-->
    <section id="wsus__login_register">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__forget_area">
                        <span class="qiestion_icon"><i class="fal fa-question-circle"></i></span>
                        <h4>¿Olvidó su contraseña?</h4>
                        <p>No hay problema. Simplemente déjenos saber su dirección de correo electrónico
                            y le enviaremos un enlace para restablecer la contraseña.
                            <span>Plataforma</span>
                        </p>
                        <div class="wsus__login">
                            <form  method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="wsus__login_input">
                                    <i class="fal fa-envelope"></i>
                                    <input id="email"  type="email" name="email" value="{{old('emsil')}}"
                                     placeholder="Correo electrónico">
                                </div>
                                <button class="common_btn" type="submit">Enviar</button>
                            </form>
                        </div>
                        <a class="see_btn mt-4" href="{{route('login')}}">Ir a Iniciar sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        FORGET PASSWORD END
    ==============================-->
@endsection
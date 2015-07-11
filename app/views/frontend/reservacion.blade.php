@extends('layouts.frontend')

@section('script_header')

    {{-- SMARTFORM --}}
    <link rel="stylesheet" type="text/css"  href="libs/smartform/css/smart-forms.css">
    <link rel="stylesheet" type="text/css"  href="libs/smartform/css/smart-addons.css">
    <link rel="stylesheet" type="text/css"  href="libs/smartform/css/font-awesome.min.css">
@stop


@section('contenido_frontend')

    {{-- SUB BANNER --}}
    <section class="sub-banner text-center section">
        <div class="awe-parallax bg-4"></div>
        <div class="awe-title awe-title-3">
            <h3 class="lg text-uppercase">Reservación</h3>
        </div>
    </section>
    {{-- END / SUB BANNER --}}

    {{-- RESERVATION --}}
    <section class="reservation section pd">
        <div class="divider divider-2"></div>
        <div class="reservation-content">

            <div class="smart-forms smart-container">

                {{ Form::open(['route' => 'front.reservacion.form', 'method' => 'post']) }}

                    <div class="form-body">

                        <div class="frm-row">
                            
                            <div class="section colm colm6">
                                <label for="nombre" class="field-label">Nombre</label>
                                <label for="nombre" class="field prepend-icon @if($errors->has('nombre')) state-error @endif">
                                    {{ Form::text('nombre', null, ['class' => 'gui-input', 'placeholder' => 'Nombre...']) }}
                                    <label for="nombre" class="field-icon"><i class="fa fa-user"></i></label>
                                </label>
                                {{ $errors->first('nombre', '<em for="nombre" class="state-error">:message</em>') }}
                            </div>

                            <div class="section colm colm6">
                                <label for="apellidos" class="field-label">Apellidos</label>
                                <label for="apellidos" class="field prepend-icon @if($errors->has('nombre')) state-error @endif">
                                    {{ Form::text('apellidos', null, ['class' => 'gui-input', 'placeholder' => 'Apellidos...']) }}
                                    <label for="apellidos" class="field-icon"><i class="fa fa-user"></i></label>
                                </label>
                                {{ $errors->first('apellidos', '<em for="apellidos" class="state-error">:message</em>') }}
                            </div>

                        </div>

                        <div class="frm-row">
                            
                            <div class="section colm colm6">
                                <label for="email" class="field-label">Email</label>
                                <label for="email" class="field prepend-icon @if($errors->has('email')) state-error @endif">
                                    {{ Form::email('email', null, ['class' => 'gui-input', 'placeholder' => 'Email...']) }}
                                    <label for="email" class="field-icon"><i class="fa fa-envelope"></i></label>
                                </label>
                                {{ $errors->first('email', '<em for="email" class="state-error">:message</em>') }}
                            </div>

                            <div class="section colm colm6">
                                <label for="telefono" class="field-label">Teléfono</label>
                                <label for="telefono" class="field prepend-icon @if($errors->has('telefono')) state-error @endif">
                                    {{ Form::text('telefono', null, ['class' => 'gui-input', 'placeholder' => 'Teléfono...']) }}
                                    <label for="telefono" class="field-icon"><i class="fa fa-phone"></i></label>
                                </label>
                                {{ $errors->first('telefono', '<em for="telefono" class="state-error">:message</em>') }}
                            </div>

                        </div>
                        
                        <div class="frm-row">

                            <div class="section colm colm4">
                                <label for="fecha" class="field-label">Fecha</label>
                                <label for="fecha" class="field prepend-icon @if($errors->has('fecha')) state-error @endif">
                                    {{ Form::text('fecha', null, ['class' => 'gui-input', 'id' => 'fecha']) }}
                                    <label class="field-icon"><i class="fa fa-calendar"></i></label>  
                                </label>
                                {{ $errors->first('fecha', '<em for="fecha" class="state-error">:message</em>') }}
                            </div>{{-- end section --}}

                            <div class="section colm colm4">
                                <label for="hora" class="field-label">Hora</label>
                                <label for="hora" class="field prepend-icon @if($errors->has('hora')) state-error @endif">
                                    {{ Form::text('hora', null, ['class' => 'gui-input', 'id' => 'hora']) }}
                                    <label class="field-icon"><i class="fa fa-clock-o"></i></label>  
                                </label>
                                {{ $errors->first('hora', '<em for="hora" class="state-error">:message</em>') }}
                            </div>{{-- end section --}}

                            <div class="section colm colm4">
                                <label for="personas" class="field-label">Personas</label>
                                <label class="field @if($errors->has('personas')) state-error @endif">
                                    {{ Form::text('personas', 1, ['class' => 'gui-input', 'id' => 'personas']) }}
                                </label>
                                {{ $errors->first('personas', '<em for="personas" class="state-error">:message</em>') }}
                            </div>{{-- end section --}}

                        </div>{{-- end .frm-row section --}}

                        <div class="result">{{ $mensaje }}</div>{{-- end .result  section --}}
                        
                    </div>{{-- end .form-body section --}}

                    <div class="form-footer">
                        <button type="submit" class="awe-btn awe-btn-2 awe-btn-default text-uppercase"> Reservar </button>
                    </div>{{-- end .form-footer section --}}

                {{ Form::close() }}

            </div>

        </div>
    </section>
    {{-- END / RESERVATION --}}

    {{-- TESTIMONIAL --}}
    <section id="testimonial" class="testimonial testimonial-1 section">
        {{-- BACKGROUND --}}
        <div class="awe-parallax bg-6"></div>
        {{-- END / BACKGROUND --}}

        {{-- OVERLAY --}}
        <div class="awe-overlay"></div>
        {{-- END / OVERLAY --}}

        <div class="container">
            <div class="testimonial-content">
                <div class="icon-head">
                    <i class="icon awe_quote_left"></i>
                </div>

                <blockquote>
                    <p>No se trata de nutrientes y calorías.</p>
                    <span>Se trata de compartir. Se trata de la disfrutar.</span>
                    <div class="test-footer text-right">
                        <span class="sm">Carlos Torres</span>
                    </div>
                </blockquote>
            </div>
        </div>
    </section>
    {{-- END / TESTIMONIAL --}}

@stop


@section('script_footer')

    {{-- SMARTFORM --}}
    <script src="libs/smartform/js/jquery-ui-1.10.4.custom.min.js"></script>

    <script src="libs/smartform/js/jquery.form.min.js"></script>
    <script src="libs/smartform/js/jquery.validate.min.js"></script>
    <script src="libs/smartform/js/additional-methods.min.js"></script>
    <script src="libs/smartform/js/jquery-ui-timepicker.min.js"></script>
    <script src="libs/smartform/js/jquery-ui-touch-punch.min.js"></script>
    <script src="libs/smartform/js/jquery.stepper.min.js"></script>

    <script>
    $(function() {

        $('#hora').timepicker({
            beforeShow: function(input, inst) {
                var newclass = 'smart-forms';
                var smartpikr = inst.dpDiv.parent();
                if (!smartpikr.hasClass('smart-forms')){
                    inst.dpDiv.wrap('<div class="'+newclass+'"></div>');
                }
            }
        });

        $("#fecha").datepicker({
            numberOfMonths: 1,
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
            showButtonPanel: false
        });

        $('#personas').stepper({
            UI: false,
            allowWheel :false,
            limit: [1, 100]
        });

    });
    </script>

@stop
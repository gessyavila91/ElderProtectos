<x-app-layout>

    @section('content')
        <!DOCTYPE html>
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

        <head>
            <title>{{ config('app.name') }} - Custom Mat Maker</title>

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
                  integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
                  crossorigin="anonymous">
        </head>

        <style>
            .parent {
                max-width: 800px;
                max-height: 800px;
                width: 100%;
                height: 100%;
                position: relative;
                display: block;
            }

            Fondo {
                position: relative;
                top: 0;
                left: 0;
                border: 1px red solid;

                margin-top: 50%;
                margin-left: 50%;
            }

            parent.Marco {
                position: relative;
                top: 0;
                left: 0;
                border: 1px red solid;
                margin-top: 50%;
                margin-left: 50%;

            }
            parent.Logo {
                position: relative;
                top: 0;
                left: 0;
                border: 1px red solid;
                margin-top: 50%;
                margin-left: 50%;

            }


        </style>

        <body>

        <div class="row">

            <div id="Select" class="col">

                <div >
                    <img class="Fondo-parent" id="fondo" src="{{asset('assets/img/customMat/AppImg/fondo1.png')}}"/>
                    <img class="Marco" id="marco" src="{{asset('assets/img/customMat/AppImg/marco1.png')}}"/>
                    <img class="Logo" id="centro" src="{{asset('assets/img/customMat/AppImg/centro1.png')}}"/>
                </div>
                <select id="selectFondo" onchange="document.getElementById('fondo').src = this.value"
                        name="selectFondo">
                    <option value="{{asset('assets/img/customMat/AppImg/fondo1.png')}}">fondo1</option>
                    <option value="{{asset('assets/img/customMat/AppImg/fondo2.png')}}">fondo2</option>
                </select>

                <select id="selecMarco" onchange="document.getElementById('marco').src = this.value"
                        name="selectMarco">
                    <option value="{{asset('assets/img/customMat/AppImg/marco1.png')}}">marco1</option>
                    <option value="{{asset('assets/img/customMat/AppImg/marco2.png')}}">marco2</option>
                </select>

                <select id="selecCentro" onchange="document.getElementById('centro').src = this.value"
                        name="selectCentro">
                    name="selectCentro">
                    <option value="{{asset('assets/img/customMat/AppImg/centro1.png')}}">centro1</option>
                    <option value="{{asset('assets/img/customMat/AppImg/centro2.png')}}">centro2</option>
                </select>

            </div>
            <div id="IMG" class="col">

                <div id="Form" class="col-md-4">
                    <form>
                        <label for="fname">First name:</label><br>
                        <input type="text" id="fname" name="fname" value="John"><br>
                        <label for="lname">Last name:</label><br>
                        <input type="text" id="lname" name="lname" value="Doe"><br><br>
                        <input type="submit" value="Submit">
                    </form>
                </div>

            </div>

        </div>
        <div>

        </div>


        </body>


        </html>

    @endsection
</x-app-layout>


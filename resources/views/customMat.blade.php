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
            .container {
                position: relative;
                max-width: 100%;
                min-height: 257px;
                min-width: 331px;
                height: auto;


            }

            .Fondo {
                position: absolute;
                border: 1px red solid;
                min-height: 257px;
                min-width: 331px;
            }

            .Marco {
                position: absolute;
                border: 1px red solid;
                min-height: 257px;
                min-width: 331px;

            }
            .Logo {
                position: absolute;
                border: 1px red solid;
                min-height: 257px;
                min-width: 331px;

            }


        </style>

        <body>

        <div class="row">

            <div class="col-sm-6" >
                <div style=" border: 1px blue solid; min-width: 331px;">
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

                <div class="container"  style="border: 1px orange solid;">
                    <img class="Fondo" id="fondo" src="{{asset('assets/img/customMat/AppImg/fondo1.png')}}"  alt=""/>
                    <img class="Marco" id="marco" src="{{asset('assets/img/customMat/AppImg/marco1.png')}}"  alt=""/>
                    <img class="Logo" id="centro" src="{{asset('assets/img/customMat/AppImg/centro1.png')}}" alt=""/>
                </div>

            </div>
            <div class="col" style="border: 1px green solid;min-width: 331px;">
                <form>
                    <label for="fname">First name:</label><br>
                    <input type="text" id="fname" name="fname" value="John"><br>
                    <label for="lname">Last name:</label><br>
                    <input type="text" id="lname" name="lname" value="Doe"><br><br>
                    <input type="submit" value="Submit">
                </form>
            </div>

        </div>
        <div>

        </div>


        </body>


        </html>

    @endsection
</x-app-layout>


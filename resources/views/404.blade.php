<x-app-layout>

    @section('content')

        <!DOCTYPE html>
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

        <head>
            <title>{{ config('app.name') }} - Custom Mat Maker</title>

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
                  integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
                  crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                    crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
                    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
                    crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
                    integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
                    crossorigin="anonymous"></script>


            <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>


        </head>
        <body>






        </body>
        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">© 2017-2021 Elder Protectors</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>

        </html>

    @endsection
</x-app-layout>
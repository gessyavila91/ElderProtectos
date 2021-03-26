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

        <div class="container">
        <div class="row gutters-sm px-3 py-3 pt-md-5 pb-md-4 ">



        <div class="jumbotron alert-success">
            <h1 class="display-4">Success, purchase has be made!</h1>
            <p class="lead">Your purchase has been successfully made, you can verify the status of your order from your account, or looking for the purchase number in our search engine.</p>
            <hr class="my-4">
            <p>Your purchase number is:<span class="badge badge-pill badge-success">XXX-XXX-XXX</span></p>
            <p>We mail all information, but you can always check your account.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">My account</a> <a class="btn btn-secondary btn-lg" href="#" role="button">Search</a>
        </div>



        </div>
        </div>

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
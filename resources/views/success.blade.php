<x-app-layout>

    @section('content')

        <!DOCTYPE html>
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

        <head>
            <title>{{ config('app.name') }} - Custom Mat Maker</title>


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

        </html>

    @endsection
</x-app-layout>
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
                    <div class="col-md-4 mb-3">

                        <div class="card p-3">
                            <div class="d-flex align-items-center">
                                <div class="image"> <img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80" class="rounded" width="240">
                                </div>
                                <div class="ml-3 w-100">
                                    <h4 class="mb-0 mt-0">Daniel 000<h4> <h6 class="badge badge-pill badge-info">Elder Knight</h6>
                                    <div class="p-2 mt-2 bg-light d-flex justify-content-between rounded text-secondary stats text-sm">
                                        <div class="d-flex flex-column"> <span class="followers">Level</span> <span class="font-weight-bold text-info">10</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fas fa-signature"></i>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        Daniel De Haas
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        daniel.de.haas@hotmail.com
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        (239) 816-9029
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fas fa-mobile-alt"></i>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        (320) 380-4539
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fas fa-map-marked-alt"></i>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        3 Sweet Pea Drive PAKENHAM VIC 3810 Australia

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-header">
                                Purchase
                            </div>
                            <div class="card-body">
                                <table class="table table-hover text-sm text-muted">
                                    <thead>
                                    <tr>
                                        <th scope="col">Purchase</th>
                                        <th scope="col">Date</th>
                                        <th scope="col" class="text-right">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">XXX-XXX-XXX</th>
                                        <td>17/07/2020</td>
                                        <td class="text-right">$230</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">XXX-XXX-XXX</th>
                                        <td>25/03/2021</td>
                                        <td class="text-right">$70</td>
                                    </tr>
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>
                        </div>




                        <div class="row gutters-sm">
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Purchase</i>XXX-XXX-XXX</h6>
                                        <div class="row">
                                            <div class="col">
                                                <h6 class="mb-3">Pay method: <strong class="text-dark">Etsy Pay</strong></h6>
                                                <h6 class="mb-3">Shipping company: <strong class="text-dark">Correos de México</strong></h6>
                                                <h6 class="mb-3">Tracking number: <strong class="text-dark">RP660012387MX</strong></h6>
                                            </div>
                                            <div class="col">
                                                <h6 class="mb-3">Status: <strong class="text-success"><i class="far fa-check-circle"></i> Delivered</strong></h6>
                                                <p class="text-muted text-sm w-50">
                                                    March 23, 2021 at 10:42 am
                                                    Delivered, Front Desk/Reception/Mail Room
                                                    MIRAMONTE, CA 93641
                                                </p>
                                            </div>
                                        </div>
                                        <div class="w-100">
                                            <div class="progress mb-3" style="height: 20px;">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary border-right border-white" role="progressbar" style="width: 34%" aria-valuenow="33.33" aria-valuemin="0" aria-valuemax="100"></div>
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info border-right border-white" role="progressbar" style="width: 34%" aria-valuenow="33.33" aria-valuemin="0" aria-valuemax="100"></div>
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success border-right border-white" role="progressbar" style="width: 34%" aria-valuenow="33.33" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="row d-flex justify-content-between">
                                                <div class="col"><i class="fas fa-circle text-primary"></i><span class="bg-primary"></span><span> Processed</span></div>
                                                <div class="col"><i class="fas fa-circle text-info"></i><span class="bg-info"></span><span> In-Transit</span></div>
                                                <div class="col"><i class="fas fa-circle text-success"></i><span class="bg-success"></span><span> Delivered</span></div>
                                            </div>

                                            {{--<Purchase>--}}


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>




                    </div>
                </div>
            </div>







        </body>

        </html>

    @endsection
</x-app-layout>
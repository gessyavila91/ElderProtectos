<x-app-layout>

    @section('content')

        <!DOCTYPE html>
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

        <head>
            <title>{{ config('app.name') }} - Orders</title>
        </head>

        <div class="container">
            {{--<head>--}}
            <div class="py-5">
                <div class="animate__animated animate__fadeInDown">
                    <div class="p-5 shadow-sm rounded bg-degraded-2 text-dark  text-center">
                        <h1 class="display-4">Look up orders</h1>
                        <p class="lead">Search your order, enter the code that we send you by mail,<br>
                            if you have any problems please send us an e-mail:
                            <a href="mailto:hi@elderprotectors.com">hi@elderprotectors.com</a></p>
                    </div>
                </div>
            </div>

            {{--<Search>--}}
            <div class="animate__animated animate__fadeInUp">
            <div class="d-flex justify-content-center">
                <div class="input-group w-50">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Search</span>
                    </div>
                    <input id="" class="form-control" type="text"
                           placeholder="XXX-XXX-XXX" required>
                    <div class="input-group-append">
                        <button onclick="" id="" type="button"
                                class="btn btn-primary">
                            <i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
            </div>


            <hr class="featurette-divider">


            {{--<Purchase>--}}
            <div class="card">
                <div class="card-header">
                    Purchase
                    <span class="badge badge-pill badge-secondary">XXX-XXX-XXX</span>
                </div>
                <div class="card-body">

                    <div class="card border-light">

                        <table class="table table-hover text-sm text-muted">
                            <thead>
                            <tr>
                                <th scope="col">Item</th>
                                <th scope="col">Code</th>
                                <th scope="col">Custom Text</th>
                                <th scope="col" class="text-right">Cost</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">Custom Mat</th>
                                <td>M-BBRW-FCLT-LCHDRG-TL</td>
                                <td>Otto</td>
                                <td class="text-right">$70</td>
                            </tr>
                            <tr>
                                <th scope="row">Custom Mat</th>
                                <td>M-BBRW-FCLT-LCHDRG-TL</td>
                                <td>Thornton</td>
                                <td class="text-right">$70</td>
                            </tr>
                            <tr class="bg-light text-success ">
                                <th scope="row">Discount Code</th>
                                <td>#PROMO</td>
                                <td></td>
                                <td class="text-right">-$5</td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td scope="col"></td>
                                <td scope="col"></td>
                                <td scope="col"></td>
                                <td scope="col" class="text-right">$135</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <hr class="featurette-divider">
                {{--<Purchase>--}}

                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h6 class="mb-3">Pay method: <strong class="text-dark">Etsy Pay</strong></h6>
                            <h6 class="mb-3">Shipping company: <strong class="text-dark">Correos de México</strong></h6>
                            <h6 class="mb-3">Tracking number: <strong class="text-dark">RP660012387MX</strong></h6>
                        </div>
                        <div class="col">
                            <h6 class="mb-3">Status: <strong class="text-success"><i class="far fa-check-circle"></i>
                                    Delivered</strong></h6>
                            <p class="text-muted text-sm w-50">
                                March 23, 2021 at 10:42 am
                                Delivered, Front Desk/Reception/Mail Room
                                MIRAMONTE, CA 93641
                            </p>
                        </div>
                    </div>
                    <div class="w-100">
                        <div class="progress mb-3" style="height: 20px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary border-right border-white"
                                 role="progressbar" style="width: 34%" aria-valuenow="33.33" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info border-right border-white"
                                 role="progressbar" style="width: 34%" aria-valuenow="33.33" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success border-right border-white"
                                 role="progressbar" style="width: 34%" aria-valuenow="33.33" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                        <div class="row d-flex justify-content-between">
                            <div class="col"><i class="fas fa-circle text-primary"></i><span
                                        class="bg-primary"></span><span> Processed</span></div>
                            <div class="col"><i class="fas fa-circle text-info"></i><span class="bg-info"></span><span> In-Transit</span>
                            </div>
                            <div class="col"><i class="fas fa-circle text-success"></i><span
                                        class="bg-success"></span><span> Delivered</span></div>
                        </div>

                        <hr class="featurette-divider">
                        {{--<Purchase>--}}


                    </div>
                </div>

            </div>
        </div>

    @endsection
</x-app-layout>
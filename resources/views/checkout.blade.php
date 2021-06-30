<x-app-layout>

    @section('content')

        <!DOCTYPE html>
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

        <head>
            <title>{{ config('app.name') }} - Check Out</title>

        </head>
        <body>


        <div class="container">
            {{--<head>--}}
            <div class="py-5">
                <div class="animate__animated animate__fadeInDown">
                    <div class="p-5 shadow-sm rounded bg-degraded-2 text-dark  text-center">
                        <h1>Check Out</h1>
                    </div>
                </div>
            </div>

            <div class="row gutters-sm px-3 py-3 pb-md-4 ">
                <div class="col-md-4 mb-3">


                    <div class="card">
                        <div class="card-header">Preview</div>
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <img src="assets/img/customMat/fondo1.png" width="200rem" alt="Preview">

                            </div>
                        </div>
                    </div>


                    <div class="card mt-3">
                        <div class="card-header">Shipping Info</div>
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
                        <div class="card-header">Purchase</div>
                        <div class="card-body">
                            <table class="table table-hover text-sm text-muted">
                                <thead>
                                <tr>
                                    <th scope="col">Preview</th>
                                    <th scope="col">Item</th>
                                    <th scope="col">Id</th>
                                    <th scope="col" class="text-right">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <button class="btn btn-outline-primary" type="button" id="button-addon1"><i
                                                    class="far fa-eye"></i></button>
                                    </td>
                                    <th scope="row">XXX-XXX-XXX</th>
                                    <td>17/07/2020</td>
                                    <td class="text-right">$230</td>
                                </tr>
                                <tr>
                                    <td>
                                        <button class="btn btn-outline-primary" type="button" id="button-addon1"><i
                                                    class="far fa-eye"></i></button>
                                    </td>
                                    <th scope="row">XXX-XXX-XXX</th>
                                    <td>25/03/2021</td>
                                    <td class="text-right">$70</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <th scope="row"></th>
                                    <td class="text-right text-sm ">Total Amount:</td>
                                    <td class="text-right font-weight-bold ">$300</td>
                                </tr>


                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                    </div>


                    <div class="row gutters-sm">
                        <div class="col">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                                        <!-- Credit card form tabs -->
                                        <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                            <li class="nav-item"><a data-toggle="pill" href="#paypal"
                                                                    class="nav-link active "> <i
                                                            class="fab fa-paypal mr-2"></i> Paypal </a></li>
                                            <li class="nav-item"><a data-toggle="pill" href="#credit-card" class="nav-link ">
                                                    <i class="fas fa-credit-card mr-2"></i> Credit Card </a></li>
                                            <li class="nav-item"><a data-toggle="pill" href="#net-banking"
                                                                    class="nav-link "> <i
                                                            class="fas fa-mobile-alt mr-2"></i> Net Banking </a></li>
                                        </ul>
                                    </div> <!-- End -->
                                    <!-- Credit card form content -->
                                    <div class="tab-content">
                                        <!-- credit card info-->
                                            <div id="paypal" class="tab-pane fade show active pt-3">
                                                <h6 class="pb-2">Select your paypal account type</h6>
                                                <div class="form-group "><label class="radio-inline"> <input type="radio"
                                                                                                             name="optradio"
                                                                                                             checked> Domestic
                                                    </label> <label class="radio-inline"> <input type="radio" name="optradio"
                                                                                                 class="ml-5">International
                                                    </label></div>
                                                    <div class="card-footer">
                                                        <button type="button"
                                                                class="subscribe btn btn-primary btn-block shadow-sm">
                                                            Confirm Payment
                                                        </button>


                                            </div>
                                        </div> <!-- End -->
                                        <!-- Credit card form content -->

                                            <!-- credit card info-->
                                            <div id="credit-card" class="tab-pane fade pt-3">
                                                <form role="form" onsubmit="event.preventDefault()">
                                                    <div class="form-group"><label for="username">
                                                            <h6>Card Owner</h6>
                                                        </label> <input type="text" name="username"
                                                                        placeholder="Card Owner Name" required
                                                                        class="form-control "></div>
                                                    <div class="form-group"><label for="cardNumber">
                                                            <h6>Card number</h6>
                                                        </label>
                                                        <div class="input-group"><input type="text" name="cardNumber"
                                                                                        placeholder="Valid card number"
                                                                                        class="form-control " required>
                                                            <div class="input-group-append"><span
                                                                        class="input-group-text text-muted"> <i
                                                                            class="fab fa-cc-visa mx-1"></i> <i
                                                                            class="fab fa-cc-mastercard mx-1"></i> <i
                                                                            class="fab fa-cc-amex mx-1"></i> </span></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <div class="form-group"><label><span class="hidden-xs">
                                                    <h6>Expiration Date</h6>
                                                </span></label>
                                                                <div class="input-group"><input type="number"
                                                                                                placeholder="MM" name=""
                                                                                                class="form-control"
                                                                                                required> <input
                                                                            type="number" placeholder="YY" name=""
                                                                            class="form-control" required></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group mb-4"><label data-toggle="tooltip"
                                                                                                title="Three digit CV code on the back of your card">
                                                                    <h6>CVV <i class="fa fa-question-circle d-inline"></i>
                                                                    </h6>
                                                                </label> <input type="text" required class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="form-group">
                                                    <p>
                                                        <button type="button" class="btn btn-primary "><i
                                                                    class="fas fa-mobile-alt mr-2"></i> Proceed Payment
                                                        </button>
                                                    </p>
                                                </div>
                                            </div>
                                         <!-- End -->
                                    <!-- bank transfer info -->
                                    <div id="net-banking" class="tab-pane fade pt-3">
                                        <div class="form-group "><label for="Select Your Bank">
                                                <h6>Select your Bank</h6>
                                            </label> <select class="form-control" id="ccmonth">
                                                <option value="" selected disabled>--Please select your Bank--</option>
                                                <option>Bank 1</option>
                                                <option>Bank 2</option>
                                                <option>Bank 3</option>
                                                <option>Bank 4</option>
                                                <option>Bank 5</option>
                                                <option>Bank 6</option>
                                                <option>Bank 7</option>
                                                <option>Bank 8</option>
                                                <option>Bank 9</option>
                                                <option>Bank 10</option>
                                            </select></div>
                                        <div class="form-group">
                                            <p>
                                                <button type="button" class="btn btn-primary "><i
                                                            class="fas fa-mobile-alt mr-2"></i> Proceed Payment
                                                </button>
                                            </p>
                                        </div>
                                    </div> <!-- End -->
                                    <!-- End -->
                                </div>
                                <br>
                                <p class="text-muted">Note: After clicking on the button, you will be directed
                                    to a secure gateway for payment. After completing the payment process, you
                                    will be redirected back to the website to view details of your order. </p>
                            </div>
                        </div>
                    </div>


                    {{--<Purchase>--}}

                </div>
            </div>
        </div>

        </div>

        </div>


        </div>

        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-secondary btn-lg">Return</button>
        </div>

        </div>


        </body>

        </html>

    @endsection
</x-app-layout>
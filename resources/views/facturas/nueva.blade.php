@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <h2>Nueva Factura</h2>
        </div>
        <form action="#">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group form-group-sm">
                        <label for="firstname" class="control-label">Nro Documento</label>
                        <input type="text" class="form-control" id="firstname" placeholder="Firstname">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="lastname" class="control-label">Codigo Cuenta</label>
                        <input type="text" class="form-control" id="lastname" placeholder="Last Name">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="lastname" class="control-label">Categoria</label>
                        <select class="form-control" name="expiry-year">
                            <option value="13">2013</option>
                            <option value="14">2014</option>
                            <option value="15">2015</option>
                            <option value="16">2016</option>
                            <option value="17">2017</option>
                            <option value="18">2018</option>
                            <option value="19">2019</option>
                            <option value="20">2020</option>
                            <option value="21">2021</option>
                            <option value="22">2022</option>
                            <option value="23">2023</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="lastname" class="control-label">Detalles</label>
                    <textarea class="form-control"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <input id="datepicker"/>

                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
        </form>

    </div>

    <!--


    <div class="container">
        <form class="form-horizontal" role="form">
            <fieldset>
                <legend>Nueva Factura</legend>

                <div class="row">
                    <div class="form-group">
                        <label class="col-lg-12 control-label" for="card-holder-name">Name on Card</label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="card-holder-name" id="card-holder-name" placeholder="Card Holder's Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-12 control-label" for="card-number">Card Number</label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="card-number" id="card-number" placeholder="Debit/Credit Card Number">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-xs-3">
                                <select class="form-control col-sm-2" name="expiry-month" id="expiry-month">
                                    <option>Month</option>
                                    <option value="01">Jan (01)</option>
                                    <option value="02">Feb (02)</option>
                                    <option value="03">Mar (03)</option>
                                    <option value="04">Apr (04)</option>
                                    <option value="05">May (05)</option>
                                    <option value="06">June (06)</option>
                                    <option value="07">July (07)</option>
                                    <option value="08">Aug (08)</option>
                                    <option value="09">Sep (09)</option>
                                    <option value="10">Oct (10)</option>
                                    <option value="11">Nov (11)</option>
                                    <option value="12">Dec (12)</option>
                                </select>
                            </div>
                            <div class="col-xs-3">
                                <select class="form-control" name="expiry-year">
                                    <option value="13">2013</option>
                                    <option value="14">2014</option>
                                    <option value="15">2015</option>
                                    <option value="16">2016</option>
                                    <option value="17">2017</option>
                                    <option value="18">2018</option>
                                    <option value="19">2019</option>
                                    <option value="20">2020</option>
                                    <option value="21">2021</option>
                                    <option value="22">2022</option>
                                    <option value="23">2023</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="cvv">Card CVV</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="cvv" id="cvv" placeholder="Security Code">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="button" class="btn btn-success">Pay Now</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <!--

@endsection
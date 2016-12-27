@extends('layouts.wizard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <!--      Wizard container        -->
            <div class="wizard-container">
                <div class="card wizard-card" data-color="red" id="wizard">

                @if (!empty($profile->profile))
                    <form role="form" method="POST" action="{{ route('storeOrderUpdateProfile', [$profile->profile->id]) }}">
                @else
                    <form role="form" method="POST" action="{{ route('storeOrderStoreProfile') }}">
                @endif
                    {{ csrf_field() }}
                    <input type="hidden" name="invoice" value={{ $invoice }}>
                    
                        <div class="wizard-header">
                            <h3 class="wizard-title">
                               Complete Your Order
                            </h3>
                            <h5>Choose your plan and complete the order.</h5>
                        </div>
                        <div class="wizard-navigation">
                            <ul>
                                <li><a href="#plan" data-toggle="tab">Plan</a></li>
                                <li><a href="#address" data-toggle="tab">Address</a></li>
                                <li><a href="#payment" data-toggle="tab">Payment</a></li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane" id="plan">
                                <h4 class="info-text"> Choose what method we send your books? <span style="color: #f00;">(select one)</span> </h4>
                                <div class="row">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="col-sm-6">
                                            <div class="choice" data-toggle="wizard-radio">
                                                <input type="radio" name="plan" value="PACKAGE">
                                                <div class="icon">
                                                    <i class="material-icons">redeem</i>
                                                </div>
                                                <h6>PACKAGE</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="choice" data-toggle="wizard-radio">
                                                <input type="radio" name="plan" value="PDF">
                                                <div class="icon">
                                                    <i class="material-icons">picture_as_pdf</i>
                                                </div>
                                                <h6>PDF</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="address">
                                <div class="row">
                                    <div id="methodPackage">
                                        <div class="col-sm-12">
                                            <h4 class="text-center"> <b>Update your profile</b> </h4>
                                            <h6 class="info-text"> This will be used to send your books. </h6>
                                        </div>
                                        <div class="col-sm-4 col-sm-offset-1">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Phone Number</label>
                                                @if (!empty($profile->profile))
                                                    <input type="text" class="form-control" name="phone" value="{{ old('phone', $profile->profile->phone) }}">
                                                @else
                                                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Street Name</label>
                                                @if (!empty($profile->profile))
                                                    <input type="text" class="form-control" name="street" value="{{ old('street', $profile->profile->street) }}">
                                                @else
                                                    <input type="text" class="form-control" name="street" value="{{ old('street') }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-1">
                                            <div class="form-group label-floating">
                                                <label class="control-label">City</label>
                                                @if (!empty($profile->profile))
                                                    <input type="text" class="form-control" name="city" value="{{ old('city', $profile->profile->city) }}">
                                                @else
                                                    <input type="text" class="form-control" name="city" value="{{ old('city') }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Province</label>
                                                @if (!empty($profile->profile))
                                                    <input type="text" class="form-control" name="province" value="{{ old('province', $profile->profile->province) }}">
                                                @else
                                                    <input type="text" class="form-control" name="province" value="{{ old('province') }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-1">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Postal Code</label>
                                                @if (!empty($profile->profile))
                                                    <input type="number" class="form-control" name="postal_code" value="{{ old('postal_code', $profile->profile->postal_code) }}">
                                                @else
                                                    <input type="number" class="form-control" name="postal_code" value="{{ old('postal_code') }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Country</label>
                                                @if (!empty($profile->profile))
                                                    <input type="text" class="form-control" name="country" value="{{ old('country', $profile->profile->country) }}">
                                                @else
                                                    <input type="text" class="form-control" name="country" value="{{ old('country') }}">
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div id="methodPDF">
                                        <div class="col-sm-12">
                                            <h4 class="text-center"> We will send the download link to your email. </h4>
                                            <h6 class="info-text" style="color: #f00;">{{ $profile->email }}</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane" id="payment">
                                <h4 class="info-text"> Choose payment method <span style="color: #f00;">(select one)</span> </h4>
                                <div class="row">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="col-sm-6">
                                            <div class="choice choice-cash" data-toggle="wizard-radio">
                                                <input type="radio" name="payment" value="CASH">
                                                <div class="icon">
                                                    <i class="material-icons">attach_money</i>
                                                </div>
                                                <h6>CASH</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="choice choice-atm" data-toggle="wizard-radio">
                                                <input type="radio" name="payment" value="ATM">
                                                <div class="icon">
                                                    <i class="material-icons">credit_card</i>
                                                </div>
                                                <h6>ATM</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div id="methodCash">
                                        <div class="col-sm-12">
                                            <h4 class="text-center"> <b>Choose your closest store</b> </h4>
                                            <h6 class="info-text"> This will be used for you to pay. </h6>
                                        </div>
                                        <div class="col-sm-4 col-sm-offset-1">
                                            <div class="form-group label-static">
                                                <label class="control-label">Bookstore</label>
                                                <select id="bookstore">
                                                    <option value="seyegan">Seyegan</option>
                                                    <option value="godean">Godean</option>
                                                    <option value="jakal">Jl. Kaliurang</option>
                                                    <option value="malioboro">Malioboro</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div id="related_seyegan_content">
                                                Address: Terwilen, RT02, RW29, Margodadi, Seyegan, Sleman
                                            </div>
                                            <div id="related_godean_content">
                                                Address: Jl. Adhiyaksa no 4, Godean, Sleman
                                            </div>
                                            <div id="related_jakal_content">
                                                Address: Jl. Kaliurang no 89
                                            </div>
                                            <div id="related_malioboro_content">
                                                Address: Malioboro nomor 19
                                            </div>
                                        </div>
                                    </div>

                                    <div id="methodATM">
                                        <div class="col-sm-12">
                                            <h4 class="text-center"> <b>Choose your bank</b> </h4>
                                            <h6 class="info-text"> This will be used for you to send to our bank. </h6>
                                        </div>
                                        <div class="col-sm-4 col-sm-offset-1">
                                            <div class="form-group label-static">
                                                <label class="control-label">Bank</label>
                                                <select id="bank">
                                                    <option value="mandiri">Mandiri</option>
                                                    <option value="bca">BCA</option>
                                                    <option value="bni">BNI</option>
                                                    <option value="bri">BRI</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div id="related_mandiri_content">
                                                Rek : 777777
                                            </div>
                                            <div id="related_bca_content">
                                                Rek : 888888
                                            </div>
                                            <div id="related_bni_content">
                                                Rek : 999999
                                            </div>
                                            <div id="related_bri_content">
                                                Rek : 555555
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-info btn-wd' name='next' value='Next' />
                                <input type='submit' class='btn btn-finish btn-fill btn-info btn-wd' name='finish' value='Finish' />
                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div> <!-- wizard container -->
        </div>
    </div><!-- end row -->
</div> <!--  big container -->
@endsection

@section('script')
<script type="text/javascript">
    $( document ).ready(function() {
        $('#methodCash').hide();
        $('#methodATM').hide();
        $("#related_seyegan_content").show().siblings().hide();
        $("#related_mandiri_content").show().siblings().hide();
    });

    $("input, .wizard-navigation").on( "click", function() {

        wizard = $(this).closest('.wizard-card');
        var plan = $(wizard).find('[checked="checked"]').val();

        if ( plan == "PACKAGE") {
            $(function() {
                $('#methodPDF').hide();
                $('#methodPackage').show();
            });
        } else { 
            $(function() {
                $('#methodPackage').hide();
                $('#methodPDF').show();
            });
        }

    });

    $(".choice-cash").on( "click", function() {
        $('#methodCash').show();
        $('#methodATM').hide();
    });

    $(".choice-atm").on( "click", function() {
        $('#methodCash').hide();
        $('#methodATM').show();
    });

    $("#bookstore").on("change", function() {
        id = "related_" + $(this).val() + "_content";
        $("#" + id).show().siblings().hide()
    });

    $("#bank").on("change", function() {
        id = "related_" + $(this).val() + "_content";
        $("#" + id).show().siblings().hide()
    });
</script>
@endsection

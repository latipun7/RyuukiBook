@extends('layouts.wizard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <!--      Wizard container        -->
            <div class="wizard-container">
                <div class="card wizard-card" data-color="red" id="wizard">
                    <div class="wizard-header">
                        <h3 class="wizard-title">
                           Invoice
                        </h3>
                        <h5>{{ $invoice }}</h5>
                        <h5>{{ $order->created_at }}</h5>
                    </div>

                    <div class="tab-content">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <td><strong>Book Title</strong></td>
                                        <td class="text-center"><strong>Price</strong></td>
                                        <td class="text-center"><strong>Quantity</strong></td>
                                        <td class="text-center"><strong>Total Price</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach ($transaction as $trans)
                                    <tr>
                                        <td>{{ $trans->book->title }}</td>
                                        <td class="text-center">{{ "Rp ".number_format($trans->book->price,2, ',', '.') }}</td>
                                        <td class="text-center">{{ $trans->qty }}</td>
                                        <td class="text-center">{{ "Rp ".number_format($trans->total_price,2, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                                    <tr>
                                        <td class="highrow"></td>
                                        <td class="highrow"></td>
                                        <td class="highrow text-center"><strong>Subtotal</strong></td>
                                        
                                        <td class="highrow text-center">{{ $order->subtotal }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="wizard-footer">
                        <div class="pull-right">
                            <a href='/' class='btn btn-fill btn-info btn-wd'>Close</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div> <!-- wizard container -->
        </div>
    </div><!-- end row -->
</div> <!--  big container -->
@endsection

@section('script')
@endsection

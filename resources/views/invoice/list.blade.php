@extends("layout")
@section('title','Invoices')
@section('encabezado','Invoices')
@section('content')
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Subtotal</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->created_at }}</td>
                    <td>{{ $invoice->subtotal }}</td>
                    <td>{{ $invoice->total }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{ $invoice->id }}">
                            Detail
                        </button>
                    </td>
                </tr>

                <div class="modal fade" id="detailModal{{ $invoice->id }}" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="detailModalLabel">Invoice # {{ $invoice->id }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-3"><b>Name</b></div>
                                    <div class="col-sm-3"><b>Quantity</b></div>
                                    <div class="col-sm-3"><b>Unit Price</b></div>
                                    <div class="col-sm-3"><b>Total Price</b></div>
                                </div>
                                    @foreach ($invoice->products as $product)
                                        <div class="row">
                                            <div class="col-sm-3">{{ $product->name}}</div>
                                            <div class="col-sm-3">{{ $product->pivot->quantity}}</div>
                                            <div class="col-sm-3">$ {{ number_format($product->pivot->price,0,",",".")}}</div>
                                            <div class="col-sm-3">$ {{ number_format($product->pivot->price * $product->pivot->quantity,0,",",".")}}</div>
                                        </div>
                                    @endforeach
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-3">Subtotal:</div>
                                        <div class="col-sm-3">$ {{ number_format($invoice->subtotal,0,",",".")}}</div>
                                    </div>
                                    <div class="row border border-dark">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-3">Total:</div>
                                        <div class="col-sm-3">$ {{ number_format($invoice->total,0,",",".")}}</div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
@endsection
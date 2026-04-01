@extends('layouts.app')

@section('title', 'Cart')

@section('content')
<h1>Keranjang Belanja</h1>
<p>Your cart is empty.</p>
<a href="/checkout" class="btn btn-warning">Proceed to Checkout</a>
@endsection
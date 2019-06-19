@extends('layout.master')


@section('content')
    @if (count($cartItems))
        <section id="cart_items">
            <div class="container">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Shopping Cart</li>
                    </ol>
                </div>

                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                        </thead>

                        <tbody>
                            <?php $count = 1; ?>
                            @foreach($cartItems as $item)
                                <tr>
                                    <td class="cart_product">
                                        <a href=""><img width="75px" height="75px" src="uploads/images/products/{{ $item->options->img }}" alt=""></a>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="">{{ $item->name }}</a></h4>
                                        <p>Web ID: {{ $item->id }}</p>
                                    </td>
                                    <td class="cart_price">
                                        <p>${{$item->price}}</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <input type="hidden" id="rowId<?php echo $count;?>" value="{{$item->rowId}}"/>
                                        <input type="hidden" id="proId<?php echo $count;?>" value="{{$item->id}}"/>
                                        <input class="cart_quatity_js" type="number" size="2" value="{{$item->qty}}" name="qty" id="upCart<?php echo $count;?>"
                                               autocomplete="off" style="text-align:center; max-width:50px; "  MIN="1" MAX="1000">
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">$ {{ $item->subtotal }}</p>
                                    </td>
                                    <td class="cart_delete">
                                        <a href="{{ route('cart.destroy', ['id'=>$item->rowId]) }}" class="cart_quantity_delete"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <?php $count++ ?>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </section> <!--/#cart_items-->

        <section id="do_action">
            <div class="container">
                <div class="heading">
                    <h3>What would you like to do next?</h3>
                    <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="chose_area">
                            <ul class="user_option">
                                <li>
                                    <input type="checkbox">
                                    <label>Use Coupon Code</label>
                                </li>
                                <li>
                                    <input type="checkbox">
                                    <label>Use Gift Voucher</label>
                                </li>
                                <li>
                                    <input type="checkbox">
                                    <label>Estimate Shipping & Taxes</label>
                                </li>
                            </ul>
                            <ul class="user_info">
                                <li class="single_field">
                                    <label>Country:</label>
                                    <select>
                                        <option>United States</option>
                                        <option>Bangladesh</option>
                                        <option>UK</option>
                                        <option>India</option>
                                        <option>Pakistan</option>
                                        <option>Ucrane</option>
                                        <option>Canada</option>
                                        <option>Dubai</option>
                                    </select>

                                </li>
                                <li class="single_field">
                                    <label>Region / State:</label>
                                    <select>
                                        <option>Select</option>
                                        <option>Dhaka</option>
                                        <option>London</option>
                                        <option>Dillih</option>
                                        <option>Lahore</option>
                                        <option>Alaska</option>
                                        <option>Canada</option>
                                        <option>Dubai</option>
                                    </select>

                                </li>
                                <li class="single_field zip-field">
                                    <label>Zip Code:</label>
                                    <input type="text">
                                </li>
                            </ul>
                            <a class="btn btn-default update" href="">Get Quotes</a>
                            <a class="btn btn-default check_out" href="">Continue</a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="total_area">
                            <ul>
                                <li>Cart Sub Total <span>$ {{ $item->subtotal }}</span></li>
                                <li>Eco Tax <span>$ {{ $item->tax }}</span></li>
                                <li>Shipping Cost <span>Free</span></li>
                                <li>Total <span>$ {{ $item->total }}</span></li>
                            </ul>
                            <a class="btn btn-default update" href="">Update</a>
                            <a class="btn btn-default check_out" href="">Check Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--/#do_action-->

    @else
        <div class="container">
            <div class="row">
                <div class="col-md-12">{{ 'Cart is empty' }}</div>
            </div>
        </div>
    @endif
@endsection


@section('js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        $(document).ready(function () {
            // duyet qua san pham trong gio hang
            <?php for($i=1;$i<20;$i++){?>
            $('#upCart<?php echo $i;?>').on('change keyup', function () {
                var newqty = $('#upCart<?php echo $i;?>').val();
                var rowId = $('#rowId<?php echo $i;?>').val();
                var proId = $('#proId<?php echo $i;?>').val();

                if(newqty <=0){ alert('enter only valid quantity') }
                else {
                    // start of ajax
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        // type: 'get',
                        method: 'get',
                        dataType: 'html',
                        url : '<?php echo url('/cart/update');?>/'+proId,
                        data:{
                            _token: "{{ csrf_token() }}}",
                            qty : newqty,
                            rowId : rowId,
                            proId : proId
                        },
                        success: function (response) {
                            var obj = JSON.parse(response);
                            $('.cart_total_price').html('$ ' + obj.quantity);
                        }
                    });
                    // End of Aajx
                }
            });
            <?php } ?>
        });
    </script>
@endsection
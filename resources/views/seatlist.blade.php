
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Bus Ticket Reservation Widget Flat Responsive Widget Template :: w3layouts</title>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Bus Ticket Reservation Widget Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="{{ asset('seat/css/jquery.seat-charts.css') }}">
<link href="{{ asset('seat/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<script src="{{ asset('seat/js/jquery-1.11.0.min.js')}}"></script>
<script src="{{ asset('seat/js/jquery.seat-charts.js')}}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
<div class="content">
    <h1>Bus Ticket Booking</h1>
    <div class="main">
        <h2>Book Your Seat Now?</h2>
        <div class="wrapper">
            <div id="seat-map">
                <div class="front-indicator"><h3>Bus Driver</h3></div>
            </div>
            <div class="booking-details">
                    <div id="legend"></div>
                    <h3> Selected Seats (<span id="counter">0</span>):</h3>
                    <ul id="selected-seats" class="scrollbar scrollbar1"></ul>
                    
                    Total: <b><span id="total">0</span>Ks</b>
                    
                    <button id="book" class="checkout-button">Book Now</button>
                    <input type="hidden" name="url" id="url" data-url="{{url('/bookinginfo') }}">
                    <input type="hidden" id="booking" value="{{ Session::get('booking')}}">
            </div>
            <div class="clear"></div>
        </div>
        <script>
                var firstSeatLabel = 1;
                var seatArr = [];
                var booking = $('#booking').val();
                var bookArr = booking.split(",");

            
                $(document).ready(function() {
                    var $cart = $('#selected-seats'),
                        $counter = $('#counter'),
                        $total = $('#total'),
                        sc = $('#seat-map').seatCharts({
                        map: [
                            'ff_ff',
                            'ff_ff',
                            'ee_ee',
                            'ee_ee',
                            'ee_ee',
                            'ee_ee',
                            'ee_ee',
                            'ee_ee',
                            'ee_ee',
                            'ee_ee',
                            'eeeee',
                        ],
                        seats: {
                            f: {
                                price   : parseInt('{{ $bus->seat["price"]}}'),
                                classes : 'first-class', //your custom CSS class
                                category: 'First Class'
                            },
                            e: {
                                price   : parseInt('{{ $bus->seat["price"]}}'),
                                classes : 'economy-class', //your custom CSS class
                                category: 'Economy Class'
                            }                   
                        
                        },
                        naming : {
                            top : false,
                            getLabel : function (character, row, column) {
                                return firstSeatLabel++;
                            },
                        },
                        legend : {
                            node : $('#legend'),
                            items : [
                                [ 'f', 'available',   'First Class' ],
                                [ 'e', 'available',   'Economy Class'],
                                [ 'f', 'unavailable', 'Already Booked']
                            ]                   
                        },
                        click: function () {
                            if (this.status() == 'available') {
                                //let's create a new <li> which we'll add to the cart items
                                $('<li>'+this.data().category+' : Seat no '+this.settings.label+': <b>'+this.data().price+' Ks</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                    .attr('id', 'cart-item-'+this.settings.id)
                                    .data('seatId', this.settings.id)
                                    .appendTo($cart);
                                    // seatArr.push(this.settings.label, this.settings.id);
                                    seatArr.push(this.settings.label +','+ this.settings.id);
                                /*
                                 * Lets update the counter and total
                                 *
                                 * .find function will not find the current seat, because it will change its stauts only after return
                                 * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
                                 */
                                $counter.text(sc.find('selected').length+1);
                                $total.text(recalculateTotal(sc)+this.data().price);
                                
                                return 'selected';
                            } else if (this.status() == 'selected') {
                                //update the counter
                                $counter.text(sc.find('selected').length-1);
                                //and total
                                $total.text(recalculateTotal(sc)-this.data().price);
                            
                                //remove the item from our cart
                                $('#cart-item-'+this.settings.id).remove();
                            
                                //seat has been vacated
                                return 'available';
                            } else if (this.status() == 'unavailable') {
                                //seat has been already booked
                                return 'unavailable';
                            } else {
                                return this.style();
                            }
                        }
                    });

                    //this will handle "[cancel]" link clicks
                    $('#selected-seats').on('click', '.cancel-cart-item', function () {
                        //let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
                        sc.get($(this).parents('li:first').data('seatId')).click();
                    });

                    //let's pretend some seats have already been booked
                    sc.get(bookArr).status('unavailable');

                    $(document).on('click', '#book', function () {
                        var url=$('#url').attr('data-url');
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({ 
                            type: 'POST', 
                            url: url, 
                            data: {_token: CSRF_TOKEN, seatArr: seatArr},
                            dataType: 'json',
                            success: function (response) { 
                                if(response.status === true) {
                                    window.location.href = '{{ url("/customerinfo") }}'
                                }
                            }
                        });
                    });
            
            });

            function recalculateTotal(sc) {
                var total = 0;
            
                //basically find every selected seat and sum its price
                sc.find('selected').each(function () {
                    var inttotal = parseInt(this.data().price);
                    total += this.data().price;
                });
                
                return total;
            }
        </script>
    </div>
    <p class="copy_rights">&copy; 2016 Bus Ticket Reservation Widget. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank"> W3layouts</a></p>
</div>
<script src="{{ asset('seat/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('seat/js/scripts.js') }}"></script>
</body>
</html>

@extends('layouts.app')

@section('content')
<body>
    <h1>Bus Ticket Booking</h1>
    <div class="main-agileinfo">
        <div class="sap_tabs">          
            <div id="horizontalTab">
                <ul class="resp-tabs-list">
                    <li class="resp-tab-item"><span>
                        <?php
                            echo implode(" - ", $loc);
                        ?>
                    </span></li>         
                </ul>   
                <div class="clearfix"> </div>   
                <div class="resp-tabs-container">
                    <div class="tab-1 resp-tab-content roundtrip">
                        @unless (count($buses))
                            <div class="form">
                                <h4 class="checkbox">
                                <center>
                                    Tickets are not available now! Please search other tour.Thanks</h4>
                                </center>
                                <br/><br/>
                                <center>
                                    <a href="{{ url('/') }}" class="view_seat">Back</a>
                                </center>
                            </div>
                        @endunless
                        <div class="form">
                            @foreach($buses as $bus)
                                <div class="from">
                                    <h3>{{ $bus->depature_date}} {{ $bus->depature_time}} ({{$bus->period}}) </h3>
                                </div>
                                <div class="to">
                                    <h3>{{ $bus->price }} Ks / 1 seats</h3>
                                </div>

                                <div class="from">
                                    <h3>{{ $bus->model }}</h3>
                                </div>
                                <div class="to">
                                    <h3>{{ $bus->type }}</h3>
                                </div>

                                <div class="from">
                                    @if(!empty($loc))
                                        <h3>{{$loc['0']}} - {{$loc['1']}}</h3>
                                    @endif
                                </div>
                                <div class="to">
                                    @if(!empty($loc))
                                        <h3>{{ $loc['1']}} - Arrives: {{ $bus->arrival_time}}, {{ $bus->arrival_date }}</h3>
                                    @endif
                                </div>
                                <div class="clear"></div>
                                <center>
                                    <a href="{{ url('viewseat/'.$bus->id) }}" class="view_seat">View Seat</a>
                                    <!-- <input type="submit" id="view_seat" value="View Seat"> -->
                                </center>
                                <br/>
                                <hr>

                            @endforeach
                        </div>                     
                    </div>
                </div>                      
            </div>
        </div>
    </div>
@endsection


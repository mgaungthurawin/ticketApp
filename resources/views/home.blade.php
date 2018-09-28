@extends('layouts.app')

@section('content')
<body>
    <h1>Bus Ticket Booking</h1>
    <div class="main-agileinfo">
        <div class="sap_tabs">          
            <div id="horizontalTab">
                <ul class="resp-tabs-list">
                    <li class="resp-tab-item"><span>Search Trip</span></li>        
                </ul>   
                <div class="clearfix"> </div>   
                <div class="resp-tabs-container">
                    <div class="tab-1 resp-tab-content roundtrip">
                        {!! Form::open(['url' => 'searchbus']) !!}
                            <div class="from">
                                <h3>From</h3>
                                <select id="from" name="from" class="custom-select">
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="to">
                                <h3>To</h3>
                                <select id="to" name="to" class="custom-select">
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="clear"></div>
                            <div class="from">
                                <div class="depart">
                                    <h3>Depart</h3>
                                    <input  id="datepicker" name="depature" type="text" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
                                </div>
                            </div>
                            <div class="clear"></div>
                            <input type="submit" value="Search Bus">
                        {!! Form::close() !!}                    
                    </div>      
                    <div class="tab-1 resp-tab-content oneway">
                            <form action="#" method="post">
                                {!! Form::open(['url' => 'searchbus']) !!}
                                    <h3>From</h3>
                                    <select id="onewayfrom" name="onewayfrom" class="custom-select">
                                        @foreach ($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="to">
                                    <h3>To</h3>
                                    <select id="onewayto" name="onewayto" class="custom-select">
                                        @foreach ($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="clear"></div>
                                <div class="date">
                                    <div class="depart">
                                        <h3>Depart</h3>
                                        <input  id="datepicker" name="Text" type="text" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
                                        <span class="checkbox1">
                                            <label class="checkbox"><input type="checkbox" name="" checked=""><i> </i>Flexible with date</label>
                                        </span>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="class">
                                    <h3>Class</h3>
                                    <select id="w3_country1" onchange="change_country(this.value)" class="custom-select">
                                        <option value="null">Economy</option>  
                                        <option value="null">Premium Economy</option>   
                                        <option value="null">Business</option>   
                                        <option value="null">First class</option>                           
                                    </select>
                                </div>
                                <div class="clear"></div>
                                <div class="numofppl">
                                    <div class="adults">
                                        <h3>Ticket</h3>
                                        <div class="quantity"> 
                                            <div class="quantity-select">                           
                                                <div class="entry value-minus">&nbsp;</div>
                                                <div class="entry value"><span>1</span></div>
                                                <div class="entry value-plus active">&nbsp;</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                                <!-- <input type="submit" value="Search Bus"> -->
                            {!! Form::close() !!}                 
                        </div> 
                    </div>
        
                </div>                      
            </div>
        </div>
    </div>
@endsection


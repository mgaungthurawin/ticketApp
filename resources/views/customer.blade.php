@extends('layouts.app')

@section('content')
<body>
    <h1>Bus Ticket Booking</h1>
    <div class="main-agileinfo">
        <div class="sap_tabs">          
            <div id="horizontalTab">
                <ul class="resp-tabs-list">
                    <li class="resp-tab-item"><span>Customer Infomation</span></li>          
                </ul>   
                <div class="clearfix"> </div>   
                <div class="resp-tabs-container">
                    <div class="tab-1 resp-tab-content roundtrip">
                        {!! Form::open(['url' => 'customerinfo']) !!}
                            <div class="from">
                                <h3>Name</h3>
                                <input type="text" name="name">
                            </div>
                            <div class="to">
                                <h3>Email</h3>
                                <input type="text" name="email">
                            </div>
                            <div class="from">
                                <h3>Phone</h3>
                                <input type="text" name="phone">
                            </div>
                            <div class="to">
                                <h3>Address</h3>
                                <input type="text" name="address">
                            </div>
                            
                            <input type="submit" class="pull-right" value="Submit">
                        {!! Form::close() !!}                    
                    </div>
                </div>                      
            </div>
        </div>
    </div>
@endsection


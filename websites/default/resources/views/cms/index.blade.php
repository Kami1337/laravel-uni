@extends ('layouts.master') @section ('content')

<div class="container products">
        <h3>CMS</h3>
        <p class="small">Click on button for related functionality</p>
    
    <button class="btn btn-info btn-block full" id="hours"><i class="far fa-clock"></i> Work hours</button>
        <hr>
    <div id="hoursdiv" class="cms">
        @include('cms.hours')
    </div>
    
    <button class="btn btn-info btn-block full" id="car">
        <i class="fas fa-car"></i> Cars</button>
    <hr>
    <div id="cardiv" class="cms">
        @include('cms.cars') @include('cms.archivedCars')
    </div>
    <button class="btn btn-info btn-block full" id="manufacturer">
        <i class="fas fa-industry"></i> Manufacturers & Engine types</button>
    <hr>
    <div id="manufacturerdiv" class="cms">
        @include('cms.manufacturers') @include('cms.enginetypes')
    </div>
    <button class="btn btn-info btn-block full" id="post"><i class="fas fa-newspaper"></i> News</button>
    <hr>
    <div id="postdiv" class="cms">
        @include('cms.news')
    </div>
    <button class="btn btn-info btn-block full" id="order"><i class="fas fa-cart-plus"></i> Orders</button>
    <hr>
    <div id="orderdiv" class="cms">
        @include('cms.incompleteOrders') @include('cms.completedOrders')
    </div>
    <button class="btn btn-info btn-block full" id="inquiry">
        <i class="far fa-question-circle"></i> Inquiries</button>
    <hr>
    <div id="inquirydiv" class="cms">
        @include('cms.incompleteInq') @include('cms.completedInq')
    </div>
    <button class="btn btn-info btn-block full" id="users">
        <i class="fas fa-users"></i> Users</button>
    <hr>
    <div id="usersdiv" class="cms">
        @include('cms.users')
    </div>
    <button class="btn btn-info btn-block full" id="careers">
        <i class="fas fa-briefcase"></i> Careers</button>
    <hr>
    <div id="careersdiv" class="cms">
        @include('cms.careers')
    </div>
</div>
@stop
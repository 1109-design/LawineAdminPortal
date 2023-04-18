@extends('layouts.admin')
@section('content')
    @include('layouts.preloader')


<div id="main-wrapper">


        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">Total Clients</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{$totalClientsCount}}</h2>
                                <p class="text-white mb-0">Jan - March 2023</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <h3 class="card-title text-white">Total Crashes</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">5</h2>
                                <p class="text-white mb-0">Jan - March 2023</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Active Clients</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{$activeClientsCount}}</h2>
                                <p class="text-white mb-0">Jan - March 2023</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-4">
                        <div class="card-body">
                            <h3 class="card-title text-white">Resolved Crashes</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">3</h2>
                                <p class="text-white mb-0">Jan - March 2023</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                        </div>
                    </div>
                </div>
            </div>









            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="active-member">
                                <div class="table-responsive">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addClientModal">
                                        Add New Client
                                    </button>
                                    <table class="table table-xs mb-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Customers</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Country</th>
                                            <th>Payment Method</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($clients as $client)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td><img src="./images/avatar/1.jpg" class=" rounded-circle mr-3" alt="">{{$client->name}}</td>
                                            <td>{{$client->phone}} </td>
                                            <td>
                                                <span>{{$client->address}}</span>
                                            </td>
{{--                                            <td>--}}
{{--                                                <div>--}}
{{--                                                    <div class="progress" style="height: 6px">--}}
{{--                                                        <div class="progress-bar bg-success" style="width: 50%"></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
                                            <td> {{$client->country}}</td>
                                            <td>
                                               {{$client->status}}
                                            </td>
                                            <td>
                                                <button class="button btn btn-primary">Edit</button>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td></td>
                                                <td>No clients added</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="addClientModal" tabindex="-1" role="dialog" aria-labelledby="addClientModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addClientModalLabel">Add New Client</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{route('store-client')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" name="phone" id="phone" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" id="address" required>
                                </div>
                                <div class="form-group">
                                    <label for="vehicles">Vehicles</label>
                                    <select  class="form-control" name="vehicles[]" id="vehicles">
                                        <option value="car">Car</option>
                                        <option value="van">Van</option>
                                        <option value="truck">Truck</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="vehicles">Country</label>
                                    <select  class="form-control" name="country" id="vehicles">
                                        <option>Botswana</option>
                                        <option>Zimbabwe</option>
                                        <option >Zambia</option>
                                        <option >South Africa</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Save Client</button>
                            </form>



                        </div>
                </div>
            </div>
        <!-- #/ container -->

    <!--**********************************
        Content body end
    ***********************************-->


    <!--**********************************
        Footer start
    ***********************************-->
    <
    <!--**********************************
        Footer end
    ***********************************-->
</div>
@endsection


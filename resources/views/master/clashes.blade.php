@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Crashes and Emergency Location Info</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>

                                    <th>Date Logged</th>
                                    <th>Time</th>
                                    <th>Longitude</th>
                                    <th>Latitude</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($clashes as $clash)
                                <tr>
                                    <td>{{\Carbon\Carbon::parse($clash->created_at)->format('Y-m-d')}}</td>
                                    <td>{{\Carbon\Carbon::parse($clash->created_at)->format('H:i')}}</td>
                                    <td>{{$clash->longitude}}</td>
                                    <td>{{$clash->latitude}}</td>

                                </tr>
                                @empty
                                    <tr>
                                        <td></td>
                                        <td>No Clashes Recorded yet </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforelse

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

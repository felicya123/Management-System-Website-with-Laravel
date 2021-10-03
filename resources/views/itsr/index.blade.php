<!--<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<title>Document</title>
</head>
<body>
-->
@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-12">
            <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Project Name</th>
            <th scope="col">Development Choice</th>
            <th scope="col">Total Mandays</th>
            <th scope="col">Create At</th>
            <th scope="col">Create By</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($itsr as $row)
        <tbody>
            
            <tr>
            
            <td>{{$row->itsr_no}}</td>
            <td>{{$row->project_name}}</td>
            <td>{{$row->development_choice}}</td>
            <td>{{$row->total_mandays}}</td>
            <td>{{$row->created_at}}</td>
            <td>{{$row->create_by}}</td>
            <td>
            <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal">View
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">History</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        <table class="table">
                        
                            <thead>
                            <tr>
                            <td scope="col">ITSR No</td>
                            <td scope="col">Requestor Name</td>
                            <td scope="col">Status ITSR</td>
                            <td scope="col">Comment</td>                                
                            <td scope="col">Created At</td>                                
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no)
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->requestor_id}}</td>
                                        <td>{{$row2->status}}</td>
                                        <td>{{$row2->comment}}</td>
                                        <td>{{$row2->created_at}}</td>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
            
            </td>
            </tr>
        </tbody>
        @endforeach
        </table>
        <!--
        <div>
            <a href="{{action('req_gatheringController@create')}}"><button type="submit">create new itsr</button></a>
        </div>
        -->
    </div>
</div>
</div>
@endsection
<!--
</body>
</html>
-->
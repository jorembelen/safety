@extends('layouts.master')

@section('title', 'Users')
@section('content') 
 
<div class="row layout-top-spacing" id="cancel-row">
                              
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                <div class="widget-header">
                                    <a data-toggle="modal" data-target="#create" type="button"class="btn btn-primary mb-2 float-right">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                        Create
                                    </a>
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Users List</h4>
                                        </div>
                                    </div>
                                </div>
                        <div class="table-responsive mb-4 mt-4">
                                        @include('includes.errors')
                            <table id="zero-config" class="table table-hover" style="width:100%">
                                <thead>
                                <tr>
                                        <th>SN</th>
                                        <th>Profile Photo</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Location</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        @if (auth()->user()->id != $user->id)
                                            
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                            <img src="{{url('../')}}/images/uploads/profiles-thumb/{{$user->profile_pic  ? $user->profile_pic : 'boy.png'}}" alt="avatar" class="rounded" width="50px">
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if($user->role == 'user' || $user->role == 'site_member')
                                                <span class="badge badge-pills badge-warning">{{ Str::upper($user->role) }}</span></td>
                                                @else
                                                <span class="badge badge-pills badge-info">{{ Str::upper($user->role) }}</span></td>
                                                @endif
                                         
                                            <td>{{ $user->locations->name }} - {{ $user->locations->loc_name }}</td>
                                       
                                            <td class="text-center">
                                            <a class="bs-tooltip" title="Assign Role & Location" role="button" data-toggle="modal" data-target="#location{{$user->id}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                            </a>
                                            <a class="bs-tooltip" title="Update" role="button" data-toggle="modal" data-target="#edit{{$user->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><polyline points="3 6 5 6 21 6"></polyline><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                            </a>
                                            <a class="bs-tooltip" title="Delete" role="button" data-toggle="modal" data-target="#delete{{$user->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 table-cancel"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                            </a>
                                            </td>
                                        </tr>
                                        @endif
                                    
                                    @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                @foreach ($users as $user)
                    @include('admin.edit_delete')
                @endforeach

                    @include('admin.create')

@endsection
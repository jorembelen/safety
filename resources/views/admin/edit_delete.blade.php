
                                     <!-- Modal -->
                                     <div class="modal fade register-modal" id="edit{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">

                                          <div class="modal-header" id="registerModalLabel">
                                            <h4 class="modal-title">Update {{ $user->name }}</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                          </div>
                                          <div class="modal-body">
                                            <form class="mt-0" method="POST" action="{{ route('users.update', $user->id) }}" id="user-Update">
                                             @csrf
                                             <input type="hidden" name="_method" value="PUT">
                                                    <div class="form-group">
                                                    <input type="text" class="form-control mb-2" name="name"  value="{{ $user->name }}" placeholder="Name" > 
                                                    @if($errors->has('name'))
                                                            <span class="help-block text-danger">{{ $errors->first('name') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                    <input type="text" class="form-control mb-2" name="username" value="{{ $user->username }}" placeholder="Username" >
                                                    @if($errors->has('username'))
                                                            <span class="help-block text-danger">{{ $errors->first('username') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                    <input type="email" class="form-control mb-2" name="email" value="{{ $user->email }}" placeholder="Email">
                                                    @if($errors->has('email'))
                                                            <span class="help-block text-danger">{{ $errors->first('email') }}</span>
                                                        @endif
                                                    </div>
                                                   @if ($user->location_id != '')
                                                   <div class="form-group">
                                                    <select name="location_id" class="form-control selectpicker" data-live-search="true">
                                                        <option value="{{ $user->location_id }}">{{ $user->locations->name }} - {{ $user->locations->loc_name }}</option>
                                                        <option value="">None</option>
                                                        @foreach( $locations as $location)
                                                        <option value="{{$location->id}}" @if (old('location') == $location->id ) selected="selected" @endif>{{$location->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                   @endif
                                                    <div class="form-group">
                                                    <input type="password" class="form-control mb-2" name="password" placeholder="Password">
                                                    @if($errors->has('password'))
                                                            <span class="help-block text-danger">{{ $errors->first('password') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                    <input type="password" class="form-control mb-2" name="password_confirmation" placeholder="Confirm Password">
                                                    @if($errors->has('password_confirmation'))
                                                            <span class="help-block text-danger">{{ $errors->first('password_confirmation') }}</span>
                                                        @endif
                                                    </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                            <button class="btn btn-danger" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                                                        </div>
                                            </form>


                                          </div>
                                          <div class="modal-footer justify-content-center">
                                            
                                          </div>
                                        </div>
                                      </div>
                                    </div>


                                     <!-- Modal For Assign Location-->
                                     <div class="modal fade register-modal" id="location{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">

                                          <div class="modal-header" id="registerModalLabel">
                                            <h4 class="modal-title">Update {{ $user->name }}</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                          </div>
                                          <div class="modal-body">
                                            <form class="mt-0" method="POST" action="{{ route('user.location', $user->id) }}" id="user-Update">
                                             @csrf
                                             <input type="hidden" name="_method" value="PUT">
                                                    <div class="form-group">
                                                    <input type="text" class="form-control mb-2" name="name"  value="{{ $user->name }}" placeholder="Name" readonly> 
                                                    @if($errors->has('name'))
                                                            <span class="help-block text-danger">{{ $errors->first('name') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                    <input type="text" class="form-control mb-2" name="username" value="{{ $user->username }}" placeholder="Username" readonly>
                                                    @if($errors->has('username'))
                                                            <span class="help-block text-danger">{{ $errors->first('username') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                    <input type="email" class="form-control mb-2" name="email" value="{{ $user->email }}" placeholder="Email" readonly>
                                                    @if($errors->has('email'))
                                                            <span class="help-block text-danger">{{ $errors->first('email') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <select name="role" class="form-control selectpicker" data-live-search="true">
                                                            <option value="{!! $user->role !!}" selected>{{ Str::ucfirst($user->role) }}</option>
                                                             <option value="admin">Admin</option>
                                                             <option value="user">User</option>
                                                             <option value="site_member">Site Member</option>
                                                             <option value="gm">GM</option>
                                                             <option value="hsem">HSEM</option>
                                                             <option value="member">Member</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <select name="location_id" class="form-control selectpicker" data-live-search="true">
                                                            <option value="{{ $user->location_id }}">{{ $user->locations->name }} - {{ $user->locations->loc_name }}</option>
                                                            <option value="">None</option>
                                                            @foreach( $locations as $location)
                                                            <option value="{{$location->id}}" @if (old('location') == $location->id ) selected="selected" @endif>{{$location->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                            <button class="btn btn-danger" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                                                        </div>
                                            </form>


                                          </div>
                                          <div class="modal-footer justify-content-center">
                                            
                                          </div>
                                        </div>
                                      </div>
                                    </div>


                                               <!-- Delete Modal -->
                                               <div class="modal fade" id="delete{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteConformationLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content" id="deleteConformationLabel">
                                                            <div class="modal-header">
                                                                <div class="icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 s-task-delete"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                </div>
                                                                <h5 class="modal-title" id="exampleModalLabels">Delete this record?</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <form class="form-horizontal" method="POST" action="{{ route('users.destroy', $user->id) }}">
                                                        @csrf
                                                            {{ method_field('DELETE') }}
                                                                <p class="">If you delete the data it will be gone forever. Are you sure you want to proceed?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </div>
                                                            </form>
                                                    </div>
                                                    </div>
                                                </div>

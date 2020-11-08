
                         <!-- Modal -->
                         <div class="modal fade register-modal" id="edit{{ auth()->user()->id }}" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">

                                          <div class="modal-header" id="registerModalLabel">
                                            <h4 class="modal-title">Update Profile</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                          </div>
                                          <div class="modal-body">
                                            <form class="mt-0" method="POST" action="{{ route('profile.update', auth()->user()->id) }}" enctype="multipart/form-data">
                                             @csrf
                                             <input type="hidden" name="_method" value="PUT">
                                                    <div class="form-group">
                                                    <input type="text" class="form-control mb-2" name="name"  value="{{ auth()->user()->name }}" placeholder="Name" required> 
                                                    @if($errors->has('name'))
                                                            <span class="help-block text-danger">{{ $errors->first('name') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                    <input type="text" class="form-control mb-2" name="username" value="{{ auth()->user()->username }}" placeholder="Username" required>
                                                    @if($errors->has('username'))
                                                            <span class="help-block text-danger">{{ $errors->first('username') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                    <input type="email" class="form-control mb-4" name="email" value="{{ auth()->user()->email }}" placeholder="Email">
                                                    </div>
                                                   
                                                    <div class="form-group">
                                                    <input type="password" class="form-control mb-4" name="password" placeholder="Password">
                                                    @if($errors->has('password'))
                                                            <span class="help-block text-danger">{{ $errors->first('password') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                    <input type="password" class="form-control mb-4" name="password_confirmation" placeholder="Confirm Password">
                                                    @if($errors->has('safety'))
                                                            <span class="help-block text-danger">{{ $errors->first('safety') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                    <input type="file" class="form-control-file" name="profile_pic">
                                                   
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
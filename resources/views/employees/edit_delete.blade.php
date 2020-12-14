


                                     <!-- Modal -->
                                     <div class="modal fade register-modal" id="edit{{$employee->id}}" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">

                                          <div class="modal-header" id="registerModalLabel">
                                            <h4 class="modal-title">Update {{$employee->name}}</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                          </div>
                                          <div class="modal-body">
                                            <form class="mt-0" method="POST" action="{{ route('employees.update', $employee->id) }}" id="emp-update">
                                            @csrf
                                            <input type="hidden" name="_method" value="PUT">
                                                    <div class="form-group">
                                                    <input type="text" class="form-control mb-2" value="{{$employee->badge}}" name="badge"  placeholder="Badge">
                                                    @if($errors->has('badge'))
                                                      <div class="invalid-feedback">{{ $errors->first('badge') }}</div>
                                                    @endif
                                                    </div>
                                                    <div class="form-group">
                                                    <input type="text" class="form-control mb-2" value="{{$employee->name}}" name="name" placeholder="Name">
                                                    @if($errors->has('name'))
                                                      <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                                    @endif
                                                    </div>
                                                    <div class="form-group">
                                                    <input type="text" class="form-control mb-4" value="{{$employee->designation}}" name="designation" placeholder="Designation">
                                                    @if($errors->has('designation'))
                                                      <div class="invalid-feedback">{{ $errors->first('designation') }}</div>
                                                    @endif
                                                    </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="submit" class="btn btn-primary">Save</button>
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
                                                  <div class="modal fade" id="delete{{$employee->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteConformationLabel" aria-hidden="true">
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
                                                            <form class="form-horizontal" method="POST" action="{{ route('employees.destroy', $employee->id) }}">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="PUT">
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



                                     <!-- Modal -->
                                     <div class="modal fade register-modal" id="edit{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">

                                          <div class="modal-header" id="registerModalLabel">
                                            <h4 class="modal-title">Update</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                          </div>
                                          <div class="modal-body">
                                            <form class="mt-0" method="POST" action="{{ route('recommendations.update', $item->id) }}">
                                            @csrf
                                            <input type="hidden" name="_method" value="PUT">
                                                    <div class="form-group">
                                                      <textarea name="root_name" class="form-control" rows="3">{{$item->root_name}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                    <select name="type" class="form-control selectpicker" required>
                                                            <option value="{{ $item->type }}">{{ $item->type }}</option>
                                                            <option value="People" @if (old('type') == 'People') selected="selected" @endif>People</option>
                                                            <option value="Process" @if (old('type') == 'Process') selected="selected" @endif>Process</option>
                                                            <option value="Equipment" @if (old('type') == 'Equipment') selected="selected" @endif>Equipment</option>
                                                            <option value="Workplace" @if (old('type') == 'Workplace') selected="selected" @endif>Workplace</option>
                                                    </select>
                                                    </div>
                                                    <div class="form-group">
                                                      <textarea name="rec_name" class="form-control" rows="3">{{$item->rec_name}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                    <select name="rec_type" class="form-control selectpicker" required>
                                                            <option value="{{ $item->rec_type }}">{{ $item->rec_type }}</option>
                                                            <option value="Elimination" @if (old('rec_type') == 'Elimination') selected="selected" @endif>Elimination</option>
                                                            <option value="Substitution" @if (old('rec_type') == 'Substitution') selected="selected" @endif>Substitution</option>
                                                            <option value="Engineering Control" @if (old('rec_type') == 'Engineering Control') selected="selected" @endif>Engineering Control</option>
                                                            <option value="Administrative Control" @if (old('rec_type') == 'Administrative Control') selected="selected" @endif>Administrative Control</option>
                                                            <option value="PPE" @if (old('rec_type') == 'PPE') selected="selected" @endif>PPE</option>
                                                    </select>
                                                    </div>
                                                    @if(auth()->user()->role == 'admin' || auth()->user()->role == 'super_admin')
                                                    <div class="form-group">
                                                    <select name="status" class="form-control selectpicker" required>
                                                            <option value="{{ $item->status }}">
                                                                @if($item->status == 0)
                                                                <span class="badge badge-danger">On Going</span>
                                                                @else
                                                                <span class="badge badge-info">Done</span>
                                                                @endif
                                                            </option>
                                                            <option value="1" @if (old('status') == '1') selected="selected" @endif>Done</option>
                                                            <option value="0" @if (old('status') == '0') selected="selected" @endif>On-Going</option>
                                                    </select>
                                                    </div>@endif
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
                                                  <div class="modal fade" id="deleteModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteConformationLabel" aria-hidden="true">
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
                                                            <form class="form-horizontal" method="POST" action="{{ route('recommendations.destroy', $item->id) }}">
                                                        @csrf
                                                            {{ method_field('DELETE') }}
                                                                <p class="">Are you sure you want to proceed?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </div>
                                                            </form>
                                                    </div>
                                                    </div>
                                                </div>
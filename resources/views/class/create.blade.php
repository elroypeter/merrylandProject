@extends('layouts.layout')
@section('content')
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <h4 class="card-title">Create New Class</h4>
          </div>
          <div class="col-md-6">
            <a class="text-warning pull-right" href="javascript:void(0)" data-toggle="modal" data-target="#levelModal"><i class="mdi mdi-plus"></i>Add Level</a>
          </div>
          <!--  -->
        </div>
        <form class="form-sample" action="{{ route('sclasses.store')}}" method="post">
          {{ csrf_field() }}
          <p class="card-description text-success">
            Class details
          </p>

          <div class="row">
            <div class="col-md-8">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Class<span class="text-danger">*</span></label>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Senior something" name="classname" required>
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Class Number<span class="text-danger">*</span></label>
                <div class="col-sm-9">
                  <input type="number" name="classnumber" class="form-control" />
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Level<span class="text-danger">*</span></label>
                <div class="col-sm-9">
                  <select class="form-control" name="level" required>
                    @foreach($mylevel as $level)
                      <option value="{{ $level->id }}">{{$level->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <!-- <div class="alert-warning col-md-8" role="alert">
              Note: make sure you have created a stream!!
            </div> -->

          </div>
        </br>
          <div class="row">
            <div class="col-md-8">
              <div class="form-group row">
                <div class="col-sm-9 offset-3">
                  <button type="submit" class="btn btn-md btn-outline-success btn-sm pull-right" name=" "> Confirm </button>
                </div>
              </div>
            </div>
            <!-- <div class="col-md-4">
              <a class="text-warning pull-right" href="{{ route('classes.index')}}"><i class="mdi mdi-plus"></i>View classes</a>
            </div> -->
          </div>

        </form>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <h4 class="card-title">List of Streams</h4>
          </div>
          <div class="col-md-6">
            <a class="text-warning pull-right" href="javascript:void(0)" data-toggle="modal" data-target="#streamModal"><i class="mdi mdi-plus"></i>Add Stream</a>
          </div>
        </hr>
        <div class="container">
        	<div class="row">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Name</th>
                      <th>Action1</th>
                      <th>Action2</th>
                    </tr>
                  </thead>
                  <tbody id="myTable">
                    @foreach($view_stream as $index=>$mystream)
                    <tr>
                      <td>{{ $index+1 }}</td>
                      <td>{{ $mystream->name}}</td>
                      <td>
                        <!-- Default dropright button -->
                        <div class="dropbottom">
                          <button type="button" class="btn btn-outline-success btn-sm dropdown-toggle" style="font-size:10px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            edit
                          </button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <form method="post" action="{{ route('streams.update',$mystream->id)}}" >
                              @method('PUT')
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <div class="col-12">
                                <input type="text" class="form-control" name="update_name" value="{{ $mystream->name }}">
                              </div>
                            </br>
                              <div class="col-12 offset-3">
                                <button type="submit" class="btn btn-outline-secondary btn-sm" style="font-size:10px">update</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </td>
                      <td>
                        <a href="javascript:void(0)" class="btn btn-outline-danger btn-sm" style="font-size:10px;" onclick="$(this).parent().find('form').submit()">delete</a>
                        <form action="{{ route('streams.destroy',$mystream->id)}}" method="post">
                          @method('DELETE')
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="col-md-12 text-center">
              <ul class="pagination" id="myPager"></ul>
              </div>
        	</div>
        </div>

      </div>

    </div>

  </div>
</div>
<div class=" col-lg-12 col-lg-offset-3 ">
    <div class="card">
      <div class="card-body">
        <div class="col-md-6">
          <h4 class="card-title">List of Classes</h4>
        </div>
        <div class="container">
        <div class="row">
        <div class="table-responsive">
          <table class="table table-hover">
             <thead>
                 <tr>
                     <th>No.</th>
                     <th>Name</th>
                     <th>Details</th>
                     <th>Action</th>
                     <th>No. of streams</th>
                 </tr>
             </thead>
             <tbody>
               @foreach($arr as $index=>$class)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $class->name }}</td>
                    <td>
                      <!-- view details  -->
                      <div class="dropbottom">
                        <button type="button" class="btn btn-outline-success btn-sm dropdown-toggle" style="font-size:10px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          view
                        </button>
                        <?php $n = 0; ?>
                        <div class="dropdown-menu dropdown-menu-right">
                          @foreach($class->sclassstream as $comb)
                          <?php $n = $n+1;?>
                          <a class="dropdown-item" href="#">{{ $comb->stream->name }}</a>
                          @endforeach
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                      </div>
                      <!--  -->
                    </td>
                    <td>
                      <!-- Add stream to class  -->
                      <div class="dropbottom">
                        <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle" style="font-size:10px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          +Add
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <form method="post" action="{{ route('classes.store')}}" >
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="class_id" value="{{ $class->id }}">
                            <div class="col-12">
                                <select class="form-control" name="stream_id" required>
                                  @foreach($view_stream as $strim)
                                    <option value="{{ $strim->id }}">{{$strim->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                          </br>
                            <div class="col-12 offset-3">
                              <button type="submit" class="btn btn-outline-secondary btn-sm" style="font-size:10px">Add</button>
                            </div>
                          </form>
                        </div>
                      </div>
                      <!--  -->
                    </td>
                    <td><?php
                    echo $n;
                     ?></td>
                </tr>
                @endforeach
             </tbody>
         </table>
       </div>
     </div>
     </div>
      </div>
    </div>
  </div>
<!-- Modal for creating new stream -->
<div class="modal fade" id="streamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Stream</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-sample" action="{{route('streams.store')}}" method="post">
          {{ csrf_field() }}
          <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Stream<span class="text-danger">* </span></label>
                  <div class="col-sm-9">
                    <input class="form-control" name="stream" required>
                  </div>
                </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="form-group row">
                <div class="col-sm-9 offset-3">
                  <input type="submit" class="btn btn-primary pull-right" value="Submit">
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<!-- Modal for creating new level -->
<div class="modal fade" id="levelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Level</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-sample" action="{{ route('studentgroup.store')}}" method="post">
          {{ csrf_field() }}
          <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Level<span class="text-danger">* </span></label>
                  <div class="col-sm-9">
                    <input class="form-control" name="level" required>
                  </div>
                </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="form-group row">
                <div class="col-sm-9 offset-3">
                  <input type="submit" class="btn btn-primary pull-right" value="Submit">
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
</div>

@endSection

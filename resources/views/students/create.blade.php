@extends('layouts.layout')
@section('content')
<div class="row">
<div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create A Student</h4>
        {{ var_dump($errors) }}
        <form class="form-sample" method="post" action="{{ route('students.store') }}" enctype="multipart/form-data">
          @csrf
          <p class="card-description">
            Personal info
          </p>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="firstName"/>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Middle Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="middleName" />
                </div>
              </div>
            </div>
            <div class="col-md-4">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Last Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="lastName"/>
                  </div>
                </div>
              </div>
          </div>
          <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">RegNo:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="regiNo"/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Level</label>
                                <div class="col-sm-4">
                                  <div class="form-radio">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="level" value="0" id="shift1" checked>
                                      O'Level
                                    </label>
                                  </div>
                                </div>
                                <div class="col-sm-5">
                                  <div class="form-radio">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="level" value="1" id="shift2">
                                     A'Level
                                    </label>
                                  </div>
                                </div>
                              </div>
                </div>
              </div>
              <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">class</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="sclass_stream_id" id="">
                      <option value="">Select Class</option>
                      @foreach ($classes as $class)
                          <option value="{{ $class->id }}">{{ $class->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
            <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Stream</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="stream" id="">
                            <option value="">Select Stream</option>
                            @foreach ($streams as $stream)
                                <option value="{{ $stream->id }}">{{ $stream->name }}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                  </div>
                  </div>
               
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Gender</label>
                <div class="col-sm-9">
                  <select class="form-control" name="gender">
                        <option value="">Select a gender..</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Date of Birth</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control" name="dob"/>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Religion</label>
                <div class="col-sm-9">
                  <select class="form-control" name="religion">
                      <option value="">Select a religion..</option>
                    <option value="Muslim">Muslim</option>
                    <option value="Protestant">Protestant</option>
                    <option value="Catholic">Catholic</option>
                    <option value="Saventh Day">Saventh Day</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Shift</label>
                <div class="col-sm-4">
                  <div class="form-radio">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="shift" value="0">
                      Day
                    </label>
                  </div>
                </div>
                <div class="col-sm-5">
                  <div class="form-radio">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="shift" value="1" checked>
                      Boarding
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Photo</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" name="photo"/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Co-Activity</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="extraActivity" placeholder="coactivity"/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nationality</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="nationality" placeholder="nationality"/>
                    </div>
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Mentor</label>
                    <div class="col-sm-9">
                    <select name="mentor_id" class="form-control">
                      <option value="">choose a mentor</option>
                      @foreach($teachers as $teacher)

                      <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>

                      @endforeach
                    </select>
                     </div>
                  </div>
                </div>
              </div>
          <p class="card-description">
            Address
          </p>
          <hr/>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Village</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="village" />
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Sub-County</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="sub_county" />
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">County</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="county"/>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Country</label>
                <div class="col-sm-9">
                  <select class="form-control" name="country">
                    <option>Choose ...</option>
                    <option value="Uganda">Uganda</option>
                    <option value="Italy">Italy</option>
                    <option value="Russia">Russia</option>
                    <option value="Britain">Britain</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <p class="card-description parent_info">
                <span class="mdi mdi-menu-right"></span>Parent Info<b><i class="text-primary">(if a student has parents)</i></b>
              </p>
              <hr/>
              <div class="parent hide">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Father's Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="fatherName" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Fathers Phone No</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="fatherCellNo" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Mother's Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="mothersName" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Mothers Phone No</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="motherCellNo" />
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
                  <p class="card-description guardian_info">
                    <span class="mdi mdi-menu-right"></span> Guadian Info<b><i class="text-primary">(if a student stays with a guardian)</i></b>
                      </p>
                      <hr/>
                      <div class="row guardian hide">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Guardian's Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="localGuardian" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Guardians Phone No</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="localGuardianCell" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <p class="card-description organisation_info">
                        <span class="mdi mdi-menu-right"></span>Organisation's Info<b><i class="text-primary">(if a student is sponsored by an organisation)</i></b>
                           </p>
                           <hr/>
                           <div class="organisation hide">
                           <div class="row">
                             <div class="col-md-6">
                               <div class="form-group row">
                                 <label class="col-sm-3 col-form-label">Organisation's Name</label>
                                 <div class="col-sm-9">
                                   <input type="text" class="form-control" name="org_name" />
                                 </div>
                               </div>
                             </div>
                             <div class="col-md-6">
                               <div class="form-group row">
                                 <label class="col-sm-3 col-form-label">Organisation Contact</label>
                                 <div class="col-sm-9">
                                   <input type="text" class="form-control" name="org_contact" />
                                 </div>
                               </div>
                             </div>
                           </div>
                           <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Contact Person's Name</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="contact_person_name" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Contact Person's Address</label>
                                    <div class="col-sm-9">
                                      <input type="email" class="form-control" name="contact_person_address" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group row">
                                          <label class="col-sm-3 col-form-label">Contact Person's Contact</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="contact_person_contact" />
                                          </div>
                                        </div>
                                      </div>
                              </div>
                           </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary"> Add Student</button>
                </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endSection
@section('footer_scripts')
<script>
var organization=document.querySelector('.organisation');
var parent=document.querySelector('.parent');

var guardian=document.querySelector('.guardian');

// document.querySelector('.guardian').style.display = 'none';
// document.querySelector('.parent').style.display = 'none';


const organisation_info = document.querySelector('.organisation_info');
const parent_info = document.querySelector('.parent_info');
const guardian_info = document.querySelector('.guardian_info');
function toggle_classOrganisation(){
  // console.log('you have clicked me')
  organization.classList.toggle("hide");
  
}
function toggle_classParent(){
  // console.log('you have clicked me')
  parent.classList.toggle("hide");
  
}
function toggle_classGuardian(){
  // console.log('you have clicked me')
  guardian.classList.toggle("hide");
  
}
organisation_info.addEventListener('click', toggle_classOrganisation);
parent_info.addEventListener('click', toggle_classParent);
guardian_info.addEventListener('click', toggle_classGuardian);


// console.log(organisation);
</script>
@endSection
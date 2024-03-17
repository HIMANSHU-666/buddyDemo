<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <title>Update University/College</title>
  <meta name="description" content="">
  <!-- Headerscript -->
  @include('includes.header_script')
  <style>
    .radiobutton {
      border: 1px solid #d9dee3;
      border-radius: 0.375rem;
      padding: 7px;
    }
  </style>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      @include('includes.sidebar')
      <!-- Menu -->
      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        @include('includes.header')
        <!-- Navbar -->
        <!-- Centered Form -->
        <div class="container mt-3">
          <div class="row d-flex justify-content-start">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Update University/College</h3>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('university.update', ['id' => $university->id]) }}" enctype="multipart/form-data">
                  @csrf
                  @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif
                  @if(session('success'))
                  <div class="alert alert-primary">
                    {{ session('success') }}
                  </div>
                  @endif
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="m-3">
                        <label class="form-label" for="university-code">Unique Code <span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" id="university-code" name="uni_code" placeholder="Enter University Code" value="{{ $university->uni_code }}" readonly>
                      </div>
                    </div>



                    <div class="col-sm-3">
                      <div class="form-group mb-3">
                        <label class="form-label" for="university-name">University Logo<span class="text-danger"> *</span></label>
                        <p><a href="{{ asset('uploads/uni_logo/' . $university->uni_logo) }}" target="_blank"><img class="table_img" src="{{ asset('uploads/uni_logo/' . $university->uni_logo) }}" style="width:70%; height:auto;"></a></p>
                        <span style="color: red; font-size: 10px">This will overwrite the previous logo</span>
                        <input type="file" class="form-control" name="uni_logo" />
                      </div>
                    </div>

                    <!-- <div class="col-md-6">
                      <div class="m-3 ">
                        <label class="form-label">Authorized <span class="text-danger"> *</span> </label><br>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="authorized" id="inlineRadio1" value="1">
                          <label class="form-check-label" for="inlineRadio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="authorized" id="inlineRadio2" value="0">
                          <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                      </div>
                    </div> -->
                    <div class="col-md-6">
                      <div class="m-3 ">
                        <label class="form-label">Choose Option <span class="text-danger"> *</span> </label>


                        <input type="text" class="form-control" name="center_type" value="{{ $university->center_type }}" />
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="m-3">
                        <label class="form-label" for="institution-dropdown">Select Type <span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" name="uni_clg_type" value="{{ $university->uni_clg_type }}" />
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="m-3">
                        <label class="form-label" for="university-name">Name <span class="text-danger"> *</span> </label>
                        <input type="text" class="form-control" id="university-name" name="uni_name" placeholder="University Name" value="{{ $university->uni_name }}">
                      </div>
                    </div>



                    <div class="col-sm-6">
                      <div class="m-3">
                        <label class="form-label" for="university-location">Country <span class="text-danger"> *</span></label>
                        <select class="form-select" name="source_country" value="{{ $university->source_country }}" required>



                          <option disabled="disabled" selected="selected">Select Country</option>

                          <option value="AF">Afghanistan</option>

                          <option value="AX">Aland Islands</option>

                          <option value="AL">Albania</option>

                          <option value="DZ">Algeria</option>

                          <option value="AS">American Samoa</option>

                          <option value="AD">Andorra</option>

                          <option value="AO">Angola</option>

                          <option value="AI">Anguilla</option>

                          <option value="AQ">Antarctica</option>

                          <option value="AG">Antigua and Barbuda</option>

                          <option value="AR">Argentina</option>

                          <option value="AM">Armenia</option>

                          <option value="AW">Aruba</option>

                          <option value="AU">Australia</option>

                          <option value="AT">Austria</option>

                          <option value="AZ">Azerbaijan</option>

                          <option value="BS">Bahamas</option>

                          <option value="BH">Bahrain</option>

                          <option value="BD">Bangladesh</option>

                          <option value="BB">Barbados</option>

                          <option value="BY">Belarus</option>

                          <option value="BE">Belgium</option>

                          <option value="BZ">Belize</option>

                          <option value="BJ">Benin</option>

                          <option value="BM">Bermuda</option>

                          <option value="BT">Bhutan</option>

                          <option value="BO">Bolivia</option>

                          <option value="BQ">Bonaire, Sint Eustatius and Saba</option>

                          <option value="BA">Bosnia and Herzegovina</option>

                          <option value="BW">Botswana</option>

                          <option value="BV">Bouvet Island</option>

                          <option value="BR">Brazil</option>

                          <option value="IO">British Indian Ocean Territory</option>

                          <option value="BN">Brunei Darussalam</option>

                          <option value="BG">Bulgaria</option>

                          <option value="BF">Burkina Faso</option>

                          <option value="BI">Burundi</option>

                          <option value="KH">Cambodia</option>

                          <option value="CM">Cameroon</option>

                          <option value="CA">Canada</option>

                          <option value="CV">Cape Verde</option>

                          <option value="KY">Cayman Islands</option>

                          <option value="CF">Central African Republic</option>

                          <option value="TD">Chad</option>

                          <option value="CL">Chile</option>

                          <option value="CN">China</option>

                          <option value="CX">Christmas Island</option>

                          <option value="CC">Cocos (Keeling) Islands</option>

                          <option value="CO">Colombia</option>

                          <option value="KM">Comoros</option>

                          <option value="CG">Congo</option>

                          <option value="CD">Congo, Democratic Republic of the Congo</option>

                          <option value="CK">Cook Islands</option>

                          <option value="CR">Costa Rica</option>

                          <option value="CI">Cote D'Ivoire</option>

                          <option value="HR">Croatia</option>

                          <option value="CU">Cuba</option>

                          <option value="CW">Curacao</option>

                          <option value="CY">Cyprus</option>

                          <option value="CZ">Czech Republic</option>

                          <option value="DK">Denmark</option>

                          <option value="DJ">Djibouti</option>

                          <option value="DM">Dominica</option>

                          <option value="DO">Dominican Republic</option>

                          <option value="EC">Ecuador</option>

                          <option value="EG">Egypt</option>

                          <option value="SV">El Salvador</option>

                          <option value="GQ">Equatorial Guinea</option>

                          <option value="ER">Eritrea</option>

                          <option value="EE">Estonia</option>

                          <option value="ET">Ethiopia</option>

                          <option value="FK">Falkland Islands (Malvinas)</option>

                          <option value="FO">Faroe Islands</option>

                          <option value="FJ">Fiji</option>

                          <option value="FI">Finland</option>

                          <option value="FR">France</option>

                          <option value="GF">French Guiana</option>

                          <option value="PF">French Polynesia</option>

                          <option value="TF">French Southern Territories</option>

                          <option value="GA">Gabon</option>

                          <option value="GM">Gambia</option>

                          <option value="GE">Georgia</option>

                          <option value="DE">Germany</option>

                          <option value="GH">Ghana</option>

                          <option value="GI">Gibraltar</option>

                          <option value="GR">Greece</option>

                          <option value="GL">Greenland</option>

                          <option value="GD">Grenada</option>

                          <option value="GP">Guadeloupe</option>

                          <option value="GU">Guam</option>

                          <option value="GT">Guatemala</option>

                          <option value="GG">Guernsey</option>

                          <option value="GN">Guinea</option>

                          <option value="GW">Guinea-Bissau</option>

                          <option value="GY">Guyana</option>

                          <option value="HT">Haiti</option>

                          <option value="HM">Heard Island and Mcdonald Islands</option>

                          <option value="VA">Holy See (Vatican City State)</option>

                          <option value="HN">Honduras</option>

                          <option value="HK">Hong Kong</option>

                          <option value="HU">Hungary</option>

                          <option value="IS">Iceland</option>

                          <option value="IN">India</option>

                          <option value="ID">Indonesia</option>

                          <option value="IR">Iran, Islamic Republic of</option>

                          <option value="IQ">Iraq</option>

                          <option value="IE">Ireland</option>

                          <option value="IM">Isle of Man</option>

                          <option value="IL">Israel</option>

                          <option value="IT">Italy</option>

                          <option value="JM">Jamaica</option>

                          <option value="JP">Japan</option>

                          <option value="JE">Jersey</option>

                          <option value="JO">Jordan</option>

                          <option value="KZ">Kazakhstan</option>

                          <option value="KE">Kenya</option>

                          <option value="KI">Kiribati</option>

                          <option value="KP">Korea, Democratic People's Republic of</option>

                          <option value="KR">Korea, Republic of</option>

                          <option value="XK">Kosovo</option>

                          <option value="KW">Kuwait</option>

                          <option value="KG">Kyrgyzstan</option>

                          <option value="LA">Lao People's Democratic Republic</option>

                          <option value="LV">Latvia</option>

                          <option value="LB">Lebanon</option>

                          <option value="LS">Lesotho</option>

                          <option value="LR">Liberia</option>

                          <option value="LY">Libyan Arab Jamahiriya</option>

                          <option value="LI">Liechtenstein</option>

                          <option value="LT">Lithuania</option>

                          <option value="LU">Luxembourg</option>

                          <option value="MO">Macao</option>

                          <option value="MK">Macedonia, the Former Yugoslav Republic of</option>

                          <option value="MG">Madagascar</option>

                          <option value="MW">Malawi</option>

                          <option value="MY">Malaysia</option>

                          <option value="MV">Maldives</option>

                          <option value="ML">Mali</option>

                          <option value="MT">Malta</option>

                          <option value="MH">Marshall Islands</option>

                          <option value="MQ">Martinique</option>

                          <option value="MR">Mauritania</option>

                          <option value="MU">Mauritius</option>

                          <option value="YT">Mayotte</option>

                          <option value="MX">Mexico</option>

                          <option value="FM">Micronesia, Federated States of</option>

                          <option value="MD">Moldova, Republic of</option>

                          <option value="MC">Monaco</option>

                          <option value="MN">Mongolia</option>

                          <option value="ME">Montenegro</option>

                          <option value="MS">Montserrat</option>

                          <option value="MA">Morocco</option>

                          <option value="MZ">Mozambique</option>

                          <option value="MM">Myanmar</option>

                          <option value="NA">Namibia</option>

                          <option value="NR">Nauru</option>

                          <option value="NP">Nepal</option>

                          <option value="NL">Netherlands</option>

                          <option value="AN">Netherlands Antilles</option>

                          <option value="NC">New Caledonia</option>

                          <option value="NZ">New Zealand</option>

                          <option value="NI">Nicaragua</option>

                          <option value="NE">Niger</option>

                          <option value="NG">Nigeria</option>

                          <option value="NU">Niue</option>

                          <option value="NF">Norfolk Island</option>

                          <option value="MP">Northern Mariana Islands</option>

                          <option value="NO">Norway</option>

                          <option value="OM">Oman</option>

                          <option value="PK">Pakistan</option>

                          <option value="PW">Palau</option>

                          <option value="PS">Palestinian Territory, Occupied</option>

                          <option value="PA">Panama</option>

                          <option value="PG">Papua New Guinea</option>

                          <option value="PY">Paraguay</option>

                          <option value="PE">Peru</option>

                          <option value="PH">Philippines</option>

                          <option value="PN">Pitcairn</option>

                          <option value="PL">Poland</option>

                          <option value="PT">Portugal</option>

                          <option value="PR">Puerto Rico</option>

                          <option value="QA">Qatar</option>

                          <option value="RE">Reunion</option>

                          <option value="RO">Romania</option>

                          <option value="RU">Russian Federation</option>

                          <option value="RW">Rwanda</option>

                          <option value="BL">Saint Barthelemy</option>

                          <option value="SH">Saint Helena</option>

                          <option value="KN">Saint Kitts and Nevis</option>

                          <option value="LC">Saint Lucia</option>

                          <option value="MF">Saint Martin</option>

                          <option value="PM">Saint Pierre and Miquelon</option>

                          <option value="VC">Saint Vincent and the Grenadines</option>

                          <option value="WS">Samoa</option>

                          <option value="SM">San Marino</option>

                          <option value="ST">Sao Tome and Principe</option>

                          <option value="SA">Saudi Arabia</option>

                          <option value="SN">Senegal</option>

                          <option value="RS">Serbia</option>

                          <option value="CS">Serbia and Montenegro</option>

                          <option value="SC">Seychelles</option>

                          <option value="SL">Sierra Leone</option>

                          <option value="SG">Singapore</option>

                          <option value="SX">Sint Maarten</option>

                          <option value="SK">Slovakia</option>

                          <option value="SI">Slovenia</option>

                          <option value="SB">Solomon Islands</option>

                          <option value="SO">Somalia</option>

                          <option value="ZA">South Africa</option>

                          <option value="GS">South Georgia and the South Sandwich Islands</option>

                          <option value="SS">South Sudan</option>

                          <option value="ES">Spain</option>

                          <option value="LK">Sri Lanka</option>

                          <option value="SD">Sudan</option>

                          <option value="SR">Suriname</option>

                          <option value="SJ">Svalbard and Jan Mayen</option>

                          <option value="SZ">Swaziland</option>

                          <option value="SE">Sweden</option>

                          <option value="CH">Switzerland</option>

                          <option value="SY">Syrian Arab Republic</option>

                          <option value="TW">Taiwan, Province of China</option>

                          <option value="TJ">Tajikistan</option>

                          <option value="TZ">Tanzania, United Republic of</option>

                          <option value="TH">Thailand</option>

                          <option value="TL">Timor-Leste</option>

                          <option value="TG">Togo</option>

                          <option value="TK">Tokelau</option>

                          <option value="TO">Tonga</option>

                          <option value="TT">Trinidad and Tobago</option>

                          <option value="TN">Tunisia</option>

                          <option value="TR">Turkey</option>

                          <option value="TM">Turkmenistan</option>

                          <option value="TC">Turks and Caicos Islands</option>

                          <option value="TV">Tuvalu</option>

                          <option value="UG">Uganda</option>

                          <option value="UA">Ukraine</option>

                          <option value="AE">United Arab Emirates</option>

                          <option value="GB">United Kingdom</option>

                          <option value="US">United States</option>

                          <option value="UM">United States Minor Outlying Islands</option>

                          <option value="UY">Uruguay</option>

                          <option value="UZ">Uzbekistan</option>

                          <option value="VU">Vanuatu</option>

                          <option value="VE">Venezuela</option>

                          <option value="VN">Viet Nam</option>

                          <option value="VG">Virgin Islands, British</option>

                          <option value="VI">Virgin Islands, U.s.</option>

                          <option value="WF">Wallis and Futuna</option>

                          <option value="EH">Western Sahara</option>

                          <option value="YE">Yemen</option>

                          <option value="ZM">Zambia</option>

                          <option value="ZW">Zimbabwe</option>

                        </select>

                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="m-3">
                        <label class="form-label" for="university-location">State <span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" id="State" name="state" placeholder="State" value="{{ $university->state }}" required />
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="m-3">
                        <label class="form-label" for="university-location">Distt <span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" id="Distt" name="distt" placeholder="Distt" value="{{ $university->distt }}" required />
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="m-3">
                        <label class="form-label" for="university-location">City <span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" id="City" name="city" placeholder="City" value="{{ $university->city }}" required />
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="m-3">
                        <label class="form-label" for="university-location">Near By <span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" id="near_by" name="near_by" placeholder="Near By" value="{{ $university->near_by }}" required />
                      </div>
                    </div>


                    <div class="col-sm-6">
                      <div class="m-3">
                        <label for="from-date" class="form-label">University Establish Year *</label>
                        <input type="text" class="form-control" id="est_year" name="est_year" placeholder="Near By" value="{{ $university->est_year }}" required />
                      </div>
                    </div>


                    <div class="col-sm-6">
                      <div class="m-3">
                        <label class="form-label" for="website">Website <span class="text-danger"> *</span></label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="website" name="uni_website" placeholder="University Website" value="{{ $university->uni_website }}" />
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="m-3">
                        <label class="form-label" for="email">Email <span class="text-danger"> *</span></label>
                        <input type="email" class="form-control" id="email" name="uni_email" placeholder="University Email" value="{{ $university->uni_email }}">
                        <div id="email-error" class="text-danger" required></div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="m-3">
                        <label class="form-label" for="phone-number">Phone Number <span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" id="phone-number" name="uni_phone" placeholder="University Phone Number" value="{{ $university->uni_phone }}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="m-3">
                        <label for="status" class="form-label">Status <span class="text-danger"> *</span></label>
                        <select class="form-select" id="status" name="status">

                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="m-3">
                        <label class="form-label" for="description">Description </label>
                        <textarea class="form-control" id="description" name="uni_desc" placeholder="University Description" rows="4" required>{{ $university->uni_desc }}</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="list_wrapper mb-3">
                    @if ($university->certificates)
                    @foreach ($university->certificates as $certificate)
                    <div class="row ">
                      <div class="col-3">
                        <div class="m-3 form-group">
                          <label class="form-label">Certificate Name <span class="text-danger"> *</span></label>

                          <input type="hidden" name="cer_id[]" value="{{ $certificate->id }}" required>

                          <input type="text" class="form-control" name="certi_name[]" value="{{ $certificate->certi_name }}" placeholder="Certificate Nfileame" required>
                        </div>
                      </div>



                      <div class="col-4">
                        <div class="m-3 form-group">
                          <label class="form-label">Certificate File <span class="text-danger"> *</span></label>
                          <input type="file" class="form-control" name="certi_url[]" placeholder="Certificate URL" placeholder="Certificate File">
                          <span class="text-danger">This will override your previous file</span>
                        </div>
                      </div>

                      <div class="col-5">
                        <div class="m-3 form-group">
                          <label class="form-label">Old Certificate File </label>
                          <a href="" class="" target="blank">
                            <iframe src="{{ asset('uploads/certificate/'.$certificate->certi_url)}}"></iframe></a>
                        </div>
                      </div>

                    </div>
                    @endforeach
                    @endif
                  </div>

                  <button type="submit" class="btn btn-primary">Update</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Footer -->
        <footer class="default-footer">
          @include('includes.footer')
        </footer>
        <!-- / Footer -->
        <div class="content-backdrop fade"></div>
      </div>
      <!-- Content wrapper -->
    </div>
    <!-- Layout page -->
    <!-- Overlay and Footer Script -->
    <div class="layout-overlay layout-menu-toggle"></div>
    @include('includes.footer_script')
    <script>
      function selectedType(selctvalue) {
        var selectValues = "";
        $('#institution_dropdown').empty();
        if (selctvalue == 'University') {
          selectValues = {
            "Central University": "Central University",
            "State University": "State University",
            "Deemed to be University": "Deemed to be University",
            "Private University": "Private University"
          };
        } else if (selctvalue == 'College') {
          selectValues = {
            "Autonomous College": "Autonomous College",
            "Affiliated with Government University": "Affiliated with Government University"
          };
        }
        var $mySelect = $('#institution_dropdown');
        $.each(selectValues, function(key, value) {
          var $option = $("<option/>", {
            value: key,
            text: value
          });
          $mySelect.append($option);
        });
      }
      $(document).ready(function() {
        var x = 0; //Initial field counter
        var list_maxField = 15; //Input fields increment limitation
        $('.list_add_button').click(function() {
          if (x < list_maxField) {
            x++; //Increment field counter
            var list_fieldHTML = '  <div class="row"> <div class="col-5">  <div class="m-3 form-group"> <label >Certificate Name</label>   <input type="text" class="form-control" name="certi_name[]" required>  </div> </div>  <div class="col-5"> <div class=" m-3  form-group">  <label >Certificate File</label> <input type="file" class="form-control" name="certi_url[]" accept=".pdf" required>  </div> </div> <div class="col-1"> <div class=" m-3  form-group">  <label class="form-label" >Remove</label>  <button type="button" class="list_remove_button  btn btn btn-danger"> <i class="fa fa-minus"></i></button>  </div> </div>  </div>';
            $('.list_wrapper').append(list_fieldHTML); //Add field html
          }
        });
        //Once remove button is clicked
        $('.list_wrapper').on('click', '.list_remove_button', function() {
          $(this).closest('.row').remove(); //Remove field html
          x--; //Decrement field counter
        });
      });
    </script>
</body>

</html>
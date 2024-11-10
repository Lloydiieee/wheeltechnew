    
<div class="data-head">
    <h6 class="overline-title">Fathers' Information</h6>
</div>

<div class="row mt-2 align-center">
    <div class="col-lg-2">

        <div class="form-group">
            <label class="form-label" for="inp_ffn">Father's First Name <b class="text-danger">*</b></label>
            <span class="form-note">Specify here.</span>
        </div>

    </div>
    <div class="col-lg-4">

        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-info"></em>
            </div>
            <input required type="text" class="form-control" id="inp_ffn" name="inp_ffn"
                placeholder="Enter (Required) Father's First Name here.. " value="{{ $info->family_father_first_name ?? '' }}">
        </div>

    </div>
    <div class="col-lg-2">

        <div class="form-group">
            <label class="form-label" for="inp_fmn"> Father's Middle Name <b class="text-danger">*</b></label>
            <span class="form-note">Specify here.</span>
        </div>

    </div>
    <div class="col-lg-4">

        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-info"></em>
            </div>
            <input required type="text" class="form-control" id="inp_fmn" name="inp_fmn"
                placeholder="Enter (Required) Father's Middle Name here.. " value="{{ $info->family_father_middle_name ?? '' }}">
        </div>

    </div>
</div>

<div class="row mt-2 align-center">
    <div class="col-lg-2">

        <div class="form-group">
            <label class="form-label" for="inp_fln">Father's Last Name <b class="text-danger">*</b></label>
            <span class="form-note">Specify here.</span>
        </div>

    </div>
    <div class="col-lg-4">

        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-info"></em>
            </div>
            <input required type="text" class="form-control" id="inp_fln" name="inp_fln"
                placeholder="Enter (Required) Father's Last Name here.. " value="{{ $info->family_father_last_name ?? '' }}">
        </div>

    </div>
    <div class="col-lg-2">

        <div class="form-group">
            <label class="form-label" for="inp_fa"> Father's Alias <b class="text-danger">*</b></label>
            <span class="form-note">Specify here.</span>
        </div>

    </div>
    <div class="col-lg-4">

        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-info"></em>
            </div>
            <input required type="text" class="form-control" id="inp_fa" name="inp_fa"
                placeholder="Enter (Required) Father's Alias here.. " value="{{ $info->family_father_alias ?? '' }}">
        </div>

    </div>
</div>

<div class="row mt-2 align-center">

    <div class="col-lg-2">
        <div class="form-group">
            <label class="form-label" for="inp_fdob">Father's Date of Birth <b class="text-danger">*</b></label>
            <span class="form-note">Specify here.</span>
        </div>

    </div>
    <div class="col-lg-4">

        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-info"></em>
            </div>
            <input required type="date" class="form-control" id="inp_fdob" name="inp_fdob"
                placeholder="Enter (Required) Father's Date of Birth here.. " value="{{ $info->family_father_birthdate ?? '' }}">
        </div>

    </div>

    <div class="col-lg-2">

        <div class="form-group">
            <label class="form-label" for="inp_fage">Father's Age <b class="text-danger">*</b></label>
            <span class="form-note">Specify here.</span>
        </div>

    </div>
    <div class="col-lg-4">

        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-calendar-alt"></em>
            </div>
            <input required type="text" class="form-control" id="inp_fage" name="inp_fage"
                placeholder="Enter (Required) Father's Age here.. " value="{{ $info->family_father_age ?? '' }}">
        </div>

    </div>

</div>

<div class="row mt-2 align-center">
    <div class="col-lg-2">

        <div class="form-group">
            <label class="form-label" for="inp_of">Occupation of Father <b class="text-danger">*</b></label>
            <span class="form-note">Specify here.</span>
        </div>

    </div>
    <div class="col-lg-10">

        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-info"></em>
            </div>
            <input required type="text" class="form-control" id="inp_of" name="inp_of"
                placeholder="Enter (Required) Occupation of Father here.. " value="{{ $info->family_father_work ?? '' }}">
        </div>

    </div>
</div>

<div class="data-head mt-3">
    <h6 class="overline-title">Mothers' Information</h6>
</div>

<div class="row mt-2 align-center">
    <div class="col-lg-2">

        <div class="form-group">
            <label class="form-label" for="inp_mfn">Mother's First Name <b class="text-danger">*</b></label>
            <span class="form-note">Specify here.</span>
        </div>

    </div>
    <div class="col-lg-4">

        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-info"></em>
            </div>
            <input required type="text" class="form-control" id="inp_mfn" name="inp_mfn"
                placeholder="Enter (Required) Mother's First Name here.. " value="{{ $info->family_mother_first_name ?? '' }}">
        </div>

    </div>

    <div class="col-lg-2">

        <div class="form-group">
            <label class="form-label" for="inp_mmn"> Mother's Middle Name <b class="text-danger">*</b></label>
            <span class="form-note">Specify here.</span>
        </div>

    </div>
    <div class="col-lg-4">

        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-info"></em>
            </div>
            <input required type="text" class="form-control" id="inp_mmn" name="inp_mmn"
                placeholder="Enter (Required) Mother's Middle Name here.. " value="{{ $info->family_mother_middle_name ?? '' }}">
        </div>

    </div>
</div>

<div class="row mt-2 align-center">
    <div class="col-lg-2">

        <div class="form-group">
            <label class="form-label" for="inp_mln">Motther's Last Name <b class="text-danger">*</b></label>
            <span class="form-note">Specify here.</span>
        </div>

    </div>

    <div class="col-lg-4">

        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-info"></em>
            </div>
            <input required type="text" class="form-control" id="inp_mln" name="inp_mln"
                placeholder="Enter (Required) Mother's Last Name here.. " value="{{ $info->family_mother_last_name ?? '' }}">
        </div>

    </div>
    <div class="col-lg-2">

        <div class="form-group">
            <label class="form-label" for="inp_ma"> Mother's Alias <b class="text-danger">*</b></label>
            <span class="form-note">Specify here.</span>
        </div>

    </div>
    <div class="col-lg-4">

        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-info"></em>
            </div>
            <input required type="text" class="form-control" id="inp_ma" name="inp_ma"
                placeholder="Enter (Required) Mother's Alias here.. " value="{{ $info->family_mother_alias ?? '' }}">
        </div>

    </div>
</div>

<div class="row mt-2 align-center">

    <div class="col-lg-2">
        <div class="form-group">
            <label class="form-label" for="inp_mdob">Mother's Date of Birth <b class="text-danger">*</b></label>
            <span class="form-note">Specify here.</span>
        </div>

    </div>
    <div class="col-lg-4">

        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-info"></em>
            </div>
            <input required type="date" class="form-control" id="inp_mdob" name="inp_mdob"
                placeholder="Enter (Required) Mother's Date of Birth here.. " value="{{ $info->family_mother_birthdate ?? '' }}">
        </div>

    </div>

    <div class="col-lg-2">

        <div class="form-group">
            <label class="form-label" for="inp_mage">Mother's Age <b class="text-danger">*</b></label>
            <span class="form-note">Specify here.</span>
        </div>

    </div>
    <div class="col-lg-4">

        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-calendar-alt"></em>
            </div>
            <input required type="text" class="form-control" id="inp_mage" name="inp_mage"
                placeholder="Enter (Required) Mother's Age here.. " value="{{ $info->family_mother_age ?? '' }}">
        </div>

    </div>
</div>

<div class="row mt-2 align-center">

    <div class="col-lg-2">

        <div class="form-group">
            <label class="form-label" for="inp_om">Occupation of Mother <b class="text-danger">*</b></label>
            <span class="form-note">Specify here.</span>
        </div>

    </div>
    <div class="col-lg-4">

        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-info"></em>
            </div>
            <input required type="text" class="form-control" id="inp_om" name="inp_om"
                placeholder="Enter (Required) Occupation of Mother here.. " value="{{ $info->family_mother_work ?? '' }}">
        </div>

    </div>

    <div class="col-lg-2">
        <div class="form-group">
            <label class="form-label" for="inp_stat">Status of Marriage <b class="text-danger">*</b></label>
            <span class="form-note">Specify here.</span>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-control-wrap">
            <select name="inp_stat" class="form-select js-select2" data-placeholder="- SELECT -" required>
                <option value="" selected disabled>- SELECT -</option>
                <option value="Married">Married</option>
                <option value="Single">Single</option>
                <option value="Live-in">Live-in</option>
                <option value="Separated">Separated</option>
                <option value="Widowed">Widowed</option>
                <option value="Widower">Widower</option>
                <option value="Divorced">Divorced</option>
            </select>
        </div>
    </div>

</div>


<div class="data-head mt-3">
    <h6 class="overline-title">Present Address</h6>
</div>


<div class="row mt-2 align-center">
    <div class="col-lg-2">

        <div class="form-group">
            <label class="form-label" for="inp_hns">House No., Street <b class="text-danger">*</b></label>
            <span class="form-note">Specify here.</span>
        </div>

    </div>
    <div class="col-lg-4">

        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-info"></em>
            </div>
            <input required type="text" class="form-control" id="inp_hns" name="inp_hns"
                placeholder="Enter (Required) House No., Street here.. " value="{{ $info->family_present_add_house_number ?? '' }}">
        </div>

    </div>

    <div class="col-lg-2">

        <div class="form-group">
            <label class="form-label" for="inp_barangay">Barangay<b class="text-danger">*</b></label>
            <span class="form-note">Specify the Barangay here.</span>
        </div>

    </div>
    <div class="col-lg-4">

        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-info"></em>
            </div>
            <input required type="text" class="form-control" id="inp_barangay" name="inp_barangay"
                placeholder="Enter (Required) Barangay here.. " value="{{ $info->family_present_add_barangay ?? '' }}">
        </div>

    </div>
</div>

<div class="row mt-2 align-center">
    <div class="col-lg-2">

        <div class="form-group">
            <label class="form-label" for="inp_tc">Town City <b class="text-danger">*</b></label>
            <span class="form-note">Specify the Town City here.</span>
        </div>

    </div>
    <div class="col-lg-4">

        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-info"></em>
            </div>
            <input required type="text" class="form-control" id="inp_tc" name="inp_tc"
                placeholder="Enter (Required) Town City here.. " value="{{ $info->family_present_add_town ?? '' }}">
        </div>
    </div>
    <div class="col-lg-2">

        <div class="form-group">
            <label class="form-label" for="inp_prov">Province <b class="text-danger">*</b></label>
            <span class="form-note">Specify the Province here.</span>
        </div>

    </div>
    <div class="col-lg-4">

        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-info"></em>
            </div>
            <input required type="text" class="form-control" id="inp_prov" name="inp_prov"
                placeholder="Enter (Required) Province here.. " value="{{ $info->family_present_add_province ?? '' }}">
        </div>

    </div>
</div>

<div class="row mt-2 align-center">
    <div class="col-lg-2">

        <div class="form-group">
            <label class="form-label" for="inp_zc">Zip Code <b class="text-danger">*</b></label>
            <span class="form-note">Specify the Town City here.</span>
        </div>

    </div>
    <div class="col-lg-4">

        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-info"></em>
            </div>
            <input required type="text" class="form-control" id="inp_zc" name="inp_zc"
                placeholder="Enter (Required) Town City here.. " value="{{ $info->family_present_add_zip_code ?? '' }}">
        </div>
    </div>
    <div class="col-lg-2">


        <div class="form-group">
            <label class="form-label" for="inp_los">Length of Service <b class="text-danger">*</b></label>
            <span class="form-note">Specify here.</span>
        </div>
    </div>
    <div class="col-lg-4">

        <div class="form-control-wrap">
            <input required type="text" class="form-control" id="inp_los" name="inp_los" placeholder="0000" value="{{ $info->family_present_add_length_service ?? '' }}">
        </div>
    </div>
</div>
<div class="row mt-2 align-center">
    <div class="col-lg-2">
        <div class="form-group">
            <label class="form-label" for="inp_yrs">Years<b class="text-danger">*</b></label>
            <span class="form-note">Specify the Year here.</span>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-control-wrap">
            <input required type="text" class="form-control" id="inp_yrs" name="inp_yrs"
                placeholder="Enter (Required) Year here.." value="{{ $info->family_present_add_year ?? '' }}">
        </div>
    </div>

    <div class="col-lg-2">
        <div class="form-group">
            <label class="form-label" for="inp_mnth">Month <b class="text-danger">*</b></label>
            <span class="form-note">Specify the Month here.</span>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-info"></em>
            </div>
            <input required type="text" class="form-control" id="inp_mnth" name="inp_mnth"
                placeholder="Enter (Required) Month here.. " value="{{ $info->family_present_add_month ?? '' }}">
        </div>
    </div>
</div>

<div class="row mt-2 align-center">

</div>

<div class="data-head mt-3">
    <h6 class="overline-title">Provincial Address</h6>
</div>

<div class="row mt-2 align-center">
    <div class="col-lg-2">
        <div class="form-group">
            <label class="form-label" for="inp_phns">House No., Street <b class="text-danger">*</b></label>
            <span class="form-note">Specify here.</span>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-info"></em>
            </div>
            <input required type="text" class="form-control" id="inp_phns" name="inp_phns"
                placeholder="Enter (Required) House No., Street here.. " value="{{ $info->family_provincial_add_house_number ?? '' }}">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label class="form-label" for="inp_pbarangay">Barangay<b class="text-danger">*</b></label>
            <span class="form-note">Specify the Barangay here.</span>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-info"></em>
            </div>
            <input required type="text" class="form-control" id="inp_pbarangay" name="inp_pbarangay"
                placeholder="Enter (Required) Barangay here.. " value="{{ $info->family_provincial_add_barangay ?? '' }}">
        </div>
    </div>
</div>
<div class="row mt-2 align-center">
    <div class="col-lg-2">
        <div class="form-group">
            <label class="form-label" for="inp_ptc">Town City <b class="text-danger">*</b></label>
            <span class="form-note">Specify the Town City here.</span>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-info"></em>
            </div>
            <input required type="text" class="form-control" id="inp_ptc" name="inp_ptc"
                placeholder="Enter (Required) Town City here.. " value="{{ $info->family_provincial_add_town ?? '' }}">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label class="form-label" for="inp_pprov">Province <b class="text-danger">*</b></label>
            <span class="form-note">Specify the Province here.</span>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-info"></em>
            </div>
            <input required type="text" class="form-control" id="inp_pprov" name="inp_pprov"
                placeholder="Enter (Required) Province here.. " value="{{ $info->family_provincial_add_province ?? '' }}">
        </div>
    </div>
</div>

<div class="row mt-2 align-center">
    <div class="col-lg-2">
        <div class="form-group">
            <label class="form-label" for="inp_pzc">Zip Code <b class="text-danger">*</b></label>
            <span class="form-note">Specify the Town City here.</span>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-info"></em>
            </div>
            <input required type="text" class="form-control" id="inp_pzc" name="inp_pzc"
                placeholder="Enter (Required) Town City here.. " value="{{ $info->family_provincial_add_zip_code ?? '' }}">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label class="form-label" for="inp_plos">Length of Service <b class="text-danger">*</b></label>
            <span class="form-note">Specify here.</span>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-control-wrap">
            <input required type="text" class="form-control" id="inp_plos" name="inp_plos" placeholder="0000" value="{{ $info->family_provincial_add_length_service ?? '' }}">
        </div>
    </div>
    </div>
    
<div class="row mt-2 align-center">
    <div class="col-lg-2">
        <div class="form-group">
            <label class="form-label" for="inp_pyrs">Years<b class="text-danger">*</b></label>
            <span class="form-note">Specify the Year here.</span>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-control-wrap">
            <input required type="text" class="form-control" id="inp_pyrs" name="inp_pyrs"
                placeholder="Enter (Required) Year here.." value="{{ $info->family_provincial_add_year ?? '' }}">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label class="form-label" for="inp_pmnth">Month <b class="text-danger">*</b></label>
            <span class="form-note">Specify the Month here.</span>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-info"></em>
            </div>
            <input required type="text" class="form-control" id="inp_pmnth" name="inp_pmnth"
                placeholder="Enter (Required) Month here.. " value="{{ $info->family_provincial_add_month ?? '' }}">
        </div>
    </div>
</div>

<hr class="mt-3 mb-3">

<div class="col-lg-10 justify-end mb-4" style="float: right">
    <hr class="mb-4 mt-4">
    <div class="form-group mt-2 mb-2 justify-end">
        <button type="reset" class="btn btn-primary bg-dark mx-3">
            <em class="icon ni ni-repeat"></em>&ensp;
            Reset
        </button>
        <button type="submit" class="btn btn-success ">
            <em class="icon ni ni-save"></em> &ensp;
            Save Records
        </button>
    </div>
</div>

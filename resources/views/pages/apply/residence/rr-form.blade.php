<div class="row mt-2 align-center">
    <div class="col-lg-2">
        <div class="form-group">
            <label class="form-label" for="inp_house_type">House Type <b class="text-danger">*</b></label>
            <span class="form-note">Specify the house type here.</span>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-control-wrap">
            <select class="form-control" id="inp_house_type" name="inp_house_type" required>
                <option value="" selected disabled>- SELECT -</option>
                <option value="Mansion">Mansion</option>
                <option value="Concrete">Concrete</option>
                <option value="Semi-Concrete">Semi-Concrete</option>
                <option value="Bamboo">Bamboo</option>
                <option value="Apartment">Apartment</option>
                <option value="Mobile Home">Mobile Home</option>
                <option value="Other">Other</option>
            </select>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label class="form-label" for="inp_house_ownership">House Ownership <b class="text-danger">*</b></label>
            <span class="form-note">Specify house ownership.</span>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-control-wrap">
            <select class="form-control" id="inp_house_ownership" name="inp_house_ownership" required>
                <option value="" selected disabled>- SELECT -</option>
                <option value="Owned">Owned</option>
                <option value="Free Use">Free Use</option>
                <option value="Rented">Rented</option>
                <option value="Mortgaged">Mortgaged</option>
                <option value="Shared">Shared</option>
            </select>
        </div>
    </div>
</div>
<div class="row mt-2 align-center">
    <div class="col-lg-2">
        <div class="form-group">
            <label class="form-label" for="inp_lot_ownership">Lot Ownership <b class="text-danger">*</b></label>
            <span class="form-note">Specify the lot ownership here.</span>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-control-wrap">
            <select class="form-control" id="inp_lot_ownership" name="inp_lot_ownership" required>
                <option value="" selected disabled>- SELECT -</option>
                <option value="Owned">Owned</option>
                <option value="Free Use">Free Use</option>
                <option value="Rented">Rented</option>
                <option value="Leased">Leased</option>
                <option value="Shared">Shared</option>
            </select>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label class="form-label" for="inp_free_use_reason">Free Use Reason</label>
            <span class="form-note">Provide the reason if the house is free use.</span>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-control-wrap">
            <input type="text" class="form-control" id="inp_free_use_reason" name="inp_free_use_reason"
                placeholder="Enter reason here...">
        </div>
    </div>
</div>
<div class="row mt-2 align-center">
    <div class="col-lg-2">
        <div class="form-group">
            <label class="form-label" for="inp_lot_free_use_reason">Lot Free Use Reason</label>
            <span class="form-note">Provide the reason if the lot is free use.</span>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-control-wrap">
            <input type="text" class="form-control" id="inp_lot_free_use_reason" name="inp_lot_free_use_reason"
                placeholder="Enter reason here...">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label class="form-label" for="inp_landlord_name">Landlord Name</label>
            <span class="form-note">Provide the name of the landlord (if rented).</span>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-control-wrap">
            <input type="text" class="form-control" id="inp_landlord_name" name="inp_landlord_name"
                placeholder="Enter landlord name here...">
        </div>
    </div>
</div>
<!-- Address -->
<div class="row mt-2 align-center">
    <div class="col-lg-2">
        <div class="form-group">
            <label class="form-label" for="inp_rented_mo_inst">Monthly Installment <b class="text-danger">*</b></label>
            <span class="form-note">Provide the monthly installment if rented.</span>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-control-wrap">
            <input type="number" class="form-control" id="inp_rented_mo_inst" name="inp_rented_mo_inst"
                placeholder="Enter installment here..." required>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label class="form-label" for="inp_address">Address <b class="text-danger">*</b></label>
            <span class="form-note">Enter the residence address.</span>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-control-wrap">
            <input type="text" class="form-control" id="inp_address" name="inp_address"
                placeholder="Enter address here..." required>
        </div>
    </div>
</div>

<hr class="mt-4 mb-4">
<div class="data-head">
    <h6 class="overline-title">References Information</h6>
</div>
<div class="row mt-2 align-center">
    <div class="col-lg-3">
        <div class="form-group">
            <label class="form-label" for="inp_reference1_name">Complete Name <b class="text-danger">*</b></label>
            <span class="form-note">Provide the name of the reference.</span>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="form-control-wrap">
            <input type="text" class="form-control" id="inp_reference1_name" name="inp_reference1_name"
                placeholder="Enter name here..." required>
        </div>
    </div>
</div>
<div class="row mt-2 align-center">
    <div class="col-lg-3">
        <div class="form-group">
            <label class="form-label" for="inp_reference1_relation">Reference Relation <b
                    class="text-danger">*</b></label>
            <span class="form-note">Specify the relation to the reference.</span>
        </div>
    </div>
    <div class="col-lg-9 ">
        <div class="form-control-wrap">
            <input type="text" class="form-control" id="inp_reference1_relation" name="inp_reference1_relation"
                placeholder="Enter relation here..." required>
        </div>
    </div>
</div>
<div class="row mt-2 align-center">
    <div class="col-lg-3">
        <div class="form-group">
            <label class="form-label" for="inp_reference1_address">Complete Address <b
                    class="text-danger">*</b></label>
            <span class="form-note">Provide the address of the reference.</span>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="form-control-wrap">
            <input type="text" class="form-control" id="inp_reference1_address" name="inp_reference1_address"
                placeholder="Enter address here..." required>
        </div>
    </div>
    </div>
    <div class="row mt-2 align-center">
    <div class="col-lg-3">
        <div class="form-group">
            <label class="form-label" for="inp_reference1_mobile">Mobile No. <b class="text-danger">*</b></label>
            <span class="form-note">Provide the mobile number of reference.</span>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="form-control-wrap">
            <input type="number" class="form-control" id="inp_reference1_mobile" name="inp_reference1_mobile"
                placeholder="Enter mobile number here..." required>
        </div>
    </div>
</div>


<div class="row mt-2 ">
    <div class="col-lg-3">
    </div>
    <div class="col-lg-9">
        <hr class="mt-3 mb-3 px-1">
    </div>
</div>
<div class="row mt-2 align-center">
    <div class="col-lg-5"></div>
    <div class="col-lg-7 justify-end" style="float: right">
        <div class="form-group justify-end">
            <button type="reset" class="btn btn-light bg-white mx-3">
                <em class="icon ni ni-repeat"></em> Reset
            </button>
            <button type="submit" class="btn btn-success">
                <em class="icon ni ni-save"></em>&ensp; Submit Record
            </button>
        </div>
    </div>
</div>



<div class="row mt-2 align-center">
    <div class="col-lg-12">
        <hr class="mt-3 mb-3">
    </div>
</div>

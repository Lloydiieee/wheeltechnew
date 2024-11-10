<?php

namespace App\Http\Controllers;

use App\Models\BroSisModel;
use App\Models\ComakerModel;
use App\Models\ComakerIncomeModel;
use App\Models\FamilyModel;
use App\Models\InformantModel;
use App\Models\ApplicantModel;
use App\Models\PaymentLog;

use App\Models\RequirementsModel;
use App\Models\DependentModel;
use App\Models\RevenueModel;
use App\Models\ResidenceReferenceModel;
use App\Models\SpouseModel;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

class AllController extends Controller
{

    public static function status_check()
    {
        $info = DependentModel::get();
        return view('pages.apply.status.check')->with(['info' => $info]);
    }

    public static function comaker_index()
    {
        $comaker = ComakerModel::get();
        return view('pages.co-maker.co-maker-index')->with(['comaker' => $comaker]);
    }
    public static function comaker_view($id)
    {
        $comaker = ComakerModel::join('users', 'users.id', 'user_id')->where('users.id', $id)->first();
        return view('pages.apply.co-maker.co-maker-index')->with(['comaker' => $comaker]);
    }
    public static function comaker_store(Request $request)
    {
        $request->validate([
            'inp_fn' => 'required|string|max:255',
            'inp_mn' => 'required|string|max:255',
            'inp_ln' => 'required|string|max:255',
            'inp_age' => 'required|string|max:255',
            'inp_dob' => 'required|date|max:255',
            'inp_pob' => 'required|string|max:255',
            'inp_cp' => 'required|string|max:255',
            'inp_tp' => 'required|string|max:255',
            'inp_hns' => 'required|string|max:255',
            'inp_barangay' => 'required|string|max:255',
            'inp_tc' => 'required|string|max:255',
            'inp_prov' => 'required|string|max:255',
            'inp_zc' => 'required|string|max:255',
            'inp_los' => 'required|string|max:255',
            'inp_yrs' => 'required|string|max:255',
            'inp_mnth' => 'required|string|max:255',



        ]);

        ComakerModel::create([
            'comaker_first_name' => $request->inp_fn,
            'comaker_middle_name' => $request->inp_mn,
            'comaker_last_name' => $request->inp_ln,
            'comaker_age' => $request->inp_age,
            'comaker_birthdate' => $request->inp_dob,
            'comaker_place_of_birth' => $request->inp_pob,
            'comaker_cellphone_number' => $request->inp_cp,
            'comaker_telephone_number' => $request->inp_tp,
            'comaker_house_number' => $request->inp_hns,
            'comaker_barangay' => $request->inp_barangay,
            'comaker_town' => $request->inp_tc,
            'comaker_province' => $request->inp_prov,
            'comaker_zip_code' => $request->inp_zc,
            'comaker_length_service' => $request->inp_los,
            'comaker_year' => $request->inp_yrs,
            'comaker_month' => $request->inp_mnth,


        ]);

        return redirect()->back()->with('success', 'Co-maker Background added successfully!');
    }


    public static function co_income_index()
    {
        $comakerincome = ComakerIncomeModel::get();
        return view('pages.co-maker-income.co-maker-income-index')->with(['comakerincome' => $comakerincome]);
    }
    public static function co_income_view($id)
    {
        $comakerincome = ComakerIncomeModel::join('users', 'users.id', 'user_id')->where('users.id', $id)->first();
        return view('pages.apply.co-maker-income.co-maker-income-index')->with(['comakerincome' => $comakerincome]);
    }

    public static function co_income_store(Request $request)
    {
        $request->validate([
            'inp_en' => 'required|string|max:255',
            'inp_add' => 'required|string|max:255',
            'inp_cp' => 'required|string|max:255',
            'inp_tp' => 'required|string|max:255',
            'inp_pos' => 'required|string|max:255',
            'inp_stat' => 'required|string|max:255',
            'inp_nosbp' => 'required|string|max:255',
            'inp_income' => 'required|string|max:255',
            'inp_lobp' => 'required|string|max:255',
            'inp_yrs' => 'required|string|max:255',
            'inp_mnth' => 'required|string|max:255',
            'inp_other_income' => 'required|string|max:255',



        ]);

        ComakerIncomeModel::create([
            'co_income_employer_name' => $request->inp_en,
            'co_income_address' => $request->inp_add,
            'co_income_cellphone_number' => $request->inp_cp,
            'co_income_telephone_number' => $request->inp_tp,
            'co_income_position' => $request->inp_pos,
            'co_income_emp_status' => $request->inp_stat,
            'co_income_nature' => $request->inp_nosbp,
            'co_income_income' => $request->inp_income,
            'co_income_length' => $request->inp_lobp,
            'co_income_year' => $request->inp_yrs,
            'co_income_month' => $request->inp_mnth,
            'co_income_other_income' => $request->inp_other_income,


        ]);

        return redirect()->back()->with('success', 'Co-maker Source of Income added successfully!');
    }

    public static function informants_index()
    {
        $informants = InformantModel::get();
        return view('pages.informants.informants-index')->with(['informants' => $informants]);
    }

    public static function informants_store(Request $request)
    {
        $request->validate([
            'inp_name' => 'required|string|max:255',
            'inp_tcn' => 'required|string|max:255',
            'inp_ca' => 'required|string|max:255',
            'inp_qa' => 'required|string|max:255',
            'inp_res' => 'required|string|max:255',




        ]);

        InformantModel::create([
            'informants_name' => $request->inp_name,
            'informants_phone_number' => $request->inp_tcn,
            'informants_address' => $request->inp_ca,
            'informants_questions' => $request->inp_qa,
            'informants_response' => $request->inp_res,


        ]);

        return redirect()->back()->with('success', 'Informants added successfully!');
    }


    public static function family_index()
    {
        $family = FamilyModel::get();
        return view('pages.family-bg.family-bg-index')->with(['family' => $family]);
    }
    public static function family_view($id)
    {
        $family = FamilyModel::join('users', 'users.id', 'user_id')->where('users.id', $id)->first();
        return view('pages.family-bg.family-bg-index')->with(['info' => $family]);
    }
    public static function family_store(Request $request)
    {
        $request->validate([
            'inp_ffn' => 'required|string|max:255',
            'inp_fmn' => 'required|string|max:255',
            'inp_fln' => 'required|string|max:255',
            'inp_fa' => 'required|string|max:255',
            'inp_fage' => 'required|string|max:255',
            'inp_fdob' => 'required|date|max:255',
            'inp_mfn' => 'required|string|max:255',
            'inp_mmn' => 'required|string|max:255',
            'inp_mln' => 'required|string|max:255',
            'inp_ma' => 'required|string|max:255',
            'inp_mage' => 'required|string|max:255',
            'inp_mdob' => 'required|date|max:255',
            'inp_stat' => 'required|string|max:255',
            'inp_of' => 'required|string|max:255',
            'inp_om' => 'required|string|max:255',
            'inp_hns' => 'required|string|max:255',
            'inp_barangay' => 'required|string|max:255',
            'inp_tc' => 'required|string|max:255',
            'inp_prov' => 'required|string|max:255',
            'inp_zc' => 'required|string|max:255',
            'inp_los' => 'required|string|max:255',
            'inp_yrs' => 'required|string|max:255',
            'inp_mnth' => 'required|string|max:255',
            'inp_phns' => 'required|string|max:255',
            'inp_pbarangay' => 'required|string|max:255',
            'inp_ptc' => 'required|string|max:255',
            'inp_pprov' => 'required|string|max:255',
            'inp_pzc' => 'required|string|max:255',
            'inp_plos' => 'required|string|max:255',
            'inp_pyrs' => 'required|string|max:255',
            'inp_pmnth' => 'required|string|max:255',





        ]);

        FamilyModel::create([
            'user_id' => Auth::user()->id,
            'family_father_first_name' => $request->inp_ffn,
            'family_father_middle_name' => $request->inp_fmn,
            'family_father_last_name' => $request->inp_fln,
            'family_father_alias' => $request->inp_fa,
            'family_father_age' => $request->inp_fage,
            'family_father_birthdate' => $request->inp_fdob,
            'family_mother_first_name' => $request->inp_mfn,
            'family_mother_middle_name' => $request->inp_mmn,
            'family_mother_last_name' => $request->inp_mln,
            'family_mother_alias' => $request->inp_ma,
            'family_mother_age' => $request->inp_mage,
            'family_mother_birthdate' => $request->inp_mdob,
            'family_marriage_status' => $request->inp_stat,
            'family_father_work' => $request->inp_of,
            'family_mother_work' => $request->inp_om,
            'family_present_add_house_number' => $request->inp_hns,
            'family_present_add_barangay' => $request->inp_barangay,
            'family_present_add_town' => $request->inp_tc,
            'family_present_add_province' => $request->inp_prov,
            'family_present_add_zip_code' => $request->inp_zc,
            'family_present_add_length_service' => $request->inp_los,
            'family_present_add_year' => $request->inp_yrs,
            'family_present_add_month' => $request->inp_mnth,
            'family_provincial_add_house_number' => $request->inp_phns,
            'family_provincial_add_barangay' => $request->inp_pbarangay,
            'family_provincial_add_town' => $request->inp_ptc,
            'family_provincial_add_province' => $request->inp_pprov,
            'family_provincial_add_zip_code' => $request->inp_pzc,
            'family_provincial_add_length_service' => $request->inp_plos,
            'family_provincial_add_year' => $request->inp_pyrs,
            'family_provincial_add_month' => $request->inp_pmnth,


        ]);

        return redirect()->back()->with('success', 'Family Background added successfully!');
    }


    public static function bro_sis_index()
    {
        $brosis = BroSisModel::get();
        return view('pages.family-bg.brother-sister-index')->with(['brosis' => $brosis]);
    }
    public static function bro_sis_view($id)
    {
        $info = BroSisModel::join('users', 'users.id', 'user_id')->where('users.id', $id)->first();
        return view('pages.apply.family-bg.brother-sister-index')->with(['info' => $info]);
    }

    public static function bro_sis_store(Request $request)
    {
        $request->validate([
            'inp_bsn' => 'required|string|max:255',
            'inp_bsage' => 'required|string|max:255',
            'inp_bsadd' => 'required|string|max:255',
            'inp_bsocc' => 'required|string|max:255',
            'inp_bscom' => 'required|string|max:255',
            'inp_bslos' => 'required|string|max:255',




        ]);

        BroSisModel::create([
            'bro_sis_name' => $request->inp_bsn,
            'bro_sis_age' => $request->inp_bsage,
            'bro_sis_address' => $request->inp_bsadd,
            'bro_sis_work' => $request->inp_bsocc,
            'bro_sis_company' => $request->inp_bscom,
            'bro_sis_length_service' => $request->inp_bslos,


        ]);

        return redirect()->back()->with('success', 'Brothers/Sisters added successfully!');
    }


    public static function applicant_index()
    {
        $apply = ApplicantModel::get();
        return view('pages.apply.applicant-index')->with(['apply' => $apply]);
    }

    public static function applicant_view($id)
    {
        // join('users', 'users.id', 'user_id')->where('users.id', $id)->first() // NEW
        $apply = ApplicantModel::join('users', 'users.id', 'user_id')->where('users.id', $id)->first();
        return view('pages.apply.applicant-index')->with(['info' => $apply]);
    }

    public static function apply_applicant_index($id)
    {
        $apply = ApplicantModel::get();
        return view('pages.apply.applicant-index')->with(['apply' => $apply, 'id' => $id]);
    }

    public static function units($id)
    {
        $apply = ApplicantModel::get();
        return view('pages.lender.units')->with(['apply' => $apply, 'id' => $id]);
    }

    public static function billing($id)
    {
        $apply = ApplicantModel::get();
        return view('pages.lender.bills')->with(['apply' => $apply, 'id' => $id]);
    }

    public static function online($id)
    {
        $apply = ApplicantModel::get();
        return view('pages.lender.online')->with(['apply' => $apply, 'id' => $id]);
    }

    public function biiling_store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'unit_id' => 'required|integer',  // Assuming 't_units' is the table with unit IDs
            'date_payment' => 'required|date',
            'mode_of_payment' => 'required|string|max:255',
            'validated_by' => 'required|string|max:255',
        ]);

        // Create the payment record
        PaymentLog::create([
            'unit_id' => $request->unit_id,
            'date_payment' => $request->date_payment,
            'mode_of_payment' => $request->mode_of_payment,
            'validated_by' => $request->validated_by,
        ]);

        // Redirect back or to a success page with a success message
        return redirect()->back()->with('success', 'Payment record created successfully.');
    }


    public static function applicant_store(Request $request)
    {
        $request->validate([
            'inp_fn' => 'required|string|max:255',
            'inp_mn' => 'required|string|max:255',
            'inp_ln' => 'required|string|max:255',
            'inp_alias' => 'required|string|max:255',
            'inp_dob' => 'required|date|max:255',
            'inp_pob' => 'required|string|max:255',
            'inp_cs' => 'required|string|max:255',
            'inp_gender' => 'required|string|max:255',
            'inp_pn' => 'required|string|max:255',
            'inp_tn' => 'required|string|max:255',
            'inp_dl' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'citymun' => 'required|string|max:255',
            'brgy' => 'required|string|max:255',
            'inp_pahns' => 'required|string|max:255',
            'inp_palos' => 'required|string|max:255',
            'inp_pazc' => 'required|string|max:255',
            'region_previous' => 'required|string|max:255',
            'province_previous' => 'required|string|max:255',
            'citymun_previous' => 'required|string|max:255',
            'brgy_previous' => 'required|string|max:255',
            'inp_prehns' => 'required|string|max:255',
            'inp_prelos' => 'required|string|max:255',
            'inp_prezc' => 'required|string|max:255',
            'region_provincial' => 'required|string|max:255',
            'province_provincial' => 'required|string|max:255',
            'citymun_provincial' => 'required|string|max:255',
            'brgy_provincial' => 'required|string|max:255',
            'inp_provhns' => 'required|string|max:255',
            'inp_provlos' => 'required|string|max:255',
            'inp_provzc' => 'required|string|max:255',
            'inp_relname' => 'required|string|max:255',
            'inp_reladd' => 'required|string|max:255',
            'inp_relrel' => 'required|string|max:255',
            'inp_relphone' => 'required|string|max:255',
        ]);

        ApplicantModel::create([
            'user_id' => Auth::user()->id,
            'applicant_first_name' => $request->inp_fn,
            'applicant_middle_name' => $request->inp_mn,
            'applicant_last_name' => $request->inp_ln,
            'applicant_alias' => $request->inp_alias,
            'applicant_birthdate' => $request->inp_dob,
            'applicant_birthplace' => $request->inp_pob,
            'applicant_civil_status' => $request->inp_cs,
            'applicant_gender' => $request->inp_gender,
            'applicant_phone_number' => $request->inp_pn,
            'applicant_telephone_number' => $request->inp_tn,
            'applicant_license' => $request->inp_dl,
            'applicant_present_add_region' => $request->region,
            'applicant_present_add_province' => $request->province,
            'applicant_present_add_municipal' => $request->citymun,
            'applicant_present_add_barangay' => $request->brgy,
            'applicant_present_add_house_number' => $request->inp_pahns,
            'applicant_present_add_length_service' => $request->inp_palos,
            'applicant_present_add_zip_code' => $request->inp_pazc,
            'applicant_previous_add_region' => $request->region_previous,
            'applicant_previous_add_province' => $request->province_previous,
            'applicant_previous_add_municipal' => $request->citymun_previous,
            'applicant_previous_add_barangay' => $request->brgy_previous,
            'applicant_previous_add_house_number' => $request->inp_prehns,
            'applicant_previous_add_length_service' => $request->inp_prelos,
            'applicant_previous_add_zip_code' => $request->inp_prezc,
            'applicant_provincial_add_region' => $request->region_provincial,
            'applicant_provincial_add_province' => $request->province_provincial,
            'applicant_provincial_add_municipal' => $request->citymun_provincial,
            'applicant_provincial_add_barangay' => $request->brgy_provincial,
            'applicant_provincial_add_house_number' => $request->inp_provhns,
            'applicant_provincial_add_length_service' => $request->inp_provlos,
            'applicant_provincial_add_zip_code' => $request->inp_provzc,
            'applicant_relative_name' => $request->inp_relname,
            'applicant_relative_address' => $request->inp_reladd,
            'applicant_relative_relationship' => $request->inp_relrel,
            'applicant_relative_phone_number' => $request->inp_relphone,

        ]);

        return redirect()->back()->with('success', 'Family Background added successfully!');
    }


    public static function residence()
    {
        $info = ResidenceReferenceModel::get();
        return view('pages.apply.residence.rr-index')->with(['info' => $info]);
    }
    public static function residence_view($id)
    {
        $info = ResidenceReferenceModel::join('users', 'users.id', 'user_id')->where('users.id', $id)->first();
        return view('pages.apply.residence.rr-index')->with(['info' => $info]);
    }
    public static function revenue()
    {
        $info = RevenueModel::get();
        return view('pages_1.apply.revenue.revenue-index')->with(['info' => $info]);
    }
    public static function revenue_view($id)
    {
        $info = RevenueModel::join('users', 'users.id', 'user_id')->where('users.id', $id)->first();
        return view('pages.apply.revenue.revenue-index')->with(['info' => $info]);
    }
    public static function dependent()
    {
        $info = DependentModel::get();
        return view('pages_1.apply.dependents.dependents-index')->with(['info' => $info]);
    }
    public static function dependent_view($id)
    {
        $info = DependentModel::join('users', 'users.id', 'user_id')->where('users.id', $id)->first();
        return view('pages.apply.dependents.dependents-index')->with(['info' => $info]);
    }
    public static function requirement()
    {
        $info = RequirementsModel::get();
        return view('pages_1.apply.requirement.requirement-index')->with(['info' => $info]);
    }
    public static function requirement_view($id)
    {
        $info = RequirementsModel::join('users', 'users.id', 'user_id')->where('users.id', $id)->first();
        return view('pages.apply.requirement.requirement-index')->with(['info' => $info]);
    }
    public static function spouse()
    {
        $info = SpouseModel::get();
        return view('pages.apply.spouse-index')->with(['info' => $info, 'id' => 0]);
    }
    public static function spouse_view($id)
    {
        $info = SpouseModel::join('users', 'users.id', 'user_id')->where('users.id', $id)->first();
        return view('pages.apply.spouse-index')->with(['info' => $info]);
    }


    public function residence_store(Request $request)
    {
        // Validate form input
        $request->validate([
            'inp_house_type' => 'required|string',
            'inp_house_ownership' => 'required|string',
            'inp_free_use_reason' => 'nullable|string',
            'inp_rented_mo_inst' => 'nullable|numeric',
            'inp_landlord_name' => 'nullable|string',
            'inp_address' => 'required|string',
            'inp_lot_ownership' => 'required|string',
            'inp_lot_free_use_reason' => 'nullable|string',
            'inp_reference1_name' => 'required|string',
            'inp_reference1_address' => 'required|string',
            'inp_reference1_relation' => 'required|string',
            'inp_reference1_mobile' => 'required|numeric',

        ]);

        // Store the validated data
        ResidenceReferenceModel::create([
            'user_id' => Auth::user()->id,
            'rr_house_type' => $request->inp_house_type,
            'rr_house_ownership' => $request->inp_house_ownership,
            'rr_free_use_reason' => $request->inp_free_use_reason,
            'rr_rented_mo_inst' => $request->inp_rented_mo_inst,
            'rr_landlord_name' => $request->inp_landlord_name,
            'rr_address' => $request->inp_address,
            'rr_lot_ownership' => $request->inp_lot_ownership,
            'rr_lot_free_use_reason' => $request->inp_lot_free_use_reason,
            'rr_reference1_name' => $request->inp_reference1_name,
            'rr_reference1_address' => $request->inp_reference1_address,
            'rr_reference1_relation' => $request->inp_reference1_relation,
            'rr_reference1_mobile' => $request->inp_reference1_mobile,

        ]);

        // Redirect or return success message
        return redirect()->back()->with('success', 'Data saved successfully!');
    }

    public function revenue_store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'inp_employer_name' => 'required|string|max:255',
            'inp_employer_address' => 'required|string|max:255',
            'inp_cellphone_no' => 'required|string|max:255',
            'inp_tel_no' => 'required|string|max:255',
            'inp_position' => 'required|string|max:255',
            'inp_status_of_employment' => 'required|in:Contractual,Probationary,Casual,Permanent',
            'inp_length_of_employment_years' => 'required|string|max:255',
            'inp_length_of_employment_months' => 'required|string|max:255',
            'inp_sss_no' => 'required|string|max:255',
            'inp_basic_monthly_salary' => 'required|numeric|min:0',
            'inp_other_compensation' => 'required|numeric|min:0',
            'inp_occupation_or_profession' => 'required|string|max:255',
            'inp_nature_of_business' => 'required|string|max:255',
            'inp_length_of_business_years' => 'required|string|max:255',
            'inp_length_of_business_months' => 'required|string|max:255',
            'inp_income' => 'required|numeric|min:0',
            'inp_other_source_of_income' => 'required|numeric|min:0',
        ]);

        // Create a new revenue record in the database
        RevenueModel::create([
            'rev_employer_name' => $request->inp_employer_name,
            'rev_employer_address' => $request->inp_employer_address,
            'rev_cellphone_no' => $request->inp_cellphone_no,
            'rev_tel_no' => $request->inp_tel_no,
            'rev_position' => $request->inp_position,
            'rev_status_of_employment' => $request->inp_status_of_employment,
            'rev_length_of_employment_years' => $request->inp_length_of_employment_years,
            'rev_length_of_employment_months' => $request->inp_length_of_employment_months,
            'rev_sss_no' => $request->inp_sss_no,
            'rev_basic_monthly_salary' => $request->inp_basic_monthly_salary,
            'rev_other_compensation' => $request->inp_other_compensation,
            'rev_occupation_or_profession' => $request->inp_occupation_or_profession,
            'rev_nature_of_business' => $request->inp_nature_of_business,
            'rev_length_of_business_years' => $request->inp_length_of_business_years,
            'rev_length_of_business_months' => $request->inp_length_of_business_months,
            'rev_income' => $request->inp_income,
            'rev_other_source_of_income' => $request->inp_other_source_of_income,
        ]);

        // Redirect or return success message
        return redirect()->back()->with('success', 'Revenue data saved successfully!');
    }


    public function dependent_store(Request $request)
    {

        $request->validate([
            'inp_name' => 'required|string|max:255',
            'inp_age' => 'required|integer|min:0',
            'inp_school_status' => 'nullable|string|max:255',
            'inp_school_name' => 'nullable|string|max:255',
            'inp_address' => 'nullable|string|max:255',
            'inp_matriculation' => 'nullable|string|max:255',
            'inp_occupation' => 'nullable|string|max:255',
            'inp_company' => 'nullable|string|max:255',
            'inp_income' => 'nullable|numeric|min:0',
        ]);

        DependentModel::create([
            'dep_name' => $request->inp_name,
            'dep_age' => $request->inp_age,
            'dep_school_status' => $request->inp_school_status,
            'dep_school_name' => $request->inp_school_name,
            'dep_address' => $request->inp_address,
            'dep_matriculation' => $request->inp_matriculation,
            'dep_occupation' => $request->inp_occupation,
            'dep_company' => $request->inp_company,
            'dep_income' => $request->inp_income,
        ]);

        // Redirect or return success message
        return redirect()->back()->with('success', 'Dependent details saved successfully!');
    }
    public function requirement_store(Request $request)
    {
        $request->validate([
            'inp_proof_of_billing' => 'required|string|max:255',
            'inp_status' => 'required|string|max:255',
            'inp_capacity' => 'required|string|max:255',
            'inp_capital' => 'required|string|max:255',
            'inp_condition' => 'required|string|max:255',
            'inp_id_type' => 'nullable|string|max:255',
            'inp_id_number' => 'nullable|string|max:255',
            'inp_id_date_issued' => 'nullable|date',
            'inp_id_expiration_date' => 'nullable|date',
            'inp_name_of_brgy_capt' => 'nullable|string|max:255',
            'inp_brgy_capt_contact' => 'nullable|string|max:255',
            'inp_feedback_comments' => 'nullable|string|max:255',
            'inp_approved' => 'nullable|string|max:255',
            'inp_reasons' => 'nullable|string',
        ]);

        RequirementsModel::create([
            'req_proof_of_billing' => $request->inp_proof_of_billing,
            'req_status' => $request->inp_status,
            'req_capacity' => $request->inp_capacity,
            'req_capital' => $request->inp_capital,
            'req_condition' => $request->inp_condition,
            'req_id_type' => $request->inp_id_type,
            'req_id_number' => $request->inp_id_number,
            'req_id_date_issued' => $request->inp_id_date_issued,
            'req_id_expiration_date' => $request->inp_id_expiration_date,
            'req_name_of_brgy_capt' => $request->inp_name_of_brgy_capt,
            'req_brgy_capt_contact' => $request->inp_brgy_capt_contact,
            'req_feedback_comments' => $request->inp_feedback_comments,
            'req_approved' => $request->inp_approved,
            'req_reasons' => $request->inp_reasons,
        ]);
        // Redirect or return success message
        return redirect()->back()->with('success', 'Requirement data saved successfully!');
    }
    public static function spouse_store(Request $request)
    {
        $request->validate([
            'inp_fn' => 'required|string|max:255',
            'inp_mn' => 'required|string|max:255',
            'inp_ln' => 'required|string|max:255',
            'inp_alias' => 'required|string|max:255',
            'inp_dob' => 'required|date|max:255',
            'inp_pob' => 'required|string|max:255',
            'inp_cs' => 'required|string|max:255',
            'inp_gender' => 'required|string|max:255',
            'inp_pn' => 'required|string|max:255',
            'inp_tn' => 'required|string|max:255',
            'inp_dl' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'citymun' => 'required|string|max:255',
            'brgy' => 'required|string|max:255',
            'inp_pahns' => 'required|string|max:255',
            'inp_palos' => 'required|string|max:255',
            'inp_pazc' => 'required|string|max:255',
            'region_previous' => 'required|string|max:255',
            'province_previous' => 'required|string|max:255',
            'citymun_previous' => 'required|string|max:255',
            'brgy_previous' => 'required|string|max:255',
            'inp_prehns' => 'required|string|max:255',
            'inp_prelos' => 'required|string|max:255',
            'inp_prezc' => 'required|string|max:255',
            'region_provincial' => 'required|string|max:255',
            'province_provincial' => 'required|string|max:255',
            'citymun_provincial' => 'required|string|max:255',
            'brgy_provincial' => 'required|string|max:255',
            'inp_provhns' => 'required|string|max:255',
            'inp_provlos' => 'required|string|max:255',
            'inp_provzc' => 'required|string|max:255',
            'inp_relname' => 'required|string|max:255',
            'inp_reladd' => 'required|string|max:255',
            'inp_relrel' => 'required|string|max:255',
            'inp_relphone' => 'required|string|max:255',





        ]);

        SpouseModel::create([
            'spouse_first_name' => $request->inp_fn,
            'spouse_middle_name' => $request->inp_mn,
            'spouse_last_name' => $request->inp_ln,
            'spouse_alias' => $request->inp_alias,
            'spouse_birthdate' => $request->inp_dob,
            'spouse_birthplace' => $request->inp_pob,
            'spouse_civil_status' => $request->inp_cs,
            'spouse_gender' => $request->inp_gender,
            'spouse_phone_number' => $request->inp_pn,
            'spouse_telephone_number' => $request->inp_tn,
            'spouse_license' => $request->inp_dl,
            'spouse_present_add_region' => $request->region,
            'spouse_present_add_province' => $request->province,
            'spouse_present_add_municipal' => $request->citymun,
            'spouse_present_add_barangay' => $request->brgy,
            'spouse_present_add_house_number' => $request->inp_pahns,
            'spouse_present_add_length_service' => $request->inp_palos,
            'spouse_present_add_zip_code' => $request->inp_pazc,
            'spouse_previous_add_region' => $request->region_previous,
            'spouse_previous_add_province' => $request->province_previous,
            'spouse_previous_add_municipal' => $request->citymun_previous,
            'spouse_previous_add_barangay' => $request->brgy_previous,
            'spouse_previous_add_house_number' => $request->inp_prehns,
            'spouse_previous_add_length_service' => $request->inp_prelos,
            'spouse_previous_add_zip_code' => $request->inp_prezc,
            'spouse_provincial_add_region' => $request->region_provincial,
            'spouse_provincial_add_province' => $request->province_provincial,
            'spouse_provincial_add_municipal' => $request->citymun_provincial,
            'spouse_provincial_add_barangay' => $request->brgy_provincial,
            'spouse_provincial_add_house_number' => $request->inp_provhns,
            'spouse_provincial_add_length_service' => $request->inp_provlos,
            'spouse_provincial_add_zip_code' => $request->inp_provzc,
            'spouse_relative_name' => $request->inp_relname,
            'spouse_relative_address' => $request->inp_reladd,
            'spouse_relative_relationship' => $request->inp_relrel,
            'spouse_relative_phone_number' => $request->inp_relphone,

        ]);

        return redirect()->back()->with('success', 'Family Background added successfully!');
    }
}

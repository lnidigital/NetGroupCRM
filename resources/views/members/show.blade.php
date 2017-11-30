@extends('layouts.master')
    @section('content')
    @include('partials.contactheader')
<div class="col-sm-8">
  <el-tabs active-name="referrals-given" style="width:100%">
    <el-tab-pane label="Referrals given" name="referrals-given">
        <table class="table table-hover " id="referrals-given-table">
        <thead>
        <tr>
            <th>{{ __('From') }}</th>
            <th>{{ __('To') }}</th>
            <th>{{ __('Date') }}</th>
        </tr>
        </thead>
    </table>
    </el-tab-pane>
    <el-tab-pane label="Referrals received" name="referrals-received">
        <table class="table table-hover " id="referrals-received-table">
            <thead>
            <tr>
                <th>{{ __('From') }}</th>
                <th>{{ __('To') }}</th>
                <th>{{ __('Date') }}</th>
            </tr>
            </thead>
    </table>
    </el-tab-pane>
    <el-tab-pane label="1-on-1s" name="oneonones">
      <table class="table table-hover">
        <table class="table table-hover" id="oneonones-table">
            <thead>
            <tr>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Date') }}</th>
            </tr>
            </thead>
            </table>
    </el-tab-pane>
    <el-tab-pane label="Guests" name="guests">
         <table class="table table-hover" id="guests-table">
                <thead>
                <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Company') }}</th>
                    <th>{{ __('Date') }}</th>
                </tr>
                </thead>
            </table>
    </el-tab-pane>
    <el-tab-pane label="Revenues reported" name="revenues">
         <table class="table table-hover" id="revenues-table">
                <thead>
                <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Date') }}</th>
                    <th>{{ __('Amount') }}</th>
                </tr>
                </thead>
            </table>
    </el-tab-pane>
  </el-tabs>
  </div>


  
   @stop 
@push('scripts')
<script>
        

    $(function () {
        $('#referrals-given-table').DataTable({
            processing: true,
            serverSide: true,
            searching:false,
            "bLengthChange": false,
            ajax: '{!! route('referrals.datagiven', ['id' => $contact->id]) !!}',
            columns: [

                {data: 'from_name', name: 'from_contact_id'},
                {data: 'to_name', name: 'to_contact_id'},
                {data: 'referral_date_formatted', name: 'referral_date'}
            ]
        });
    });

    $(function () {
        $('#referrals-received-table').DataTable({
            processing: true,
            serverSide: true,
            searching:false,
            bLengthChange: false,
            ajax: '{!! route('referrals.datareceived', ['id' => $contact->id]) !!}',
            columns: [

                {data: 'from_name', name: 'from_contact_id'},
                {data: 'to_name', name: 'to_contact_id'},
                {data: 'referral_date_formatted', name: 'referral_date'}
            ]
        });
    });

    $(function () {
        $('#oneonones-table').DataTable({
            processing: true,
            serverSide: true,
            searching:false,
            bLengthChange: false,
            ajax: '{!! route('onetoones.contactdata', ['id' => $contact->id]) !!}',
            columns: [

                {data: 'first_contact_name', name: 'first_contact_id'},    
                {data: 'second_contact_name', name: 'second_contact_id'},
                {data: 'onetoone_date_formatted', name: 'onetoone_date'}

            ]
        });
    });

    $(function () {
        $('#guests-table').DataTable({
            processing: true,
            serverSide: true,
            searching:false,
            bLengthChange: false,
            ajax: '{!! route('guests.contactdata', ['id' => $contact->id]) !!}',
            columns: [

                {data: 'namelink', name: 'name'},
                {data: 'company_name', name: 'company_name'},
                {data: 'email', name: 'email'}
            ]
        });
    });  

    $(function () {
        $('#revenues-table').DataTable({
            processing: true,
            serverSide: true,
            bLengthChange: false,
            searching:false,
            bLengthChange: false,
            ajax: '{!! route('revenues.contactdata', ['id' => $contact->id]) !!}',
            columns: [

                {data: 'name', name: 'contact_id'},
                {data: 'amount_formatted', name: 'amount'},
                {data: 'report_date_formatted', name: 'report_date'}
            ]
        });
    });
</script>
@endpush



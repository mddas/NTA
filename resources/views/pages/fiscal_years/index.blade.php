@extends('master')

@section('content')
<div class="card card-custom gutter-b">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Fiscal Year
            <span class="d-block text-muted pt-2 font-size-sm">list of fiscal year registered in the system</span></h3>
        </div>
        @can('create')
        <div class="card-toolbar">
            <!--begin::Button-->
            <a href="{{route('fiscal_years.create')}}" class="btn btn-primary font-weight-bolder">
            <span class="svg-icon svg-icon-md">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <circle fill="#000000" cx="9" cy="15" r="6" />
                        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>New Record</a>
            <!--end::Button-->
        </div>
      @endcan
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fiscalYears as $key=>$fiscalYear)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$fiscalYear->name}}</td>
                    <td>{{$fiscalYear->start_date->format('Y-m-d')}}</td>
                    <td>{{$fiscalYear->end_date->format('Y-m-d')}}</td>
                    <td>
                        @can('edit')
                        <a href="{{route('fiscal_years.edit',$fiscalYear->id)}}" class="btn btn-success btn-sm mr-2"><i class="fa fa-pen-alt icon-sm"></i>Edit</a>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!--end: Datatable-->
    </div>
</div>
@endsection
@section('jsLibrary')
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/crud/datatables/basic/scrollable.js')}}"></script>
@endsection
@extends('admin.adminlayout')

@section('content')
<div class="card">

    <div class="card-header">
        
        <h4>Campaign <i class="material-icons opacity-10">ads_click</i>
        
    </h4>
    </div>

    <div class="card-body">
        

        <div>
            <h6>Users view :</h6>
            <div>
                <div class="">
                
                    <a href="{{ url('campaign-users') }}" class="btn-warning btn " target="_blank"
                        title="view"> <i class="material-icons">visibility</i> </a>
                    <a href="{{ url('/campaign-users/download') }}" class="btn-danger btn ms-3 "
                        title="download"> <i class="material-icons">downloading</i> </a>
                </div>
            </div>
        </div>


    </div>
 
   
</div>
@endsection
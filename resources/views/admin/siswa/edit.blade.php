@extends('layouts.admin')
@section('content')
  <!-- Table -->
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title ">Tentang</h4>
    </div>
<div class="card-body">
<div class="table-responsive">
<table class="table">
<thead class=" text-primary">
 <!-- CREATE -->
 <div class="card-body">
    <form action="{{ route('update', $siswa->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}                                
                                        
            <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="{{ $siswa->nama}}">
            </div>
                                                           
            <div class="form-group">
                <button type="submit" class="btn btn-success">Update Data</button>
            </div>
    </form>

</thead>
</table>
</div>
</div>
</div>
</div>

    </div>
  </div>
  @endsection
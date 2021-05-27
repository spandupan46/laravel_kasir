@extends('layouts.templates')
@section('konten')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-header">
        <div class="row">
          <div class="col-lg-6 main-header">
            <h2>Toko <span>list</span></h2>
            <h6 class="mb-0">admin panel</h6>
          </div>
          <div class="col-lg-6 breadcrumb-right">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html"><i class="pe-7s-home"></i></a></li>
              <li class="breadcrumb-item">Customer    </li>
              <li class="breadcrumb-item">Master Data</li>
              <li class="breadcrumb-item active">Toko list</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <!-- Individual column searching (text inputs) Starts-->
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h2><b>Toko</b></h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-original-title="test" data-target="#addToko"><span class="fa fa-plus"></span> Toko</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row d-flex ">
                    @foreach ($data as $item=>$var)
                        <div class="col-md-6 col-lg-6 col-xl-4 box-col-6 xl-50 mx-auto d-block">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <img class="img-fluid" src="{{ asset('assets/icon/argodeon.png') }}" alt="">
                                </div>
                                <div class="card-profile">
                                    <img class="rounded-circle" src="{{ asset('assets/icon/store.jpg') }}" alt="">
                                </div>
                                <ul class="card-social">
                                    <li><a href="#"><i class="fa fa-edit" title="Edit Toko"></i></a></li>
                                    <li><a href="#"><i class="fa fa-trash" title="Delete Toko"></i></a></li>
                                </ul>
                                <div class="text-center profile-details">
                                    <h4>{{ $var->nama_toko }}</h4>
                                    <h6><a href="{{ url('customer/toko/'.$var->id.'/detail') }}">Detail</a></h6>
                                </div>
                                <div class="card-footer row">
                                    <div class="col-4 col-sm-4">
                                        <h6>Produk</h6>
                                        <h3 class="counter"></h3>
                                    </div>
                                    <div class="col-4 col-sm-4">
                                        <h6>Pemasukan</h6>
                                        <h3><span class="counter">49</span>K</h3>
                                    </div>
                                    <div class="col-4 col-sm-4">
                                        <h6>Pengeluaran</h6>
                                        <h3><span class="counter">96</span>M</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
          </div>
        </div>
        <!-- Individual column searching (text inputs) Ends-->
      </div>
    </div>
    <!-- Container-fluid Ends-->
</div>


<div class="modal fade" id="addToko" tabindex="-1" role="dialog" aria-labelledby="formModal"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="formModal">Tambah Toko</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ url('customer/toko') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nama Toko</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                            <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="nama_toko" placeholder="Nama Toko">
                    </div>
                </div>
               <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
            </form>
        </div>
      </div>
   </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>


<script>
    $(document).ready(function(){
        $('#produk_table').DataTable({
           "pageLength": 5
       });
    })
</script>
@endsection

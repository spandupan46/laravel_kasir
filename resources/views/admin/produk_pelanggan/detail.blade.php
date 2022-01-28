@extends('layouts.templates')

@section('konten')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-header">
        <div class="row">
          <div class="col-lg-6 main-header">
            <h2>List <span>Produk Pelanggan</span></h2>
            <h6 class="mb-0">admin panel</h6>
          </div>
          <div class="col-lg-6 breadcrumb-right">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html"><i class="pe-7s-home"></i></a></li>
              <li class="breadcrumb-item">admin    </li>
              <li class="breadcrumb-item">Master Data</li>
              <li class="breadcrumb-item active">Customer list</li>
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
                        <h2><b>Produk Pelanggan</b></h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-original-title="test" data-target="#addDetailProdukPelanggan"><span class="fa fa-plus"></span> Produk</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive product-table">
                <table class="table-striped text-center" id="produk_pelanggan">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th>Nama Produk</th>
                            <th>Deskripsi Produk</th>
                            <th width="5%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item=>$var)
                            <tr>
                                <td>{{ $item+1 }}</td>
                                <td>{{ $var->nama_produk }}</td>
                                <td>{{ $var->deskripsi_produk }}</td>
                                <td>
                                    <a href="{{ url('admin/produk_pelanggan/'.$var->id.'/detail') }}" title="Detail Produk"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                            {{-- <div class="modal fade" id="hapus-{{ $var->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabelx">Hapus Mapel</h3>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <form method="post" action="{{ url('admin/mata_pelajaran/delete') }}">
                                            <div class="modal-body">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $var->id }}">
                                                <p>Apakah Anda Yakin ingin menhapus Mata Pelajaran {{ $var->nama_pelajaran }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-secondary" type="button">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> --}}
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>


<div class="modal fade" id="addDetailProdukPelanggan" tabindex="-1" role="dialog" aria-labelledby="formModal"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="formModal">Tambah Data Produk Pelanggan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form class="" method="post" action="{{ url('admin/produk_pelanggan/deskripsi_produk') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_produk" value="{{ $id }}">
                <div class="form-group">
                    <label>Deskripsi Produk</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                            <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="deskripsi_produk" placeholder="List Deskripsi Produk">
                    </div>
                </div>
                {{-- <div class="form-group">
                    <label>Durasi ( Hari )</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                            <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <input type="number" class="form-control" placeholder="Durasi Produk ( Hari )" name="durasi">
                    </div>
                </div> --}}
               <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
            </form>
         </div>
      </div>
   </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>


<script>
    $(document).ready(function(){
        $('#produk_pelanggan').DataTable({
           "pageLength": 5
       });
    })
</script>
@endsection
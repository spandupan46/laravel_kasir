@extends('layouts.templates')
@section('konten')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-header">
        <div class="row">
          <div class="col-lg-6 main-header">
            <h2>History <span>Langganan</span></h2>
            <h6 class="mb-0">customer panel</h6>
          </div>
          <div class="col-lg-6 breadcrumb-right">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html"><i class="pe-7s-home"></i></a></li>
              <li class="breadcrumb-item">Customer    </li>
              <li class="breadcrumb-item">Master Data</li>
              <li class="breadcrumb-item active">Produk list</li>
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
                        <h2><b>Produk</b></h2>
                    </div>
                    {{-- <div class="col-md-6 text-right">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-original-title="test" data-target="#addProduk"><span class="fa fa-plus"></span> Produk</button>
                    </div> --}}
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive product-table">
                <table class="table-striped text-center" id="produk_table">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th>Kode Transaksi</th>
                            <th>Metode Pembayaran</th>
                            <th>Nama Produk</th>
                            <th>Total Harga</th>
                            <th>Expire Time</th>
                            <th>Status Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item=>$key)
                        <tr>
                            <td>{{ $item+1 }}</td>
                            <td>{{ $key->merchant_ref }}</td>
                            <td>{{ $key->payment_name }}</td>
                            <td>{{ $key->nama_produk }}</td>
                            <td>{{ $key->amount }}</td>
                            <td>
                                @if ($key->status !== "PAID")
                                {{ helper::strtotime($key->expired_time) }}</td>
                                    
                                @else
                                <div class="badge badge-success">Lunas</div>
                                @endif
                            <td>
                                @if ($key->status == "PAID")
                                <button class="btn btn-success">Telah Dibayar</button>
                                @endif
                                @if ($key->status == "EXPIRED")
                                <button class="btn btn-primary">Kadaluarsa</button>
                                @endif
                                @if ($key->status == "UNPAID" && helper::cek_expired_time($key->expired_time) == True)
                                <button class="btn btn-danger">Bayar Sekarang</button>
                                @endif
                                @if ($key->status == "UNPAID" && helper::cek_expired_time($key->expired_time) == False)                                    
                                <button class="btn btn-primary">Kadaluarsa</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- Individual column searching (text inputs) Ends-->
      </div>
    </div>
    <!-- Container-fluid Ends-->
</div>


{{-- <div class="modal fade" id="addProduk" tabindex="-1" role="dialog" aria-labelledby="formModal"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="formModal">Tambah Produk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="" method="post" action="{{ url('customer/produk') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                <i class="fas fa-times"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Produk</label>
                        <div class="input-group">
                            <textarea name="deskripsi_produk" id="" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                    <label>Nama Kategori</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                            <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <select name="id_kategori" id="" class="form-control">
                            <option value="">== Pilih Kategori ==</option>
                            @foreach ($kategori as $item=>$kat)
                            <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                            <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <input type="number" class="form-control" name="stok" placeholder="Stok">
                    </div>
                </div>
                <div class="form-group">
                    <label>Toko</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                            <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <select name="id_toko" id="" class="form-control">
                            @foreach ($toko as $item=>$to)
                                <option value="{{ $to->id }}">{{ $to->nama_toko }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                            <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <input type="number" class="form-control" name="harga" placeholder="harga">
                    </div>
                </div>
                <div class="form-group">
                    <label>File</label>
                    <input type="file" class="form-control" name="foto_produk">
                </div>
               <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
            </form>
        </div>
      </div>
   </div>
</div> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    var app2 = new Vue({
        el: '#app',
        data: {
            message: 'You loaded this page on ' + new Date().toLocaleString()
        }
    })
    $(document).ready(function(){
        $('#produk_table').DataTable({
           "pageLength": 5
       });
    })
</script>
@endsection

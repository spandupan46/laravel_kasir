@extends('layouts.templates')
@section('konten')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-header">
        <div class="row">
          <div class="col-lg-6 main-header">
            <h2>Kategori <span>list</span></h2>
            <h6 class="mb-0">admin panel</h6>
          </div>
          <div class="col-lg-6 breadcrumb-right">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html"><i class="pe-7s-home"></i></a></li>
              <li class="breadcrumb-item">Customer    </li>
              <li class="breadcrumb-item">Master Data</li>
              <li class="breadcrumb-item active">Kategori list</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <!-- Individual column searching (text inputs) Starts-->
        <div class="col-lg-12 xl-100">
            <div class="row ecommerce-chart-card">
              <div class="col-xl-3 xl-50 col-md-6 box-col-6">
                <div class="card gradient-primary o-hidden">
                  <div class="card-body tag-card">
                    <div class="ecommerce-chart">
                      <div class="media ecommerce-small-chart">
                          <div class="text-center justify-content-center">
                              <img src="{{ asset('assets/icon/svg/money.svg') }}" width="50" height="50" alt="" style="color: white">
                          </div>
                        <div class="sale-chart">
                          <div class="media-body m-l-40 text-center">
                            <h6 class="f-w-100 m-l-10 digits">Rp. {{ number_format($pendapatan_today,0,',','.') }}</h6>
                            <h4 class="mb-0 f-w-700 m-l-10">Pendapatan <br>Hari Ini</h4>
                          </div>
                        </div>
                      </div>
                    </div><span class="tag-hover-effect"><span class="dots-group"><span class="dots dots1"></span><span class="dots dots2 dot-small"></span><span class="dots dots3 dot-small"></span><span class="dots dots4 dot-medium"></span><span class="dots dots5 dot-small"></span><span class="dots dots6 dot-small"></span><span class="dots dots7 dot-small-semi"></span><span class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small">       </span></span></span>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 xl-50 col-md-6 box-col-6">
                <div class="card gradient-secondary o-hidden">
                  <div class="card-body tag-card">
                    <div class="ecommerce-chart">
                      <div class="media ecommerce-small-chart">
                        <div class="text-center justify-content-center">
                            <img src="{{ asset('assets/icon/svg/money.svg') }}" width="50" height="50" alt="" style="color: white">
                        </div>
                        <div class="sale-chart">
                          <div class="media-body m-l-40 text-center">
                            <h6 class="f-w-100 m-l-10">Rp. {{ number_format($pendapatan_thisWeek,0,',','.') }}</h6>
                            <h4 class="mb-0 f-w-700 m-l-10">Pendatapatan <br>Minggu Ini</h4>
                          </div>
                        </div>
                      </div>
                    </div><span class="tag-hover-effect"><span class="dots-group"><span class="dots dots1"></span><span class="dots dots2 dot-small"></span><span class="dots dots3 dot-small"></span><span class="dots dots4 dot-medium"></span><span class="dots dots5 dot-small"></span><span class="dots dots6 dot-small"></span><span class="dots dots7 dot-small-semi"></span><span class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small">             </span></span></span>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 xl-50 col-md-6 box-col-6">
                <div class="card gradient-primary o-hidden">
                  <div class="card-body tag-card">
                    <div class="ecommerce-chart">
                      <div class="media ecommerce-small-chart">
                        <div class="text-center justify-content-center">
                            <img src="{{ asset('assets/icon/svg/transaction.svg') }}" width="50" height="50" alt="" style="color: white">
                        </div>
                        <div class="sale-chart">
                          <div class="media-body m-l-40 text-center">
                            <h6 class="f-w-100 m-l-10 text-center">{{ $transaksi_today }}</h6>
                            <h4 class="mb-0 f-w-700 m-l-10">Transaksi <br>Hari Ini </h4>
                          </div>
                        </div>
                      </div>
                    </div><span class="tag-hover-effect"><span class="dots-group"><span class="dots dots1"></span><span class="dots dots2 dot-small"></span><span class="dots dots3 dot-small"></span><span class="dots dots4 dot-medium"></span><span class="dots dots5 dot-small"></span><span class="dots dots6 dot-small"></span><span class="dots dots7 dot-small-semi"></span><span class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small">                    </span></span></span>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 xl-50 col-md-6 box-col-6">
                <div class="card gradient-secondary o-hidden">
                  <div class="card-body tag-card">
                    <div class="ecommerce-chart">
                      <div class="media ecommerce-small-chart">
                        <div class="small-bar text-center justify-content-center">
                            <img src="{{ asset('assets/icon/svg/transaction.svg') }}" width="50" height="50" alt="" style="color: white">
                        </div>
                        <div class="sale-chart">
                          <div class="media-body m-l-40 text-center">
                            <h6 class="f-w-100 m-l-10">{{ $transaksi_thisWeek }}</h6>
                            <h4 class="mb-0 f-w-700 m-l-10">Transaksi <br>Hari Ini</h4>
                          </div>
                        </div>
                      </div>
                    </div><span class="tag-hover-effect"><span class="dots-group"><span class="dots dots1"></span><span class="dots dots2 dot-small"></span><span class="dots dots3 dot-small"></span><span class="dots dots4 dot-medium"></span><span class="dots dots5 dot-small"></span><span class="dots dots6 dot-small"></span><span class="dots dots7 dot-small-semi"></span><span class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small">                    </span></span></span>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- Individual column searching (text inputs) Ends-->
      </div>
      <div class="row">
        <div class="col-xl-6 col-md-6 box-col-12">
            <div class="card">
              <div class="card-header creative-dots">
                <h5>Chart Pendapatan Minggu Ini</h5>
                <ul class="creative-dots">
                    <li class="bg-primary big-dot"></li>
                    <li class="bg-secondary semi-big-dot"></li>
                    <li class="bg-warning medium-dot"></li>
                    <li class="bg-info semi-medium-dot"></li>
                    <li class="bg-secondary semi-small-dot"></li>
                    <li class="bg-primary small-dot"></li>
                </ul>
              </div>
              <div class="card-body chart-block creative-dots">
                <canvas id="myBarGraph" width="742" height="371" style="width: 742px; height: 371px;"></canvas>
              </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 box-col-12">
            <div class="card">
                <div class="card-header no-border">
                    <h5>Transaksi Terakhir</h5>
                    <ul class="creative-dots">
                        <li class="bg-primary big-dot"></li>
                        <li class="bg-secondary semi-big-dot"></li>
                        <li class="bg-warning medium-dot"></li>
                        <li class="bg-info semi-medium-dot"></li>
                        <li class="bg-secondary semi-small-dot"></li>
                        <li class="bg-primary small-dot"></li>
                    </ul>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="icofont icofont-gear fa fa-spin font-primary"></i></li>
                            <li><i class="view-html fa fa-code font-primary"></i></li>
                            <li><i class="icofont icofont-maximize full-card font-primary"></i></li>
                            <li><i class="icofont icofont-minus minimize-card font-primary"></i></li>
                            <li><i class="icofont icofont-refresh reload-card font-primary"></i></li>
                            <li><i class="icofont icofont-error close-card font-primary"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="activity-table table-responsive recent-table">
                        <table class="table table-bordernone text-center">
                            <thead>
                                <tr>
                                    <th>No Transaksi</th>
                                    <th>Total Belanja</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recent_transaksi as $item=>$var)
                                <tr>
                                    <td>
                                        <h5 class="default-text mb-0 f-w-700 f-18">{{ $var->no_transaksi }}</h5>
                                    </td>
                                    <td><span class="badge badge-pill recent-badge f-12">Rp {{ number_format($var->sum_total, 0,',','.') }}</span></td>
                                    <td class="f-w-700 text-center">
                                        <a href="#"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
      </div>

      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">

                  </div>
              </div>
          </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
</div>


{{-- <div class="modal fade" id="addKategori" tabindex="-1" role="dialog" aria-labelledby="formModal"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="formModal">Tambah Mata Pelajaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="" method="post" action="{{ url('customer/kategori') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                            <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori">
                    </div>
                </div>
               <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
            </form>
        </div>
      </div>
   </div>
</div> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

<script src="{{ asset('assets/js/chart/chartjs/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart/chartjs/chart.custom.js') }}"></script>
    <script src="{{ asset('assets/js/chat-menu.js') }}"></script>
    <!-- Plugins JS Ends-->

<script>
    $(document).ready(function(){
        $('#produk_table').DataTable({
           "pageLength": 5
       });
    })
</script>
@endsection

@extends('layouts.templates')
@section('konten')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-header">
        <div class="row">
          <div class="col-lg-6 main-header">
            <h2>Detail<span>Toko</span></h2>
            <h6 class="mb-0">admin panel</h6>
          </div>
          <div class="col-lg-6 breadcrumb-right">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html"><i class="pe-7s-home"></i></a></li>
              <li class="breadcrumb-item">Master Data    </li>
              <li class="breadcrumb-item">Master Toko</li>
              <li class="breadcrumb-item active"> Detail Toko</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="edit-profile">
        <div class="row">
          <div class="col-lg-4">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title mb-0">Rekapitulasi</h4>
                <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
              </div>
              <div class="card-body">
                <div class="general-widget">
                    <div class="row">
                        <div class="col-sm-12 col-xl-12 col-lg-12 box-col-12">
                            <div class="card gradient-primary o-hidden">
                                <div class="b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="align-self-center text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg></div>
                                        <div class="media-body"><span class="m-0 text-white">Earnings</span>
                                            <h4 class="mb-0 counter">6659</h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database icon-bg"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-12 col-lg-12 box-col-12">
                            <div class="card gradient-secondary o-hidden">
                              <div class="b-r-4 card-body">
                                <div class="media static-top-widget">
                                  <div class="align-self-center text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg></div>
                                  <div class="media-body"><span class="m-0">Products</span>
                                    <h4 class="mb-0 counter">9856</h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag icon-bg"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-12 col-lg-12 box-col-12">
                            <div class="card gradient-warning o-hidden">
                              <div class="b-r-4 card-body">
                                <div class="media static-top-widget">
                                  <div class="align-self-center text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle text-white i"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                  </div>
                                  <div class="media-body"><span class="m-0 text-white">Messages</span>
                                    <h4 class="mb-0 counter text-white">893</h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle icon-bg"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-12 col-lg-12 box-col-12">
                            <div class="card gradient-info o-hidden">
                              <div class="b-r-4 card-body">
                                <div class="media static-top-widget">
                                  <div class="align-self-center text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus text-white i"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                                  </div>
                                  <div class="media-body"><span class="m-0 text-white">New User</span>
                                    <h4 class="mb-0 counter text-white">45631</h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus icon-bg"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <form class="card theme-form">
              <div class="card-header">
                <h4 class="card-title mb-0 text-center"><b>List Produk {{ $data['nama_toko'] }}</b></h4>
                <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
              </div>
              <div class="card-body">
                    <div class="row">
                        @foreach ($produk as $item=>$prod)
                            <div class="col-xl-4 col-sm-6 box-col-4a">
                                <div class="card bg-dark">
                                    <div class="product-box">
                                        <div class="product-img">
                                            @if ($prod->foto == NULL)
                                            <img src="{{ asset('assets/icon/default_product.jpg') }}" class="img-fluid" alt="" style="border-radius: 40px 40px 0 0; max-height: 350px">
                                        @else
                                            <img src="{{ asset('uploads/foto_produk/'. $prod->foto) }}" class="img-fluid" alt="" style="border-radius: 40px 40px 0 0; max-height: 350px">
                                        @endif
                                            <div class="product-hover">
                                                <ul>
                                                    <li><i class="icon-shopping-cart"></i></li>
                                                    <li><i class="icon-eye"></i></li>
                                                    {{-- <li><i class="icofont icofont-law-alt-2"></i></li> --}}
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-details">
                                            <h4>{{ $prod->nama_produk }}</h4>
                                            <p>{{ $prod->nama_kategori }}</p>
                                            <div class="product-price">
                                                Rp. {{ number_format($prod->harga, 0,",",".") }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $produk->links() }}
                    </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>

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

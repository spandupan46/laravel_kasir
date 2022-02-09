@extends('layouts.templates')

@section('konten')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-header">
        <div class="row">
          <div class="col-lg-6 main-header">
            <h2>Pricing</h2>
            <h6 class="mb-0">admin panel</h6>
          </div>
          <div class="col-lg-6 breadcrumb-right">     
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html"><i class="pe-7s-home"></i></a></li>
              <li class="breadcrumb-item">Apps</li>
              <li class="breadcrumb-item">ECommerce    </li>
              <li class="breadcrumb-item active">Pricing</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-12">
          <div class="card">
            <div class="card-header"> 
              <h5>Pricing Table With Ribbons</h5>
            </div>
            <div class="card-body pricing-card-design-3">
              <div class="row pricing-content-ribbons">
                  @foreach ($data as $item=>$key)
                    <div class="col-xl-4 col-lg-6 col-md-4">
                        <div class="pricing-block card text-center">
                            <svg x="0" y="0" viewBox="0 0 360 220">
                                <g>
                                <path fill="#7e37d8" d="M0.732,193.75c0,0,29.706,28.572,43.736-4.512c12.976-30.599,37.005-27.589,44.983-7.061                                          c8.09,20.815,22.83,41.034,48.324,27.781c21.875-11.372,46.499,4.066,49.155,5.591c6.242,3.586,28.729,7.626,38.246-14.243                                          s27.202-37.185,46.917-8.488c19.715,28.693,38.687,13.116,46.502,4.832c7.817-8.282,27.386-15.906,41.405,6.294V0H0.48                                          L0.732,193.75z"></path>
                                </g>
                                <text transform="matrix(1 0 0 1 69.7256 116.2686)" fill="#fff" font-size="60">{{ helper::CutJudul($key->harga, 3) }}</text>
                                <text transform="matrix(0.9566 0 0 1 197.3096 83.9121)" fill="#fff" font-size="29.0829">K, IDR</text>
                                <text transform="matrix(1 0 0 1 233.9629 115.5303)" fill="#fff" font-size="15.4128">/Bulan</text>
                            </svg>
                            <div class="pricing-inner">
                                <h3 class="font-primary">{{ $key->nama_produk }}</h3>
                                <ul class="pricing-inner">
                                  @if (helper::getDeskripsi($key->id) != NULL)                                      
                                    @foreach (helper::getDeskripsi($key->id) as $item=>$desk)
                                        <li>
                                            <h6><b>{{ $desk->deskripsi_produk }}</b></h6>
                                        </li>
                                    @endforeach    
                                  @endif
                                </ul>
                                <a href="{{ url('customer/harga/'.$key->id.'/bayar') }}">
                                    <button class="btn btn-primary btn-lg btn-pill" type="button" data-original-title="btn btn-primary btn-lg" title="">Subscribe</button>
                                </a>
                            </div>
                        </div>
                    </div>
                  @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
@endsection
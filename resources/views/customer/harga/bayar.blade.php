@extends('layouts.templates')
@section('konten')
    <div class="page-body">
        <div class="container-fluid">
        <div class="page-header">
            <div class="row">
            <div class="col-lg-6 main-header">
                <h2>Payment<span>Details</span></h2>
                <h6 class="mb-0">admin panel</h6>
            </div>
            <div class="col-lg-6 breadcrumb-right">     
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><i class="pe-7s-home"></i></a></li>
                <li class="breadcrumb-item">Apps    </li>
                <li class="breadcrumb-item">Ecommerce</li>
                <li class="breadcrumb-item active">Payment Details</li>
                </ol>
            </div>
            </div>
        </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid credit-card">
            <div class="row" id="elVue">
                <!-- Individual column searching (text inputs) Starts-->
                <div class="col-xl-6 box-col-12">
                    <div class="card height-equal">
                        <div class="card-header">
                        <h5>Credit card </h5>
                        </div>
                        <div class="card-body">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="pricing-block card text-center">
                                    <svg x="0" y="0" viewBox="0 0 360 220">
                                        <g>
                                        <path fill="#7e37d8" d="M0.732,193.75c0,0,29.706,28.572,43.736-4.512c12.976-30.599,37.005-27.589,44.983-7.061                                          c8.09,20.815,22.83,41.034,48.324,27.781c21.875-11.372,46.499,4.066,49.155,5.591c6.242,3.586,28.729,7.626,38.246-14.243                                          s27.202-37.185,46.917-8.488c19.715,28.693,38.687,13.116,46.502,4.832c7.817-8.282,27.386-15.906,41.405,6.294V0H0.48                                          L0.732,193.75z"></path>
                                        </g>
                                        <text transform="matrix(1 0 0 1 69.7256 116.2686)" fill="#fff" font-size="60">{{ helper::CutJudul($produk->harga, 3) }}</text>
                                        <text transform="matrix(0.9566 0 0 1 197.3096 83.9121)" fill="#fff" font-size="29.0829">K, IDR</text>
                                        <text transform="matrix(1 0 0 1 233.9629 115.5303)" fill="#fff" font-size="15.4128">/Bulan</text>
                                    </svg>
                                    <div class="pricing-inner">
                                        <h3 class="font-primary">{{ $produk->nama_produk }}</h3>
                                        <ul class="pricing-inner">
                                        @foreach (helper::getDeskripsi($produk->id) as $item=>$desk)
                                            <li>
                                                <h6><b>{{ $desk->deskripsi_produk }}</b></h6>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Individual column searching (text inputs) Ends-->
                <!-- Debit Card Starts-->
                <div class="col-xl-6 col-lg-12 col-md-6 box-col-6 debit-card">
                    <div class="card height-equal">
                        <div class="card-header">
                        <h5>Debit card </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                {{-- {{ dd($response) }} --}}

                                @foreach ($channel as $item=>$key)
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <button type="radio" @click.prevent="getCode()" value="{{ $key->code }}" class="form-control btn" name="op" style="box-sizing:border-box">{{ $key->name }}</button>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <button type="button" class="form-control btn btn-primary" @click.prevent="Bayar()">Bayar Sekarang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        var channel = new Vue({
            el: '#elVue',
            data : {
                id_transaksi: '',
                kode_pembayaran: '',
                code: '',
            },
            methods: {
                getCode: function(){
                    let code = event.target.getAttribute('value')

                    // var id = window.location.href.split('/').pop();
                    // console.log({{ $produk->id }})
                    localStorage.setItem('code', code);
                    

                },
                Bayar: function(){
                    // console.log(localStorage.getItem('code'))
                    let code = localStorage.getItem('code')
                    let id_produk = {{ $produk->id }}
                    let id_customer = {{ Auth::user()->id_customer }}

                    console.log(id_customer)

                    axios.post('{{ url("api/CodeTransaksi") }}', {code:code,id_produk:id_produk,id_customer:id_customer})
                    .then(response => {
                        // console.log(response.data)
                        Swal.fire({
                            title: 'Pesanan Sudah Dibuat!',
                            text: 'Mengarahkan Ke Halaman Pembayaran dalam 5 Detik',
                            icon: 'info',
                            confirmButtonText: 'Ok'
                            })

                        setTimeout(function() {
                            window.location.href = response.data
                        }, 5000); // 2 second
                    })
                    .catch(error=>{
                        console.log('error neh')
                    })
                }
            },
        })
    </script>
@endsection
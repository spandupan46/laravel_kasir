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
                        <div class="row">
                            <div class="col-md-4 text-center"><img class="img-fluid" src="../assets/images/ecommerce/card.png" alt=""></div>
                            <div class="col-md-8">
                            <form class="theme-form mega-form">
                                <div class="form-group">
                                <input class="form-control" type="text" placeholder="Card number">
                                </div>
                                <div class="form-group">
                                <input class="form-control" type="text" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                <input class="form-control" type="date">
                                </div>
                                <div class="form-group">
                                <input class="form-control" type="text" placeholder="Full Name">
                                </div>
                            </form>
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
                    // console.log(code)
                    
                    axios.post('{{ url("api/CodeTransaksi") }}', {code:code})
                    .then(response => {
                        console.log('ok')
                    })
                    .catch(error=>{
                        console.log('error')
                    })

                }
            },
        })
    </script>
@endsection
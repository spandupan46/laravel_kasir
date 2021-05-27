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
        {{-- <div class="row">
            <div class="col-xl-4 col-sm-6 box-col-6">
                <div class="card ecommerce-widget">
                    <div class="card-body support-ticket-font">
                        <div class="row">
                            <div class="col-5"><span>Order</span>
                                <h3 class="total-num counter">2563</h3>
                            </div>
                                <div class="col-7">
                                <div class="text-md-right">
                                    <ul>
                                    <li>Profit<span class="product-stts txt-success ml-2">8989<i class="icon-angle-up f-12 ml-1"></i></span></li>
                                    <li>Loss<span class="product-stts txt-danger ml-2">2560<i class="icon-angle-down f-12 ml-1"></i></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="progress-showcase">
                            <div class="progress sm-progress-bar">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 box-col-6">
                <div class="card ecommerce-widget">
                    <div class="card-body support-ticket-font">
                        <div class="row">
                            <div class="col-5"><span>Order</span>
                                <h3 class="total-num counter">2563</h3>
                            </div>
                                <div class="col-7">
                                <div class="text-md-right">
                                    <ul>
                                    <li>Profit<span class="product-stts txt-success ml-2">8989<i class="icon-angle-up f-12 ml-1"></i></span></li>
                                    <li>Loss<span class="product-stts txt-danger ml-2">2560<i class="icon-angle-down f-12 ml-1"></i></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="progress-showcase">
                            <div class="progress sm-progress-bar">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 box-col-6">
                <div class="card ecommerce-widget">
                    <div class="card-body support-ticket-font">
                        <div class="row">
                            <div class="col-5"><span>Order</span>
                                <h3 class="total-num counter">2563</h3>
                            </div>
                                <div class="col-7">
                                <div class="text-md-right">
                                    <ul>
                                    <li>Profit<span class="product-stts txt-success ml-2">8989<i class="icon-angle-up f-12 ml-1"></i></span></li>
                                    <li>Loss<span class="product-stts txt-danger ml-2">2560<i class="icon-angle-down f-12 ml-1"></i></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="progress-showcase">
                            <div class="progress sm-progress-bar">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row" id="idProd">
            <!-- Individual column searching (text inputs) Starts-->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($produk as $item=>$prod)
                                    <div class="col-xl-6 col-sm-6 box-col-4a">
                                        <div class="card bg-dark">
                                            <div class="product-box">
                                                <div class="product-img">
                                                    @if ($prod->foto == NULL)
                                                    <img class="img-fluid" src="{{ asset('assets/icon/default_product.jpg') }}" alt=""  style="border-radius: 40px 40px 0 0; max-height: 350px">
                                                @else
                                                    <img class="img-fluid" src="{{ asset('uploads/foto_produk/'. $prod->foto) }}" alt=""  style="border-radius: 40px 40px 0 0; max-height: 350px">
                                                @endif
                                                    <div class="product-">
                                                        <ul>
                                                            {{-- <li @click.prevent="addId()" :data-id="{{ $prod->id }}"><i class="icon-shopping-cart"></i></li> --}}
                                                            {{-- <li><i class="icon-eye"></i></li> --}}
                                                            {{-- <li><i class="icofont icofont-law-alt-2"></i></li> --}}
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-details">
                                                    <h4>{{ $prod->nama_produk }}</h4>
                                                    <p>{{ $prod->nama_kategori }}</p>
                                                    <div class="product-price d-flex">
                                                        <div class="col-md-6">
                                                            Rp. {{ number_format($prod->harga, 0,",",".") }}
                                                        </div>
                                                        <div class="col-md-6" >
                                                            <button class="btn btn-primary" @click.prevent="addId()" :data-id="{{ $prod->id }}">cart</button>
                                                        </div>
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
                    </div>
                </div>
                <div class="col-xl-6 xl-100 box-col-12 ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card o-hidden">
                                <div class="card-header">
                                    <h5>KERANJANG BELANJA</h5>
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
                                <div class="card-body p-0">
                                    <div class="table-responsive invoice-table" id="table">
                                        <table class="table table-bordered table-striped">
                                          <tbody>
                                            <tr class="text-center">
                                              <th class="item">
                                                <h5 class="p-2 mb-0">produk</h5>
                                              </th>
                                              <th class="Hours">
                                                <h5 class="p-2 mb-0">Jumlah</h5>
                                              </th>
                                              <th class="Rate">
                                                <h5 class="p-2 mb-0">Harga</h5>
                                              </th>
                                              <th class="subtotal">
                                                <h5 class="p-2 mb-0">Total Harga</h5>
                                              </th>
                                            </tr>
                                            <tr v-for="prod_list in produk_list" class="text-center justify-content-center">
                                                <td>
                                                    {{-- <label>Lorem Ipsum</label> --}}
                                                    <p class="m-0">@{{ prod_list.name }}</p>
                                                </td>
                                                <td class="d-inline-flex">
                                                    <div class=""><button style="border: none; border-radius: 10px" @click.prevent="minesCart()" :data-id="prod_list.id" > - </button></div>
                                                    <div class="" style="width: 30px; text-align: center">@{{ prod_list.quantity }}</div>
                                                    <div class=""><button style="border: none; border-radius: 10px" @click.prevent="plusCart()" :data-id="prod_list.id"  > + </button></div>
                                                    <div class="badge badge-danger ml-2" role="button">
                                                        <i class="fa fa-trash" @click.prevent="deleteCart()" :data-id="prod_list.id"></i>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="itemtext digits">@{{ prod_list.price }}</p>
                                                </td>
                                                <td class="d-inline-flex">
                                                    <p class="itemtext digits">@{{ (prod_list.quantity*prod_list.price) }}</p>
                                                </td>
                                                {{-- <td class="font-primary"><button class="badge badge-danger" @click.prevent="deleteCart()" :data-id="prod_list.id">@{{ (prod_list.quantity*prod_list.price) }}</button></td> --}}
                                            </tr>
                                            <tr>
                                              <td></td>
                                              <td></td>
                                              <td class="Rate">
                                                <h6 class="mb-0 p-2">Jumlah</h6>
                                              </td>
                                              <td class="payment digits">
                                                <h6 class="mb-0 p-2">@{{ harga_total }}</h6>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    {{-- <div class="user-status cart-table table-responsive">
                                        <table class="table table-bordernone">
                                            <thead>
                                                <tr class="text-center">
                                                    <th scope="col">Produk</th>
                                                    <th scope="col">Jumlah</th>
                                                    <th scope="col">Harga</th>
                                                    <th scope="col">Total Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="prod_list in produk_list" class="text-center">
                                                    <td class="f-w-600">@{{ prod_list.name }}</td>
                                                    <td class="d-inline-flex">
                                                        <div class=""><button style="border: none; border-radius: 10px" @click.prevent="minesCart()" :data-id="prod_list.id" > - </button></div>
                                                        <div class="" style="width: 30px; text-align: center">@{{ prod_list.quantity }}</div>
                                                        <div class=""><button style="border: none; border-radius: 10px" @click.prevent="plusCart()" :data-id="prod_list.id"  > + </button></div>
                                                    </td>
                                                    <td>
                                                        <div class="span badge badge-pill pill-badge-secondary">@{{ prod_list.price }}</div>
                                                    </td>
                                                    <td class="font-primary"><button class="badge badge-danger" @click.prevent="deleteCart()" :data-id="prod_list.id">@{{ (prod_list.quantity*prod_list.price) }}</button></td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr class="text-center">
                                                    <td colspan="3">Jumlah</td>
                                                    <td>@{{ harga_total }}</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div> --}}
                                    <div class="code-box-copy">
                                        <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head1" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card o-hidden">
                                <div class="card-header">
                                    <div class="row d-flex">
                                        <div class="col-md-6">
                                            <h5>TOTAL BELANJA</h5>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="text-center">@{{ harga_total }}</h5>
                                        </div>
                                    </div>
                                    <div class="row d-flex mt-3">
                                        <div class="col-md-6">
                                            <h5 class="align-middle mt-2">JUMLAH YANG DIBAYAR</h5>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="number" v-model="jumlah_uang" v-on:keyup="func_back" class="form-control text-center">
                                            {{-- <h5 class="text-center">@{{ jumlah_uang }}</h5> --}}
                                        </div>
                                    </div>
                                    <div class="row d-flex mt-3">
                                        <div class="col-md-6">
                                            <h5 class="align-middle mt-2">JUMLAH KEMBALIAN</h5>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="text-center">@{{ total_kembalian }}</h5>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary form-control" @click.prevent="addTransaksi()" :data-id="harga_total">Bayar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="user-status cart-table table-responsive">
                                        <table class="table table-bordernone">
                                            <thead>
                                                <tr>

                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="code-box-copy">
                                        <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head1" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Individual column searching (text inputs) Ends-->
        </div>

      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  {{-- <div class="card-body" id="appReverse"> --}}
                      {{-- <p>@{{ message }}</p>
                      <button v-on:click="reverseMessage">Reverse</button> --}}
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
    var app1 = new Vue({
        el: '#idProd',
        data: {
            id: '',
            produk: '',
            harga_total: '',
            jumlah_uang: '',
            total_kembalian: 0,
            produk_list: {},
        },created() {
            this.getData()
            this.getJumlah()
        },
        methods: {
            addId: function (){
                var id = event.target.getAttribute('data-id')
                axios.post('{{ url("kasir/transaksi/cart") }}', { id: id, })
                .then(response=> {
                    this.getData()
                    this.getJumlah()
                    // this.produk_list = this.getData()
                })
                .catch(error=>{
                    console.log(error);
                })
            },
            getData: function (){
                axios.get('{{ url("kasir/transaksi/getCart") }}')
                    .then(response=>{
                        let produk = response.data
                        this.produk_list = produk.data
                    })
                    .catch(error=>{
                        console.log(error)
                    })
            },
            getJumlah: function()
            {
                axios.get('{{ url("kasir/transaksi/getJumlah") }}')
                    .then(response=>{
                        let jumlah = response.data
                        // let string = numeral(jumlah).format('0,0')
                        // console.log(harga_total)
                        this.harga_total = jumlah.data
                    })
                    .catch(error=>{
                        console.log(error)
                    })
            },
            func_back: function(event)
            {
                let harga_produk = this.harga_total
                let jumlah = this.jumlah_uang

                let total_kembalian = (harga_produk - jumlah)

                // console.log(total_kembalian)
                this.total_kembalian = total_kembalian
            },
            minesCart: function()
            {
                var id = event.target.getAttribute('data-id')
                axios.post('{{ url("kasir/transaksi/minescart") }}', { id: id, })
                .then(response=> {
                    // this.produk_list = this.getData()
                    this.getData()
                    this.getJumlah()

                })
                .catch(error=>{
                    console.log(error);
                })
                // console.log(id);
            },
            plusCart: function()
            {
                var id = event.target.getAttribute('data-id')
                axios.post('{{ url("kasir/transaksi/pluscart") }}', { id: id, })
                .then(response=> {
                    // this.produk_list = this.getData()
                    this.getData()
                    this.getJumlah()

                })
                .catch(error=>{
                    console.log(error);
                })
                console.log(id);
            },
            deleteCart: function()
            {
                var id = event.target.getAttribute('data-id')

                axios.post('{{ url("kasir/transaksi/deletecart") }}', { id: id, })
                .then(response=> {
                    // this.produk_list = this.getData()
                    this.getData()
                    this.getJumlah()
                })
                .catch(error=>{
                    console.log(error);
                })
            },
            addTransaksi: function(){
                // var id = this.getJumlah()
                var id = event.target.getAttribute('data-id')
                // console.log(id)
                axios.post('{{ url("kasir/transaksi/addtransaksi") }}', {jumlah: id})
                .then(response=>{
                    if(response.data.status == 200){
                        console.log('200')
                        Swal.fire({
                            title: 'Sukses!',
                            text: 'Sukses membuat transaksi',
                            icon: 'success',
                            confirmButtonText: 'Ok'
                            })
                            this.total_kembalian = ''
                            this.jumlah_uang =  ''
                            this.getData()
                            this.getJumlah()
                    }else if(response.data.status == 404){
                        Swal.fire({
                            title: 'Error!',
                            text: 'Keranjang Belanja Kamu Kosong!!!',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                            })
                        // this.$swal('hellow')
                        console.log('404')
                    }else{
                        Swal.fire({
                            title: 'Error!',
                            text: 'Silahkan login terlebih dahulu',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                            })
                        console.log('401')
                    }
                }).catch(error =>{
                    Swal.fire({
                    title: 'Error!',
                    text: 'Gagal Menambah Pesanan',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                    })
                })
            }
        }
    })

</script>
@endsection

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
        <div class="col-xl-12 col-md-12 xl-100 box-col-12">
            <div class="card">
              <div class="card-header no-border">
                <h5>Riwayat Transaksi</h5>
            </div>
            <div class="card-body pt-0" id="data_riwayat">
                <div class="activity-table table-responsive recent-table selling-product">
                    <ul class="nav nav-tabs nav-material nav-primary" id="info-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="info-home-tab" @click.prevent="today()"  data-toggle="tab" href="#info-home" role="tab" aria-controls="info-home" aria-selected="true"><i class="icofont icofont-ui-home"></i>Home</a>
                          <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="profile-info-tab" @click.prevent="week()" data-toggle="tab" href="#info-profile" role="tab" aria-controls="info-profile" aria-selected="false"><i class="icofont icofont-man-in-glasses"></i>Profile</a>
                          <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="contact-info-tab" @click.prevent="month()" data-toggle="tab" href="#info-contact" role="tab" aria-controls="info-contact" aria-selected="false"><i class="icofont icofont-contacts"></i>Contact</a>
                          <div class="material-border"></div>
                        </li>
                    </ul>
                  <table class="table table-bordernone text-center">
                        <thead>
                            <tr>
                                <th>Nomor Transaksi</th>
                                <th>Total Belanja</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item=>$var)
                                <tr>
                                    <td>
                                        <h5 class="default-text mb-0 f-w-700 f-18">{{ $var->no_transaksi }}</h5>
                                    </td>
                                    <td><span class="badge badge-pill recent-badge f-12">Rp. {{ number_format($var->sum_total,0,',','.') }}</span></td>
                                    <td class="text-center">
                                        <a class="btn btn-primary" data-toggle="collapse" href="#detail-{{ $var->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            Link with href
                                          </a>
                                        {{-- <a href="#" data-toggle="collapse" href="#detail-{{ $var->id }}" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-eye"></i></a> --}}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <div class="collapse" id="detail-{{ $var->id }}">
                                            <div class="card card-body text-center">
                                                {{ $var->no_transaksi }}
                                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                  </table>
                </div>
                <div class="code-box-copy">
                  <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head5" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
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
    var app1= new Vue({
        el: '#data_riwayat',
        data: {
            list_riwayat: '',
        },created() {

        },methods: {
            today: function(){
                console.log('today')
            },
            week: function(){
                console.log('week')
            },
            month: function(){
                console.log('month')
            }
        },
    })
</script>

@endsection

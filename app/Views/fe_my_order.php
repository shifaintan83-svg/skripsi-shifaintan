<?= $this->extend('layout/template_fe') ?>
 
<?= $this->section('content') ?>
 <style>
    table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
        margin: 20px 0;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #007BFF;
        color: white;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    td:last-child {
        text-align: center;
    }

    @media (max-width: 600px) {
        table, thead, tbody, th, td, tr {
            display: block;
        }

        tr {
            margin-bottom: 15px;
        }

        td {
            text-align: right;
            position: relative;
            padding-left: 50%;
        }

        td::before {
            content: attr(data-label);
            position: absolute;
            left: 15px;
            font-weight: bold;
            text-align: left;
        }

        th {
            display: none;
        }
    }
</style>


    <!-- Page Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5">
        <div class="container py-5">
            <div class="row align-items-center py-4">
                <div class="col-md-6 text-center text-md-left">
                    <h1 class="display-4 mb-4 mb-md-0 text-secondary text-uppercase">Pesanan Saya</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn btn-sm btn-outline-light" href="">Beranda</a>
                        <i class="fas fa-angle-double-right text-light mx-2"></i>
                        <a class="btn btn-sm btn-outline-light disabled" href="">Pesanan Saya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col-lg-6">
                    <h6 class="text-secondary font-weight-semi-bold text-uppercase mb-3">Pesanan Saya</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-12">
                   
                    <div class="bg-light rounded p-5">
                        <table>
                            <tr>
                                <th>Nomor</th>
                                <th>Layanan</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        <?php 
                        $nomor =1;
                        foreach ($list_pemesanan as $key => $value) { ?>
                            <tr>
                                <td><?=$nomor++?></td>
                                <td><?=$value['layanan']?></td>
                                <td><?=number_format($value['biaya'])?></td>
                                <td><?=$value['status_order']?></td>
                                <td>
                                    <?php if($value['status_order'] =='DRAFT'){?>
                                    <a onclick="pembayaran(<?=$value['biaya']?>,<?=$value['id']?>)"class="btn btn-primary">Bayar</a>
                                    <a href="/delete_myorder/<?=$value['id']?>" class="btn btn-danger">Hapus</a>
                                    
                                    <?php }?>
                                </td>


                            </tr>
                        <?php } ?>
                        </table>
                        
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <!-- Blog End -->


        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-IxP-i0oe3UfVa6eO"></script>	
<script type="text/javascript">
	
	function pembayaran(total,id) {

        $.ajax({
            type: "GET",
            url: '/pembayaran/'+total,
            context: document.body
        }).done(function(data) {
            console.log(data)
            var response = JSON.parse(data)
            var snapToken = response.snapToken
            var va_number = '';
            var bank = '';
            var transaction_status = '';
            snap.pay(snapToken, {
            onSuccess: function(result){
                transaction_status = result.transaction_status;
                if(result.payment_type == 'bank_transfer'){
                    va_number = result.va_numbers[0].va_number;
                    bank = result.va_numbers[0].bank;
                }else if(result.payment_type == 'echannel'){
                    va_number = result.bill_key;
                    bank = result.biller_code;
                }else if(result.payment_type == 'cstore'){
                    va_number = result.payment_code;
                }
                $.ajax({
                    type: "GET",
                    url: '/update_pembayaran/'+id,
                    context: document.body
                    }).done(function(data) {
                        location.reload();
                    })
            },
            // Optional
            onPending: function(result){
                console.log(result)
                transaction_status = result.transaction_status;
                if(result.payment_type == 'bank_transfer'){
                    va_number = result.va_numbers[0].va_number;
                    bank = result.va_numbers[0].bank;
                }else if(result.payment_type == 'echannel'){
                    va_number = result.bill_key;
                    bank = result.biller_code;
                }else if(result.payment_type == 'cstore'){
                    va_number = result.payment_code;
                }
                $.ajax({
                    type: "POST",
                    url: '/update_payment',
                    data: { 
                        va_number: va_number,
                        bank: bank,
                        order_id_midtrans: result.order_id,
                        transaction_status: transaction_status,
                        nama: nama,
                        telepon: telepon,
                        alamat: alamat
                    },
                    context: document.body
                    }).done(function(data) {
                        location.reload();
                    })
            },
        
            // Optional
            onError: function(result){
                
                swal("Pembayaran Gagal", "Pembayaran Gagal", "error");
            },
            });
            
            
        })	
    }
	
</script>
<?= $this->endSection() ?>


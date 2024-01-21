<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struk</title>
    <style>
      .border-struck{
          height: auto;
          width: 390px;
          border: 3px solid #1d1d1d;
          border-radius: 10px;
          padding-bottom: 20px;
          padding-left: 7px;
          padding-right: 7px;
          padding-top: 20px;
          margin-top: 20px;
      }
      td{
         margin-top: 10px;
         padding-left: 10px;
         padding-right: 10px;
      }
      th{
         margin-top: 10px;
         padding-left: 10px;
         padding-right: 10px;
      }
  </style>
</head>
<body onload="window.print()">
    <center>
      <div class="border-struck">
         <table width :100%  id ="dataTable" class="table table-hover">
            <tr align="center">
                <th colspan="8">Marhas Mart</th>
             </tr>
    
             <tr>
                <th colspan="8">Petugas : {{$transaksi->User->nama}}</th>
             </tr>
    
             <tr>
                <th colspan="8" align="center">Tanggal : <?php echo date("d-F-Y")?></th>
             </tr>
    
             <tr>
                <td colspan="8"><hr></td>
             </tr>
             <tr>
               <td colspan="3">Kode pembayaran</td>
               <td align="right">:</td>
               <td>{{$transaksi->id}}</td>
            </tr>
             <tr>
               <td colspan="3">Kode Pesanan</td>
               <td align="right">:</td>
               <td>{{$transaksi->id_pesanan}}</td>
            </tr>
             <tr>
                <td colspan="3">Total Harga</td>
                <td align="right">:</td>
                <td>{{$transaksi->Detail_transaksi->total_harga}}</td>
             </tr>
    
             <tr>
                <td colspan="3">Status</td>
                <td align="right">:</td>
                <td>{{$transaksi->status}}</td>
             </tr>
    
             <tr>
                <td colspan="3">Keterangan</td>
                <td align="right">:</td>
                <td>{{$transaksi->keterangan}}</td>
             </tr>
             
             <tr>
               <td colspan="3">Barang</td>
               <td align="right">:</td>
               <td>{{$transaksi->Detail_transaksi->Produk->nama}}</td>
             </tr>

             <tr>
               <td colspan="3">Harga</td>
               <td align="right">:</td>
               <td>Rp.{{number_format($transaksi->Detail_transaksi->Produk->harga,2,',','.')}}</td>
             </tr>

             <tr>
                <td colspan="3">Total Bayar</td>
                <td align="right">:</td>
                <td>Rp.{{number_format($transaksi->total_bayar,2,',','.')}}</td>
             </tr>
    
             <tr>
                <td colspan="3">Kembalian</td>
                <td align="right">:</td>
                <td>Rp.{{number_format($transaksi->kembalian,2,',','.')}}</td>
             </tr>
    
             <tr>
                <td colspan="3">Pemesan</td>
                <td align="right">:</td>
                <td>{{$transaksi->Detail_transaksi->Customer->nama}}</td>
             </tr>
    
             
             <tr>
               <td colspan="8"><hr></td>
            </tr>
            <tr>
               <td colspan="8" align="center">
                  terimakasih sudah berbelanja di E-comerce kami.
               </td>
            </tr>
            <tr>
               <th colspan="8" align="center">
                  mohon simpan dan jaga nota ini sebgai bukti transaksi!
               </th>
            </tr>
            <tr>
               <td colspan="2" align="center">
                  Kontak petugas
               </td>
               <td align="center">
                 :
               </td>
               <td colspan="3" align="left">
                 {{$transaksi->User->no_telp}}
               </td>
           </tr>
        </table>
      </div>
   </center>
</body>
</html>
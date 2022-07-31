<div class="container-fluid">
	<h4>Detail Pesanan <div class="btn btn-sm btn-success">No. Invoice: <?php echo $invoice->id_invoice ?></div></h4>

		<?php 
		$total = 0;
		foreach ($pesanan as $psn) : 
			$subtotal	= $psn->jumlah * $psn->harga;
			$total 	   += $subtotal;
		 ?>
		<div class="row">	
			<div class="col-md-4">	
	   				<img src="<?php echo base_url().'/uploads/'.$psn->gambar ?>" class="card-img-top" >
	   		</div>
	   		<div class="col-md-8">	
	   			<table class="table">
	   				<tr>
	   					<td>ID Barang</td>
	   					<td><strong><?php echo $psn->id_brg ?></strong></td>
	   				</tr>
	   				<tr>
	   					<td>Nama Barang</td>
	   					<td><strong><?php echo $psn->nama_brg ?></strong></td>
	   				</tr>
	   				<tr>
	   					<td>Jumlah Pesanan</td>
	   					<td><strong><?php echo $psn->jumlah ?></strong></td>
	   				</tr>
	   				<tr>
	   					<td>Harga Satuan</td>
	   					<td><strong><?php echo number_format($psn->harga,0,',','.') ?></strong></td>
	   				</tr>
	   				<tr>
	   					<td>Sub Total</td>
	   					<td><strong><div class="btn btn-sm btn-success">Rp. <?php echo number_format($subtotal,0,',','.') ?></div></strong></td>
	   				</tr>
					
					<tr>
						<td>Grand Total</td>
						<td>Rp. <?php echo number_format($total,0,',','.') ?></td>
					</tr>
					<tr>
						<td><a href="<?php echo base_url('admin/invoice/index') ?>"><div class="btn btn-sm btn-primary">Kembali</div></a></td>
					</tr>
	   			</table>
	   		</div>
		</div>
		<?php endforeach; ?>

		

	</table>

	
</div>
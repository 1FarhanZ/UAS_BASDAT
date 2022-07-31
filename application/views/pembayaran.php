<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="btn btn-sm btn-success">
				<?php 
				$grand_total = 0;
				if ($keranjang = $this->cart->contents())
				{
					foreach ($keranjang as $item)
					{
						$grand_total = $grand_total + $item['subtotal'];
					}	

				echo "Total Belanja Anda : Rp. ".number_format($grand_total,0,',','.');
				 ?>
			</div><br><br>

			<h3>Input Alamat Pengiriman dan Pembayaran</h3>
			
			<?php echo form_open_multipart('dashboard/proses_pesanan'); ?>
				
				<div class="form-group">
					<label>Nama Lengkap</label>
					<input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control">
				</div>
				<div class="form-group">
					<label>Alamat Lengkap</label>
					<input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
				</div>
				<div class="form-group">
					<label>Nomor Telepon</label>
					<input type="text" name="no_telp" placeholder="Nomor Lengkap Anda" class="form-control">
				</div>
				<div class="form-group">
					<label>Jasa Pengiriman</label>
					<select class="form-control">
						<option>JNE</option>
						<option>J&T</option>
						<option>TIKI</option>
						<option>POS Indonesia</option>
						<option>Gojek</option>
						<option>Grab</option>
					</select>
				</div>
				<div class="form-group">
					<label>Pilih Bank</label>
					<select class="form-control">
						<option>BCA - 8735089231 an MileStyle</option>
						<option>BNI - 1734489226 an MileStyle</option>
						<option>BRI - 561532923173912 an MileStyle</option>
						<option>MANDIRI - 1732089231542 an MileStyle</option>
					</select>
				</div>
				<div class="form-group">
					<label>Bukti Pembayaran</label><br>
					<input type="file" name="gambar" class="form-control">
				</div>
				<button type="submit" class="btn btn-sm btn-primary">Saya sudah membayar</button>
				<br><br>
			<?php echo form_close(); ?>

			<?php 
			}else{
				echo "Keranjang Belanja Anda Masih kosong";
			}
			 ?>
		</div>

		<div class="col-md-2"></div>
	</div>


</div>
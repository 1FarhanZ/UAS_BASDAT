<div class="container-fluid">
	<section class="content">
		<h3><strong><i class="fas fa-search-plus"></i> DETAIL DATA BARANG</strong></h4>

		<table class="table">
			<tr>
				<th>Nama Barang</th>
				<td><?php echo $detail->nama_brg ?></td>
			</tr>
			<tr>
				<th>Keterangan</th>
				<td><?php echo $detail->keterangan ?></td>
			</tr>
			<tr>
				<th>Kategori</th>
				<td><?php echo $detail->kategori ?></td>
			</tr>
			<tr>
				<th>Harga</th>
				<td><?php echo $detail->harga ?></td>
			</tr>
			<tr>
				<th>Stok</th>
				<td><?php echo $detail->stok ?></td>
			</tr>
			<tr>
				<td>
					<img src="<?php echo base_url() ?>uploads/<?php echo $detail->gambar; ?>" width="200" height="250">
				</td>
			</tr>

		</table>
	</section>
</div>
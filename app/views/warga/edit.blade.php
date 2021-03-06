@extends('layout')

@section('content')
<div class="col-md-12">
	<h2 class="page-header">Edit Data Warga</h2>

	{{ HTML::ul($errors->all()) }}

	{{ Form::model($warga, array('route' => array('warga.update', $warga->id), 'method' => 'PUT')) }}

	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">Data Utama</div>
				<div class="panel-body">
					<div class="form-group">
						{{ Form::label('nama', 'Nama Kepala Rumah Tangga (KRT)') }}
						{{ Form::text('nama_krt', null, array('class' => 'form-control')) }}
					</div>

					<div class="form-group">
						{{ Form::label('no_kk', 'No Kartu Keluarga') }}
						{{ Form::text('no_kk', null, array('class' => 'form-control')) }}
					</div>

					<div class="form-group">
						{{ Form::label('no_kps', 'No Kartu Perlindungan Sosial (KPS)') }}
						{{ Form::text('no_kps', null, array('class' => 'form-control')) }}
					</div>

					<div class="form-group">
						{{ Form::label('nama_pasangan_krt', 'Nama Pasangan KRT') }}
						{{ Form::text('nama_pasangan_krt', null, array('class' => 'form-control')) }}
					</div>

					<div class="form-group">
						{{ Form::label('jml_anggota_keluarga', 'Jumlah Anggota Keluarga') }}
						{{ Form::input('number', 'jml_anggota_keluarga', null, array('class' => 'form-control')) }}
					</div>

					<div class="form-group">
						{{ Form::label('propinsi', 'Propinsi') }}
						{{ Form::text('propinsi', null, array('class' => 'form-control')) }}
					</div>					

					<div class="form-group">
						{{ Form::label('kabupaten_kota', 'Kabupaten / Kota') }}
						{{ Form::text('kabupaten_kota', null, array('class' => 'form-control')) }}
					</div>					

					<div class="form-group">
						{{ Form::label('kelurahan_desa', 'Kelurahan / Desa') }}
						{{ Form::text('kelurahan_desa', null, array('class' => 'form-control')) }}
					</div>

					<div class="form-group">
						{{ Form::label('rt', 'RT') }}
						{{ Form::text('rt', null, array('class' => 'form-control')) }}
					</div>

					<div class="form-group">
						{{ Form::label('rw', 'RW') }}
						{{ Form::text('rw', null, array('class' => 'form-control')) }}
					</div>

					<div class="form-group">
						{{ Form::label('kode_pos', 'Kode Pos') }}
						{{ Form::text('kode_pos', null, array('class' => 'form-control')) }}
					</div>

					<div class="form-group">
						{{ Form::label('alamat', 'Alamat Lengkap') }}
						{{ Form::text('alamat', null, array('class' => 'form-control')) }}
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">Kriteria Kemiskinan</div>
				<div class="panel-body">
				
				<?php $selectedValues = Array(); ?>
				
				@foreach($warga->nilai as $nilai)
					<?php $selectedValues = array_merge($selectedValues, 
						array( 
							'k'.$nilai->kriteria->id => 'n'.$nilai->id,
							));
					?>
				@endforeach

				@foreach($kriteria as $krit)
					<?php $values = array('0'=> 'Pilih Parameter'); ?>
					@foreach($krit->nilai as $nil)
						<?php 
							$option = "n".$nil->id;
							$values = array_merge($values, array($option => $nil->nama)); 
						?>
					@endforeach

					<?php 
						$key = 'k'.$krit->id;
						$selected = array_key_exists($key, $selectedValues) ? $selectedValues[$key] : null;
					?>

					<div class="form-group">
						{{ Form::label($krit->nama, $krit->nama) }}
						{{ Form::select('k'.$krit->id, $values, $selected, array('class' => 'form-control')) }}
					</div>			
				@endforeach
				</div>
			</div>
		</div>

		<div class="col-md-12">
		{{ Form::submit('Perbaharui', array('class' => 'btn btn-primary pull-right')) }}
		{{ Form::close() }}
		</div>
	</div>
</div>
@stop
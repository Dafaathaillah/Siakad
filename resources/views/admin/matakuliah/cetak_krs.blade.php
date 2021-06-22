<html>
<head>
	<title>SIAKADS</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
	integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
		
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
		
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"crossorigin="anonymous">
		
	</script>
</head>
<body>
	@php $model = new App\Models\User() @endphp
	<div class="container">
	<div class="row">
	<div class="col-lg-12margin-tb">
		<div class="pull-leftmt-2">
			<h2>KARTU RENCANA STUDY</h2>
		</div>
		<p align="center">DPA : {{$dosen->nama_dosen}}</p>
		<p align="center">KELAS : {{$kelas->nama_kelas}}</p>
		<p align="center">NAMA : {{$mhs->nama_mahasiswa}}</p>
		<p align="center">NIM : {{$mhs->nim}}</p>
</div>
</div>


<table class="table table-bordered">

<tr>
	<th>Mata Kuliah</th>
	<th>SKS</th>
	<th>Semester</th>
</tr>
@foreach($data as $dt)
@php $chek = $model->pdfMk($dt->id_matakuliah) @endphp
<tr>
	<td>{{$chek->nama_mata_kuliah}}</td>
	<td>{{$chek->sks}}</td>
	<td>{{$chek->semester}}</td>
</tr>
@endforeach
</table>
</div>
</body>
</html>
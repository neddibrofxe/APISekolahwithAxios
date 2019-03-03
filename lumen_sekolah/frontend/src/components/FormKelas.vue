<template>
	<div>
		<h1>Form Kelas</h1>
		<form>
			<table width=100%>
				<tr>
					<td>Nama Kelas</td>
					<td><input type='text'></td>
				</tr>
				<tr>
					<td>Jurusan</td>
					<td><input type='text'></td>
				</tr>
				<tr>
					<td>Jumlah Murid</td>
					<td><input type='text'></td>
				</tr>
				<tr>
					<td></td>
					<td><button type='submit'>Simpan</button></td>
				</tr>

			</table>
		</form>
		<div id="app">
    		<router-link to="/kelas">Data Kelas</router-link>
    		<router-view/>
  		</div>
	</div>
</template>

<script>
	export default {
		
	}
</script>
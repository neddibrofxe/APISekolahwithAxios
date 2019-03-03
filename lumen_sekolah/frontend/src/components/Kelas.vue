<template>
	<div>
		<h1>Data Kelas</h1>
		<table width=100%>
			<tr>
				<th>No</th>
				<th>Nama Kelas</th>
				<th>Jurusan</th>
				<th>Jumlah Murid</th>
			</tr>
			<tr>
				<td>1</td>
				<td>XII RPL 3</td>
				<td>RPL</td>
				<td>3</td>
			</tr>
			<tr>
				<td>2</td>
				<td>XII RPL 2</td>
				<td>RPL</td>
				<td>0</td>
			</tr>
			<tr>
				<td>3</td>
				<td>XII RPL 1</td>
				<td>RPL</td>
				<td>0</td>
			</tr>
		</table>
		<div id="app">
    		<router-link to="/formkelas">Form Kelas</router-link>
    		<router-view/>
  		</div>
	</div>
</template>

<script>
	export default {
		
	}
</script>
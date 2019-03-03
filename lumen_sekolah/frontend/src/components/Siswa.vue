<template>
	<div>
		<router-link to="/siswa/create">Add Data</router-link>
		<h1>Data Siswa</h1>
		<table width=100%>
			<tr>
				<th>No</th>
				<th>NIS</th>
				<th>Nama</th>
				<th>JK</th>
				<th>Action</th>
			</tr>
			<tr v-for="(siswa, i) in data_siswa" :key="i">
				<td>{{i+1}}</td>
				<td>{{siswa.nis}}</td>
				<td>{{siswa.nama_lengkap}}</td>
				<td>{{siswa.jenis_kelamin}}</td>
				<td>
					<router-link :to="'/siswa/' + siswa.id">Edit</router-link>
					<button @click="deleteRow(siswa.id)">Delete</button>
				</td>
			</tr>
		</table>
	</div>
</template>

<script>
	import {api} from '@/helper/api'

	export default {
		name: 'Siswa',
		data(){
			return{
				data_siswa:[]
			}
		},
		mounted(){
			this.get()
		},
		methods:{
			get(){
				api.get('siswa').then(res => {
					if (res.data.status === 'success') {
						this.data_siswa = res.data.result
					}else{
						console.log(res.data.message)
					}
				}).catch(err=>{
					console.log(err)
				})
			},
			deleteRow(id){
				api.delete('siswa/'+id).then(res=>{
					if (res.data.status === 'success') {
						this.get()
					}else{
						console.log(res.data.message)
					}
				}).catch(err=>{
					console.log(err)
				})
			}
		}
	}
</script>
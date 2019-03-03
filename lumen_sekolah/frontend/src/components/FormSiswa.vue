<template>
	<div>
		<h1>Form Siswa</h1>
		<form @submit.prevent="submitForm">
			<div>
				<label>NIS</label>
				<input type="text" v-model="siswa.nis">
			</div>
			<div>
				<label>Nama</label>
				<input type="text" v-model="siswa.nama_lengkap">
			</div>
			<div>
				<label>Jenis Kelamin</label>
				<select v-model="siswa.jenis_kelamin">
					<option value="">Pilih Jenis Kelamin</option>
					<option value="L">Laki - laki</option>
					<option value="P">Perempuan</option>
				</select>
			</div>
			<div>
				<label>Alamat</label>
				<textarea v-model="siswa.alamat"></textarea>
			</div>
			<button type="submit">Save</button>
		</form>
	</div>
</template>

<script>
	import {api} from '@/helper/api'

	export default{
		name: 'FormSiswa',
		data(){
			return{
				siswa: {
					id : null,
					nis: '',
					nama: '',
					jenis_kelamin: '',
					alamat: ''

				}
			}
		},
		mounted (){
			let id = this.$route.params.id

			if(id){
				api.get('/siswa/'+id).then(res => {
					this.siswa = res.data.result
				})
			}
		},
		methods:{
			submitForm(){
				let data = this.siswa
				let url = 'siswa'

				if (this.siswa.id) {
					url += '/' + this.siswa.id
				}

				api.post(url, data).then(res =>{
					if (res.data.status === 'success') {
						this.$router.push('/siswa')
					}else{
						console.log(res.data.message)
					}
				}).catch(err =>{
					console.log(err)
				})
			}
		}
	}
</script>
<?php
class Mahasiswa{
	private $_db = null;
	private $_formItem = [];
	public function __construct(){
		$this->_db = DB::getInstance();
	}
	public function validasi($formMethod){
		$validate = new Validate($formMethod);
		$this->_formItem['nama_mahasiswa'] = $validate->setRules('nama_mahasiswa',
			'Nama Mahasiswa', [
			'required' => true,
			'sanitize' => 'string'
		]);
		$this->_formItem['alamat_mahasiswa'] = $validate->setRules('alamat_mahasiswa',
			'Alamat Mahasiswa', [
			'required' => true,
			'sanitize' => 'string'
		]);
		if(!$validate->passed()) {
			return $validate->getError();
		}
	}
	public function getItem($item){
		return isset($this->_formItem[$item]) ? $this->_formItem[$item] : '';
	}
	public function insert(){
		$newMahasiswa = [
			'Nama' => $this->getItem('nama_mahasiswa'),
			'Alamat' => $this->getItem('alamat_mahasiswa')
		];
		return $this->_db->insert('mahasiswa',$newMahasiswa);
	}
	public function generate($id_mahasiswa){
		$result = $this->_db->getWhereOnce('mahasiswa',['ID','=',$id_mahasiswa]);
		foreach ($result as $key => $val) {
			$this->_formItem[$key] = $val;
		}
	}
	public function update($id_mahasiswa){
		$newMahasiswa = [
			'Nama' => $this->getItem('nama_mahasiswa'),
			'Alamat' => $this->getItem('alamat_mahasiswa')
		];
		$this->_db->update('mahasiswa',$newMahasiswa,['ID','=',$id_mahasiswa]);
	}
	public function delete($id_mahasiswa){
		$this->_db->delete('mahasiswa',['ID','=',$id_mahasiswa]);
	}
}
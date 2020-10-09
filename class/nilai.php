<?php
class Nilai{
	private $_db = null;
	private $_formItem = [];
	public function __construct(){
		$this->_db = DB::getInstance();
	}
	public function validasi($formMethod){
		$validate = new Validate($formMethod);
		$this->_formItem['nilai'] = $validate->setRules('nilai',
			'Nilai Mahasiswa', [
			'required' => true,
			'sanitize' => 'int'
		]);
		if(!$validate->passed()) {
			return $validate->getError();
		}
	}
	public function getItem($item){
		return isset($this->_formItem[$item]) ? $this->_formItem[$item] : '';
	}
	public function insert(){
		$newNilai = [
			'ID_mahasiswa' => $this->getItem('nama_mahasiswa'),
			'ID_mata_kuliah' => $this->getItem('mata_kuliah'),
			'Nilai' => $this->getItem('nilai'),
			'Keterangan' => $this->getItem('keterangan'),
		];
		return $this->_db->insert('nilai',$newNilai);
	}
	public function generate($id_mahasiswa){
		$result = $this->_db->getWhereOnce('mahasiswa',['ID','=',$id_mahasiswa]);
		foreach ($result as $key => $val) {
			$this->_formItem[$key] = $val;
		}
	}
	public function update($id_mahasiswa){
		$newNilai = [
			'ID_mahasiswa' => $this->getItem('nama_mahasiswa'),
			'ID_mata_kuliah' => $this->getItem('mata_kuliah'),
			'Nilai' => $this->getItem('nilai'),
			'Keterangan' => $this->getItem('keterangan'),
		];
		$this->_db->update('mahasiswa',$newMahasiswa,['ID','=',$id_mahasiswa]);
	}
	public function delete($id_mahasiswa){
		$this->_db->delete('mahasiswa',['ID','=',$id_mahasiswa]);
	}
}
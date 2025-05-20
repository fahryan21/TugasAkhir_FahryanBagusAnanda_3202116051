<?php
namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    // Nama kolom di tabel harus sesuai dengan yang ada di database
    protected $allowedFields = [
        'id_kategori', 'nama_produk', 'gambar_produk', 'stok', 'terjual', 'harga', 'status_produk', 'deskripsi'
    ];

    // Method untuk mengambil produk berdasarkan id
    public function getProduk($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }

        return $this->asArray()->where(['id_produk' => $id])->first();
    }

    // Method untuk mengambil sejumlah produk terbatas
    public function getLimitedProduk($limit)
    {
        return $this->asArray()->orderBy('id_produk', 'DESC')->findAll($limit);
    }

    // Method untuk mengambil produk berdasarkan kategori
    public function getProdukByKategori($id_kategori)
    {
        return $this->where('id_kategori', $id_kategori)->findAll();
    }

    // Method untuk mengambil produk beserta nama kategori
    public function getProdukWithKategori()
    {
        return $this->select('produk.*, kategori.nama_kategori')
                    ->join('kategori', 'kategori.id_kategori = produk.id_kategori')
                    ->findAll();
    }

    // Method untuk mengambil produk yang hanya aktif
    public function getActiveProduk()
    {
        return $this->where('status_produk', 'aktif')->findAll();
    }

    // Method untuk mencari produk berdasarkan nama atau deskripsi
    public function searchProduk($keyword)
    {
        return $this->like('nama_produk', $keyword)
                    ->orLike('deskripsi', $keyword)
                    ->findAll();
    }

    // Method untuk menghapus produk
    public function delete($id = null, $purge = false)
    {
        if ($id === null) {
            return false;
        }

        // Periksa apakah produk dapat dihapus
        if ($this->canDelete($id)) {
            return $this->builder()->where('id_produk', $id)->delete();
        }

        // Produk tidak bisa dihapus karena adanya referensi di tabel lain
        return false;
    }

    // Method untuk memeriksa apakah produk dapat dihapus
    private function canDelete($id)
    {
        // Cek referensi di tabel lain, misalnya:
        // Cek apakah produk terkait dengan pemesanan
        $builder = $this->db->table('retur');
        $builder->where('id_pemesanan', $id);
        $result = $builder->countAllResults();

        // Jika ada referensi, produk tidak bisa dihapus
        return $result === 0;
    }
}

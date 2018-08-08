<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Inovasi;

/**
 * InovasiSearch represents the model behind the search form of `app\models\Inovasi`.
 */
class InovasiSearch extends Inovasi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'kategori_id', 'jenis_inovasi_id', 'kelompok_inovator_id', 'tahun_inisiasi', 
                'tahun_implementasi', 'teknik_validasi_id', 'status_inovasi_id', 'jumlah_dilihat', 
                'jumlah_diunduh', 'member_id', 'kabkota_id', 'provinsi_id'], 'integer'],
            [['nama_inovasi', 'produk_inovasi', 'penggagas', 'deskripsi', 'nama_instansi', 'unit_instansi', 'faktor_pendorong', 'faktor_penghambat', 'tahapan_proses', 'output', 'outcome', 'manfaat', 'prasyarat_replikasi', 'kontak', 'sumber', 'gambar_ilustrasi', 'tanggal_inovasi', 'waktu_dibuat', 'waktu_diterbitkan', 'waktu_diubah'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */

    public function getQuerySearch($params=[])
    {
        $query = Inovasi::find();
        $query->orderBy(['waktu_dibuat' => SORT_DESC]);

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'provinsi_id' => $this->provinsi_id,
            'kabkota_id' => $this->kabkota_id,
            'kategori_id' => $this->kategori_id,
            'jenis_inovasi_id' => $this->jenis_inovasi_id,
            'kelompok_inovator_id' => $this->kelompok_inovator_id,
            'tahun_inisiasi' => $this->tahun_inisiasi,
            'tahun_implementasi' => $this->tahun_implementasi,
            'teknik_validasi_id' => $this->teknik_validasi_id,
            'status_inovasi_id' => $this->status_inovasi_id,
            'jumlah_dilihat' => $this->jumlah_dilihat,
            'jumlah_diunduh' => $this->jumlah_diunduh,
            'tanggal_inovasi' => $this->tanggal_inovasi,
            'member_id' => $this->member_id,
            'waktu_dibuat' => $this->waktu_dibuat,
            'waktu_diterbitkan' => $this->waktu_diterbitkan,
            'waktu_diubah' => $this->waktu_diubah,
        ]);

        $query->andFilterWhere(['like', 'nama_inovasi', $this->nama_inovasi])
            ->andFilterWhere(['like', 'produk_inovasi', $this->produk_inovasi])
            ->andFilterWhere(['like', 'penggagas', $this->penggagas])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'nama_instansi', $this->nama_instansi])
            ->andFilterWhere(['like', 'unit_instansi', $this->unit_instansi])
            ->andFilterWhere(['like', 'faktor_pendorong', $this->faktor_pendorong])
            ->andFilterWhere(['like', 'faktor_penghambat', $this->faktor_penghambat])
            ->andFilterWhere(['like', 'tahapan_proses', $this->tahapan_proses])
            ->andFilterWhere(['like', 'output', $this->output])
            ->andFilterWhere(['like', 'outcome', $this->outcome])
            ->andFilterWhere(['like', 'manfaat', $this->manfaat])
            ->andFilterWhere(['like', 'prasyarat_replikasi', $this->prasyarat_replikasi])
            ->andFilterWhere(['like', 'kontak', $this->kontak])
            ->andFilterWhere(['like', 'sumber', $this->sumber])
            ->andFilterWhere(['like', 'gambar_ilustrasi', $this->gambar_ilustrasi]);

        return $query;
    }
    
    public function search($params=[])
    {
        $query = $this->getQuerySearch($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);        

        return $dataProvider;
    }


}

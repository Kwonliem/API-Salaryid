<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KaryawanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'id_jabatan' => $this->id_jabatan,
            'nama_karyawan' => $this->nama_karyawan,
            'status' => $this->status,
            'tanggal_masuk' => $this->tanggal_masuk,
            'nomor_hp' => $this->nomor_hp,
            'username' => $this->username,
            'password' => $this->password,
        ];
    }
}

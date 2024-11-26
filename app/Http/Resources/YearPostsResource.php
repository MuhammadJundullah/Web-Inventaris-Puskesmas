<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class YearPostsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
             'id' => $this->id,
             'nama' => $this->nama_barang,
             'sumber' => $this->sumber_dana,
             'jumlah' => $this->jumlah,
             'tanggal' => $this->tanggal,        
        ];
    }
}

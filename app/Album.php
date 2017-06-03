<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    /**
    * Get specify type data
    *
    * @param array $params
    */
    public function scopeDataList($query, $params)
    {
        $orderColumn = $params['selectFields'][$params['order']['column']];
        $orderBy = $params['order']['dir'];

        $albumsCount = $query->get()->count();

        $albums = $query->where('title', 'like', '%' . (!empty($params['search']['value']) ? $params['search']['value'] : '') . '%')
                ->orWhere('description', 'like', '%' . (!empty($params['search']['value']) ? $params['search']['value'] : '') . '%')
                ->select($params['selectFields'])
                ->skip($params['start'])
                ->take($params['length'])
                ->orderBy($orderColumn, $orderBy)
                ->get()
                ->toArray();
        $outputData = [];
        foreach ($albums as $field) {
            $outputData[] = array_values($field);
        }

        return [
            'data' => $outputData,
            'count' => $albumsCount
        ];
    }
}

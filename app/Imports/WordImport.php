<?php

namespace App\Imports;

use App\Models\Word;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WordImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $extractedData = $this->parseOneLineData($row['data']);
//        return new Word([
//            'user_id'     => 1,
//            'name'     => $row['words'],
//            'antonym'     => $row['antonym'],
//            'plural'     => $row['plural'],
//            'with_harakah'     => $row['with_harakah']=!null? $row['with_harakah'] :null,
//            'meaning'     => $row['meaning'],
//            'pop'     => $row['pop'],
//            'data'         => empty($extractedData)?null:$extractedData,
//            'gender'     => $row['gender'],
//            'status'     => 'active',
//        ]);

        Word::updateOrCreate(
        // Conditions for uniqueness (user_id and name)
            [
                'user_id' => 1,
                'name' => $row['words']
            ],
            // Values to update or insert
            [
                'plural' => $row['plural'],
                'with_harakah' => !empty($row['with_harakah']) ? $row['with_harakah'] : null,
                'meaning' => $row['meaning'],
                'pop' => $row['pop'],
                'data' => !empty($extractedData) ? $extractedData : null,
                'gender' => $row['gender'],
                'status' => 'active'
            ]
        );

    }


    private function parseOneLineData($data)
    {
        $parsedData = [];

        // Split the string by commas and loop through each key-value pair
        $pairs = explode(', ', $data);
        foreach ($pairs as $pair) {
            $parts = explode(': ', $pair, 2);
            if (count($parts) == 2) {
                $key = trim($parts[0]);  // The part before the colon is the key
                $value = trim($parts[1]);  // The part after the colon is the value

                $parsedData[$key] = $value;
            }
        }

        return $parsedData;
    }
    private function extractData($row)
    {
        return [
            'baab'                       => $row['baab'] ?? null,
            'masdar'                     => $row['masdar'] ?? null,
            'madee'                      => $row['madee'] ?? null,
            'mudaree'                    => $row['mudaree'] ?? null,
            'amr'                        => $row['amr'] ?? null,
            'nahee'                      => $row['nahee'] ?? null,
            'ismul_fel'                  => $row['ismul_fel'] ?? null,
            'madee_gaaib_male_oheed'      => $row['madee_gaaib_male_oheed'] ?? null,
            'madee_gaaib_male_tasnia'     => $row['madee_gaaib_male_tasnia'] ?? null,
            'madee_gaaib_male_jama'       => $row['madee_gaaib_male_jama'] ?? null,
            'madee_gaaib_female_oheed'    => $row['madee_gaaib_female_oheed'] ?? null,
            'madee_gaaib_female_tasnia'   => $row['madee_gaaib_female_tasnia'] ?? null,
            'madee_gaaib_female_jama'     => $row['madee_gaaib_female_jama'] ?? null,
            'madee_haader_male_oheed'     => $row['madee_haader_male_oheed'] ?? null,
            'madee_haader_male_tasnia'    => $row['madee_haader_male_tasnia'] ?? null,
            'madee_haader_male_jama'      => $row['madee_haader_male_jama'] ?? null,
            'madee_haader_female_oheed'   => $row['madee_haader_female_oheed'] ?? null,
            'madee_haader_female_tasnia'  => $row['madee_haader_female_tasnia'] ?? null,
            'madee_haader_female_jama'    => $row['madee_haader_female_jama'] ?? null,
            'madee_mutakallim_oheed'      => $row['madee_mutakallim_oheed'] ?? null,
            'madee_mutakallim_jama'       => $row['madee_mutakallim_jama'] ?? null,
            'mudaree_gaaib_male_oheed'    => $row['mudaree_gaaib_male_oheed'] ?? null,
            'mudaree_gaaib_male_tasnia'   => $row['mudaree_gaaib_male_tasnia'] ?? null,
            'mudaree_gaaib_male_jama'     => $row['mudaree_gaaib_male_jama'] ?? null,
            'mudaree_gaaib_female_oheed'  => $row['mudaree_gaaib_female_oheed'] ?? null,
            'mudaree_gaaib_female_tasnia' => $row['mudaree_gaaib_female_tasnia'] ?? null,
            'mudaree_gaaib_female_jama'   => $row['mudaree_gaaib_female_jama'] ?? null,
            'mudaree_haader_male_oheed'   => $row['mudaree_haader_male_oheed'] ?? null,
            'mudaree_haader_male_tasnia'  => $row['mudaree_haader_male_tasnia'] ?? null,
            'mudaree_haader_male_jama'    => $row['mudaree_haader_male_jama'] ?? null,
            'mudaree_haader_female_oheed' => $row['mudaree_haader_female_oheed'] ?? null,
            'mudaree_haader_female_tasnia'=> $row['mudaree_haader_female_tasnia'] ?? null,
            'mudaree_haader_female_jama'  => $row['mudaree_haader_female_jama'] ?? null,
            'mudaree_mutakallim_oheed'    => $row['mudaree_mutakallim_oheed'] ?? null,
            'mudaree_mutakallim_jama'     => $row['mudaree_mutakallim_jama'] ?? null,
            'amr_gaaib_male_oheed'        => $row['amr_gaaib_male_oheed'] ?? null,
            'amr_gaaib_male_tasnia'       => $row['amr_gaaib_male_tasnia'] ?? null,
            'amr_gaaib_male_jama'         => $row['amr_gaaib_male_jama'] ?? null,
            'amr_gaaib_female_oheed'      => $row['amr_gaaib_female_oheed'] ?? null,
            'amr_gaaib_female_tasnia'     => $row['amr_gaaib_female_tasnia'] ?? null,
            'amr_gaaib_female_jama'       => $row['amr_gaaib_female_jama'] ?? null,
            'amr_haader_male_oheed'       => $row['amr_haader_male_oheed'] ?? null,
            'amr_haader_male_tasnia'      => $row['amr_haader_male_tasnia'] ?? null,
            'amr_haader_male_jama'        => $row['amr_haader_male_jama'] ?? null,
            'amr_haader_female_oheed'     => $row['amr_haader_female_oheed'] ?? null,
            'amr_haader_female_tasnia'    => $row['amr_haader_female_tasnia'] ?? null,
            'amr_haader_female_jama'      => $row['amr_haader_female_jama'] ?? null,
            'amr_mutakallim_oheed'        => $row['amr_mutakallim_oheed'] ?? null,
            'amr_mutakallim_jama'         => $row['amr_mutakallim_jama'] ?? null,
            'ismul_fel_male_oheed'        => $row['ismul_fel_male_oheed'] ?? null,
            'ismul_fel_male_tasnia'       => $row['ismul_fel_male_tasnia'] ?? null,
            'ismul_fel_male_jama'         => $row['ismul_fel_male_jama'] ?? null,
            'ismul_fel_female_oheed'      => $row['ismul_fel_female_oheed'] ?? null,
            'ismul_fel_female_tasnia'     => $row['ismul_fel_female_tasnia'] ?? null,
            'ismul_fel_female_jama'       => $row['ismul_fel_female_jama'] ?? null,
            'ismul_maful_male_oheed'      => $row['ismul_maful_male_oheed'] ?? null,
            'ismul_maful_male_tasnia'     => $row['ismul_maful_male_tasnia'] ?? null,
            'ismul_maful_male_jama'       => $row['ismul_maful_male_jama'] ?? null,
            'ismul_maful_female_oheed'    => $row['ismul_maful_female_oheed'] ?? null,
            'ismul_maful_female_tasnia'   => $row['ismul_maful_female_tasnia'] ?? null,
            'ismul_maful_female_jama'     => $row['ismul_maful_female_jama'] ?? null,
        ];
    }
}

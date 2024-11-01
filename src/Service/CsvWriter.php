<?php

namespace App\Service;

class CsvWriter
{
    /**
     * @param  string  $path
     * @param  array  $data
     *
     * @return void
     */
    public function write(string $path, array $data): void
    {
        try {
            $file = fopen($path, 'a');
            fputcsv($file, $data);
        }catch (\RuntimeException $exception){
            throw new \RuntimeException($exception->getMessage());
        }

        fclose($file);
    }
}

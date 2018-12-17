<?php

namespace App\Jobs;

use App\Domain\Category\Category;
use App\Domain\Product\Import\Import;
use App\Domain\Product\Product;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Storage;

class ProcessImportProduct implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $import;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Import $import)
    {
        $this->import = $import;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $contents = Storage::get(sprintf('import/%s.csv', $this->import->id));

        $lines = collect(explode(PHP_EOL, $contents));
        $headers = explode(',', $lines->shift());

        $data = $lines
            ->filter(function ($line) use ($headers) {
                $columns = explode(',', $line);

                return count($columns) == count($headers);
            })
            ->map(function ($line) use ($headers) {
                $columns = explode(',', $line);

                $formatedData = array_combine($headers, $columns);
                $formatedData['PRICE'] = $this->_formatValue($formatedData['PRICE']);

                return $formatedData;
            })->each(function ($data) {
                $category = Category::where('description', $data['CATEGORY'])->first();

                $product = factory(Product::class)->create([
                    'name' => $data['NAME'],
                    'sub_name' => $data['SUB_NAME'],
                    'price' => $data['PRICE'],
                ]);
            });

        $this->import->processed = true;
        $this->import->processed_date = Carbon::now()->toDateTimeString();
        $this->import->save();
    }

    private function _formatValue($num)
    {
        $dotPos = strrpos($num, '.');
        $commaPos = strrpos($num, ',');
        $sep = (($dotPos > $commaPos) && $dotPos) ? $dotPos :
            ((($commaPos > $dotPos) && $commaPos) ? $commaPos : false);

        if (!$sep) {
            return floatval(preg_replace("/[^0-9]/", "", $num));
        }

        return floatval(
            preg_replace("/[^0-9]/", "", substr($num, 0, $sep)) . '.' .
            preg_replace("/[^0-9]/", "", substr($num, $sep+1, strlen($num)))
        );
    }
}

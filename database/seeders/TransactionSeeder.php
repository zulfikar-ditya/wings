<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all()->toArray();
        $products = Product::all()->toArray();

        for ($i = 0; $i < 1000; $i++) {

            $details = [];
            $total = 0;
            for ($j = 0; $j < random_int(1, 4); $j++) {
                $product = collect($products)->random(1)[0];
                $quantity = random_int(1, 10);

                $details[] = [
                    'product_id' => $product['id'],
                    'product_code' => $product['code'],
                    'quantity' => $quantity,
                    'price' => $product['price'],
                    'total' => $product['price'] * $quantity,
                    'currency' => $product['currency'],
                    'unit' => $product['unit'],
                ];

                $total += $product['price'] * $quantity;
            }

            $Transaction = Transaction::create([
                'date' => Carbon::now()->subDays(rand(0, 365)),
                'user_id' => collect($users)->random(1)[0]['id'],
                'total' => $total,
            ]);

            $Transaction->transactionDetails()->createMany($details);
        }
    }
}

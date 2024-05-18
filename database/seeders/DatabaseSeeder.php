<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Buat user
        // $user = \App\Models\User::factory()->create();

        // Buat bank
        $bank = \App\Models\metode_pembayaran::create([
            'nama_bank' => 'Bank Contoh',
            'no_rekening'=> 94020942,
            'nama'=> 'sani',


        ]);

        // Buat transaksi
        $transaksi = \App\Models\Transaksi::create([
            'kode_transaksi' => 'TRX001',
            'kode_unik' => '123',
            'total' => 100000,
            'status' => 'pending',
            'user_id' => 2,
            'etimasi_ready' => now(),
            'etimasi_dikirim' => now(),
            'total' => 100000
        ]);

        // Buat pembayaran
        $pembayaran = \App\Models\Pembayaran::create([
            'transaksi_id' => $transaksi->id,
            'bank' => $bank->id,
            // 'jumlah_bayar' => 100000,
            // 'status' => 'completed'
        ]);
    }
}

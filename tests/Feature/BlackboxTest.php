<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Layanan;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Hash;

class BlackboxTest extends TestCase
{
    // Gunakan DatabaseTransactions agar data yang di-test otomatis dihapus (rollback)
    // sehingga tidak mengotori atau merusak database asli kakak
    use DatabaseTransactions;

    /**
     * 1.1 Login dengan kredensial valid
     */
    public function test_login_dengan_kredensial_valid()
    {
        // Setup: Buat user sementara
        $user = User::create([
            'name' => 'Tester Valid',
            'email' => 'testvalid@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'user'
        ]);

        // Action: Post ke endpoint login
        $response = $this->post('/login', [
            'email' => 'testvalid@gmail.com',
            'password' => 'password123',
        ]);

        // Assert: Harus redirect dan session memiliki success (atau diarahkan ke dashboard)
        $response->assertStatus(302);
        $this->assertAuthenticatedAs($user);
    }

    /**
     * 1.2 Login dengan email yang salah
     */
    public function test_login_dengan_email_salah()
    {
        $response = $this->post('/login', [
            'email' => 'salahbanget@gmail.com',
            'password' => 'password123',
        ]);

        // Harus gagal login dan dikembalikan ke halaman login dengan error
        $response->assertStatus(302);
        $this->assertGuest();
        $response->assertSessionHasErrors('email');
    }

    /**
     * 1.3 Login dengan password kosong
     */
    public function test_login_dengan_password_kosong()
    {
        $response = $this->post('/login', [
            'email' => 'admin@gmail.com',
            'password' => '',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('password');
    }

    /**
     * 1.4 Registrasi akun baru (Valid)
     */
    public function test_registrasi_akun_baru()
    {
        $response = $this->post('/register', [
            'name' => 'Pelanggan Baru',
            'email' => 'pelangganbaru123@gmail.com',
            'phone' => '081234567890',
            'jenis_kelamin' => 'P',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('users', [
            'email' => 'pelangganbaru123@gmail.com'
        ]);
    }

    /**
     * 1.5 Registrasi dengan email yang sudah ada
     */
    public function test_registrasi_dengan_email_sudah_ada()
    {
        // Bikin user pertama
        User::create([
            'name' => 'Si Pertama',
            'email' => 'sudahada@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'user'
        ]);

        // Coba register dengan email yang sama
        $response = $this->post('/register', [
            'name' => 'Si Kedua',
            'email' => 'sudahada@gmail.com',
            'phone' => '081234567891',
            'jenis_kelamin' => 'L',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
    }

    /**
     * 2.1 Pemesanan "Di Tempat" (Valid)
     */
    public function test_pemesanan_di_tempat_valid()
    {
        // Buat user pelanggan & login
        $user = User::create([
            'name' => 'Pelanggan Pesan',
            'email' => 'pesan@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'user'
        ]);
        $this->actingAs($user);

        // Pastikan ada layanan & karyawan di DB
        $layanan = Layanan::first();
        $karyawan = Karyawan::first();

        if (!$layanan || !$karyawan) {
            $this->markTestSkipped('Butuh setidaknya 1 layanan dan 1 karyawan di database.');
        }

        $tanggalBesok = date('Y-m-d', strtotime('+1 day'));

        $response = $this->post('/pemesanan/submit', [
            'nama' => 'Pelanggan Pesan',
            'jenis_kelamin' => 'L',
            'telepon' => '0811111111',
            'layanan_id' => $layanan->id,
            'lokasi' => 'tempat',
            'tanggal' => $tanggalBesok,
            'jam' => '10:00',
            'catatan' => 'Pijat pelan',
            'karyawan_id' => $karyawan->id
        ]);

        // Harapannya berhasil pesan (302 ke halaman /pembayaran atau success)
        $response->assertStatus(302);
        $this->assertDatabaseHas('transaksis', [
            'nama' => 'Pelanggan Pesan',
            'lokasi' => 'tempat'
        ]);
    }
}

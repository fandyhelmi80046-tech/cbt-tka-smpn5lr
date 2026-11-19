<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdminUser extends Command
{
    protected $signature = 'cbt:create-admin {email=50309421@gmail.com}';

    protected $description = 'Create the first CBT TKA administrator account';

    public function handle(): int
    {
        $email = (string) $this->argument('email');

        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->components->error('Alamat email tidak valid.');
            return self::FAILURE;
        }

        $existing = User::where('email', $email)->first();

        if ($existing && ! $this->confirm('Akun ini sudah ada. Jadikan akun ini ADMIN dan ganti kata sandinya?')) {
            $this->components->warn('Tidak ada perubahan.');
            return self::SUCCESS;
        }

        $name = $this->ask('Nama administrator', $existing?->name ?? 'Administrator CBT TKA');
        $password = $this->secret('Buat kata sandi (minimal 12 karakter)');
        $confirmation = $this->secret('Ulangi kata sandi');

        if (strlen((string) $password) < 12) {
            $this->components->error('Kata sandi harus minimal 12 karakter.');
            return self::FAILURE;
        }

        if (! hash_equals((string) $password, (string) $confirmation)) {
            $this->components->error('Kedua kata sandi tidak sama. Jalankan perintah kembali.');
            return self::FAILURE;
        }

        $user = $existing ?? new User();
        $user->name = $name;
        $user->email = $email;
        $user->role = 'admin';
        $user->password = $password;
        $user->email_verified_at = now();
        $user->save();

        $this->components->info('Akun ADMIN berhasil disiapkan.');
        $this->line('Email: '.$email);
        $this->line('Peran: ADMIN');
        $this->components->warn('Simpan kata sandi Anda secara pribadi. Jangan membagikannya di chat.');

        return self::SUCCESS;
    }
}

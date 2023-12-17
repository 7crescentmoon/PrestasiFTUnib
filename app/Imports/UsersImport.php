<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            //Menentukan aturan validasi
            $validator = Validator::make($row->toArray(), [
                'npm_nip' => 'max:10|unique:users',
                "email" => 'email:dns|unique:users',
            ]);

            // Jika validasi gagal, lewati baris ini
            if ($validator->fails()) {
                return Alert::toast('Data tidak dapat ditambahkan. Silakan periksa validasi.', 'error');

            }

            // Jika validasi berhasil, buat pengguna
            try {
                User::create([
                    'nama' => $row['nama'],
                    'npm_nip' => $row['npm'],
                    'jurusan' => $row['jurusan'],
                    'jenis_kelamin' => $row['jenis_kelamin'],
                    'email' => $row['email'],
                    'password' => $row['password'],
                ]);

                Alert::toast('Data berhasil ditambahkan.', 'success');
            } catch (\Exception $e) {
                // Tangani kesalahan saat membuat entitas
                Alert::toast('Gagal menambahkan pengguna.', 'error');
            }
        }
    }
}

@section('title', 'Detail Siswa')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Siswa
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-session-status class="mb-4" :status="session('berhasil')" />

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex flex-col md:flex-row justify-between items-start gap-6">
                    <div>
                        <h3 class="text-xl mb-3 font-bold">{{ $siswa->no_daftar }}</h3>
                        <a class="text-sm hover:underline hover:underline-offset-4 text-gray-500"
                            href="{{ route('siswa.index') }}">
                            <i class="fa-solid fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                    <div class="flex gap-3">
                        @can('admin')
                            <form action="{{ route('toggle-lulus', $siswa) }}" method="post" id="toggleForm">
                                @csrf
                            </form>
                            @if ($siswa->status_lulus)
                                <button onclick="document.getElementById('toggleForm').submit()"
                                    class="inline-flex items-center bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150 px-2 py-1">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                    <span class="hidden md:block">Batalkan Lulus</span>
                                </button>
                            @else
                                <button onclick="document.getElementById('toggleForm').submit()"
                                    class="inline-flex items-center bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150 px-2 py-1">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                    <span class="hidden md:block">Luluskan Siswa</span>
                                </button>
                            @endif
                            <x-a-warning-button :href="route('siswa.edit', $siswa)" class="px-2 py-1">
                                <i class="fa-solid fa-edit"></i>
                                <span class="hidden md:block">Edit</span>
                            </x-a-warning-button>
                            <x-form-delete :action="route('siswa.destroy', $siswa)" :confirm="true">
                                <x-danger-button class="px-2 py-1">
                                    <i class="fa-solid fa-trash"></i>
                                    <span class="hidden md:block">Hapus</span>
                                </x-danger-button>
                            </x-form-delete>
                        @endcan
                    </div>
                </div>

                <hr class="my-6">
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="w-full md:w-1/2 space-y-6">
                        <table>
                            <tr>
                                <th class="text-left">Nama Lengkap</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">NIK</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->nik }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">Tempat, Tanggal Lahir</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->tempat_lahir }},
                                    {{ now()->parse($siswa->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">Anak Ke</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->anak_ke }} orang</td>
                            </tr>
                            <tr>
                                <th class="text-left">Jumlah Saudara</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->jumlah_saudara_kandung }} orang</td>
                            </tr>
                            <tr>
                                <th class="text-left">Status dalam Keluarga</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->status_anak_dalam_keluarga }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">Status Anak</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->status_anak }}</td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <th class="text-left">Hobi</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->hobi ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">Cita-cita</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->cita_cita ?? '-' }}</td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <th class="text-left">Status Lulus</th>
                                <td class="px-4">:</td>
                                <td><x-badge-status :status="$siswa->status_lulus" /></td>
                            </tr>
                            <tr>
                                <th class="text-left">Daftar Ulang</th>
                                <td class="px-4">:</td>
                                <td><x-badge-status :status="$siswa->status_daftar_ulang" /></td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <th class="text-left">Asal Sekolah</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->asal_sekolah ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">Alamat Sekolah</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->alamat_sekolah ?? '-' }}</td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <th class="text-left">Jalan</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->jalan }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">Desa</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->desa }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">Kecamatan</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->kecamatan }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">Kabupaten / Kota</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->kab_kota }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">Jarak ke Sekolah</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->jarak_ke_sekolah }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">Transportasi ke Sekolah</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->transportasi_ke_sekolah }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="w-full md:w-1/2 space-y-6">
                        <table>
                            <tr>
                                <th class="text-left">Nama Ayah</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->nama_ayah }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">Pendidikan Ayah</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->pendidikan_ayah }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">Pekerjaan Ayah</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->pekerjaan_ayah }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">Penghasilan Ayah</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->penghasilan_ayah }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">No Handphone Ayah</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->no_hp_ayah }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">Alamat Ayah</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->alamat_ayah }}</td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <th class="text-left">Nama Ibu</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->nama_ibu }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">Pendidikan Ibu</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->pendidikan_ibu }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">Pekerjaan Ibu</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->pekerjaan_ibu }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">Penghasilan Ibu</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->penghasilan_ibu }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">No Handphone Ibu</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->no_hp_ibu }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">Alamat Ibu</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->alamat_ibu }}</td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <th class="text-left">Nama Wali</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->nama_wali }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">Pendidikan Wali</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->pendidikan_wali }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">Pekerjaan Wali</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->pekerjaan_wali }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">Penghasilan Wali</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->penghasilan_wali }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">No Handphone Wali</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->no_hp_wali }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">Alamat Wali</th>
                                <td class="px-4">:</td>
                                <td>{{ $siswa->alamat_wali }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <hr class="my-6">
                <small class="block text-gray-500 mb-3">Nilai</small>
                @foreach ($kategoriNilai as $nama => $kategori)
                    <div class="w-full md:w-1/2 space-y-6">
                        <table>
                            @foreach ($kategori as $item)
                                <tr>
                                    <th class="text-left">{{ $item['nama'] }}</th>
                                    <td class="px-4">:</td>
                                    <td>{{ $item['nilai'] }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                @endforeach

                @if ($siswa->sertifikat->count() > 0)
                    <hr class="my-6">
                    <small class="block text-gray-500 mb-3">Berkas Lampiran</small>
                    <div class="flex flex-wrap gap-3">
                        @foreach ($siswa->sertifikat as $sertifikat)
                            <div class="border border-gray-300 hover:border-green-300 rounded flex gap-2 p-2 text-xs">
                                <i class="fa-solid fa-file text-green-500"></i>
                                <span class="text-gray-600">
                                    <a href="{{ asset('storage/' . $sertifikat->file_name) }}"
                                        target="_blank">{{ $sertifikat->getName() }}</a>
                                </span>
                            </div>
                        @endforeach
                    </div>
                @endif


            </div>
        </div>
    </div>
</x-app-layout>

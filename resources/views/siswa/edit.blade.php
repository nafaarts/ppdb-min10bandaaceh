@section('title', 'Edit Siswa')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Siswa
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg space-y-6">
                <form method="post" action="{{ route('siswa.update', $siswa) }}" enctype="multipart/form-data"
                    id="editForm">
                    @csrf
                    @method('PUT')
                    <div class="space-y-6">
                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="nama_lengkap" value="Nama Lengkap" class="required" />
                                <x-text-input id="nama_lengkap" name="nama_lengkap" type="text"
                                    class="mt-1 block w-full" :value="old('nama_lengkap', $siswa->nama_lengkap)" autocomplete="nama_lengkap" />
                                <x-input-error class="mt-2" :messages="$errors->get('nama_lengkap')" />
                            </div>

                            <div class="w-full md:w-1/2">
                                <x-input-label for="nik" value="Nomor Induk Kependudukan" class="required" />
                                <x-text-input id="nik" name="nik" type="text" class="mt-1 block w-full"
                                    :value="old('nik', $siswa->nik)" autocomplete="nik" />
                                <x-input-error class="mt-2" :messages="$errors->get('nik')" />
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="tempat_lahir" :value="__('Tempat Lahir')" class="required" />
                                <x-text-input id="tempat_lahir" name="tempat_lahir" type="text"
                                    class="mt-1 block w-full" :value="old('tempat_lahir', $siswa->tempat_lahir)" autocomplete="tempat_lahir" />
                                <x-input-error class="mt-2" :messages="$errors->get('tempat_lahir')" />
                            </div>

                            <div class="w-full md:w-1/2">
                                <x-input-label for="tanggal_lahir" value="Tanggal Lahir" class="required" />
                                <x-text-input id="tanggal_lahir" name="tanggal_lahir" type="date"
                                    class="mt-1 block w-full" :value="old('tanggal_lahir', $siswa->tanggal_lahir)" autocomplete="tanggal_lahir" />
                                <x-input-error class="mt-2" :messages="$errors->get('tanggal_lahir')" />
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="anak_ke" value="Anak Ke" class="required" />
                                <x-text-input id="anak_ke" name="anak_ke" type="number" class="mt-1 block w-full"
                                    :value="old('anak_ke', $siswa->anak_ke)" autocomplete="anak_ke" />
                                <x-input-error class="mt-2" :messages="$errors->get('anak_ke')" />
                            </div>

                            <div class="w-full md:w-1/2">
                                <x-input-label for="jumlah_saudara_kandung" value="Jumlah Saudara Kandung"
                                    class="required" />
                                <x-text-input id="jumlah_saudara_kandung" name="jumlah_saudara_kandung" type="number"
                                    class="mt-1 block w-full" :value="old('jumlah_saudara_kandung', $siswa->jumlah_saudara_kandung)"
                                    autocomplete="jumlah_saudara_kandung" />
                                <x-input-error class="mt-2" :messages="$errors->get('jumlah_saudara_kandung')" />
                            </div>
                        </div>

                        {{-- // select --}}
                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="status_anak_dalam_keluarga" value="Status Dalam Keluarga"
                                    class="required" />
                                <x-select id="status_anak_dalam_keluarga" name="status_anak_dalam_keluarga"
                                    class="mt-1 block w-full">
                                    <option value="">-- pilih status dalam keluarga --</option>
                                    @foreach (['ANAK KANDUNG', 'ANAK ANGKAT', 'ANAK TIRI'] as $item)
                                        <option @selected(old('status_anak_dalam_keluarga', $siswa->status_anak_dalam_keluarga) == $item)>{{ $item }}</option>
                                    @endforeach
                                </x-select>
                                <x-input-error class="mt-2" :messages="$errors->get('status_anak_dalam_keluarga')" />
                            </div>

                            <div class="w-full md:w-1/2">
                                <x-input-label for="status_anak" value="Status Anak" class="required" />
                                <x-select id="status_anak" name="status_anak" class="mt-1 block w-full">
                                    <option value="">-- pilih status anak --</option>
                                    @foreach (['NON YATIM PIATU', 'YATIM', 'PIATU', 'YATIM PIATU'] as $item)
                                        <option @selected(old('status_anak', $siswa->status_anak) == $item)>{{ $item }}</option>
                                    @endforeach
                                </x-select>
                                <x-input-error class="mt-2" :messages="$errors->get('status_anak')" />
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="hobi" value="Hobi" />
                                <x-text-input id="hobi" name="hobi" type="text" class="mt-1 block w-full"
                                    :value="old('hobi', $siswa->hobi)" autocomplete="hobi" />
                                <x-input-error class="mt-2" :messages="$errors->get('hobi')" />
                            </div>

                            <div class="w-full md:w-1/2">
                                <x-input-label for="cita_cita" value="Cita-cita" />
                                <x-text-input id="cita_cita" name="cita_cita" type="text"
                                    class="mt-1 block w-full" :value="old('cita_cita', $siswa->cita_cita)" autocomplete="cita_cita" />
                                <x-input-error class="mt-2" :messages="$errors->get('cita_cita')" />
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="jarak_ke_sekolah" value="Jarak ke Sekolah" class="required" />
                                <x-text-input id="jarak_ke_sekolah" name="jarak_ke_sekolah" type="text"
                                    class="mt-1 block w-full" :value="old('jarak_ke_sekolah', $siswa->jarak_ke_sekolah)" autocomplete="jarak_ke_sekolah" />
                                <x-input-error class="mt-2" :messages="$errors->get('jarak_ke_sekolah')" />
                            </div>

                            <div class="w-full md:w-1/2">
                                <x-input-label for="transportasi_ke_sekolah" value="Transportasi ke Sekolah"
                                    class="required" />
                                <x-text-input id="transportasi_ke_sekolah" name="transportasi_ke_sekolah"
                                    type="text" class="mt-1 block w-full" :value="old('transportasi_ke_sekolah', $siswa->transportasi_ke_sekolah)"
                                    autocomplete="transportasi_ke_sekolah" />
                                <x-input-error class="mt-2" :messages="$errors->get('transportasi_ke_sekolah')" />
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="jalan" value="Jalan" class="required" />
                                <x-text-input id="jalan" name="jalan" type="text" class="mt-1 block w-full"
                                    :value="old('jalan', $siswa->jalan)" autocomplete="jalan" />
                                <x-input-error class="mt-2" :messages="$errors->get('jalan')" />
                            </div>

                            <div class="w-full md:w-1/2">
                                <x-input-label for="desa" value="Desa" class="required" />
                                <x-text-input id="desa" name="desa" type="text" class="mt-1 block w-full"
                                    :value="old('desa', $siswa->desa)" autocomplete="desa" />
                                <x-input-error class="mt-2" :messages="$errors->get('desa')" />
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="kecamatan" value="Kecamatan" class="required" />
                                <x-text-input id="kecamatan" name="kecamatan" type="text"
                                    class="mt-1 block w-full" :value="old('kecamatan', $siswa->kecamatan)" autocomplete="kecamatan" />
                                <x-input-error class="mt-2" :messages="$errors->get('kecamatan')" />
                            </div>

                            <div class="w-full md:w-1/2">
                                <x-input-label for="kab_kota" value="Kabupaten/Kota" class="required" />
                                <x-text-input id="kab_kota" name="kab_kota" type="text"
                                    class="mt-1 block w-full" :value="old('kab_kota', $siswa->kab_kota)" autocomplete="kab_kota" />
                                <x-input-error class="mt-2" :messages="$errors->get('kab_kota')" />
                            </div>
                        </div>

                        <hr> {{-- Asal Sekolah --}}

                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="asal_sekolah" value="Asal Sekolah (TK)" />
                                <x-text-input id="asal_sekolah" name="asal_sekolah" type="text"
                                    class="mt-1 block w-full" :value="old('asal_sekolah', $siswa->asal_sekolah)" autocomplete="asal_sekolah" />
                                <x-input-error class="mt-2" :messages="$errors->get('asal_sekolah')" />
                            </div>
                            <div class="w-full md:w-1/2">
                                <x-input-label for="alamat_sekolah" value="Alamat Sekolah" />
                                <x-text-input id="alamat_sekolah" name="alamat_sekolah" type="text"
                                    class="mt-1 block w-full" :value="old('alamat_sekolah', $siswa->alamat_sekolah)" autocomplete="alamat_sekolah" />
                                <x-input-error class="mt-2" :messages="$errors->get('alamat_sekolah')" />
                            </div>
                        </div>

                        <hr> {{-- Data Ayah --}}

                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="nama_ayah" value="Nama Ayah" class="required" />
                                <x-text-input id="nama_ayah" name="nama_ayah" type="text"
                                    class="mt-1 block w-full" :value="old('nama_ayah', $siswa->nama_ayah)" autocomplete="nama_ayah" />
                                <x-input-error class="mt-2" :messages="$errors->get('nama_ayah')" />
                            </div>

                            <div class="w-full md:w-1/2">
                                <x-input-label for="pendidikan_ayah" value="Pendidikan Ayah" class="required" />
                                <x-select id="pendidikan_ayah" name="pendidikan_ayah" class="mt-1 block w-full">
                                    <option selected value="">-- pilih pendidikan --</option>
                                    @foreach (['SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3'] as $item)
                                        <option @selected(old('pendidikan_ayah', $siswa->pendidikan_ayah) == $item)>{{ $item }}</option>
                                    @endforeach
                                </x-select>
                                <x-input-error class="mt-2" :messages="$errors->get('pendidikan_ayah')" />
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="pekerjaan_ayah" value="Pekerjaan Ayah" class="required" />
                                <x-text-input id="pekerjaan_ayah" name="pekerjaan_ayah" type="text"
                                    class="mt-1 block w-full" :value="old('pekerjaan_ayah', $siswa->pekerjaan_ayah)" autocomplete="pekerjaan_ayah" />
                                <x-input-error class="mt-2" :messages="$errors->get('pekerjaan_ayah')" />
                            </div>

                            <div class="w-full md:w-1/2">
                                <x-input-label for="penghasilan_ayah" value="Penghasilan Ayah" class="required" />
                                <x-select id="penghasilan_ayah" name="penghasilan_ayah" class="mt-1 block w-full">
                                    <option selected value="">-- pilih penghasilan --</option>
                                    @foreach (['Lebih dari Rp 2.000.000', 'Rp 2.000.000 sampai Rp 1.000.000', 'Kurang dari Rp 1.000.000'] as $item)
                                        <option @selected(old('penghasilan_ayah', $siswa->penghasilan_ayah) == $item)>{{ $item }}</option>
                                    @endforeach
                                </x-select>
                                <x-input-error class="mt-2" :messages="$errors->get('penghasilan_ayah')" />
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="no_hp_ayah" value="Nomor Handphone Ayah" class="required" />
                                <x-text-input id="no_hp_ayah" name="no_hp_ayah" type="text"
                                    class="mt-1 block w-full" :value="old('no_hp_ayah', $siswa->no_hp_ayah)" autocomplete="no_hp_ayah" />
                                <x-input-error class="mt-2" :messages="$errors->get('no_hp_ayah')" />
                            </div>

                            <div class="w-full md:w-1/2">
                                <x-input-label for="alamat_ayah" value="Alamat Ayah" class="required" />
                                <x-text-input id="alamat_ayah" name="alamat_ayah" type="text"
                                    class="mt-1 block w-full" :value="old('alamat_ayah', $siswa->alamat_ayah)" autocomplete="alamat_ayah" />
                                <x-input-error class="mt-2" :messages="$errors->get('alamat_ayah')" />
                            </div>
                        </div>

                        <hr> {{-- Data Ibu --}}

                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="nama_ibu" value="Nama Ibu" class="required" />
                                <x-text-input id="nama_ibu" name="nama_ibu" type="text"
                                    class="mt-1 block w-full" :value="old('nama_ibu', $siswa->nama_ibu)" autocomplete="nama_ibu" />
                                <x-input-error class="mt-2" :messages="$errors->get('nama_ibu')" />
                            </div>

                            <div class="w-full md:w-1/2">
                                <x-input-label for="pendidikan_ibu" value="Pendidikan Ibu" class="required" />
                                <x-select id="pendidikan_ibu" name="pendidikan_ibu" class="mt-1 block w-full">
                                    <option selected value="">-- pilih pendidikan --</option>
                                    @foreach (['SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3'] as $item)
                                        <option @selected(old('pendidikan_ibu', $siswa->pendidikan_ibu) == $item)>{{ $item }}</option>
                                    @endforeach
                                </x-select>
                                <x-input-error class="mt-2" :messages="$errors->get('pendidikan_ibu')" />
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="pekerjaan_ibu" value="Pekerjaan Ibu" class="required" />
                                <x-text-input id="pekerjaan_ibu" name="pekerjaan_ibu" type="text"
                                    class="mt-1 block w-full" :value="old('pekerjaan_ibu', $siswa->pekerjaan_ibu)" autocomplete="pekerjaan_ibu" />
                                <x-input-error class="mt-2" :messages="$errors->get('pekerjaan_ibu')" />
                            </div>

                            <div class="w-full md:w-1/2">
                                <x-input-label for="penghasilan_ibu" value="Penghasilan Ibu" class="required" />
                                <x-select id="penghasilan_ibu" name="penghasilan_ibu" class="mt-1 block w-full">
                                    <option selected value="">-- pilih penghasilan --</option>
                                    @foreach (['Lebih dari Rp 2.000.000', 'Rp 2.000.000 sampai Rp 1.000.000', 'Kurang dari Rp 1.000.000'] as $item)
                                        <option @selected(old('penghasilan_ibu', $siswa->penghasilan_ibu) == $item)>{{ $item }}</option>
                                    @endforeach
                                </x-select>
                                <x-input-error class="mt-2" :messages="$errors->get('penghasilan_ibu')" />
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="no_hp_ibu" value="Nomor Handphone Ibu" class="required" />
                                <x-text-input id="no_hp_ibu" name="no_hp_ibu" type="text"
                                    class="mt-1 block w-full" :value="old('no_hp_ibu', $siswa->no_hp_ibu)" autocomplete="no_hp_ibu" />
                                <x-input-error class="mt-2" :messages="$errors->get('no_hp_ibu')" />
                            </div>

                            <div class="w-full md:w-1/2">
                                <x-input-label for="alamat_ibu" value="Alamat Ibu" class="required" />
                                <x-text-input id="alamat_ibu" name="alamat_ibu" type="text"
                                    class="mt-1 block w-full" :value="old('alamat_ibu', $siswa->alamat_ibu)" autocomplete="alamat_ibu" />
                                <x-input-error class="mt-2" :messages="$errors->get('alamat_ibu')" />
                            </div>
                        </div>

                        <hr> {{-- Data Wali --}}

                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="nama_wali" value="Nama Wali" class="required" />
                                <x-text-input id="nama_wali" name="nama_wali" type="text"
                                    class="mt-1 block w-full" :value="old('nama_wali', $siswa->nama_wali)" autocomplete="nama_wali" />
                                <x-input-error class="mt-2" :messages="$errors->get('nama_wali')" />
                            </div>

                            <div class="w-full md:w-1/2">
                                <x-input-label for="pendidikan_wali" value="Pendidikan Wali" class="required" />
                                <x-select id="pendidikan_wali" name="pendidikan_wali" class="mt-1 block w-full">
                                    <option selected value="">-- pilih pendidikan --</option>
                                    @foreach (['SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3'] as $item)
                                        <option @selected(old('pendidikan_wali', $siswa->pendidikan_wali) == $item)>{{ $item }}</option>
                                    @endforeach
                                </x-select>
                                <x-input-error class="mt-2" :messages="$errors->get('pendidikan_wali')" />
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="pekerjaan_wali" value="Pekerjaan Wali" class="required" />
                                <x-text-input id="pekerjaan_wali" name="pekerjaan_wali" type="text"
                                    class="mt-1 block w-full" :value="old('pekerjaan_wali', $siswa->pekerjaan_wali)" autocomplete="pekerjaan_wali" />
                                <x-input-error class="mt-2" :messages="$errors->get('pekerjaan_wali')" />
                            </div>

                            <div class="w-full md:w-1/2">
                                <x-input-label for="penghasilan_wali" value="Penghasilan Wali" class="required" />
                                <x-select id="penghasilan_wali" name="penghasilan_wali" class="mt-1 block w-full">
                                    <option selected value="">-- pilih penghasilan --</option>
                                    @foreach (['Lebih dari Rp 2.000.000', 'Rp 2.000.000 sampai Rp 1.000.000', 'Kurang dari Rp 1.000.000'] as $item)
                                        <option @selected(old('penghasilan_wali', $siswa->penghasilan_wali) == $item)>{{ $item }}</option>
                                    @endforeach
                                </x-select>
                                <x-input-error class="mt-2" :messages="$errors->get('penghasilan_wali')" />
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="no_hp_wali" value="Nomor Handphone Wali" class="required" />
                                <x-text-input id="no_hp_wali" name="no_hp_wali" type="text"
                                    class="mt-1 block w-full" :value="old('no_hp_wali', $siswa->no_hp_wali)" autocomplete="no_hp_wali" />
                                <x-input-error class="mt-2" :messages="$errors->get('no_hp_wali')" />
                            </div>

                            <div class="w-full md:w-1/2">
                                <x-input-label for="alamat_wali" value="Alamat Wali" class="required" />
                                <x-text-input id="alamat_wali" name="alamat_wali" type="text"
                                    class="mt-1 block w-full" :value="old('alamat_wali', $siswa->alamat_wali)" autocomplete="alamat_wali" />
                                <x-input-error class="mt-2" :messages="$errors->get('alamat_wali')" />
                            </div>
                        </div>

                        <hr>

                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="pas_foto" value="Pas Foto" class="mb-3" />
                                <x-file-input id="pas_foto" name="sertifikat[]" class="block w-full border p-1"
                                    accept="application/pdf" required />
                            </div>
                            <div class="w-full md:w-1/2">
                                <x-input-label for="akte_kelahiran" value="Akte Kelahiran" class="mb-3" />
                                <x-file-input id="akte_kelahiran" name="sertifikat[]" class="block w-full border p-1"
                                    accept="application/pdf" required />
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="kartu_keluarga" value="Kartu Keluarga" class="mb-3" />
                                <x-file-input id="kartu_keluarga" name="sertifikat[]" class="block w-full border p-1"
                                    accept="application/pdf" required />
                            </div>
                            <div class="w-full md:w-1/2">
                                <x-input-label for="ktp_ayah_ibu" value="KTP Ayah dan Ibu" class="mb-3" />
                                <x-file-input id="ktp_ayah_ibu" name="sertifikat[]" class="block w-full border p-1"
                                    accept="application/pdf" required />
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row gap-6">
        <div class="w-full md:w-1/2">
            <x-input-label for="sertifikat" value="Sertifikat" class="mb-3" />
            <x-file-input id="sertifikat" name="sertifikat[]" class="block w-full border p-1" accept="application/pdf"
            multiple />
        </div>
        <div class="w-full md:w-1/2">
            <x-input-label for="surat_dokter" value="Surat Izin Dokter (jika ada)" class="mb-3" />
            <x-file-input id="surat_dokter" name="sertifikat[]" class="block w-full border p-1" accept="application/pdf"/>
        </div>
   </div>
                    </div>
                </form>

                <div class="flex flex-wrap gap-3">
                    @foreach ($siswa->sertifikat as $sertifikat)
                        <div class="border border-gray-300 hover:border-green-300 rounded flex gap-2 p-2 text-xs">
                            <i class="fa-solid fa-file text-green-500"></i>
                            <span class="text-gray-600">
                                <a href="{{ asset('storage/' . $sertifikat->file_name) }}"
                                    target="_blank">{{ $sertifikat->getName() }}</a>
                            </span>
                            <span>|</span>
                            <x-form-delete :action="route('sertifikat.destroy', $sertifikat)" :confirm="true">
                                <button class="p-0 text-gray-500 hover:text-red-500 cursor-pointer">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </x-form-delete>
                        </div>
                    @endforeach
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button
                        onclick="document.getElementById('editForm').submit()">{{ __('Save') }}</x-primary-button>
                    <x-a-secondary-button :href="route('siswa.index')" class="px-4 py-2">Kembali</x-a-secondary-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

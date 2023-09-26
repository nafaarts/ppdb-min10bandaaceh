<style>
    body {
        margin: 0;
        font-family: sans-serif;
    }

    .tabs {
        width: 100%;
    }

    .tab-nav {
        display: flex;
    }

    .nav-item {
        display: block;
        padding: 16px;
        cursor: pointer;

        &.selected {
            font-weight: bold;
            background: rgb(74 222 128);
        }
    }

    .tab {
        display: none;
        padding: 25px 0;

        &.selected {
            display: block;
        }
    }

    .tab-pag {
        display: flex;
        justify-content: flex-end;
    }

    .pag-item {
        display: block;
        padding: 12px;
        cursor: pointer;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-right: 8px;

        &:last-child {
            margin-right: 0;
        }

        &.hidden {
            display: none;
        }
    }

    .pag-item-submit {
        flex: 0 1 180px;
        font-size: 1rem;
        color: #fff;
        border-color: rgb(74 222 128);
        background: rgb(74 222 128);
    }
</style>

<div class="tabs" id="tabbedForm">
    <nav class="tab-nav bg-green-200"></nav>

    <div class="tab" data-name="Data Diri">
        <div class="space-y-6 tab1">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-1/2">
                    <x-input-label for="nama_lengkap" value="Nama Lengkap" class="required" />
                    <x-text-input id="nama_lengkap" name="nama_lengkap" type="text" class="mt-1 block w-full"
                        :value="old('nama_lengkap')" autocomplete="nama_lengkap" />
                    <x-input-error class="mt-2" :messages="$errors->get('nama_lengkap')" />
                </div>

                <div class="w-full md:w-1/2">
                    <x-input-label for="nik" value="Nomor Induk Kependudukan" class="required" />
                    <x-text-input id="nik" name="nik" type="text" class="mt-1 block w-full"
                        :value="old('nik')" autocomplete="nik" />
                    <x-input-error class="mt-2" :messages="$errors->get('nik')" />
                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-1/2">
                    <x-input-label for="tempat_lahir" :value="__('Tempat Lahir')" class="required" />
                    <x-text-input id="tempat_lahir" name="tempat_lahir" type="text" class="mt-1 block w-full"
                        :value="old('tempat_lahir')" autocomplete="tempat_lahir" />
                    <x-input-error class="mt-2" :messages="$errors->get('tempat_lahir')" />
                </div>

                <div class="w-full md:w-1/2">
                    <x-input-label for="tanggal_lahir" value="Tanggal Lahir" class="required" />
                    <x-text-input id="tanggal_lahir" name="tanggal_lahir" type="date" class="mt-1 block w-full"
                        onchange="ageCount()" :value="old('tanggal_lahir')" autocomplete="tanggal_lahir" />
                    <small class="text-red-500" id="demo"></small>
                    <x-input-error class="mt-2" :messages="$errors->get('tanggal_lahir')" />
                </div>

            </div>

            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-1/2">
                    <x-input-label for="anak_ke" value="Anak Ke" class="required" />
                    <x-text-input id="anak_ke" name="anak_ke" type="number" class="mt-1 block w-full"
                        :value="old('anak_ke')" autocomplete="anak_ke" />
                    <x-input-error class="mt-2" :messages="$errors->get('anak_ke')" />
                </div>

                <div class="w-full md:w-1/2">
                    <x-input-label for="jumlah_saudara_kandung" value="Jumlah Saudara Kandung" class="required" />
                    <x-text-input id="jumlah_saudara_kandung" name="jumlah_saudara_kandung" type="number"
                        class="mt-1 block w-full" :value="old('jumlah_saudara_kandung')" autocomplete="jumlah_saudara_kandung" />
                    <x-input-error class="mt-2" :messages="$errors->get('jumlah_saudara_kandung')" />
                </div>
            </div>

            {{-- // select --}}
            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-1/2">
                    <x-input-label for="status_anak_dalam_keluarga" value="Status Dalam Keluarga" class="required" />
                    <x-select id="status_anak_dalam_keluarga" name="status_anak_dalam_keluarga"
                        class="mt-1 block w-full">
                        <option selected value="">-- pilih status dalam keluarga --</option>
                        @foreach (['ANAK KANDUNG', 'ANAK ANGKAT', 'ANAK TIRI'] as $item)
                            <option @selected(old('status_anak_dalam_keluarga') == $item)>{{ $item }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error class="mt-2" :messages="$errors->get('status_anak_dalam_keluarga')" />
                </div>

                <div class="w-full md:w-1/2">
                    <x-input-label for="status_anak" value="Status Anak" class="required" />
                    <x-select id="status_anak" name="status_anak" class="mt-1 block w-full">
                        <option selected value="">-- pilih status anak --</option>
                        @foreach (['NON YATIM PIATU', 'YATIM', 'PIATU', 'YATIM PIATU'] as $item)
                            <option @selected(old('status_anak') == $item)>{{ $item }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error class="mt-2" :messages="$errors->get('status_anak')" />
                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-1/2">
                    <x-input-label for="hobi" value="Hobi" />
                    <x-text-input id="hobi" name="hobi" type="text" class="mt-1 block w-full"
                        :value="old('hobi')" autocomplete="hobi" />
                    <x-input-error class="mt-2" :messages="$errors->get('hobi')" />
                </div>

                <div class="w-full md:w-1/2">
                    <x-input-label for="cita_cita" value="Cita-cita" />
                    <x-text-input id="cita_cita" name="cita_cita" type="text" class="mt-1 block w-full"
                        :value="old('cita_cita')" autocomplete="cita_cita" />
                    <x-input-error class="mt-2" :messages="$errors->get('cita_cita')" />
                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-1/2">
                    <x-input-label for="jarak_ke_sekolah" value="Jarak ke Sekolah" class="required" />
                    <x-text-input id="jarak_ke_sekolah" name="jarak_ke_sekolah" type="text"
                        class="mt-1 block w-full" :value="old('jarak_ke_sekolah')" autocomplete="jarak_ke_sekolah" />
                    <x-input-error class="mt-2" :messages="$errors->get('jarak_ke_sekolah')" />
                </div>

                <div class="w-full md:w-1/2">
                    <x-input-label for="transportasi_ke_sekolah" value="Transportasi ke Sekolah" class="required" />
                    <x-select id="transportasi_ke_sekolah" name="transportasi_ke_sekolah" class="mt-1 block w-full">
                        <option selected value="">-- pilih transportasii --</option>
                        @foreach (['SEPEDA', 'JALAN KAKI', 'DIANTAR ORANG TUA'] as $item)
                            <option @selected(old('transportasi_ke_sekolah') == $item)>{{ $item }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error class="mt-2" :messages="$errors->get('transportasi_ke_sekolah')" />
                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-1/2">
                    <x-input-label for="jalan" value="Jalan" class="required" />
                    <x-text-input id="jalan" name="jalan" type="text" class="mt-1 block w-full"
                        :value="old('jalan')" autocomplete="jalan" />
                    <x-input-error class="mt-2" :messages="$errors->get('jalan')" />
                </div>

                <div class="w-full md:w-1/2">
                    <x-input-label for="desa" value="Desa" class="required" />
                    <x-text-input id="desa" name="desa" type="text" class="mt-1 block w-full"
                        :value="old('desa')" autocomplete="desa" />
                    <x-input-error class="mt-2" :messages="$errors->get('desa')" />
                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-1/2">
                    <x-input-label for="kecamatan" value="Kecamatan" class="required" />
                    <x-text-input id="kecamatan" name="kecamatan" type="text" class="mt-1 block w-full"
                        :value="old('kecamatan')" autocomplete="kecamatan" />
                    <x-input-error class="mt-2" :messages="$errors->get('kecamatan')" />
                </div>

                <div class="w-full md:w-1/2">
                    <x-input-label for="kab_kota" value="Kabupaten/Kota" class="required" />
                    <x-text-input id="kab_kota" name="kab_kota" type="text" class="mt-1 block w-full"
                        :value="old('kab_kota')" autocomplete="kab_kota" />
                    <x-input-error class="mt-2" :messages="$errors->get('kab_kota')" />
                </div>
            </div>
        </div>
    </div>
    <div class="tab" data-name="Data Sekolah">
        <div class="space-y-6 tab2">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-1/2">
                    <x-input-label for="asal_sekolah" value="Asal Sekolah (TK)" />
                    <x-text-input id="asal_sekolah" name="asal_sekolah" type="text" class="mt-1 block w-full"
                        :value="old('asal_sekolah')" autocomplete="asal_sekolah" />
                    <x-input-error class="mt-2" :messages="$errors->get('asal_sekolah')" />
                </div>
                <div class="w-full md:w-1/2">
                    <x-input-label for="alamat_sekolah" value="Alamat Sekolah" />
                    <x-text-input id="alamat_sekolah" name="alamat_sekolah" type="text" class="mt-1 block w-full"
                        :value="old('alamat_sekolah')" autocomplete="alamat_sekolah" />
                    <x-input-error class="mt-2" :messages="$errors->get('alamat_sekolah')" />
                </div>
            </div>
        </div>
    </div>
    <div class="tab" data-name="Data Ayah">
        <div class="space-y-6 tab3">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-1/2">
                    <x-input-label for="nama_ayah" value="Nama Ayah" class="required" />
                    <x-text-input id="nama_ayah" name="nama_ayah" type="text" class="mt-1 block w-full"
                        :value="old('nama_ayah')" autocomplete="nama_ayah" />
                    <x-input-error class="mt-2" :messages="$errors->get('nama_ayah')" />
                </div>

                <div class="w-full md:w-1/2">
                    <x-input-label for="pendidikan_ayah" value="Pendidikan Ayah" class="required" />
                    <x-select id="pendidikan_ayah" name="pendidikan_ayah" class="mt-1 block w-full">
                        <option selected value="">-- pilih pendidikan --</option>
                        @foreach (['SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3'] as $item)
                            <option @selected(old('pendidikan_ayah') == $item)>{{ $item }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error class="mt-2" :messages="$errors->get('pendidikan_ayah')" />
                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-1/2">
                    <x-input-label for="pekerjaan_ayah" value="Pekerjaan Ayah" class="required" />
                    <x-text-input id="pekerjaan_ayah" name="pekerjaan_ayah" type="text" class="mt-1 block w-full"
                        :value="old('pekerjaan_ayah')" autocomplete="pekerjaan_ayah" list="pekerjaan" />

                    <x-input-error class="mt-2" :messages="$errors->get('pekerjaan_ayah')" />
                </div>

                <div class="w-full md:w-1/2">
                    <x-input-label for="penghasilan_ayah" value="Penghasilan Ayah" class="required" />
                    <x-select id="penghasilan_ayah" name="penghasilan_ayah" class="mt-1 block w-full">
                        <option selected value="">-- pilih penghasilan --</option>
                        @foreach (['Lebih dari Rp 2.000.000', 'Rp 2.000.000 sampai Rp 1.000.000', 'Kurang dari Rp 1.000.000'] as $item)
                            <option @selected(old('penghasilan_ayah') == $item)>{{ $item }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error class="mt-2" :messages="$errors->get('penghasilan_ayah')" />
                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-1/2">
                    <x-input-label for="no_hp_ayah" value="Nomor Handphone Ayah" class="required" />
                    <x-text-input id="no_hp_ayah" name="no_hp_ayah" type="text" class="mt-1 block w-full"
                        :value="old('no_hp_ayah')" autocomplete="no_hp_ayah" />
                    <x-input-error class="mt-2" :messages="$errors->get('no_hp_ayah')" />
                </div>

                <div class="w-full md:w-1/2">
                    <x-input-label for="alamat_ayah" value="Alamat Ayah" class="required" />
                    <x-text-input id="alamat_ayah" name="alamat_ayah" type="text" class="mt-1 block w-full"
                        :value="old('alamat_ayah')" autocomplete="alamat_ayah" />
                    <x-input-error class="mt-2" :messages="$errors->get('alamat_ayah')" />
                </div>
            </div>
        </div>
    </div>
    <div class="tab" data-name="Data Ibu">
        <div class="space-y-6 tab4">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-1/2">
                    <x-input-label for="nama_ibu" value="Nama Ibu" class="required" />
                    <x-text-input id="nama_ibu" name="nama_ibu" type="text" class="mt-1 block w-full"
                        :value="old('nama_ibu')" autocomplete="nama_ibu" />
                    <x-input-error class="mt-2" :messages="$errors->get('nama_ibu')" />
                </div>

                <div class="w-full md:w-1/2">
                    <x-input-label for="pendidikan_ibu" value="Pendidikan Ibu" class="required" />
                    <x-select id="pendidikan_ibu" name="pendidikan_ibu" class="mt-1 block w-full">
                        <option selected value="">-- pilih pendidikan --</option>
                        @foreach (['SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3'] as $item)
                            <option @selected(old('pendidikan_ibu') == $item)>{{ $item }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error class="mt-2" :messages="$errors->get('pendidikan_ibu')" />
                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-1/2">
                    <x-input-label for="pekerjaan_ibu" value="Pekerjaan Ibu" class="required" />
                    <x-text-input id="pekerjaan_ibu" name="pekerjaan_ibu" type="text" class="mt-1 block w-full"
                        :value="old('pekerjaan_ibu')" autocomplete="pekerjaan_ibu" list="pekerjaan" />
                    <x-input-error class="mt-2" :messages="$errors->get('pekerjaan_ibu')" />
                </div>

                <div class="w-full md:w-1/2">
                    <x-input-label for="penghasilan_ibu" value="Penghasilan Ibu" class="required" />
                    <x-select id="penghasilan_ibu" name="penghasilan_ibu" class="mt-1 block w-full">
                        <option selected value="">-- pilih penghasilan --</option>
                        @foreach (['Lebih dari Rp 2.000.000', 'Rp 2.000.000 sampai Rp 1.000.000', 'Kurang dari Rp 1.000.000'] as $item)
                            <option @selected(old('penghasilan_ibu') == $item)>{{ $item }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error class="mt-2" :messages="$errors->get('penghasilan_ibu')" />
                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-1/2">
                    <x-input-label for="no_hp_ibu" value="Nomor Handphone Ibu" class="required" />
                    <x-text-input id="no_hp_ibu" name="no_hp_ibu" type="text" class="mt-1 block w-full"
                        :value="old('no_hp_ibu')" autocomplete="no_hp_ibu" />
                    <x-input-error class="mt-2" :messages="$errors->get('no_hp_ibu')" />
                </div>

                <div class="w-full md:w-1/2">
                    <x-input-label for="alamat_ibu" value="Alamat Ibu" class="required" />
                    <x-text-input id="alamat_ibu" name="alamat_ibu" type="text" class="mt-1 block w-full"
                        :value="old('alamat_ibu')" autocomplete="alamat_ibu" />
                    <x-input-error class="mt-2" :messages="$errors->get('alamat_ibu')" />
                </div>
            </div>
        </div>
    </div>
    <div class="tab" data-name="Data Wali">
        <div class="space-y-6 tab5">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-1/2">
                    <x-input-label for="nama_wali" value="Nama Wali" class="required" />
                    <x-text-input id="nama_wali" name="nama_wali" type="text" class="mt-1 block w-full"
                        :value="old('nama_wali')" autocomplete="nama_wali" />
                    <x-input-error class="mt-2" :messages="$errors->get('nama_wali')" />
                </div>

                <div class="w-full md:w-1/2">
                    <x-input-label for="pendidikan_wali" value="Pendidikan Wali" class="required" />
                    <x-select id="pendidikan_wali" name="pendidikan_wali" class="mt-1 block w-full">
                        <option selected value="">-- pilih pendidikan --</option>
                        @foreach (['SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3'] as $item)
                            <option @selected(old('pendidikan_wali') == $item)>{{ $item }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error class="mt-2" :messages="$errors->get('pendidikan_wali')" />
                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-1/2">
                    <x-input-label for="pekerjaan_wali" value="Pekerjaan Wali" class="required" />
                    <x-text-input id="pekerjaan_wali" name="pekerjaan_wali" type="text" class="mt-1 block w-full"
                        :value="old('pekerjaan_wali')" autocomplete="pekerjaan_wali" list="pekerjaan" />
                    <x-input-error class="mt-2" :messages="$errors->get('pekerjaan_wali')" />
                </div>

                <div class="w-full md:w-1/2">
                    <x-input-label for="penghasilan_wali" value="Penghasilan Wali" class="required" />
                    <x-select id="penghasilan_wali" name="penghasilan_wali" class="mt-1 block w-full">
                        <option selected value="">-- pilih penghasilan --</option>
                        @foreach (['Lebih dari Rp 2.000.000', 'Rp 2.000.000 sampai Rp 1.000.000', 'Kurang dari Rp 1.000.000'] as $item)
                            <option @selected(old('penghasilan_wali') == $item)>{{ $item }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error class="mt-2" :messages="$errors->get('penghasilan_wali')" />
                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-1/2">
                    <x-input-label for="no_hp_wali" value="Nomor Handphone Wali" class="required" />
                    <x-text-input id="no_hp_wali" name="no_hp_wali" type="text" class="mt-1 block w-full"
                        :value="old('no_hp_wali')" autocomplete="no_hp_wali" />
                    <x-input-error class="mt-2" :messages="$errors->get('no_hp_wali')" />
                </div>

                <div class="w-full md:w-1/2">
                    <x-input-label for="alamat_wali" value="Alamat Wali" class="required" />
                    <x-text-input id="alamat_wali" name="alamat_wali" type="text" class="mt-1 block w-full"
                        :value="old('alamat_wali')" autocomplete="alamat_wali" />
                    <x-input-error class="mt-2" :messages="$errors->get('alamat_wali')" />
                </div>
            </div>
        </div>
    </div>
    <div class="tab" data-name="Berkas">
        <div class="space-y-6 tab6">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-1/2">
                    <x-input-label for="pas_foto" value="Pas Foto" class="mb-3 required" />
                    <x-file-input id="pas_foto" name="sertifikat[]" class="block w-full border p-1"
                        accept="application/pdf" required />
                </div>
                <div class="w-full md:w-1/2">
                    <x-input-label for="akte_kelahiran" value="Akte Kelahiran" class="mb-3 required" />
                    <x-file-input id="akte_kelahiran" name="sertifikat[]" class="block w-full border p-1"
                        accept="application/pdf" required />
                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-1/2">
                    <x-input-label for="kartu_keluarga" value="Kartu Keluarga" class="mb-3 required" />
                    <x-file-input id="kartu_keluarga" name="sertifikat[]" class="block w-full border p-1"
                        accept="application/pdf" required />
                </div>
                <div class="w-full md:w-1/2">
                    <x-input-label for="ktp_ayah_ibu" value="KTP Ayah dan Ibu" class="mb-3 required" />
                    <x-file-input id="ktp_ayah_ibu" name="sertifikat[]" class="block w-full border p-1"
                        accept="application/pdf" required />
                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-1/2">
                    <x-input-label for="sertifikat" value="Sertifikat" class="mb-3" />
                    <x-file-input id="sertifikat" name="sertifikat[]" class="block w-full border p-1"
                        accept="application/pdf" multiple />
                </div>
                <div class="w-full md:w-1/2">
                    <x-input-label for="surat_dokter" value="Surat Izin Dokter (jika ada)" class="mb-3" />
                    <x-file-input id="surat_dokter" name="sertifikat[]" class="block w-full border p-1"
                        onchange="disableRegisterBySurat()" accept="application/pdf" />
                </div>
            </div>
        </div>
    </div>

    <div class="py-3">
        @include('form.notes')
    </div>

    <nav class="tab-pag"></nav>
</div>

<datalist id="pekerjaan">
    <option value="Polisi">
    <option value="TNI">
    <option value="PNS">
    <option value="Wiraswasta">
    <option value="Pengusaha">
</datalist>

<script>
    var disableRegister = false;
    var age = 0;

    var tabs = function(id) {
        this.el = document.getElementById(id);

        this.tab = {
            el: '.tab',
            list: null
        }

        this.nav = {
            el: '.tab-nav',
            list: null
        }

        this.pag = {
            el: '.tab-pag',
            list: null
        }

        this.count = null;
        this.selected = 0;

        this.init = function() {
            // Create tabs
            this.tab.list = this.createTabList();
            this.count = this.tab.list.length;

            // Create nav
            this.nav.list = this.createNavList();
            this.renderNavList();

            // Create pag
            this.pag.list = this.createPagList();
            this.renderPagList();

            // Set selected
            this.setSelected(this.selected);
        }

        this.createTabList = function() {
            var list = [];

            this.el.querySelectorAll(this.tab.el).forEach(function(el, i) {
                list[i] = el;
            });

            return list;
        }

        this.createNavList = function() {
            var list = [];

            this.tab.list.forEach(function(el, i) {
                var listitem = document.createElement('a');
                listitem.className = 'nav-item',
                    listitem.innerHTML = el.getAttribute('data-name'),
                    listitem.onclick = function() {
                        this.setSelected(i);
                        return false;
                    }.bind(this);

                list[i] = listitem;
            }.bind(this));

            return list;
        }

        this.createPagList = function() {
            var list = [];

            list.prev = document.createElement('a');
            list.prev.className = 'pag-item pag-item-prev',
                list.prev.innerHTML = 'Sebelumnya',
                list.prev.onclick = function() {
                    this.setSelected(this.selected - 1);
                    return false;
                }.bind(this);

            list.next = document.createElement('a');
            list.next.className = 'pag-item pag-item-next',
                list.next.innerHTML = 'Selanjutnya',
                list.next.onclick = function() {
                    this.setSelected(this.selected + 1);
                    return false;
                }.bind(this);

            list.submit = document.createElement('button');
            list.submit.className = 'pag-item pag-item-submit',
                list.submit.innerHTML = 'Submit';

            return list;
        }

        this.renderNavList = function() {
            var nav = document.querySelector(this.nav.el);

            this.nav.list.forEach(function(el) {
                nav.appendChild(el);
            });
        }

        this.renderPagList = function() {
            var pag = document.querySelector(this.pag.el);

            pag.appendChild(this.pag.list.prev);
            pag.appendChild(this.pag.list.next);

            pag.appendChild(this.pag.list.submit);
        }

        this.setSelected = function(target) {
            var min = 0,
                max = this.count - 1;

            if (target > max || target < min) {
                return;
            }

            if (target == min) {
                this.pag.list.prev.classList.add('hidden');
            } else {
                this.pag.list.prev.classList.remove('hidden');
            }

            if (target == max) {
                this.pag.list.next.classList.add('hidden');
                this.pag.list.submit.classList.remove('hidden');
            } else {
                this.pag.list.next.classList.remove('hidden');
                this.pag.list.submit.classList.add('hidden');
            }

            this.tab.list[this.selected].classList.remove('selected');
            this.nav.list[this.selected].classList.remove('selected');

            this.selected = target;
            this.tab.list[this.selected].classList.add('selected');
            this.nav.list[this.selected].classList.add('selected');
        }
    };

    var tabbedForm = new tabs('tabbedForm');
    tabbedForm.init();


    const submitButton = document.querySelector('.pag-item-submit')

    function ageCount() {
        var now = new Date(); //getting current date
        var currentY = now.getFullYear(); //extracting year from the date
        var currentM = now.getMonth(); //extracting month from the date

        var dobget = document.getElementById("tanggal_lahir").value; //getting user input
        var dob = new Date(dobget); //formatting input as date
        var prevY = dob.getFullYear(); //extracting year from input date
        var prevM = dob.getMonth(); //extracting month from input date

        var ageY = currentY - prevY;
        var ageM = Math.abs(currentM - prevM); //converting any negative value to positive

        age = ageY;

        if (ageY > 7) {
            document.getElementById('demo').innerHTML = 'Maaf, umur anda sudah melewati batas maksimal.' + ageY;
            disableRegister = true;
        } else if (ageY < 6) {
            document.getElementById('demo').innerHTML =
                'Umur anda dibawah 6 tahun. silahkan lampirkan surat kesiapan sekolah dari psikolog.' + ageY;
            disableRegister = true;
        } else {
            document.getElementById('demo').innerHTML = "";
            disableRegister = false;
        }

        submitButton.disabled = disableRegister

    }

    function disableRegisterBySurat() {
        if (age < 6) {
            submitButton.disabled = false
        }
    }
</script>

<div class="mb-3">
    <label class="form-label">Nama Lengkap</label>
    <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $employee->nama_lengkap ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $employee->email ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">No Telepon</label>
    <input type="text" name="no_telepon" class="form-control" value="{{ old('no_telepon', $employee->no_telepon ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Tanggal Lahir</label>
    <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $employee->tanggal_lahir ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Alamat</label>
    <textarea name="alamat" class="form-control" required>{{ old('alamat', $employee->alamat ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Tanggal Masuk</label>
    <input type="date" name="tanggal_masuk" class="form-control" value="{{ old('tanggal_masuk', $employee->tanggal_masuk ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Departemen</label>
    <select name="department_id" class="form-select">
        <option value="">-- Pilih Departemen --</option>
        @foreach($departments as $dept)
            <option value="{{ $dept->id }}" {{ old('department_id', $employee->department_id ?? '') == $dept->id ? 'selected' : '' }}>
                {{ $dept->nama_departemen }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Jabatan</label>
    <select name="position_id" class="form-select">
        <option value="">-- Pilih Jabatan --</option>
        @foreach($positions as $pos)
            <option value="{{ $pos->id }}" {{ old('position_id', $employee->position_id ?? '') == $pos->id ? 'selected' : '' }}>
                {{ $pos->nama_jabatan }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Status</label>
    <select name="status" class="form-select">
        <option value="aktif" {{ old('status', $employee->status ?? '') == 'aktif' ? 'selected' : '' }}>Aktif</option>
        <option value="nonaktif" {{ old('status', $employee->status ?? '') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
    </select>
</div>

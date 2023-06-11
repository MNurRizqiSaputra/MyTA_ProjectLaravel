@csrf
<div class="p-2">
    <div class="row">
        <div class="col mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama" value="{{ old('nama') ?? ($user->nama ?? '') }}" required>
            @error('nama')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') ?? ($user->email ?? '') }}" required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="*******" value="{{ old('password') ?? ($user->password ?? '') }}" required>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir') ?? ($user->tanggal_lahir ?? '') }}" required>
            @error('tanggal_lahir')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label for="role_id" class="form-label">Role</label>
            <select name="role_id" id="role_id" class="form-select @error('role_id') is-invalid @enderror">
                @foreach ($roles as $role)

                    @if ($role->id == (old('role_id') ?? ($user->role_id ?? '')))
                        <option value="{{ $role->id }}" selected> {{ $role->nama }} </option>
                    @else
                        <option value="{{ $role->id }}"> {{ $role->nama }} </option>
                    @endif
                @endforeach
            </select>
            @error('role_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
</div>

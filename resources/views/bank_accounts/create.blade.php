<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tạo tài khoản mới</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen text-slate-800">
<div class="max-w-3xl mx-auto py-8 px-4 sm:px-6">
    <div class="mb-6">
        <a href="{{ route('bank-accounts.index') }}"
           class="text-sm font-medium text-slate-600 hover:text-slate-900">
            ← Quay lại danh sách
        </a>
        <h1 class="text-2xl font-semibold text-slate-800 mt-3">Tạo tài khoản mới</h1>
        <p class="text-sm text-slate-500 mt-1">Điền thông tin cơ bản để lưu tài khoản.</p>
    </div>
    <div class="bg-white rounded-lg border border-slate-200 p-6">
        <form method="POST" action="{{ route('bank-accounts.store') }}" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Họ và tên</label>
                <input type="text"
                       name="full_name"
                       value="{{ old('full_name') }}"
                       class="w-full rounded-md border-slate-300 text-sm focus:border-slate-500 focus:ring-slate-500">
                @error('full_name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Số tài khoản</label>
                <input type="text"
                       name="account_number"
                       value="{{ old('account_number') }}"
                       placeholder="Nhập đúng 10 số"
                       class="w-full rounded-md border-slate-300 text-sm focus:border-slate-500 focus:ring-slate-500">
                @error('account_number')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       class="w-full rounded-md border-slate-300 text-sm focus:border-slate-500 focus:ring-slate-500">
                @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Số điện thoại</label>
                <input type="text"
                       name="phone"
                       value="{{ old('phone') }}"
                       class="w-full rounded-md border-slate-300 text-sm focus:border-slate-500 focus:ring-slate-500">
                @error('phone')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Số dư</label>
                <input type="number"
                       name="balance"
                       value="{{ old('balance') }}"
                       placeholder="Mặc định 0 nếu bỏ trống"
                       class="w-full rounded-md border-slate-300 text-sm focus:border-slate-500 focus:ring-slate-500">
                @error('balance')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Trạng thái</label>
                <select name="status" class="w-full rounded-md border-slate-300 text-sm focus:border-slate-500 focus:ring-slate-500">
                    <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Hoạt động</option>
                    <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Tạm khóa</option>
                    <option value="banned" {{ old('status') === 'banned' ? 'selected' : '' }}>Bị khóa</option>
                </select>
                @error('status')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-3">
                <a href="{{ route('bank-accounts.index') }}"
                   class="px-5 py-2 rounded-md border border-slate-300 bg-white text-sm font-medium text-slate-700 hover:bg-slate-50">
                    Hủy
                </a>

                <button type="submit"
                        class="px-5 py-2 rounded-md bg-slate-700 text-sm font-medium text-white hover:bg-slate-800">
                    Lưu
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>

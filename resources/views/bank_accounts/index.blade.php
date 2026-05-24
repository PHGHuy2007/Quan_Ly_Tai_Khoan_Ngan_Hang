<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách tài khoản</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen text-slate-800">
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6">
    <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-slate-800">Danh sách tài khoản</h1>
            <p class="text-sm text-slate-500 mt-1">Xem thông tin tài khoản và tìm lại dữ liệu khi cần.</p>
        </div>
        <a href="{{ route('bank-accounts.create') }}"
           class="inline-flex items-center justify-center rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">
            Thêm mới
        </a>
    </div
    @if(session('success'))
        <div class="mb-5 rounded-md border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
            {{ session('success') }}
        </div>
    @endif
    <div class="bg-white rounded-lg border border-slate-200 p-5 mb-6">
        <form method="GET" action="{{ route('bank-accounts.index') }}"
              class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Tìm kiếm</label>
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Tên, email, SĐT..."
                       class="w-full rounded-md border-slate-300 text-sm focus:border-slate-500 focus:ring-slate-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Số dư tối thiểu</label>
                <input type="number"
                       name="min_balance"
                       value="{{ request('min_balance') }}"
                       placeholder="VD: 10000000"
                       class="w-full rounded-md border-slate-300 text-sm focus:border-slate-500 focus:ring-slate-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Từ ngày</label>
                <input type="date"
                       name="from_date"
                       value="{{ request('from_date') }}"
                       class="w-full rounded-md border-slate-300 text-sm focus:border-slate-500 focus:ring-slate-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Đến ngày</label>
                <input type="date"
                       name="to_date"
                       value="{{ request('to_date') }}"
                       class="w-full rounded-md border-slate-300 text-sm focus:border-slate-500 focus:ring-slate-500">
            </div>
            <div class="flex items-end gap-2">
                <button type="submit"
                        class="w-full rounded-md bg-slate-700 px-4 py-2 text-sm font-medium text-white hover:bg-slate-800">
                    Tìm
                </button>
                <a href="{{ route('bank-accounts.index') }}"
                   class="w-full rounded-md border border-slate-300 bg-white px-4 py-2 text-center text-sm font-medium text-slate-700 hover:bg-slate-50">
                    Reset
                </a>
            </div>
        </form>
    </div>
    <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
        <table class="w-full min-w-full border-collapse text-sm">
            <thead class="bg-slate-100 text-slate-700">
            <tr>
                <th class="px-4 py-3 text-left font-semibold">ID</th>
                <th class="px-4 py-3 text-left font-semibold">Số tài khoản</th>
                <th class="px-4 py-3 text-left font-semibold">Chủ tài khoản</th>
                <th class="px-4 py-3 text-left font-semibold">Email</th>
                <th class="px-4 py-3 text-left font-semibold">Điện thoại</th>
                <th class="px-4 py-3 text-right font-semibold">Số dư</th>
                <th class="px-4 py-3 text-center font-semibold">Trạng thái</th>
                <th class="px-4 py-3 text-left font-semibold">Ngày tạo</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
            @forelse($accounts as $account)
                <tr class="hover:bg-slate-50">
                    <td class="px-4 py-3 text-slate-500">{{ $account->id }}</td>
                    <td class="px-4 py-3 font-medium text-slate-800">{{ $account->account_number }}</td>
                    <td class="px-4 py-3">{{ $account->full_name }}</td>
                    <td class="px-4 py-3 text-slate-600">{{ $account->email }}</td>
                    <td class="px-4 py-3">{{ $account->phone }}</td>
                    <td class="px-4 py-3 text-right font-medium">
                        {{ number_format($account->balance, 0, ',', '.') }} VNĐ
                    </td>
                    <td class="px-4 py-3 text-center">
                        @if($account->status === 'active')
                            <span class="px-3 py-1 text-xs rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">Hoạt động</span>
                        @elseif($account->status === 'inactive')
                            <span class="px-3 py-1 text-xs rounded-full bg-amber-50 text-amber-700 border border-amber-200">Tạm khóa</span>
                        @else
                            <span class="px-3 py-1 text-xs rounded-full bg-rose-50 text-rose-700 border border-rose-200">Bị khóa</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-slate-600">
                        {{ $account->created_at->format('d/m/Y') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="px-4 py-6 text-center text-slate-500">
                        Không có tài khoản phù hợp.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
        </div>
        <div class="border-t border-slate-200 p-4">
            {{ $accounts->links() }}
        </div>
    </div>
</div>
</body>
</html>

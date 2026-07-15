@extends('admin.layout')

@section('admin-title', 'Customers')

@section('admin-content')

<section class="min-h-screen bg-[#F4F4F1] px-5 py-10 sm:px-6 lg:px-10">

    <div class="mx-auto max-w-[1600px]">

        {{-- HEADER --}}
        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

            <div>
                <p class="mb-2 text-[11px] font-semibold uppercase tracking-[0.25em] text-[#8C7B62]">
                    Customer Management
                </p>

                <h1 class="text-[42px] font-semibold tracking-[-0.05em] text-[#171717] sm:text-[56px]">
                    Customers
                </h1>

                <p class="mt-3 text-sm text-[#777]">
                    Manage all registered customers.
                </p>
            </div>

            <div class="rounded-full bg-white px-6 py-3 shadow-sm">
                <span class="text-sm text-[#777]">
                    Total Customers:
                </span>

                <span class="font-semibold text-[#171717]">
                    {{ $customers->total() }}
                </span>
            </div>

        </div>

        {{-- TABLE --}}
        <div class="overflow-hidden rounded-[34px] bg-white shadow-[0_18px_55px_rgba(0,0,0,0.05)]">

            <div class="overflow-x-auto">

                <table class="w-full min-w-[1000px]">

                    <thead class="border-b border-black/5 bg-[#FAFAF8]">

                        <tr>

                            <th class="px-6 py-5 text-left text-xs font-bold uppercase tracking-[0.12em] text-[#777]">
                                Customer
                            </th>

                            <th class="px-6 py-5 text-left text-xs font-bold uppercase tracking-[0.12em] text-[#777]">
                                Email
                            </th>

                            <th class="px-6 py-5 text-left text-xs font-bold uppercase tracking-[0.12em] text-[#777]">
                                Phone
                            </th>

                            <th class="px-6 py-5 text-left text-xs font-bold uppercase tracking-[0.12em] text-[#777]">
                                Registered
                            </th>

                            <th class="px-6 py-5 text-left text-xs font-bold uppercase tracking-[0.12em] text-[#777]">
                                Status
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($customers as $customer)

                            <tr class="border-b border-black/5 hover:bg-[#FAFAF8]">

                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-4">

                                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-[#171717] text-sm font-semibold text-white">
                                            {{ strtoupper(substr($customer->name, 0, 1)) }}
                                        </div>

                                        <div>
                                            <p class="font-semibold text-[#171717]">
                                                {{ $customer->name }}
                                            </p>

                                            <p class="text-xs text-[#777]">
                                                ID #{{ $customer->id }}
                                            </p>
                                        </div>

                                    </div>

                                </td>

                                <td class="px-6 py-5 text-sm text-[#171717]">
                                    {{ $customer->email }}
                                </td>

                                <td class="px-6 py-5 text-sm text-[#171717]">
                                    {{ $customer->phone ?? '-' }}
                                </td>

                                <td class="px-6 py-5 text-sm text-[#777]">
                                    {{ $customer->created_at->format('d M Y') }}
                                </td>

                                <td class="px-6 py-5">

                                    <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                        Active
                                    </span>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="px-6 py-16 text-center">

                                    <h3 class="text-lg font-semibold text-[#171717]">
                                        No Customers Found
                                    </h3>

                                    <p class="mt-2 text-sm text-[#777]">
                                        Registered customers will appear here.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        {{-- PAGINATION --}}
        <div class="mt-6">
            {{ $customers->links() }}
        </div>

    </div>

</section>

@endsection
@extends('layouts.app')

@section('title', 'Data Products')

@push('head')
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

@push('body-attributes') data-swal-success="{{ session('success') }}" @endpush

@push('scripts')
    <script src="{{ asset('js/sweetalert-init.js') }}"></script>
@endpush

@section('content')
    <a href="{{ route('products.create') }}"
       class="inline-flex items-center justify-center px-4 py-2 rounded-lg
              bg-emerald-600 text-white text-sm font-semibold
              hover:bg-emerald-700 transition mb-4">
        ADD PRODUCT
    </a>

    <div class="overflow-x-auto">
        <table class="w-full text-sm border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-50 text-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold border-b">IMAGE</th>
                    <th class="px-4 py-3 text-left font-semibold border-b">TITLE</th>
                    <th class="px-4 py-3 text-left font-semibold border-b">PRICE</th>
                    <th class="px-4 py-3 text-left font-semibold border-b">STOCK</th>
                    <th class="px-4 py-3 text-left font-semibold border-b w-[220px]">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="border-b last:border-b-0">
                        <td class="px-4 py-3">
                            <div class="flex justify-center">
                                <x-product-image :image="$product->image" :alt="$product->title"
                                                 class="w-[150px] rounded-lg border border-gray-200" />
                            </div>
                        </td>
                        <td class="px-4 py-3 font-medium text-gray-900">
                            {{ $product->title }}
                        </td>
                        <td class="px-4 py-3 text-gray-700">
                            <x-price :amount="$product->price" />
                        </td>
                        <td class="px-4 py-3 text-gray-700">
                            {{ $product->stock }}
                        </td>
                        <td class="px-4 py-3">
                            <form
                                action="{{ route('products.destroy', $product->id) }}"
                                method="POST"
                                class="delete-form flex items-center gap-2"
                            >
                                <a href="{{ route('products.show', $product->id) }}"
                                   class="px-3 py-2 rounded-lg bg-gray-900 text-white
                                          text-xs font-semibold hover:bg-gray-800 transition">
                                    SHOW
                                </a>

                                <a href="{{ route('products.edit', $product->id) }}"
                                   class="px-3 py-2 rounded-lg bg-blue-600 text-white
                                          text-xs font-semibold hover:bg-blue-700 transition">
                                    EDIT
                                </a>

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="px-3 py-2 rounded-lg bg-red-600 text-white
                                           text-xs font-semibold hover:bg-red-700 transition">
                                    HAPUS
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6">
                            <div class="bg-red-50 border border-red-200 text-red-700
                                        rounded-lg px-4 py-3">
                                Data Products belum ada.
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
@endsection

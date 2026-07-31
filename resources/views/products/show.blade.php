@extends('layouts.app')

@section('title', 'Show Products')

@section('content')
    <x-page-header title="Detail Product" :back-href="route('products.index')" />

    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
        <div class="md:col-span-4">
            <div class="border border-gray-200 rounded-2xl overflow-hidden">
                <x-product-image :image="$product->image" :alt="$product->title" class="w-full" />
            </div>
        </div>

        <div class="md:col-span-8">
            <div class="border border-gray-200 rounded-2xl p-6">
                <h3 class="text-xl font-bold text-gray-900">{{ $product->title }}</h3>
                <hr class="my-4 border-gray-200">

                <p class="text-gray-700 font-semibold">
                    <x-price :amount="$product->price" />
                </p>

                <div class="mt-4">
                    <div class="text-sm font-semibold text-gray-700 mb-2">DESCRIPTION</div>
                    <div class="prose max-w-none text-gray-700">
                        {!! $product->description !!}
                    </div>
                </div>

                <hr class="my-4 border-gray-200">

                <p class="text-gray-700">
                    Stock : <span class="font-semibold">{{ $product->stock }}</span>
                </p>
            </div>
        </div>
    </div>
@endsection

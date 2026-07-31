<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Product - SantriKoding.com</title>

    <!-- CKEditor CSS -->
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/48.2.0/ckeditor5.css" crossorigin>
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5-premium-features/48.2.0/ckeditor5-premium-features.css" crossorigin>

    <style>
        .ck-editor__editable_inline {
            min-height: 150px;
        }
    </style>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/48.2.0/ckeditor5.umd.js" crossorigin></script>
    <script src="https://cdn.ckeditor.com/ckeditor5-premium-features/48.2.0/ckeditor5-premium-features.umd.js" crossorigin></script>
</head>
<body class="bg-gray-100" data-ckeditor-license-key="{{ config('services.ckeditor.key') }}">

    <div class="max-w-6xl mx-auto px-4 py-10">
        <div class="text-center">
            <h3 class="text-2xl font-bold mb-2">Tutorial Laravel 13 untuk Pemula</h3>
            <h5 class="text-sm">
                <a href="https://santrikoding.com" class="text-blue-600 hover:underline">www.santrikoding.com</a>
            </h5>
            <hr class="my-6 border-gray-200">
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200">
            <div class="p-6">

                <div class="flex items-center justify-between mb-6">
                    <h4 class="text-lg font-semibold text-gray-900">Tambah Product</h4>
                    <a href="{{ route('products.index') }}"
                       class="px-4 py-2 rounded-lg bg-gray-900 text-white text-sm font-semibold hover:bg-gray-800 transition">
                        BACK
                    </a>
                </div>

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">IMAGE</label>
                        <input type="file" name="image"
                               class="block w-full text-sm
                                      file:mr-4 file:py-2 file:px-4
                                      file:rounded-lg file:border-0
                                      file:bg-gray-900 file:text-white
                                      hover:file:bg-gray-800
                                      border border-gray-200 rounded-lg bg-white">
                        @error('image')
                            <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <x-form-input name="title" label="TITLE" placeholder="Masukkan Title Product" />

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">DESCRIPTION</label>
                        <textarea name="description" id="description" rows="3" class="hidden">{{ old('description') }}</textarea>
                        <div id="editor" class="border border-gray-200 rounded-lg overflow-hidden">
                            {!! old('description') !!}
                        </div>
                        @error('description')
                            <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <x-form-input name="price" label="PRICE" type="number" placeholder="Masukkan Harga Product" />

                        <x-form-input name="stock" label="STOCK" type="number" placeholder="Masukkan Stock Product" />
                    </div>

                    <button type="submit"
                            class="inline-flex items-center justify-center px-4 py-2 rounded-lg
                                   bg-emerald-600 text-white text-sm font-semibold hover:bg-emerald-700 transition">
                        SAVE
                    </button>
                </form>

            </div>
        </div>
    </div>

    <script src="{{ asset('js/ckeditor-init.js') }}"></script>
</body>
</html>
